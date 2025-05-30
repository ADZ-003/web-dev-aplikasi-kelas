@extends('layouts.app')

@section('content')
    <h1>Daftar Jurusan</h1>
    <a href="{{ route('majors.create') }}" class="btn btn-primary mb-3">Tambah Jurusan</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($majors as $major)
                <tr>
                    <td>{{ $major->name }}</td>
                    <td>
                        <a href="{{ route('majors.edit', $major) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('majors.destroy', $major) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus jurusan ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
