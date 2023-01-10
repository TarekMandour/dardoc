<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('title_en')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_description_en')->nullable();
            $table->text('logo1')->nullable();
            $table->text('logo2')->nullable();
            $table->text('fav')->nullable();
            $table->text('breadcrumb')->nullable();
            $table->string('site_lang')->nullable();
            $table->string('phone1');
            $table->string('phone2')->nullable();
            $table->string('email1');
            $table->string('email2')->nullable();
            $table->string('address');
            $table->string('address_en')->nullable();
            $table->string('website')->nullable();
            $table->string('location')->nullable();
            $table->string('work_time')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
            $table->string('snapchat')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
