<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrixAttachmentController extends Controller
{
    // Fungsi untuk menyimpan lampiran
    public function store(Request $request)
    {
        $request->validate([
            'attachment' => 'required|file|max:2048', // Validasi file, maks 2MB
        ]);

        // Simpan file ke storage/app/public/trix-attachments
        $path = $request->file('attachment')->store('trix-attachments', 'public');

        // Kembalikan URL publik dari file yang baru diunggah
        return response()->json(['url' => Storage::url($path)]);
    }

    // Fungsi untuk menghapus lampiran
    public function destroy(Request $request)
    {
        // Ambil path file dari request dan hapus 'storage/' di awal
        $path = str_replace('storage/', '', $request->input('attachment_url'));

        // Hapus file dari storage
        Storage::disk('public')->delete($path);

        return response()->noContent();
    }
}
