<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Complain Preview') }}
        </h2>
    </x-slot>

    <div id="app" class="pb-12 pt-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col p-4">
                    <div class="text-2xl border-b">General Information</div>
                    <div class="flex flex-col md:flex-row mt-3">
                        <div class="flex flex-col m-2">
                            <div class="font-bold">
                                <i class="fas fa-info-circle text-blue-300"></i> Fullname
                            </div>
                            <div class="ml-2">
                                {{ $preview->last_name . ', ' . $preview->first_name . ' ' . $preview->middle_name }}
                            </div>
                        </div>
                        <div class="flex flex-col m-2">
                            <div class="font-bold">
                                <i class="fas fa-info-circle text-blue-300"></i> Gender
                            </div>
                            <div class="ml-2">{{ $preview->gender }}</div>
                        </div>
                        <div class="flex flex-col m-2">
                            <div class="font-bold">
                                <i class="fas fa-info-circle text-blue-300"></i> National ID
                            </div>
                            <div class="ml-2">{{ $preview->national_id }}</div>
                        </div>
                        <div class="flex flex-col m-2">
                            <div class="font-bold">
                                <i class="fas fa-info-circle text-blue-300"></i> Passport Number
                            </div>
                            <div class="ml-2">{{ $preview->passport }}</div>
                        </div>
                        <div class="flex flex-col m-2">
                            <div class="font-bold">
                                <i class="fas fa-info-circle text-blue-300"></i> Occupation
                            </div>
                            <div class="ml-2">{{ $preview->occupation }}</div>
                        </div>
                    </div>
                    <div class="text-2xl border-b mt-3">Contact Information</div>
                    <div class="flex flex-col md:flex-row mt-3">
                        <div class="flex flex-col m-2">
                            <div class="font-bold">
                                <i class="fas fa-info-circle text-blue-300"></i> Contact #1
                            </div>
                            <div class="ml-2">{{ $preview->contact_number }}</div>
                        </div>
                        <div class="flex flex-col m-2">
                            <div class="font-bold">
                                <i class="fas fa-info-circle text-blue-300"></i> Contact #2
                            </div>
                            <div class="ml-2">{{ $preview->contact_number2 }}</div>
                        </div>
                        <div class="flex flex-col m-2">
                            <div class="font-bold">
                                <i class="fas fa-info-circle text-blue-300"></i> E-mail
                            </div>
                            <div class="ml-2">{{ $preview->email_address }}</div>
                        </div>
                    </div>
                    <div class="flex flex-col m-2">
                        <div class="font-bold">
                            <i class="fas fa-info-circle text-blue-300"></i> Address
                        </div>
                        <div class="ml-2">{{ $preview->location_ksa }}</div>
                    </div>
                    <div class="text-2xl border-b mt-3">Job Information</div>
                    <div class="flex flex-col md:flex-row mt-3">
                        <div class="flex flex-col m-2">
                            <div class="font-bold">
                                <i class="fas fa-info-circle text-blue-300"></i> Employer's National ID/IQAMA
                            </div>
                            <div class="ml-2">{{ $preview->employer_national_id }}</div>
                        </div>
                        <div class="flex flex-col m-2">
                            <div class="font-bold">
                                <i class="fas fa-info-circle text-blue-300"></i> Employer Name
                            </div>
                            <div class="ml-2">{{ $preview->employer_name }}</div>
                        </div>
                        <div class="flex flex-col m-2">
                            <div class="font-bold">
                                <i class="fas fa-info-circle text-blue-300"></i> Employer Contact
                            </div>
                            <div class="ml-2">{{ $preview->employer_contact }}</div>
                        </div>
                        <div class="flex flex-col m-2">
                            <div class="font-bold">
                                <i class="fas fa-info-circle text-blue-300"></i> Local Agency
                            </div>
                            <div class="ml-2">{{ $preview->agency }}</div>
                        </div>
                        <div class="flex flex-col m-2">
                            <div class="font-bold">
                                <i class="fas fa-info-circle text-blue-300"></i> Abroad Agency
                            </div>
                            <div class="ml-2">{{ $preview->host_agency }}</div>
                        </div>
                    </div>
                    <div class="text-2xl border-b mt-3">Complain and Evidences</div>
                    <div class="flex flex-col md:flex-row mt-3">
                        <div class="flex flex-col m-2">
                            <div class="font-bold">
                                <i class="fas fa-info-circle text-blue-300"></i> Complain
                            </div>
                            <div class="ml-2">{{ $preview->complain }}</div>
                        </div>
                    </div>
                    <div class="flex flex-row mt-3">
                        @if ($preview->image1)
                            <div class="flex flex-col m-2">
                                <div class="font-bold mb-2">
                                    <i class="fas fa-info-circle text-blue-300"></i> Image 1
                                </div>
                                <div class="ml-2">
                                    <a href="/{{ $preview->image1 }}" target="_blank"
                                        class="bg-indigo-200 hover:bg-indigo-300 p-2 rounded shadow">View</a>
                                </div>
                            </div>
                        @endif
                        @if ($preview->image2)
                            <div class="flex flex-col m-2">
                                <div class="font-bold mb-2">
                                    <i class="fas fa-info-circle text-blue-300"></i> Image 2
                                </div>
                                <div class="ml-2">
                                    <a href="/{{ $preview->image2 }}" target="_blank"
                                        class="bg-indigo-200 hover:bg-indigo-300 p-2 rounded shadow">View</a>
                                </div>
                            </div>
                        @endif
                        @if ($preview->image3)
                            <div class="flex flex-col m-2">
                                <div class="font-bold mb-2">
                                    <i class="fas fa-info-circle text-blue-300"></i> Image 3
                                </div>
                                <div class="ml-2">
                                    <a href="/{{ $preview->image3 }}" target="_blank"
                                        class="bg-indigo-200 hover:bg-indigo-300 p-2 rounded shadow">View</a>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="text-2xl border-b mt-3">GPS Location of Sender</div>
                    <div class="mt-4">
                        <div id='map' style='width: 100%; height: 300px;'></div>
                    </div>
                    <div class="text-2xl border-b mt-3">Remarks</div>
                    <form action="{{ route('complains.updater', ['id' => $preview->id ]) }}" method="POST">
                        @csrf
                        <div class="flex flex-col mt-3">
                            <div class="flex flex-col flex-grow m-2">
                                <div class="font-bold">
                                    <i class="fas fa-info-circle text-blue-300"></i> Please provide your remarks below:
                                </div>
                                <div class="ml-2">
                                    <textarea name="remarks" class="w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0">{{ $preview->remarks }}</textarea>
                                </div>
                            </div>
                            <div class="flex flex-col flex-grow m-2">
                                <button class="bg-green-300  hover:bg-green-400 rounded shadow p-2 text-white">I have reviewed this complain</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        <script src='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js'></script>
        <link href='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css' rel='stylesheet' />
        <script>
            const e = new Vue({
                el: '#app',
                mounted() {
                    mapboxgl.accessToken =
                        'pk.eyJ1IjoicmVuaWVyLXRyZW51ZWxhIiwiYSI6ImNrZHhya2l3aTE3OG0ycnBpOWxlYjV3czUifQ.4hVvT7_fiVshoSa9P3uAew';

                    var $this = this;

                    var map = new mapboxgl.Map({
                        container: 'map',
                        center: [{{ $preview->actual_longitude }},
                            {{ $preview->actual_langitude }}],
                        zoom: 15,
                        style: 'mapbox://styles/mapbox/satellite-streets-v10'
                    });

                    var marker = new mapboxgl.Marker()
                        .setLngLat([{{ $preview->actual_longitude }}, {{ $preview->actual_langitude }}])
                        .addTo(map);
                }
            })

        </script>
    </x-slot>
</x-app-layout>
