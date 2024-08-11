<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id(); // Campo para ID auto-incremental
            $table->string('nombres'); // Campo para nombres
            $table->string('apellidos'); // Campo para apellidos
            $table->string('empresa')->nullable(); // Campo para empresa (opcional)
            $table->string('mail')->unique(); // Campo para correo electrónico (único)
            $table->string('telefono')->nullable(); // Campo para teléfono (opcional)
            $table->unsignedBigInteger('created_by'); // Campo para ID del creador
            $table->unsignedBigInteger('updated_by')->nullable(); // Campo para ID del actualizador (opcional)
            $table->timestamps(); // Campos created_at y updated_at

            // Define las llaves foráneas (asumiendo que 'users' es la tabla de usuarios)
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
