<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('menu_id')->nullable();
            $table->integer('submenu_id')->nullable();
            $table->string('name_en', 50)->nullable();
            $table->string('title_en', 100)->nullable();
            $table->string('slug', 100);
            $table->text('description_en')->nullable();
            $table->string('service_name_en', 50)->nullable();
            $table->text('service_description_en')->nullable();
            $table->string('service_button_en', 100)->nullable();
            $table->string('service_image')->nullable();
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
        Schema::dropIfExists('services');
    }
}
