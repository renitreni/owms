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
    <div class="grid grid-cols-4 gap-4 p-5">
        <div class="col-span-1 text-center text-5xl p-2 rounded shadow text-gray-600 bg-yellow-300">
            <div class="font-merriweather mb-1">
                {{ \App\Models\User::query()->where('role','2')->count() }}
            </div>
            <div>Agencies</div>
        </div>
        <div class="col-span-1 text-center text-5xl p-2 rounded shadow text-gray-600 bg-blue-300">
            <div class="font-merriweather mb-1">
                {{ \App\Models\User::query()->where('role','3')->count() }}
            </div>
            <div>Employer</div>
        </div>
        <div class="col-span-1 text-center text-5xl p-2 rounded shadow text-gray-600 bg-purple-300">
            <div class="font-merriweather mb-1">
                {{ \App\Models\Candidate::query()->count() }}
            </div>
            <div>OFW</div>
        </div><div class="col-span-1 text-center text-5xl p-2 rounded shadow text-gray-600 bg-green-300">
            <div class="font-merriweather mb-1">
                {{ \App\Models\Candidate::query()->where('deployed', 'yes')->count() }}
            </div>
            <div>Deployed</div>
        </div>
    </div>
@endif
