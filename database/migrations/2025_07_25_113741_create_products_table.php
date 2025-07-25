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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('svitr_kods')->unique();
            $table->string('nosaukums');
            $table->double('pardosanas_cena', 8, 2);
            $table->double('vairumtirdzniecibas_cena', 8, 2)->nullable();
            $table->integer('daudzums_noliktava')->nullable();
            $table->double('svars_neto', 8, 2)->nullable();
            $table->string('nomGr_kods');
            $table->double('garums', 8, 2)->nullable();
            $table->double('platums', 8, 2)->nullable();
            $table->double('augstums', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
