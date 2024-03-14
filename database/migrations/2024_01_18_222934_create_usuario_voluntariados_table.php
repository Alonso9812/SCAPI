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
        Schema::create('usuario_voluntariados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id'); // Foreign key for Usuarios table
            $table->unsignedBigInteger('voluntariado_id'); // Foreign key for campañas table
            $table->timestamps();

            // Add foreign key constraints
            $table->foreign('usuario_id')->references('id')->on('Usuarios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('voluntariado_id')->references('id')->on('voluntariados')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario_voluntariados');
    }
};
