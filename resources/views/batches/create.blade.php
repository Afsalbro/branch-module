@extends('layouts.app')

@section('title', 'Create Batch')

@section('content')
    <h1>Create New Batch</h1>
    <form action="{{ route('batches.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="label" class="form-label">Label</label>
            <input type="text" class="form-control" id="label" name="label" value="{{ old('label') }}" required>
        </div>
        <div class="mb-3">
            <label for="intake_start" class="form-label">Intake Start</label>
            <input type="date" class="form-control" id="intake_start" name="intake_start" value="{{ old('intake_start') }}" required>
        </div>
        <div class="mb-3">
            <label for="intake_end" class="form-label">Intake End</label>
            <input type="date" class="form-control" id="intake_end" name="intake_end" value="{{ old('intake_end') }}" required>
        </div>
        <div class="mb-3">
            <label for="extended_intake_end" class="form-label">Extended Intake End (Optional)</label>
            <input type="date" class="form-control" id="extended_intake_end" name="extended_intake_end" value="{{ old('extended_intake_end') }}">
        </div>
        <button type="submit" class="btn btn-primary">Create Batch</button>
    </form>
@endsection