<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('voluntariados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('ubicacion');
            $table->date('fecha');
            $table->string('alimentacion');
            $table->integer('capacidad');
            $table->unsignedBigInteger('tipo'); // Change the data type to unsigned big integer
            $table->string('inOex');
            $table->string('status')->default('Activo');
            // Add foreign key constraint
            $table->foreign('tipo')->references('id')->on('tiposvolcamp')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voluntariados');
    }
};
