@props(['title', 'value'])

@php
    $colors = [
        'Total' => 'bg-gray-100 text-gray-700',
        'Done' => 'bg-green-100 text-green-700',
        'Scheduled' => 'bg-blue-100 text-blue-700',
        'Overdue' => 'bg-red-100 text-red-700',
    ];
@endphp

<div class="rounded p-4 shadow {{ $colors[$title] ?? 'bg-gray-100 text-gray-700' }}">
    <p class="text-sm text-gray-500">{{ $title }}</p>
    <p class="text-2xl font-bold">{{ $value }}</p>
</div>
