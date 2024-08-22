@extends('layouts.app')

@section('title', 'Batches')

@section('content')
    <h1>Batches</h1>
    <a href="{{ route('batches.create') }}" class="btn btn-primary mb-3">Create New Batch</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Label</th>
                <th>Intake Start</th>
                <th>Intake End</th>
                <th>Extended Intake End</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($batches as $batch)
                <tr>
                    <td>{{ $batch->id }}</td>
                    <td>{{ $batch->label }}</td>
                    <td>{{ $batch->intake_start }}</td>
                    <td>{{ $batch->intake_end }}</td>
                    <td>{{ $batch->extended_intake_end ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('batches.show', $batch) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('batches.edit', $batch) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('batches.destroy', $batch) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this batch?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection