<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('pasutijuma_numurs')->nullable()->unique();
            $table->date('datums')->default(DB::raw('CURRENT_DATE'));
            $table->foreignId('client_id')->nullable()->constrained('clients')->onDelete('cascade');
            $table->string('klients')->nullable();
            $table->foreignId('products_id')->nullable()->constrained('products')->onDelete('cascade');
            $table->string('produkts')->nullable();
            $table->integer('daudzums');
            $table->date('izpildes_datums')->nullable();
            $table->string('prioritāte')->default('normāla');
            $table->string('statuss')->default('nav nodots ražošanai');
            $table->string('piezimes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
