@extends('layouts.app')

@section('content')
<h1 class="text-center my-4">Tambah Blog</h1>
<form action="/tambah" method="POST" enctype="multipart/form-data" class="container">
    @csrf
    <div class="mb-3">
        <label class="form-label">Judul</label>
        <input type="text" name="judul" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Isi</label>
        <textarea name="isi" class="form-control" rows="4" required></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Pembuat</label>
        <input type="text" name="pembuat" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Upload Foto</label>
        <input type="file" name="foto" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Tambah</button>
</form>
@endsection
