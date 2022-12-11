<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('menu_id')->nullable();
            $table->string('name_en', 250)->nullable();
            $table->string('title_en', 100)->nullable();
            $table->string('slug', 250);
            $table->string('blog_name_en', 250)->nullable();
            $table->text('blog_description_en')->nullable();
            $table->date('blog_date', 50)->nullable();
            $table->string('button_name_en', 100)->nullable();
            $table->string('blog_image')->nullable();
            $table->unsignedTinyInteger('status')->default(1)->comment('1=>Active, 0=>Inactive');
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
        Schema::dropIfExists('blogs');
    }
}
