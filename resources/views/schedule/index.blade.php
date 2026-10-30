@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="p-4 sm:p-6 lg:p-8">
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h1 class="text-3xl font-bold">{{ $title }}</h1>
    </div>

    <x-panel title="Patient Vaccination Schedules">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[720px] text-left text-sm">
                <thead>
                    <tr class="border-b border-gray-200 text-gray-600">
                        <th class="p-3 font-semibold">Patient</th>
                        <th class="p-3 font-semibold">Purok</th>
                        <th class="p-3 font-semibold">Vaccine</th>
                        <th class="p-3 font-semibold">Dose</th>
                        <th class="p-3 font-semibold">Scheduled date</th>
                        <th class="p-3 font-semibold">Status</th>
                    </tr>
                </thead>
                <tbody>
            @forelse ($schedules as $schedule)
                <tr class="{{ $loop->odd ? 'bg-gray-50' : 'bg-white' }} border-b border-gray-100">
                    <td class="p-3 font-semibold">{{ $schedule->patient_name }}</td>
                    <td class="p-3">{{ $schedule->purok }}</td>
                    <td class="p-3">{{ $schedule->vaccine }}</td>
                    <td class="p-3">{{ $schedule->dose }}</td>
                    <td class="p-3">{{ $schedule->scheduled_at->format('M d, Y') }}</td>
                    <td class="p-3">
                        <span class="rounded-full px-2 py-1 text-xs font-medium
                            {{ $schedule->status === 'Done' ? 'bg-green-100 text-green-700' : '' }}
                            {{ $schedule->status === 'Overdue' ? 'bg-red-100 text-red-700' : '' }}
                            {{ $schedule->status === 'Scheduled' ? 'bg-blue-100 text-blue-700' : '' }}">
                            {{ $schedule->status }}
                        </span>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="p-6 text-center text-gray-500">No schedules yet.</td>
                </tr>
            @endforelse
                </tbody>
            </table>
        </div>
    </x-panel>
</div>
@endsection
