<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->string('product_name');
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->decimal('total_amount', 10, 2);
            $table->timestamps();
        });

        
        Schema::create('product', function (Blueprint $table) {
            $table->id(); 
            $table->string('name'); 
            $table->decimal('price', 10, 2);
            $table->string('description'); 
            $table->text('full_description'); 
            $table->string('image'); 
            $table->timestamps();
        });

    }
};
