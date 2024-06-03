@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Record</h1>
    <form action="{{ route('records.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="task_name">Task Name</label>
            <input type="text" class="form-control" id="task_name" name="task_name" required>
        </div>
        <div class="form-group">
            <label for="task_description">Task Description</label>
            <textarea class="form-control" id="task_description" name="task_description" required></textarea>
        </div>
        <input type="hidden" name="timezone" id="timezone">
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('timezone').value = Intl.DateTimeFormat().resolvedOptions().timeZone;
    });
</script>
@endsection
