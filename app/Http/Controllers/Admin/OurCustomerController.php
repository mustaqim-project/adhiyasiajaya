<?php

namespace App\Http\Controllers;

use App\Models\OurCustomer;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;

class OurCustomerController extends Controller
{

    use FileUploadTrait;

    // Method untuk menampilkan semua pelanggan
    public function index()
    {
        // Mengambil semua data pelanggan
        $customers = OurCustomer::all();
        return view('admin.customers.index', compact('customers'));
    }

    // Method untuk menampilkan form tambah pelanggan
    public function create()
    {
        return view('admin.customers.create');
    }

    // Method untuk menyimpan pelanggan baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'url' => 'required|url',
        ]);

        // Menyimpan data pelanggan baru
        $imagePath = $request->file('image')->store('public/images');

        OurCustomer::create([
            'name' => $request->name,
            'image' => $imagePath,
            'url' => $request->url,
        ]);

        return redirect()->route('customers.index')->with('success', 'Customer added successfully!');
    }

    // Method untuk menampilkan form edit pelanggan
    public function edit($id)
    {
        $customer = OurCustomer::findOrFail($id);
        return view('admin.customers.edit', compact('customer'));
    }

    // Method untuk mengupdate data pelanggan
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'url' => 'required|url',
        ]);

        $customer = OurCustomer::findOrFail($id);

        // Menyimpan data yang sudah diperbarui
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $customer->image = $imagePath;
        }

        $customer->name = $request->name;
        $customer->url = $request->url;
        $customer->save();

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully!');
    }

    // Method untuk menghapus data pelanggan
    public function destroy($id)
    {
        $customer = OurCustomer::findOrFail($id);
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully!');
    }
}
