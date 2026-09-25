<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TodoController extends Controller
{
    // Halaman Utama: Menampilkan daftar ToDo
    public function index()
    {
        $todos = Todo::latest()->get();
        return view('todos.index', compact('todos'));
    }

    // Halaman Form Tambah ToDo
    public function create()
    {
        return view('todos.create');
    }

    // Menyimpan ToDo Baru ke Database
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $isSelesai = $request->has('is_selesai');

        Todo::create([
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'is_selesai' => $isSelesai,
            'tanggal_selesai' => $isSelesai ? Carbon::now() : null,
        ]);

        return redirect()->route('todos.index')->with('success', 'ToDo berhasil dibuat!');
    }

    // Mengubah status Selesai / Belum Selesai
    public function toggle(Todo $todo)
    {
        $todo->is_selesai = !$todo->is_selesai;
        $todo->tanggal_selesai = $todo->is_selesai ? Carbon::now() : null;
        $todo->save();

        return redirect()->back()->with('success', 'Status ToDo diperbarui!');
    }

    // Menghapus ToDo
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->route('todos.index')->with('success', 'ToDo berhasil dihapus!');
    }
}