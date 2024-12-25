<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;

class HomeController extends Controller
{
    public function index()
    {
        $productCount = Product::count();
        $transactionCount = Transaction::count();

        return view('admin.dashboard', compact('productCount', 'transactionCount'));
    }
}
