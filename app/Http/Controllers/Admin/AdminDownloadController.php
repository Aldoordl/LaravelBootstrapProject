<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminDownloadController extends Controller
{
    public function index()
    {
        // Mengambil daftar file yang dapat diunduh
        $downloadableFiles = Storage::disk('public')->files('downloadable');

        return view('bootstrap.admin.resume', compact('downloadableFiles'));
    }

    public function update(Request $request)
    {
        // Validasi data yang dikirim dari formulir
        $request->validate([
            'file' => 'required',
        ]);

        // Simpan file yang dapat diunduh yang dipilih oleh admin
        $selectedFile = $request->input('file');
        Storage::disk('public')->put('downloadable/current', $selectedFile);

        return redirect()->route('admin.download.index')->with('success', 'Downloadable file updated successfully.');
    }
}
