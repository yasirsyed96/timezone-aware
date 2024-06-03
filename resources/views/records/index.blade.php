@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between mb-3">
        <h1>Records</h1>
        <a href="{{ route('records.create') }}" class="btn btn-primary">Add New Record</a>
    </div>

    
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">User Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Task Name</th>
                        <th scope="col">Task Description</th>
                        <th scope="col">Task Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($records as $key => $record)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $record->user_id }}</td>
                            <td>{{ $record->user->name }}</td>
                            <td>{{ $record->task_name }}</td>
                            <td>{{ $record->task_description }}</td>
                            <td>{{ $record->task_time->format('Y-m-d H:i:s') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- {{ $records->links() }} --}}
        </div>
    </div>
</div>

@endsection
