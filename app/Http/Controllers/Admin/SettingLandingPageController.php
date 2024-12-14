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

    // Mengupdate data
    public function update(Request $request, $id)
    {
        // Cari data berdasarkan ID
        $setting = SettingLandingPage::first();

        // Validasi request
        $validated = $request->validate([
            'image_slide1' => ['nullable', 'image', 'max:3000'],
            'link_slide1' => 'nullable|string',
            'desc_slide1' => 'nullable|string',
            'image_slide2' => ['nullable', 'image', 'max:3000'],
            'link_slide2' => 'nullable|string',
            'desc_slide2' => 'nullable|string',
            'image_about' => ['nullable', 'image', 'max:3000'],
            'bg_contact' => ['nullable', 'image', 'max:3000'],
            'image_header_about' => ['nullable', 'image', 'max:3000'],
            'image_header_product' => ['nullable', 'image', 'max:3000'],
            'image_header_contact' => ['nullable', 'image', 'max:3000'],
        ]);

        // Mengupdate data jika ada file yang diupload

        if ($request->hasFile('image_slide1')) {
            $setting->image_slide1 = $this->handleFileUpload($request, 'image_slide1');
        }
        if ($request->hasFile('image_slide2')) {
            $setting->image_slide2 = $this->handleFileUpload($request, 'image_slide2');
        }
        if ($request->hasFile('image_about')) {
            $setting->image_about = $this->handleFileUpload($request, 'image_about');
        }
        if ($request->hasFile('bg_contact')) {
            $setting->bg_contact = $this->handleFileUpload($request, 'bg_contact');
        }
        if ($request->hasFile('image_header_about')) {
            $setting->image_header_about = $this->handleFileUpload($request, 'image_header_about');
        }
        if ($request->hasFile('image_header_product')) {
            $setting->image_header_product = $this->handleFileUpload($request, 'image_header_product');
        }
        if ($request->hasFile('image_header_contact')) {
            $setting->image_header_contact = $this->handleFileUpload($request, 'image_header_contact');
        }

        // Memperbarui informasi lain yang tidak berhubungan dengan file
        $setting->link_slide1 = $request->input('link_slide1');
        $setting->desc_slide1 = $request->input('desc_slide1');
        $setting->link_slide2 = $request->input('link_slide2');
        $setting->desc_slide2 = $request->input('desc_slide2');

        // Simpan perubahan
        $setting->save();

        // Menampilkan toast message
        toast(__('admin.Updated Successfully!'), 'success');

        // Kembali ke halaman sebelumnya
        return redirect()->back();
    }
}
