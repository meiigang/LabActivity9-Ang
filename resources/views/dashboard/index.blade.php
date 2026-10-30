<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans bg-gray-100 p-8">
    <h1 class="mb-6 text-3xl font-bold">{{ $title }}</h1>

    <div class="grid gap-4 md:grid-cols-4">
        @foreach ($stats as $stat)
            <div class="rounded bg-white p-4 shadow">
                <p class="text-gray-500">{{ $stat['label'] }}</p>
                <p class="text-2xl font-bold">{{ $stat['value'] }}</p>
            </div>
        @endforeach
    </div>

    <h2 class="mt-8 mb-4 text-xl font-bold">Vaccination Schedule</h2>

    <div class="space-y-2">
        @foreach ($schedules as $schedule)
            <div class="rounded bg-white p-4 shadow">
                <strong>{{ $schedule->patient_name }}</strong>
                — {{ $schedule->vaccine }}
                — {{ $schedule->scheduled_at->format('M d, Y') }}
                — {{ $schedule->status }}
            </div>
        @endforeach
    </div>
</body>
</html>