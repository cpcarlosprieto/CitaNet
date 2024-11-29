<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->string('name'); // Nombre del usuario
            $table->string('email')->unique(); // Correo electrónico único
            $table->timestamp('email_verified_at')->nullable(); // Fecha de verificación de correo
            $table->string('password'); // Contraseña encriptada
            $table->string('identity_card')->unique()->nullable(); // Cédula de identidad única y opcional
            $table->string('address')->nullable(); // Dirección opcional
            $table->string('phone')->nullable(); // Teléfono opcional
            $table->string('role')->nullable(); // Rol opcional
            $table->rememberToken(); // Token de "recordarme"
            $table->timestamps(); // Campos created_at y updated_at para seguimiento de creación y actualización
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
