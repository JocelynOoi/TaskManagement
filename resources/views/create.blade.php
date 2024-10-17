@extends('layouts.app')

@section('title', 'Create Task')
@section('content')
    <div class="container">
        <form action="{{ route('addTask')}}" method="POST">
            @csrf
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
            <button type="submit" class="btn btn-primary mt-3">Create Task</button>
        </form>
    </div>
@endsection