@extends('layouts.app')

@section('content')
    <h1>Edit Transaksi Kas</h1>

    <form action="{{ route('transactions.update', $transaction) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="student_id" class="form-label">Pelajar</label>
            <select class="form-select" id="student_id" name="student_id" required>
                <option value="">Pilih Pelajar</option>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}" {{ $transaction->student_id == $student->id ? 'selected' : '' }}>
                        {{ $student->name }} - {{ $student->class->name }} - {{ $student->class->major->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Tipe</label>
            <select class="form-select" id="type" name="type" required>
                <option value="income" {{ $transaction->type == 'income' ? 'selected' : '' }}>Pemasukan</option>
                <option value="expense" {{ $transaction->type == 'expense' ? 'selected' : '' }}>Pengeluaran</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Jumlah</label>
            <input type="number" step="0.01" class="form-control" id="amount" name="amount" value="{{ $transaction->amount }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ $transaction->description }}">
        </div>
        <div class="mb-3">
            <label for="transaction_date" class="form-label">Tanggal Transaksi</label>
            <input type="date" class="form-control" id="transaction_date" name="transaction_date" value="{{ $transaction->transaction_date->format('Y-m-d') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
