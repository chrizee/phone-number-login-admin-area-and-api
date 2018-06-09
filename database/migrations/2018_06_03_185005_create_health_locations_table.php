<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHealthLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->mediumText('description');
            $table->mediumText('units')->nullable();
            $table->mediumText('services');
            $table->string('email')->nullable();
            $table->string('emergency_lines')->nullable();
            $table->mediumText('location');
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
        Schema::dropIfExists('health_locations');
    }
}
