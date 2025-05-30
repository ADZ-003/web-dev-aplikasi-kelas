@extends('layouts.app')

@section('content')
    <h1>Edit Pelajar</h1>

    <form action="{{ route('students.update', $student) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $student->name }}" required>
        </div>
        <div class="mb-3">
            <label for="nis" class="form-label">NIS</label>
            <input type="text" class="form-control" id="nis" name="nis" value="{{ $student->nis }}" required>
        </div>
        <div class="mb-3">
            <label for="class_id" class="form-label">Kelas</label>
            <select class="form-select" id="class_id" name="class_id" required>
                <option value="">Pilih Kelas</option>
                @foreach ($classes as $class)
                    <option value="{{ $class->id }}" {{ $student->class_id == $class->id ? 'selected' : '' }}>{{ $class->name }} - {{ $class->major->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
