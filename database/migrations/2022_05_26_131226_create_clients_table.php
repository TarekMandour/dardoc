<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('membership_no')->unique();
            $table->string('national_no')->unique();
            $table->string('phone')->unique();
            $table->string('password');
            $table->string('email')->nullable();
            $table->string('jop')->nullable();
            $table->timestamp('birth_date')->nullable();
            $table->timestamp('register_date')->nullable();
            $table->text('photo')->nullable();
            $table->tinyInteger('is_active');
            $table->tinyInteger('type')->default(0)->nullable();
            $table->integer('parent_id')->default(0)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('clients');
    }
}
