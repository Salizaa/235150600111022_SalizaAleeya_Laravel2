@extends('layouts.app')

@section('content')
<div class="container my-4">
    <h2>Edit Blog</h2>
    <form action="/edit/{{ $blog->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ $blog->judul }}" required>
        </div>
        <div class="mb-3">
            <label for="isi" class="form-label">Isi</label>
            <textarea name="isi" class="form-control" rows="4" required>{{ $blog->isi }}</textarea>
        </div>
        <div class="mb-3">
            <label for="pembuat" class="form-label">Pembuat</label>
            <input type="text" name="pembuat" class="form-control" value="{{ $blog->pembuat }}" required>
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" name="foto" class="form-control">
            @if($blog->foto)
                <img src="{{ asset('storage/' . $blog->foto) }}" alt="Foto Blog" class="img-fluid mt-2">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="/blogs" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
