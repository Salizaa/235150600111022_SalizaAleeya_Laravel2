@extends('layouts.app')

@section('content')
<div class="container my-4">
    <a href="/tambah" class="btn btn-success mb-3">Tambah Blog</a>

    @foreach($blogs as $blog)
    <div class="card mb-3">
        <div class="card-body">
            <h3 class="card-title">{{ $blog->judul }}</h3>
            @if($blog->foto)
            <img src="{{ asset('storage/' . $blog->foto) }}" alt="Foto Blog" class="img-fluid mb-3" style="max-width: 400px;">
            @endif
            <p class="card-text">{{ $blog->isi }}</p>
            <p class="text-muted">Author: {{ $blog->pembuat }}</p>
            <div class="d-flex gap-2">
                <!-- Tombol Edit -->
                <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-warning">Edit</a>

                <!-- Tombol Delete -->
                <form action="{{ route('blogs.delete', $blog->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus blog ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
