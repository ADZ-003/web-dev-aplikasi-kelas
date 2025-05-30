@extends('layouts.app')

@section('content')
    <h1>Tambah Jurusan</h1>

    <form action="{{ route('majors.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama Jurusan</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('majors.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
