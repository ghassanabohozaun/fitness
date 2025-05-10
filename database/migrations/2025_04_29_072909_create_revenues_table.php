<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revenues', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained(table: 'students')->cascadeOnDelete();
            $table->string('date')->nullable();
            $table->float('value')->nullable();
            $table->string('revenue_for')->nullable();
            $table->string('details')->nullable();
            $table->text('payer_id')->nullable();
            $table->text('payment_id')->nullable();
            $table->text('token')->nullable();
            $table->enum('payment_method', ['dashboard','payment_gateway'])->default('dashboard');
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
        Schema::dropIfExists('revenues');
    }
};
