<div>
<div class="flex flex-wrap items-center h-screen gap-2 mx-40 bg-white">

@foreach ($agencies as $agency)
  <!-- Card 2 -->
  <div href="#" class="w-[30rem] border-2 border-b-4 border-gray-200 rounded-xl hover:bg-gray-50">

    <div class="grid grid-cols-6 p-5">

      <!-- Profile Picture -->
      <div>
        <img src="{{ $agency['logo_path'] != '' ? $agency['logo_path']: 'https://picsum.photos/seed/2/200/200' }}" class="rounded-full max-w-16 max-h-16" />
      </div>

      <!-- Description -->
      <div class="col-span-5 ml-4 md:col-span-4">

        <p class="text-xs font-bold text-sky-500"> {{ $agency['name'] }} </p>

        <p class="overflow-auto font-bold text-gray-600"> 
          <a href="{{ route('login-view', ['id' => encrypt($agency['id']) ] ) }}" 
           class="px-4 py-2 font-medium text-white transition duration-300 bg-purple-600 rounded text-1xl hover:bg-purple-800"> 
           View Login
          </a> 
        </p>

      </div>

      <!-- Price -->
      <div class="flex col-start-2 ml-4 md:col-start-auto md:ml-0 md:justify-end">
        <p class="px-3 py-1 text-sm font-bold rounded-lg text-sky-500 bg-sky-100 w-fit h-fit"> {{ $agency['status'] }} </p>
      </div>

    </div>

  </div>
@endforeach

</div>
</div>
