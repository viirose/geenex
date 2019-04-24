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
            $table->bigIncrements('id');
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->string('part_no');
            $table->string('name');
            $table->integer('created_by');
            $table->integer('availability_id');
            $table->string('remark')->nullable();
            $table->text('content')->nullable();
            $table->string('img')->nullable();
            $table->boolean('show')->default(true);
            $table->jsonb('info')->nullable();
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
