<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->decimal('precio_costo', 8, 2); // Aquí ya usamos el nombre correcto
            $table->decimal('precio_venta', 8, 2)->nullable(); // Nuevo campo
            $table->decimal('porcentaje_ganancia', 5, 2)->default(0); // Nuevo campo
            $table->integer('stock')->default(0);
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->renameColumn('precio_costo', 'precio');
            $table->dropColumn(['precio_venta', 'porcentaje_ganancia']);
        });
    }
};
