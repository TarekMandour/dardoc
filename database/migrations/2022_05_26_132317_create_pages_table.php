<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('content');
            $table->string('title_en')->nullable();
            $table->text('content_en')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('photo')->nullable();
            $table->text('photo2')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->text('mission')->nullable();
            $table->text('vision')->nullable();
            $table->text('why')->nullable();
            $table->text('mission_en')->nullable();
            $table->text('vision_en')->nullable();
            $table->text('why_en')->nullable();
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
        Schema::dropIfExists('pages');
    }
}
