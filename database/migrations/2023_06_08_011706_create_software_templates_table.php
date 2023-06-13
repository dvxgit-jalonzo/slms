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
        Schema::create('software_templates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('software_id');
            $table->string('name');
            $table->string('value')->nullable();
            $table->string('label');
            $table->timestamps();
            $table->foreign('software_id')->references('id')->on('software')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('software_templates');
    }
};
