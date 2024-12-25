<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->date('date'); // Perbaikan dari 'datetimes' menjadi 'dateTime'
            $table->unsignedBigInteger('product_id');
            $table->integer('amount');
            $table->decimal('total_price', 15, 2);
            $table->timestamps();

            // Menambahkan relasi foreign key ke tabel 'products'
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });

        DB::table('transactions')->insert([
            [
                'date' => '2024-12-01',
                'product_id' => 1, // Laptop
                'amount' => 2,
                'total_price' => 30000000.00,
            ],
            [
                'date' => '2024-12-02',
                'product_id' => 2, // Smartphone
                'amount' => 3,
                'total_price' => 21000000.00,
            ],
            [
                'date' => '2024-12-03',
                'product_id' => 3, // Keyboard
                'amount' => 1,
                'total_price' => 500000.00,
            ],
            [
                'date' => '2024-12-04',
                'product_id' => 4, // Mouse
                'amount' => 5,
                'total_price' => 1000000.00,
            ],
            [
                'date' => '2024-12-05',
                'product_id' => 5, // Headphones
                'amount' => 1,
                'total_price' => 1200000.00,
            ],
            [
                'date' => '2024-12-06',
                'product_id' => 1, // Laptop
                'amount' => 1,
                'total_price' => 15000000.00,
            ],
            [
                'date' => '2024-12-07',
                'product_id' => 2, // Smartphone
                'amount' => 2,
                'total_price' => 14000000.00,
            ],
            [
                'date' => '2024-12-08',
                'product_id' => 3, // Keyboard
                'amount' => 4,
                'total_price' => 2000000.00,
            ],
            [
                'date' => '2024-12-09',
                'product_id' => 4, // Mouse
                'amount' => 2,
                'total_price' => 400000.00,
            ],
            [
                'date' => '2024-12-10',
                'product_id' => 5, // Headphones
                'amount' => 3,
                'total_price' => 3600000.00,
            ],
            [
                'date' => '2024-12-11',
                'product_id' => 1, // Laptop
                'amount' => 1,
                'total_price' => 15000000.00,
            ],
            [
                'date' => '2024-12-12',
                'product_id' => 2, // Smartphone
                'amount' => 1,
                'total_price' => 7000000.00,
            ],
            [
                'date' => '2024-12-13',
                'product_id' => 3, // Keyboard
                'amount' => 5,
                'total_price' => 2500000.00,
            ],
            [
                'date' => '2024-12-14',
                'product_id' => 4, // Mouse
                'amount' => 10,
                'total_price' => 2000000.00,
            ],
            [
                'date' => '2024-12-01',
                'product_id' => 5, // Headphones
                'amount' => 2,
                'total_price' => 2400000.00,
            ],
            [
                'date' => '2024-12-03',
                'product_id' => 1, // Laptop
                'amount' => 3,
                'total_price' => 45000000.00,
            ],
            [
                'date' => '2024-12-05',
                'product_id' => 2, // Smartphone
                'amount' => 1,
                'total_price' => 7000000.00,
            ],
            [
                'date' => '2024-12-09',
                'product_id' => 3, // Keyboard
                'amount' => 6,
                'total_price' => 3000000.00,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
