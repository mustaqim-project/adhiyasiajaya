<?php

namespace App\Http\Controllers\Admin;

use App\Models\OurCustomer;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use App\Http\Controllers\Controller;

class OurCustomerController extends Controller
{
    use FileUploadTrait;

    // Method untuk menampilkan semua pelanggan
    public function index()
    {
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


        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'url' => 'required|url',
        ]);

        // Upload gambar menggunakan trait
        $imagePath = $this->handleFileUpload($request, 'image');

        // Menyimpan data pelanggan baru
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
        $customer = OurCustomer::findOrFail($id);

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'url' => 'required|url',
        ]);


        $imagePath = $this->handleFileUpload($request, 'image');
        $customer->update([
            'image' => $imagePath ?? $customer->image,
        ]);
        // Update data pelanggan
        $customer->name = $request->name;
        $customer->url = $request->url;
        $customer->save();

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully!');
    }

    // Method untuk menghapus data pelanggan
    public function destroy($id)
    {
        $customer = OurCustomer::findOrFail($id);

        // Hapus file gambar terkait, jika ada
        $this->deleteOldFile($customer->image);

        // Hapus data pelanggan
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully!');
    }
}
