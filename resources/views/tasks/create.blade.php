@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-2xl px-4 py-8">
    <h1 class="mb-6 text-3xl font-bold text-gray-900">Create Task</h1>
    <form action="{{ route('tasks.store') }}" method="POST" class="space-y-6 rounded-lg bg-white p-6 shadow-md">
        @csrf
        <div>
            <label for="title" class="mb-2 block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" id="title" class="block w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500" required>
        </div>
        <div>
            <label for="description" class="mb-2 block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" class="block w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500" rows="5" required></textarea>
        </div>
        <button type="submit" class="rounded-md bg-green-600 px-4 py-2 font-medium text-white transition hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">Save</button>
    </form>
</div>
@endsection
