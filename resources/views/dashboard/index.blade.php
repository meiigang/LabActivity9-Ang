@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="p-8">
    <h1 class="mb-6 text-3xl font-bold">{{ $title }}</h1>

    <div class="grid gap-4 md:grid-cols-4">
        @foreach ($stats as $stat)
            <x-stat-card :title="$stat['label']" :value="$stat['value']" />
        @endforeach
    </div>

    @if ($alerts->isNotEmpty())
        <div class="mt-8 rounded border border-red-200 bg-red-50 p-4 text-red-800">
            {{ $alerts->count() }} overdue vaccination{{ $alerts->count() === 1 ? '' : 's' }} need attention.
        </div>
    @elseif ($schedules->where('status', 'Out of Stock')->isNotEmpty())
        <div class="mt-8 rounded border border-amber-200 bg-amber-50 p-4 text-amber-800">
            Some vaccine supplies are out of stock.
        </div>
    @else
        <div class="mt-8 rounded border border-green-200 bg-green-50 p-4 text-green-800">
            All clear: no overdue vaccinations.
        </div>
    @endif

    <x-panel title="Vaccination Schedule">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="border-b">
                        <th class="p-3">#</th>
                        <th class="p-3">Patient</th>
                        <th class="p-3">Vaccine</th>
                        <th class="p-3">Date</th>
                        <th class="p-3">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($schedules as $schedule)
                        <tr class="{{ $loop->odd ? 'bg-gray-50' : 'bg-white' }} border-b">
                            <td class="p-3">{{ $loop->iteration }}</td>
                            <td class="p-3">{{ $schedule->patient_name }}</td>
                            <td class="p-3">{{ $schedule->vaccine }} ({{ $schedule->dose }})</td>
                            <td class="p-3">{{ $schedule->scheduled_at->format('M d, Y') }}</td>
                            <td class="p-3">
                                @unless ($schedule->status === 'Overdue')
                                    <span class="rounded bg-gray-100 px-2 py-1 text-xs">{{ $schedule->status }}</span>
                                @else
                                    <span class="rounded bg-red-100 px-2 py-1 text-xs text-red-700">Overdue</span>
                                @endunless
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-4 text-center text-gray-500">No schedules yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-panel>
</div>
@endsection