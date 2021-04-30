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
            $table->string('brandnm');
            $table->string('genericnm');
            $table->mediumText('catdesc');
            $table->date('arrival');
            $table->date('exp');
            $table->float('sellpric', 8, 2);
            $table->float('originpric', 8,2);
            $table->unsignedInteger('qty');
            $table->unsignedInteger('qtyleft');
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
