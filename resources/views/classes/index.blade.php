@extends('layouts.app')

@section('content')
    <h1>Daftar Kelas</h1>
    <a href="{{ route('classes.create') }}" class="btn btn-primary mb-3">Tambah Kelas</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Kelas</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classes as $class)
                <tr>
                    <td>{{ $class->name }}</td>
                    <td>{{ $class->major->name }}</td>
                    <td>
                        <a href="{{ route('classes.edit', $class) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('classes.destroy', $class) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus kelas ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
