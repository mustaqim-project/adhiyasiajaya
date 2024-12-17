<?php

namespace App\Http\Controllers\Admin;

use App\Models\Katalog;
use App\Models\Category; // Pastikan Anda mengimpor model Category
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use App\Http\Controllers\Controller;

class KatalogController extends Controller
{
    use FileUploadTrait;

    // Method untuk menampilkan semua katalog
    public function index(Request $request)
    {
        // Ambil kategori yang dipilih dari request, jika ada
        $categoryId = $request->get('category_id');

        // Ambil semua katalog atau filter berdasarkan kategori yang dipilih
        $katalogs = Katalog::when($categoryId, function ($query) use ($categoryId) {
            return $query->where('category_id', $categoryId); // Misal, filter berdasarkan category_id
        })->get();

        // Ambil semua kategori untuk dropdown
        $categories = Category::all();

        return view('admin.katalog.index', compact('katalogs', 'categories'));
    }


    // Method untuk menampilkan form tambah katalog
    public function create()
    {
        $categories = Category::all();  // Menampilkan semua kategori
        return view('admin.katalog.create', compact('categories'));
    }

    // Method untuk menyimpan katalog baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'category_id' => 'required|exists:categories,id', // Validasi category_id
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Upload gambar menggunakan trait
        $imagePath = $this->handleFileUpload($request, 'image');

        // Menyimpan data katalog baru
        Katalog::create([
            'category_id' => $request->category_id,
            'image' => $imagePath,
        ]);


        toast(__('admin.Katalog added successfully!'), 'success');

        return redirect()->back();
    }

    // Method untuk menampilkan form edit katalog
    public function edit($id)
    {
        $katalog = Katalog::findOrFail($id);
        $categories = Category::all(); // Mengambil data kategori untuk pilihan dropdown
        return view('admin.katalog.edit', compact('katalog', 'categories'));
    }

    // Method untuk mengupdate data katalog
    public function update(Request $request, $id)
    {
        $katalog = Katalog::findOrFail($id);

        // Validasi input
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Upload gambar jika ada
        $imagePath = $this->handleFileUpload($request, 'image');

        // Update data katalog
        $katalog->update([
            'category_id' => $request->category_id,
            'image' => $imagePath ?? $katalog->image, // Gunakan gambar lama jika tidak diupload
        ]);

        return redirect()->route('admin.katalog.index')->with('success', 'Katalog updated successfully!');
    }

    // Method untuk menghapus data katalog
    public function destroy($id)
    {
        $katalog = Katalog::findOrFail($id);

        // Hapus file gambar terkait, jika ada
        $this->deleteOldFile($katalog->image);

        // Hapus data katalog
        $katalog->delete();

        return redirect()->route('admin.katalog.index')->with('success', 'Katalog deleted successfully!');
    }
}
