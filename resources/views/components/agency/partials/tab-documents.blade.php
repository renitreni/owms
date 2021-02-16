<form method="POST" action="{{ route('details.document.store') }}" enctype="multipart/form-data">
    @csrf
    <input name="candidate_id" value="{{ $id }}" class="hidden">
    <div class="flex flex-col md:flex-row">
        <div class="flex flex-col flex-grow">
            <label>{{ __('Document Name') }}</label>
            <select name="document"
                    class="w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0">
                @foreach($options as $item)
                    <option value="{{ $item->id }}"> {{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex flex-col flex-grow ml-0 md:ml-3">
            <label>{{ __('File') }}</label>
            <div class="flex">
                <label
                    class="font-bold block p-2 text-sm font-medium text-gray-700 text-center bg-indigo-200 mt-1 focus:ring-indigo-500 rounded-md">
                    <i class="fas fa-upload"></i>
                    <input type="file" name="attachment" v-on:change="attachUpload"
                           class="hidden"/>
                </label>
                <label class="mt-3 ml-4">@{{ attach }}</label>
            </div>
        </div>
        <div class="flex flex-col ml-3 mt-2 md:mt-5 pt-2">
            <button type="submit"
                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                <i class="fas fa-plus-circle"></i>
            </button>
        </div>
    </div>
</form>
<div class="mt-5 pt-4 border-t-2">
    <table id="tbl-documents" class="stripe hover" style="width:100%;"></table>
</div>
