<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('shipment_product_sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shipmentproduct_id');
            $table->foreign('shipmentproduct_id')->references('id')->on('shipment_products');
            $table->string('sales_price',150);
            $table->string('total_sales_price',100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipment_product_sales');
    }
};
