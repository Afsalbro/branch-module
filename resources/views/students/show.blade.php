@extends('layouts.app')

@section('title', 'Student Details')
{{-- {{dd($student)}} --}}
@section('content')
    <h1>Student Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $student->name }}</h5>
            <p class="card-text">Email: {{ $student->email }}</p>
            <h6 class="mt-4">Assigned Batches:</h6>
            <ul>
                @foreach($student->batches as $batch)
                    <li>{{ $batch->label }} (Assigned Label: {{ $batch->pivot->assigned_label }})</li>
                @endforeach
            </ul>
        </div>
    </div>
    <a href="{{ route('students.edit', $student) }}" class="btn btn-warning mt-3">Edit</a>
    <a href="{{ route('students.index') }}" class="btn btn-secondary mt-3">Back to List</a>
@endsection