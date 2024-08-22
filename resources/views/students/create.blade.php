@extends('layouts.app')

@section('title', 'Create Student')

@section('content')
    <h1>Create New Student</h1>
    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Student</button>
    </form>
@endsection