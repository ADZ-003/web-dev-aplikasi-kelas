@extends('layouts.app')

@section('content')
    <h1>Edit Jurusan</h1>

    <form action="{{ route('majors.update', $major) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nama Jurusan</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $major->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('majors.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
