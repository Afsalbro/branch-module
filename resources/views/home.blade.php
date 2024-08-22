@extends('layouts.app')

@section('title', 'Welcome to Branch Management')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome to Branch Management</div>

                <div class="card-body">
                    <h2>Manage Your Students and Batches</h2>
                    <p>This application allows you to efficiently manage students and batches. You can perform the following actions:</p>
                    <ul>
                        <li>Create, view, edit, and delete student records</li>
                        <li>Create, view, edit, and delete batch information</li>
                        <li>Assign students to specific batches</li>
                        <li>Track student assignments with audit logs</li>
                    </ul>
                    <div class="mt-4">
                        <a href="{{ route('students.index') }}" class="btn btn-primary me-2">Manage Students</a>
                        <a href="{{ route('batches.index') }}" class="btn btn-secondary">Manage Batches</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection