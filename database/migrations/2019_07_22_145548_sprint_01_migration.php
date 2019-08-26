<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sprint01Migration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('slug');
            $table->string('title_en')->nullable();
            $table->string('title_vi')->nullable();
            $table->string('jumbotron_image')->nullable();
            $table->string('banner_image')->nullable();
            $table->string('homepage_image')->nullable();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('slug');
            $table->integer('category_id')->nullable();
            $table->string('title_en')->nullable();
            $table->string('title_vi')->nullable();
            $table->text('content_en')->nullable();
            $table->text('content_vi')->nullable();
            $table->string('image')->nullable();
            $table->string('homepage_image')->nullable();
        });

        Schema::create('agents', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('slug');
            $table->string('name_en')->nullable();
            $table->string('name_vi')->nullable();
            $table->string('address_en')->nullable();
            $table->string('address_vi')->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('email');
            $table->boolean('is_contact');
            $table->string('iframe',500)->nullable();
        });

        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone', 20)->nullable();
            $table->text('content');
        });

        Schema::create('configurations', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('config_key');
            $table->text('config_value')->nullable();
        });

        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('introduction_en')->nullable();
            $table->text('introduction_vi')->nullable();
            $table->string('introduction_image')->nullable();
            $table->text('goal_en')->nullable();
            $table->text('goal_vi')->nullable();
            $table->string('goal_image')->nullable();
            $table->integer('total_happy_customers')->nullable();
            $table->integer('total_stores')->nullable();
            $table->integer('total_experience_years')->nullable();
            $table->integer('total_active_projects')->nullable();
        });

        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('company_id')->nullable();
            $table->string('full_name');
            $table->string('title')->nullable();
            $table->string('avatar_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
        Schema::dropIfExists('products');
        Schema::dropIfExists('agents');
        Schema::dropIfExists('contacts');
        Schema::dropIfExists('configurations');
        Schema::dropIfExists('companies');
        Schema::dropIfExists('teams');
    }
}
