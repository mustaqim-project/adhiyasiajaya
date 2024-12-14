<?php

namespace App\Http\Controllers\Admin;

use App\Models\SettingLandingPage;
use App\Traits\FileUploadTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingLandingPageController extends Controller
{
    use FileUploadTrait;

    public function __construct()
    {
        $this->middleware(['permission:setting index,admin'])->only(['index']);
        $this->middleware(['permission:setting update,admin'])->only(['update']);
    }

    // Menampilkan semua data
    public function index()
    {
        $settings = SettingLandingPage::all();
        return view('admin.setting_landing_page.index', compact('settings'));
    }

    public function update(Request $request, $id)
    {
        // Cari data berdasarkan ID (Pastikan menggunakan 'find' untuk mengambil berdasarkan ID)
        $setting = SettingLandingPage::findOrFail($id);

        // Validasi request
        $validated = $request->validate([
            'image_slide1' => ['nullable', 'image', 'max:3000'],
            'link_slide1' => 'nullable|string',
            'name_slide1' => 'nullable|string|max:255',
            'head_slide1' => 'nullable|string|max:255',
            'desc_slide1' => 'nullable|string',
            'image_slide2' => ['nullable', 'image', 'max:3000'],
            'link_slide2' => 'nullable|string',
            'name_slide2' => 'nullable|string|max:255',
            'head_slide2' => 'nullable|string|max:255',
            'desc_slide2' => 'nullable|string',
            'image_about' => ['nullable', 'image', 'max:3000'],
            'bg_contact' => ['nullable', 'image', 'max:3000'],
            'image_header_about' => ['nullable', 'image', 'max:3000'],
            'image_header_product' => ['nullable', 'image', 'max:3000'],
            'image_header_contact' => ['nullable', 'image', 'max:3000'],
        ]);

        // Handle file uploads
        $this->handleFileUploads($request, $setting);

        // Memperbarui informasi lain yang tidak berhubungan dengan file
        $this->updateNonFileFields($request, $setting);

        // Simpan perubahan
        $setting->save();

        // Menampilkan toast message
        toast(__('admin.Updated Successfully!'), 'success');

        // Kembali ke halaman sebelumnya
        return redirect()->back();
    }

    // Method untuk menangani upload file
    private function handleFileUploads(Request $request, SettingLandingPage $setting)
    {
        $fields = [
            'image_slide1',
            'image_slide2',
            'image_about',
            'bg_contact',
            'image_header_about',
            'image_header_product',
            'image_header_contact'
        ];

        foreach ($fields as $field) {
            if ($request->hasFile($field)) {
                // Hanya mengupdate field jika file baru diupload
                $setting->$field = $this->handleFileUpload($request, $field);
            }
        }
    }

    // Method untuk memperbarui field non-file
    private function updateNonFileFields(Request $request, SettingLandingPage $setting)
    {
        // Fields non-file yang perlu diupdate
        $fields = [
            'link_slide1',
            'name_slide1',
            'head_slide1',
            'desc_slide1',
            'link_slide2',
            'name_slide2',
            'head_slide2',
            'desc_slide2'
        ];

        foreach ($fields as $field) {
            if ($request->has($field)) {
                // Memperbarui hanya jika field ada dalam request
                $setting->$field = $request->input($field);
            }
        }
    }

}
