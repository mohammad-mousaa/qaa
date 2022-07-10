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
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');

            $table->string('description', 10000)->nullable()->default('text');
            // 10 عدد الحروف الاقصى



            // $table->longText('description');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('comments', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->integer('post_id')->unsigned();

            // احتمال يكون التعليق تابع للاب مباشرة لهيك حطينا قد يكون نل
            $table->integer('parent_id')->unsigned()->nullable();

            $table->longText('description');

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
        Schema::dropIfExists('posts');
        Schema::dropIfExists('comments');

    }
};
