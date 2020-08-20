<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('codigo',40);
            $table->string('nombre',120);
            $table->double('salarioDolores');
            $table->double('salarioPesos');
            $table->string('direccion',40);
            $table->string('estado',40);
            $table->string('ciudad',40);
            $table->string('telefono',40);
            $table->string('correo',40);
            $table->tinyInteger('activo')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
