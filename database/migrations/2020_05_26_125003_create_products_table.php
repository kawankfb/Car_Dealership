<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->charset = 'utf8';
            $table->collation = 'utf8_persian_ci';
            $table->id();
            $table->timestamps();
            $table->text('price');
            $table->text('title');
            $table->text('explanation');
            $table->integer('distance');
            $table->integer('damage');
            $table->integer('production_date');//only store the year as an integer
            $table->integer('color');
            $table->integer('manufacturer');
            $table->integer('model');
            $table->integer('user_id');
            $table->integer('fuel_type');
            $table->integer('province');
            $table->integer('city');
            $table->integer('admin_id');
            $table->integer('car_type');
            $table->foreign('admin_id')
            ->references('id')
            ->on('users');

            $table->foreign('car_type')
            ->references('id')
            ->on('car_types')
            ->onDelete('cascade');

            $table->foreign('manufacturer')
            ->references('id')
            ->on('companies')
            ->onDelete('cascade');

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('damage')
            ->references('id')
            ->on('damages')
            ->onDelete('cascade'); 

            $table->foreign('model')
            ->references('id')
            ->on('models')
            ->onDelete('cascade'); 

            $table->foreign('damage')
            ->references('id')
            ->on('damages')
            ->onDelete('cascade'); 

            $table->foreign('color')
            ->references('id')
            ->on('colors')
            ->onDelete('cascade'); 

            $table->foreign('city')
            ->references('id')
            ->on('cities')
            ->onDelete('cascade'); 

            $table->foreign('province')
            ->references('id')
            ->on('provinces')
            ->onDelete('cascade'); 

            $table->foreign('fuel_type')
            ->references('id')
            ->on('fuels')
            ->onDelete('cascade'); 

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
