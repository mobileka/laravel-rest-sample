<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateApartmentPricesTable extends Migration
{
    /**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('apartment_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('apartment_id')->index();
            $table->decimal('price'); //8,2
            $table->datetime('valid_from');
            $table->datetime('valid_to');
        });
    }

    /**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
    public function down()
    {
        Schema::drop('apartment_prices');
    }
}
