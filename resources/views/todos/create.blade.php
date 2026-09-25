@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-2xl font-bold">Buat ToDo Baru</h1>
        <a href="{{ route('todos.index') }}" class="text-slate-600 text-sm font-medium">← Kembali</a>
    </div>

    <div class="bg-white rounded-xl shadow border border-slate-200 p-6">
        <form action="{{ route('todos.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="judul" class="block text-sm font-medium text-slate-700 mb-1">Judul ToDo <span class="text-red-500">*</span></label>
                <input type="text" name="judul" id="judul" required placeholder="Masukkan judul ToDo" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">
            </div>

            <div>
                <label for="keterangan" class="block text-sm font-medium text-slate-700 mb-1">Keterangan</label>
                <textarea name="keterangan" id="keterangan" rows="3" placeholder="Detail keterangan (opsional)" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none"></textarea>
            </div>

            <div class="flex items-center gap-2 p-3 bg-slate-50 rounded-lg">
                <input type="checkbox" name="is_selesai" id="is_selesai" value="1" class="w-4 h-4 cursor-pointer">
                <label for="is_selesai" class="text-sm font-medium text-slate-700 cursor-pointer">Tandai Langsung Sebagai Selesai</label>
            </div>

            <div class="pt-2 flex gap-2">
                <button type="submit" class="bg-indigo-600 text-white font-medium px-5 py-2 rounded-lg shadow hover:bg-indigo-700">
                    Simpan ToDo
                </button>
                <a href="{{ route('todos.index') }}" class="bg-slate-200 text-slate-700 font-medium px-5 py-2 rounded-lg">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection