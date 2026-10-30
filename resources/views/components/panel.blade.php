@props(['title'])

<section class="rounded bg-white p-6 shadow">
    <h2 class="mb-4 text-xl font-bold">{{ $title }}</h2>
    {{ $slot }}
</section>
