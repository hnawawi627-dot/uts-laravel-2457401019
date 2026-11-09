@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Daftar Mahasiswa</h2>
    <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">+ Tambah Mahasiswa Baru</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Name</th>
                <th>Study Program</th>
                <th>Date of Birth</th>
                <th>GPA</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $index => $student)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $student->nim }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->study_program }}</td>
                <td>{{ $student->birth_date }}</td>
                <td>{{ $student->gpa }}</td>
                <td>
                    @if($student->is_active)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-danger">Inactive</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection