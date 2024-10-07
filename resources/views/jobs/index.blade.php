<x-layout>
    <x-slot:heading>Jobs Listings </x-slot:heading>

    <h1>Available Roles:</h1>
    <div class="space-y-4">
        @foreach ($jobs as $job)

        <a href="/jobs/{{ $job['id'] }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
            <div class="font-bold text-blue-500 text-xs">{{$job->employer->name }}</div>
            <div class="">
                <strong class="text-snipps">{{ $job['title'] }}</strong>: pays {{$job['salary']}}
            </div>
        </a>
        @endforeach
    </div>

    <div class="">
        {{ $jobs->links() }}
    </div>

</x-layout>