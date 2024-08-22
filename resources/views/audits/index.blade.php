@extends('layouts.app')

@section('content')
    <h1>Detailed Audit Logs</h1>

    <form action="{{ route('audit.logs') }}" method="GET" class="mb-4">
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="auditable_type">Auditable Type</label>
                <select name="auditable_type" id="auditable_type" class="form-control">
                    <option value="">All</option>
                    <option value="App\Models\Student" {{ request('auditable_type') == 'App\Models\Student' ? 'selected' : '' }}>Student</option>
                    <option value="App\Models\Batch" {{ request('auditable_type') == 'App\Models\Batch' ? 'selected' : '' }}>Batch</option>
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label for="event">Event Type</label>
                <select name="event" id="event" class="form-control">
                    <option value="">All</option>
                    <option value="created" {{ request('event') == 'created' ? 'selected' : '' }}>Created</option>
                    <option value="updated" {{ request('event') == 'updated' ? 'selected' : '' }}>Updated</option>
                    <option value="deleted" {{ request('event') == 'deleted' ? 'selected' : '' }}>Deleted</option>
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label>&nbsp;</label>
                <button type="submit" class="btn btn-primary btn-block">Filter</button>
            </div>
        </div>
    </form>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Event</th>
                <th>Auditable Type</th>
                <th>Auditable ID</th>
                <th>Changes</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($audits as $audit)
                <tr>
                    <td>{{ $audit->id }}</td>
                    <td>{{ $audit->user->name ?? 'System' }}</td>
                    <td>{{ ucfirst($audit->event) }}</td>
                    <td>{{ class_basename($audit->auditable_type) }}</td>
                    <td>{{ $audit->auditable_id }}</td>
                    <td>
                        @if($audit->event == 'created' || $audit->event == 'updated')
                            <strong>New Values:</strong>
                            <ul>
                                @foreach($audit->new_values as $key => $value)
                                    <li>{{ $key }}: {{ $value }}</li>
                                @endforeach
                            </ul>
                        @endif
                        @if($audit->event == 'updated' || $audit->event == 'deleted')
                            <strong>Old Values:</strong>
                            <ul>
                                @foreach($audit->old_values as $key => $value)
                                    <li>{{ $key }}: {{ $value }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </td>
                    <td>{{ $audit->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $audits->links() }}
@endsection