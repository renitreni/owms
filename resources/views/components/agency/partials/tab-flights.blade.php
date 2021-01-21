<form method="POST" action="{{ route('details.flight.store') }}" enctype="multipart/form-data">
    @csrf
    <input name="candidate_id" value="{{ $id }}" class="hidden">
    <div class="flex flex-col md:flex-row mt-3">
        <div class="flex flex-col flex-grow">
            <label>Flight Details</label>
            <input name="details"
                   class="w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0 p-2">
        </div>
        <div class="flex flex-col flex-grow ml-0 md:ml-3">
            <label>Abroad Agency (Affiliates)</label>
            <select name="abroad_agency"
                    class="w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0 p-2">
                @foreach($affiliates as $item)
                    <option value="{{ $item->id }}"> {{ $item->information->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex flex-col flex-grow ml-0 md:ml-3">
            <label>Contact Person</label>
            <input name="contact_person"
                   class="w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0 p-2">
        </div>
    </div>
    <div class="flex flex-col md:flex-row">
        <div class="flex flex-col">
            <label>Contact Number</label>
            <input name="contact_number"
                   class="w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0 p-2">
        </div>
        <div class="flex flex-col flex-grow ml-0 md:ml-3">
            <label>Contact Address</label>
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
