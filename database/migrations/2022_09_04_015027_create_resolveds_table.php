<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resolveds', function (Blueprint $table) {
            $table->id();
            $table->uuid('access_key')->nullable();
            $table->foreignId('poll_id')->constrained('polls')->cascadeOnDelete();
            $table->integer('score')->default(0);
            $table->timestamp('started_at');
            $table->timestamp('ended_at')->nullable();
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
        Schema::dropIfExists('resolveds');
    }
};
