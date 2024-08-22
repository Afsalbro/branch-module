@extends('layouts.app')

@section('title', 'Batch Details')

@section('content')
    <h1>Batch Details</h1>
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">{{ $batch->label }}</h5>
            <p class="card-text">Intake Start: {{ $batch->intake_start }}</p>
            <p class="card-text">Intake End: {{ $batch->intake_end }}</p>
            <p class="card-text">Extended Intake End: {{ $batch->extended_intake_end ?? 'N/A' }}</p>
        </div>
    </div>

    <h2>Assigned Students</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Assigned Label</th>
            </tr>
        </thead>
        <tbody>
            @foreach($batch->students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->pivot->assigned_label }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Assign New Student</h2>
    <form action="{{ route('batches.assign-student', $batch) }}" method="POST" class="mb-3">
        @csrf
        <div class="mb-3">
            <label for="student_id" class="form-label">Select Student</label>
            <select class="form-select" id="student_id" name="student_id" required>
                <option value="">Choose a student...</option>
                @foreach($availableStudents as $student)
                    <option value="{{ $student->id }}">{{ $student->name }} ({{ $student->email }})</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="assignment_date" class="form-label">Assignment Date</label>
            <input type="date" class="form-control" id="assignment_date" name="assignment_date" required>
        </div>
        <button type="submit" class="btn btn-primary">Assign Student</button>
    </form>

    <a href="{{ route('batches.edit', $batch) }}" class="btn btn-warning">Edit</a>
    <a href="{{ route('batches.index') }}" class="btn btn-secondary">Back to List</a>
@endsection