@extends('layouts.app')

@section('title', 'Edit Batch')

@section('content')
    <h1>Edit Batch</h1>
    <form action="{{ route('batches.update', $batch) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="label" class="form-label">Label</label>
            <input type="text" class="form-control" id="label" name="label" value="{{ old('label', $batch->label) }}" required>
        </div>
        <div class="mb-3">
            <label for="intake_start" class="form-label">Intake Start</label>
            <input type="date" class="form-control" id="intake_start" name="intake_start" value="{{ old('intake_start', $batch->intake_start) }}" required>
        </div>
        <div class="mb-3">
            <label for="intake_end" class="form-label">Intake End</label>
            <input type="date" class="form-control" id="intake_end" name="intake_end" value="{{ old('intake_end', $batch->intake_end) }}" required>
        </div>
        <div class="mb-3">
            <label for="extended_intake_end" class="form-label">Extended Intake End (Optional)</label>
            <input type="date" class="form-control" id="extended_intake_end" name="extended_intake_end" value="{{ old('extended_intake_end', $batch->extended_intake_end) }}">
        </div>
        <button type="submit" class="btn btn-primary">Update Batch</button>
    </form>
@endsection
