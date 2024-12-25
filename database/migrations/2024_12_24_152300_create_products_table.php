<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price', 10, 2);
            $table->string('category');
            $table->timestamps();
        });

        DB::table('products')->insert([
            [
                'name' => 'Laptop',
                'price' => 15000000.00,
                'category' => 'Electronics',
            ],
            [
                'name' => 'Smartphone',
                'price' => 7000000.00,
                'category' => 'Electronics',
            ],
            [
                'name' => 'Keyboard',
                'price' => 500000.00,
                'category' => 'Accessories',
            ],
            [
                'name' => 'Mouse',
                'price' => 200000.00,
                'category' => 'Accessories',
            ],
            [
                'name' => 'Headphones',
                'price' => 1200000.00,
                'category' => 'Accessories',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
