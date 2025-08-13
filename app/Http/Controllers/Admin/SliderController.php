<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get(); // Eloquent Collection
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'subjudul' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tombol_teks' => 'nullable|string|max:50',
            'tombol_url' => 'nullable|url',
            'status' => 'required|boolean',
        ]);

        $gambarPath = $request->file('gambar')->store('sliders', 'public');

        Slider::create([
            'judul' => $request->judul,
            'subjudul' => $request->subjudul,
            'gambar' => $gambarPath,
            'tombol_teks' => $request->tombol_teks,
            'tombol_url' => $request->tombol_url,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.sliders.index')->with('success', 'Slider berhasil ditambahkan.');
    }

    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'subjudul' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tombol_teks' => 'nullable|string|max:50',
            'tombol_url' => 'nullable|url',
            'status' => 'required|boolean',
        ]);

        $gambarPath = $slider->gambar;

        if ($request->hasFile('gambar')) {
            if ($slider->gambar && Storage::disk('public')->exists($slider->gambar)) {
                Storage::disk('public')->delete($slider->gambar);
            }

            $gambarPath = $request->file('gambar')->store('sliders', 'public');
        }

        $slider->update([
            'judul' => $request->judul,
            'subjudul' => $request->subjudul,
            'gambar' => $gambarPath,
            'tombol_teks' => $request->tombol_teks,
            'tombol_url' => $request->tombol_url,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.sliders.index')->with('success', 'Slider berhasil diperbarui.');
    }

    public function destroy(Slider $slider)
    {
        if ($slider->gambar && Storage::disk('public')->exists($slider->gambar)) {
            Storage::disk('public')->delete($slider->gambar);
        }

        $slider->delete();

        return redirect()->route('admin.sliders.index')->with('success', 'Slider berhasil dihapus.');
    }

}
