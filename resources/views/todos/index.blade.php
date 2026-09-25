@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-2xl font-bold">Daftar ToDo Saya</h1>
        <p class="text-slate-500 text-sm">Kelola tugas harian Anda</p>
    </div>
    <a href="{{ route('todos.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-4 py-2 rounded-lg shadow">
        + Buat ToDo Baru
    </a>
</div>

<div class="bg-white rounded-xl shadow border border-slate-200 overflow-hidden">
    @if($todos->isEmpty())
        <div class="p-10 text-center text-slate-400">
            <p>Belum ada ToDo. Klik tombol <strong>"Buat ToDo Baru"</strong> di atas!</p>
        </div>
    @else
        <div class="divide-y divide-slate-100">
            @foreach($todos as $todo)
                <div class="p-4 flex items-start justify-between gap-4 hover:bg-slate-50">
                    <div class="flex items-start gap-3">
                        <form action="{{ route('todos.toggle', $todo->id) }}" method="POST" class="mt-1">
                            @csrf
                            @method('PATCH')
                            <input type="checkbox" onchange="this.form.submit()" {{ $todo->is_selesai ? 'checked' : '' }} class="w-5 h-5 text-indigo-600 rounded cursor-pointer">
                        </form>
                        <div>
                            <h3 class="text-lg font-semibold {{ $todo->is_selesai ? 'line-through text-slate-400' : 'text-slate-800' }}">
                                {{ $todo->judul }}
                            </h3>
                            @if($todo->keterangan)
                                <p class="text-slate-600 text-sm mt-1 {{ $todo->is_selesai ? 'line-through text-slate-400' : '' }}">
                                    {{ $todo->keterangan }}
                                </p>
                            @endif

                            <div class="mt-2 text-xs">
                                @if($todo->is_selesai)
                                    <span class="bg-emerald-100 text-emerald-700 px-2 py-0.5 rounded-full">
                                        ✓ Selesai: {{ $todo->tanggal_selesai ? $todo->tanggal_selesai->format('d M Y H:i') : '-' }}
                                    </span>
                                @else
                                    <span class="bg-amber-100 text-amber-700 px-2 py-0.5 rounded-full">
                                        ⏳ Belum Selesai
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" onsubmit="return confirm('Hapus ToDo ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700 text-sm font-medium">
                            Hapus
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection