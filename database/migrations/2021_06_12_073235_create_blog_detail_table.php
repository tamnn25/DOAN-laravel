<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_detail', function (Blueprint $table) {
            $table->id();
            $table->string('image_detail')->nullable()->comment('Image for Blog');
            $table->unsignedBigInteger('blog_id');
            $table->foreign('blog_id')->references('id')->on('blog');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_detail');
    }
}
