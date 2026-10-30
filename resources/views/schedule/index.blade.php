@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="p-4 sm:p-6 lg:p-8">
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h1 class="text-3xl font-bold">{{ $title }}</h1>
        <a href="{{ route('dashboard') }}" class="text-blue-600 hover:underline">Back to dashboard</a>
    </div>

    <x-panel title="All Scheduled Vaccinations">
        <div class="space-y-3">
            @forelse ($schedules as $schedule)
                <div class="rounded border p-4 {{ $loop->first ? 'border-blue-300 bg-blue-50' : 'border-gray-200' }}">
                    <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <p class="font-semibold">{{ $schedule->patient_name }}</p>
                            <p class="text-sm text-gray-600">
                                {{ $schedule->vaccine }} &middot; {{ $schedule->dose }} &middot; {{ $schedule->purok }}
                            </p>
                        </div>
                        <p class="text-sm">{{ $schedule->scheduled_at->format('M d, Y') }} &middot; {{ $schedule->status }}</p>
                    </div>
                </div>
            @empty
                <p class="text-gray-500">No schedules yet.</p>
            @endforelse
        </div>
    </x-panel>
</div>
@endsection
