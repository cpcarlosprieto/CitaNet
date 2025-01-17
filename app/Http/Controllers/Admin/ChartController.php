<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function appointments()
    {

        $monthCounts = Appointment::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(1) as value')
        )
            ->groupBy('month')
            ->get()
            ->toArray();

        $counts = array_fill(0, 12, 0);
        foreach ($monthCounts as $monthCount) {
            $index = $monthCount['month'] - 1;
            $counts[$index] = $monthCount['value'];
        }
        return view('charts.appointments', compact('counts'));
    }

    public function doctors()
    {
        $now = Carbon::now();
        $end = $now->format('Y-m-d');
        $start = $now->subYear()->format('Y-m-d');
        return view('charts.doctors', compact('end', 'start'));
    }

    public function doctorsJason(Request $request){

        $start = $request->input('start');
        $end = $request->input('end');

        $doctors = User::doctors()
        ->select('name')
        ->withCount(['attendedAppointments' => function($query) use ($start, $end){
            $query->whereBetween('scheduled_date', [$start, $end]);
        }
        ,'cancelledAppointments' => function($query) use ($start, $end){
            $query->whereBetween('scheduled_date', [$start, $end]);
        }
        ])
        ->orderBy('attended_appointments_count', 'desc')
        ->take(5)
        ->get();

        $data = [];
        $data['categories'] = $doctors->pluck('name');

        $series = [];
        $series1['name'] = 'Citas Atendidas';
        $series1['data'] = $doctors->pluck('attended_appointments_count');
        $series2['name'] = 'Citas Canceladas';
        $series2['data'] = $doctors->pluck('cancelled_appointments_count');

        $series[] = $series1;
        $series[] = $series2;
        $data['series'] = $series;
        return $data;
    }
    public function dashboard()
{
    // Datos para las citas por mes
    $monthCounts = Appointment::select(
        DB::raw('MONTH(created_at) as month'),
        DB::raw('COUNT(1) as value')
    )
        ->groupBy('month')
        ->get()
        ->toArray();
    
    // Datos para los doctores
    $now = Carbon::now();
    $end = $now->format('Y-m-d');
    $start = $now->subYear()->format('Y-m-d');

    $counts = array_fill(0, 12, 0);
    foreach ($monthCounts as $monthCount) {
        $index = $monthCount['month'] - 1;
        $counts[$index] = $monthCount['value'];
    }

    return view('dashboard', compact('counts', 'end', 'start'));
}
}
