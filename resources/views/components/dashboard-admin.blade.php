@if($employerLateRpCnt != 0 )
    <div class="grid grid-cols-3 gap-4 p-5">
        <div class="col-span-3 shadow-lg">
            <div
                class="animate-pulse text-2xl border-2 text-center p-4 bg-yellow-300 border-b border-gray-200">
                <i class="fas fa-exclamation-triangle text-red-600"></i> {{ $employerLateRpCnt }}
                late report from Employer(s)
            </div>
        </div>
        <div class="col-span-3 shadow-lg">
            <div
                class="animate-pulse text-2xl border-2 text-center p-4 bg-yellow-300 border-b border-gray-200">
                <i class="fas fa-exclamation-triangle text-red-600"></i> {{ $employerLateRpCnt }}
                late report from Employee(s)
            </div>
        </div>
    </div>
@endif
<div class="grid grid-cols-4 gap-4 p-5">
    <div class="col-span-2 md:col-span-1 p-2 rounded shadow text-gray-600 bg-yellow-300">
        <div class="font-merriweather mb-1 text-center md:text-5xl">
                <span class="bg-gray-200 text-center rounded-full p-5">
                    {{ \App\Models\User::query()->where('role','2')->count() }}
                </span>
        </div>
        <div class="md:text-2xl font-semibold mt-6">Agencies</div>
    </div>
    <div class="col-span-2 md:col-span-1 p-2 rounded shadow text-gray-600 bg-green-300">
        <div class="font-merriweather mb-1 text-center md:text-5xl">
                <span class="bg-gray-200 text-center rounded-full p-5">
                {{ \App\Models\User::query()->where('role','3')->count() }}
                </span>
        </div>
        <div class="md:text-2xl font-semibold mt-6">Employer</div>
    </div>
    <div class="col-span-2 md:col-span-1 p-2 rounded shadow text-gray-600 bg-pink-300">
        <div class="font-merriweather mb-1 text-center md:text-5xl">
                <span class="bg-gray-200 text-center rounded-full p-5">
                {{ \App\Models\Candidate::query()->count() }}
                </span>
        </div>
        <div class="md:text-2xl font-semibold mt-6">OFW</div>
    </div>
    <div class="col-span-2 md:col-span-1 p-2 rounded shadow text-gray-600 bg-purple-300">
        <div class="font-merriweather mb-1 text-center md:text-5xl">
                <span class="bg-gray-200 text-center rounded-full p-5">
                {{ \App\Models\Candidate::query()->where('deployed', 'yes')->count() }}
                </span>
        </div>
        <div class="md:text-2xl font-semibold mt-6">Deployed</div>
    </div>
</div>
