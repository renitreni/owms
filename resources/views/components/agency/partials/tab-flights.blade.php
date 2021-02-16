<form method="POST" action="{{ route('details.flight.store') }}" enctype="multipart/form-data">
    @csrf
    <input name="candidate_id" value="{{ $id }}" class="hidden">
    <div class="flex flex-col md:flex-row mt-3">
        <div class="flex flex-col flex-grow">
            <label>{{ __('Flight Details') }}</label>
            <input name="details"
                   class="w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0 p-2">
        </div>
        <div class="flex flex-col flex-grow ml-0 md:ml-3">
            <label>{{ __('Abroad Agency') }} ({{ __('Co-Hosts') }})</label>
            <select name="abroad_agency"
                    class="w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0 p-2">
                @foreach($affiliates as $item)
                    <option value="{{ $item->id }}"> {{ $item->information->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex flex-col flex-grow ml-0 md:ml-3">
            <label>{{ __('Contact Person') }}</label>
            <input name="contact_person"
                   class="w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0 p-2">
        </div>
    </div>
    <div class="flex flex-col md:flex-row">
        <div class="flex flex-col">
            <label>{{ __('Contact Number') }}</label>
            <input name="contact_number"
                   class="w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0 p-2">
        </div>
        <div class="flex flex-col flex-grow ml-0 md:ml-3">
            <label>{{ __('Contact Address') }}</label>
            <input name="contact_address"
                   class="w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0 p-2">
        </div>
        <div class="flex flex-col ml-1 mt-2 md:mt-5 pt-2">
            <button type="submit"
                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                <i class="fas fa-plus-circle"></i>
            </button>
        </div>
    </div>
</form>
<div class="mt-5 pt-4 border-t-2">
    <table id="tbl-flights" class="stripe hover" style="width:100% !important;"></table>
</div>

<transition name="slide-fade">
    <!-- Flight Status -->
    <div class="fixed inset-0 overflow-y-auto" v-if="flight_overview">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                  aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle w-100"
                role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div
                            class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-indigo-100 sm:mx-0 sm:h-10 sm:w-10 text-gray-600">
                            <i class="fas fa-eye"></i>
                        </div>
                        <div class="flex-1 mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left" v-if="overview">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                                {{ __('Flight Status Overview') }}
                            </h3>
                            <div class="flex flex-col mt-4" v-if="overview.details">
                                <div class="flex flex-row">
                                    <div class="mr-3">
                                        <div class="font-bold">Abroad Agency</div>
                                        <div>@{{ overview.agency_abroad.name }}</div>
                                    </div>
                                    <div class="mr-3">
                                        <div class="font-bold">Contact Person</div>
                                        <div>@{{ overview.contact_person }}</div>
                                    </div>
                                    <div class="mr-3">
                                        <div class="font-bold">Contact Number</div>
                                        <div>@{{ overview.contact_number }}</div>
                                    </div>
                                    <div class="mr-3">
                                        <div class="font-bold">Created By</div>
                                        <div>@{{ overview.author.name }}</div>
                                    </div>
                                </div>
                                <div>
                                    <div class="font-bold">Details</div>
                                    <div>@{{ overview.details }}</div>
                                </div>
                                <div>
                                    <div class="font-bold">Contact Address</div>
                                    <div>@{{ overview.contact_address }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" v-on:click="flight_overview = false"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        {{ __('Cancel') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</transition>
