<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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

            $table->increments('id');
            $table->string('title', 100);
            $table->float('price')->unsigned()->default(0);
            $table->float('old_price')->unsigned()->nullable();
            $table->string('description')->nullable();
            $table->integer('count')->unsigned()->default(0);
            $table->integer('vendor_code')->unique();
            $table->integer('status')->undigned()->default(1);
            $table->integer('rating')->unsigned()->default(0);
            $table->integer('is_featured')->unsigned()->default(1);
            $table->integer('is_new')->unsigned()->default(1);
            $table->integer('discount')->unsigned()->default(0);
            $table->integer('views')->unsigned()->default(0);
            $table->string('image')->nullable();

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('products');
    }
}
