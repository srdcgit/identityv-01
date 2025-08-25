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
        Schema::create('subscriberdata', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('plan');
            $table->string('amount');
            $table->integer('transation_date');
            $table->integer('transaction_number');
            $table->integer('method');
            $table->integer('currency');
            $table->longText('json_response');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
