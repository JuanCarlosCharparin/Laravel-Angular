<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletedAtToClientesTable extends Migration
{
    public function up()
    {
        Schema::table('clientes', function (Blueprint $table) {
            $table->softDeletes(); // Agrega el campo deleted_at
        });
    }

    public function down()
    {
        Schema::table('clientes', function (Blueprint $table) {
            $table->dropSoftDeletes(); // Elimina el campo deleted_at
        });
    }
}
