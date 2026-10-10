@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-slate-950 px-4 py-10 text-slate-100 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-7xl">
        <div class="mb-10 flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="mb-2 text-sm font-semibold uppercase tracking-[0.25em] text-cyan-400">
                    Workspace
                </p>
                <h1 class="text-4xl font-bold tracking-tight text-white">
                    Task Manager
                </h1>
                <p class="mt-2 text-slate-400">
                    Keep your work organized and moving forward.
                </p>
            </div>

            <a
                href="{{ route('tasks.create') }}"
                class="inline-flex items-center justify-center rounded-xl bg-cyan-400 px-5 py-3 text-sm font-bold text-slate-950 shadow-lg shadow-cyan-400/20 transition hover:bg-cyan-300"
            >
                <span class="mr-2 text-lg">+</span>
                Create task
            </a>
        </div>

        <div class="overflow-hidden rounded-2xl border border-slate-800 bg-slate-900 shadow-2xl shadow-black/20">
            <div class="flex items-center justify-between border-b border-slate-800 px-6 py-5">
                <div>
                    <h2 class="font-semibold text-white">All tasks</h2>
                    <p class="mt-1 text-sm text-slate-400">
                        {{ $tasks->count() }} {{ Str::plural('task', $tasks->count()) }} total
                    </p>
                </div>
            </div>

            @if ($tasks->count())
                <div class="overflow-x-auto">
                    <table class="w-full min-w-180px text-left">
                        <thead class="bg-slate-950/60 text-xs uppercase tracking-wider text-slate-500">
                            <tr>
                                <th class="px-6 py-4 font-semibold">Title</th>
                                <th class="px-6 py-4 font-semibold">Description</th>
                                <th class="px-6 py-4 font-semibold">Status</th>
                                <th class="px-6 py-4 text-right font-semibold">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-800">
                            @foreach ($tasks as $task)
                                <tr class="transition hover:bg-slate-800/50">
                                    <td class="px-6 py-5">
                                        <p class="font-semibold text-white">{{ $task->title }}</p>
                                    </td>

                                    <td class="max-w-md px-6 py-5 text-sm text-slate-400">
                                        {{ $task->description }}
                                    </td>

                                    <td class="px-6 py-5">
                                        <span class="inline-flex rounded-full bg-emerald-400/10 px-3 py-1 text-xs font-semibold text-emerald-400">
                                            {{ $task->status ?: 'Pending' }}
                                        </span>
                                    </td>

                                    <td class="px-6 py-5">
                                        <div class="flex justify-end gap-2">
                                            <a
                                                href="{{ route('tasks.edit', $task->id) }}"
                                                class="rounded-lg border border-slate-700 px-3 py-2 text-sm font-medium text-slate-300 transition hover:border-cyan-400 hover:text-cyan-400"
                                            >
                                                Edit
                                            </a>

                                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    type="submit"
                                                    class="rounded-lg border border-red-400/20 px-3 py-2 text-sm font-medium text-red-400 transition hover:bg-red-400/10"
                                                >
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="px-6 py-20 text-center">
                    <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-cyan-400/10 text-2xl text-cyan-400">
                        +
                    </div>
                    <h3 class="text-lg font-semibold text-white">No tasks yet</h3>
                    <p class="mt-2 text-sm text-slate-400">
                        Create your first task to get started.
                    </p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
