<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment_tag', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();

            # `equipment_id` and `tag_id` will be foreign keys, so they have to be unsigned
            #  Note how the field names here correspond to the tables they will connect...
            # `equipment_id` will reference the `equipments table` and `tag_id` will reference the `tags` table.
            $table->integer('equipment_id')->unsigned();
            $table->integer('tag_id')->unsigned();

            # Make foreign keys
            $table->foreign('equipment_id')->references('id')->on('equipments');
            $table->foreign('tag_id')->references('id')->on('tags');
        });
    }

    public function down()
    {
        Schema::drop('equipment_tag');
    }
}
