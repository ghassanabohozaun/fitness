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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('mobile')->nullable();
            $table->string('age');
            $table->enum('gender', ['male', 'female'])->default('male');
            $table->string('password');
            $table->string('photo')->nullable();
            $table->string('status')->nullable();
            $table->string('freeze')->nullable();
            $table->foreignId('notification_id')->nullable()->constrained('notifications')->cascadeOnDelete();
            $table->datetime('last_login_at')->nullable();
            $table->string('last_login_ip')->nullable();
            $table->string('remember_token')->nullable();
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
        Schema::dropIfExists('patients');
    }
};
