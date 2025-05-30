@extends('layouts.app')

@section('content')
    <h1>Tambah Kelas</h1>

    <form action="{{ route('classes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama Kelas</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="major_id" class="form-label">Jurusan</label>
            <select class="form-select" id="major_id" name="major_id" required>
                <option value="">Pilih Jurusan</option>
                @foreach ($majors as $major)
                    <option value="{{ $major->id }}">{{ $major->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('classes.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
