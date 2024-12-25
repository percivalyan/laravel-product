<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the transactions.
     */
    public function index()
    {
        $transactions = Transaction::with('product')->get();
        return view('admin.transactions.index', compact('transactions'));
    }

    public function indexUser()
    {
        $transactions = Transaction::with('product')->get();
        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new transaction.
     */
    public function create()
    {
        $products = Product::all();
        return view('admin.transactions.create', compact('products'));
    }

    public function createUser()
    {
        $products = Product::all();
        return view('transactions.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'product_id' => 'required|exists:products,id',
            'amount' => 'required|integer|min:1',
        ]);

        // Menghitung total harga berdasarkan harga produk dan jumlah yang dibeli
        $product = Product::findOrFail($request->product_id);
        $total_price = $request->amount * $product->price;

        Transaction::create([
            'date' => $request->date,
            'product_id' => $request->product_id,
            'amount' => $request->amount,
            'total_price' => $total_price,
            'status' => 'pending',
        ]);

        return redirect()->route('admin.transactions.index')->with('success', 'Transaction created successfully. Awaiting admin approval.');
    }


    public function storeUser(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'product_id' => 'required|exists:products,id',
            'amount' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);
        $total_price = $request->amount * $product->price;

        // Create the transaction with "pending" status
        Transaction::create([
            'date' => $request->date,
            'product_id' => $request->product_id,
            'amount' => $request->amount,
            'total_price' => $total_price,
            'status' => 'pending', // Set status as pending
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaction created successfully. Awaiting admin approval.');
    }

    /**
     * Show the form for editing the specified transaction.
     */
    public function edit(Transaction $transaction)
    {
        $products = Product::all();
        return view('admin.transactions.edit', compact('transaction', 'products'));
    }

    /**
     * Update the specified transaction in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'date' => 'required|date',
            'product_id' => 'required|exists:products,id',
            'amount' => 'required|integer|min:1',
        ]);

        // Get the product and calculate total price
        $product = Product::findOrFail($request->product_id);
        $total_price = $request->amount * $product->price;

        // Update the transaction with calculated total_price
        $transaction->update([
            'date' => $request->date,
            'product_id' => $request->product_id,
            'amount' => $request->amount,
            'total_price' => $total_price,
        ]);

        return redirect()->route('admin.transactions.index')->with('success', 'Transaction updated successfully.');
    }

    /**
     * Remove the specified transaction from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('admin.transactions.index')->with('success', 'Transaction deleted successfully.');
    }

    public function approve(Transaction $transaction)
    {
        $transaction->update(['status' => 'approved']);
        return redirect()->route('admin.transactions.index')->with('success', 'Transaction approved successfully.');
    }

    public function reject(Transaction $transaction)
    {
        $transaction->update(['status' => 'rejected']);
        return redirect()->route('admin.transactions.index')->with('success', 'Transaction rejected.');
    }
}
