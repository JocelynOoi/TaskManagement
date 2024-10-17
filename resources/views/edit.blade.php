@extends('layouts.app')

@section('title', 'Update Task')
@section('content')
    <div class="container">
        <form action="{{ route('updateTask', $tasks->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label><br>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label><br>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea><br>
            </div>

            <div class="form-group">
                <label for="due_date">Due Date</label><br>
                <input type="date" id="due_date" name="due_date" min="{{ date('Y-m-d') }}" class="form-control" required>
            </div>

            <br>
            <button type="submit" class="btn btn-primary mt-3">Update Task</button>
        </form>
    </div>
@endsection