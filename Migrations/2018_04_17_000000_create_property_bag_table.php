<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyBagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_bag', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('resource_type')->index();
            $table->unsignedBigInteger('resource_id')->index();
            $table->string('key')->index();
            $table->text('value');
            $table->timestamps();

            $table->unique(['resource_type', 'resource_id', 'key']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('property_bag');
    }
}
