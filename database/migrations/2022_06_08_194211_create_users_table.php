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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 50)->comment();
            $table->string('kana', 50)->comment();
            $table->string('email', 100)->comment();
            $table->string('password', 100)->comment();
            $table->integer('department_id')->comment('department_tableのidと連携');
            $table->integer('tel')->nullable()->comment();
            $table->integer('role')->default(0)->comment('0=社員、25=管理者、50=総管理者');
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
        Schema::dropIfExists('users');
    }
};
