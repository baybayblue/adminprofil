<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeachingFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TeachingFactoryController extends Controller
{
    /**
     * Menampilkan satu halaman untuk mengelola semua unit TEFA.
     */
    public function index()
    {
        // Ambil semua data TEFA untuk ditampilkan di form
        $tefas = TeachingFactory::orderBy('nama_tefa')->get();
        return view('admin.tefa.index', compact('tefas'));
    }

    /**
     * Menyimpan, memperbarui, dan menghapus data TEFA dari satu form.
     */
    public function storeOrUpdate(Request $request)
    {
        // 1. Validasi data
        $request->validate([
            // Validasi untuk unit yang sudah ada (array)
            'tefa.*.nama_tefa' => 'required|string|max:255',
            'tefa.*.deskripsi_singkat' => 'nullable|string',
            'tefa.*.deskripsi_lengkap' => 'nullable|string',
            'tefa.*.logo' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'tefa.*.link_web' => 'nullable|url',
            'tefa.*.kontak_person' => 'nullable|string|max:255',
            'tefa.*.email' => 'nullable|email|max:255',

            // Validasi untuk unit baru
            'new.nama_tefa' => 'nullable|required_with:new.logo,new.deskripsi_singkat|string|max:255|unique:teaching_factories,nama_tefa',
            'new.logo' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        // 2. Proses update untuk unit yang sudah ada
        if ($request->has('tefa')) {
            foreach ($request->tefa as $id => $data) {
                $tefa = TeachingFactory::find($id);
                if ($tefa) {
                    // Cek jika ada file logo baru diupload untuk unit ini
                    if ($request->hasFile("tefa.{$id}.logo")) {
                        // Hapus logo lama jika ada
                        if ($tefa->logo && Storage::disk('public')->exists($tefa->logo)) {
                            Storage::disk('public')->delete($tefa->logo);
                        }
                        // Simpan logo baru
                        $data['logo'] = $request->file("tefa.{$id}.logo")->store('tefa_logos', 'public');
                    }
                    $tefa->update($data);
                }
            }
        }

        // 3. Proses penambahan unit baru
        if ($request->has('new') && !empty($request->new['nama_tefa'])) {
            $newData = $request->new;
            if ($request->hasFile('new.logo')) {
                $newData['logo'] = $request->file('new.logo')->store('tefa_logos', 'public');
            }
            TeachingFactory::create($newData);
        }

        // 4. Proses penghapusan unit yang ditandai
        if ($request->has('delete')) {
            $idsToDelete = $request->delete;
            $tefasToDelete = TeachingFactory::whereIn('id', $idsToDelete)->get();
            foreach ($tefasToDelete as $tefaToDelete) {
                // Hapus logo dari storage sebelum menghapus data
                if ($tefaToDelete->logo && Storage::disk('public')->exists($tefaToDelete->logo)) {
                    Storage::disk('public')->delete($tefaToDelete->logo);
                }
                $tefaToDelete->delete();
            }
        }

        return redirect()->route('admin.tefa.index')
                         ->with('success', 'Data Teaching Factory berhasil diperbarui.');
    }
}
