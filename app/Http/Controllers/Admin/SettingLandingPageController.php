<?php

namespace App\Http\Admin\Controllers;

use App\Models\SettingLandingPage;
use Illuminate\Http\Request;

class SettingLandingPageController extends Controller
{
    // Menampilkan semua data
    public function index()
    {
        $settings = SettingLandingPage::all();
        return view('setting_landing_page.index', compact('settings'));
    }

    // Menampilkan form untuk membuat data baru
    public function create()
    {
        return view('setting_landing_page.create');
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image_slide1' => 'required|string',
            'link_slide1' => 'nullable|string',
            'desc_slide1' => 'nullable|string',
            'image_slide2' => 'required|string',
            'link_slide2' => 'nullable|string',
            'desc_slide2' => 'nullable|string',
            'image_about' => 'required|string',
            'bg_contact' => 'required|string',
            'image_header_about' => 'required|string',
            'image_header_product' => 'required|string',
            'image_header_contact' => 'required|string',
        ]);

        SettingLandingPage::create($validated);

        return redirect()->route('setting_landing_page.index')->with('success', 'Data berhasil ditambahkan');
    }

    // Menampilkan detail data berdasarkan ID
    public function show($id)
    {
        $setting = SettingLandingPage::findOrFail($id);
        return view('setting_landing_page.show', compact('setting'));
    }

    // Menampilkan form untuk edit data
    public function edit($id)
    {
        $setting = SettingLandingPage::findOrFail($id);
        return view('setting_landing_page.edit', compact('setting'));
    }

    // Mengupdate data
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'image_slide1' => 'required|string',
            'link_slide1' => 'nullable|string',
            'desc_slide1' => 'nullable|string',
            'image_slide2' => 'required|string',
            'link_slide2' => 'nullable|string',
            'desc_slide2' => 'nullable|string',
            'image_about' => 'required|string',
            'bg_contact' => 'required|string',
            'image_header_about' => 'required|string',
            'image_header_product' => 'required|string',
            'image_header_contact' => 'required|string',
        ]);

        $setting = SettingLandingPage::findOrFail($id);
        $setting->update($validated);

        return redirect()->route('setting_landing_page.index')->with('success', 'Data berhasil diupdate');
    }

    // Menghapus data
    public function destroy($id)
    {
        $setting = SettingLandingPage::findOrFail($id);
        $setting->delete();

        return redirect()->route('setting_landing_page.index')->with('success', 'Data berhasil dihapus');
    }
}
