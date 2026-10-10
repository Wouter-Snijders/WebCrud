@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-slate-950 px-4 py-10 text-slate-100 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-3xl">
        <a
            href="{{ route('tasks.index') }}"
            class="mb-8 inline-flex items-center text-sm font-medium text-slate-400 transition hover:text-cyan-400"
        >
            <span class="mr-2 text-lg">&larr;</span>
            Back to tasks
        </a>

        <div class="mb-8">
            <p class="mb-2 text-sm font-semibold uppercase tracking-[0.25em] text-cyan-400">
                Workspace
            </p>
            <h1 class="text-4xl font-bold tracking-tight text-white">
                Edit task
            </h1>
            <p class="mt-2 text-slate-400">
                Update the details of this task.
            </p>
        </div>

        <div class="rounded-2xl border border-slate-800 bg-slate-900 p-6 shadow-2xl shadow-black/20 sm:p-8">
            @if ($errors->any())
                <div class="mb-6 rounded-xl border border-red-400/20 bg-red-400/10 p-4 text-sm text-red-300">
                    <p class="mb-2 font-semibold">Please check the following:</p>
                    <ul class="list-inside list-disc space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="title" class="mb-2 block text-sm font-semibold text-slate-200">
                        Title
                    </label>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        value="{{ old('title', $task->title) }}"
                        placeholder="Enter a task title"
                        class="w-full rounded-xl border border-slate-700 bg-slate-950 px-4 py-3 text-white outline-none transition placeholder:text-slate-600 focus:border-cyan-400 focus:ring-2 focus:ring-cyan-400/20"
                        required
                    >
                </div>

                <div>
                    <label for="description" class="mb-2 block text-sm font-semibold text-slate-200">
                        Description
                    </label>
                    <textarea
                        name="description"
                        id="description"
                        rows="7"
                        placeholder="Describe what needs to be done..."
                        class="w-full resize-y rounded-xl border border-slate-700 bg-slate-950 px-4 py-3 text-white outline-none transition placeholder:text-slate-600 focus:border-cyan-400 focus:ring-2 focus:ring-cyan-400/20"
                        required
                    >{{ old('description', $task->description) }}</textarea>
                </div>

                <div class="flex flex-col-reverse gap-3 border-t border-slate-800 pt-6 sm:flex-row sm:justify-end">
                    <a
                        href="{{ route('tasks.index') }}"
                        class="inline-flex items-center justify-center rounded-xl border border-slate-700 px-5 py-3 text-sm font-semibold text-slate-300 transition hover:border-slate-500 hover:text-white"
                    >
                        Cancel
                    </a>

                    <button
                        type="submit"
                        class="inline-flex items-center justify-center rounded-xl bg-cyan-400 px-5 py-3 text-sm font-bold text-slate-950 shadow-lg shadow-cyan-400/20 transition hover:bg-cyan-300"
                    >
                        Save changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
