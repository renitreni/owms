<div class="col-span-6 bg-blue-50 p-1">
    <span class="text-3xl">{{ __('Preferred Positions') }}</span>
</div>
<div class="col-span-6 sm:col-span-2">
    <label class="block text-sm font-medium text-gray-700">{{ __('Position') }} 1</label>
    <input type="text" name="position_1" autocomplete="position_1"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-6 sm:col-span-2">
    <label class="block text-sm font-medium text-gray-700">{{ __('Position') }} 2</label>
    <input type="text" name="position_2" autocomplete="position_2"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-6 sm:col-span-2">
    <label class="block text-sm font-medium text-gray-700">{{ __('Position') }} 3</label>
    <input type="text" name="position_3" autocomplete="position_3"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-6 bg-blue-50 p-1">
    <span class="text-3xl">{{ __('General Information') }}</span>
</div>
<div class="col-span-6 sm:col-span-2">
    <label class="block text-sm font-medium text-gray-700">
        {{ __('First Name') }}</label>
    <input type="text" name="first_name" id="name" autocomplete="name"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-6 sm:col-span-2">
    <label class="block text-sm font-medium text-gray-700">{{ __('Middle Name') }}</label>
    <input type="text" name="middle_name"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-6 sm:col-span-2">
    <label class="block text-sm font-medium text-gray-700">{{ __('Last Name') }}</label>
    <input type="text" name="last_name"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-3 sm:col-span-2">
    <label class="block text-sm font-medium text-gray-700">{{ __('Passport') }}</label>
    <input type="text" name="passport"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-3 sm:col-span-2">
    <label class="block text-sm font-medium text-gray-700">{{ __('Place Issued') }}</label>
    <input type="text" name="place_issue"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-6 sm:col-span-2">
</div>
<div class="col-span-3 sm:col-span-2">
    <label class="block text-sm font-medium text-gray-700">{{ __('Travel Status') }}</label>
    <select name="travel_status"
            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        <option value="1st time abroad" selected>{{ __('1st Time Abroad') }}</option>
        <option value="ex-abroad">{{ __('Ex-Abroad') }}</option>
    </select>
</div>
<div class="col-span-3 sm:col-span-2">
    <label class="block text-sm font-medium text-gray-700">{{ __('IQAMA') }}</label>
    <input type="text" name="iqama"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-6 sm:col-span-2">
</div>
<div class="col-span-3 sm:col-span-1">
    <label class="block text-sm font-medium text-gray-700">{{ __('Birth Date') }}</label>
    <input type="date" name="birth_date"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-3 sm:col-span-1">
    <label class="block text-sm font-medium text-gray-700">{{ __('Birth Place') }}</label>
    <input type="text" name="birth_place"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-3 sm:col-span-1">
    <label class="block text-sm font-medium text-gray-700">{{ __('Gender') }}</label>
    <select name="gender"
            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        <option value="male" selected>{{ __('Male') }}</option>
        <option value="female">{{ __('Female') }}</option>
    </select>
</div>
<div class="col-span-6">
</div>
<div class="col-span-3 sm:col-span-1">
    <label class="block text-sm font-medium text-gray-700">
        {{ __('Civil Status') }}
    </label>
    <select name="civil_status"
            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        <option value="single" selected>{{ __('Single') }}</option>
        <option value="married">{{ __('Married') }}</option>
        <option value="widowed">{{ __('Widowed') }}</option>
        <option value="separated">{{ __('Separated') }}</option>
    </select>
</div>
<div class="col-span-3 sm:col-span-2">
    <label class="block text-sm font-medium text-gray-700">{{ __('Spouse Name (If Married)') }}</label>
    <input type="text" name="spouse"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-6 sm:col-span-3">
</div>
<div class="col-span-3 sm:col-span-1">
    <label class="block text-sm font-medium text-gray-700">{{ __('Blood Type') }}</label>
    <input type="text" name="blood_type"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-3 sm:col-span-1">
    <label
        class="block text-sm font-medium text-gray-700">{{ __('Height') }} (cm.)</label>
    <input type="text" name="height"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-3 sm:col-span-1">
    <label
        class="block text-sm font-medium text-gray-700">{{ __('Weight') }} (kg.)</label>
    <input type="text" name="weight"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-3">
</div>
<div class="col-span-6 sm:col-span-2">
    <label class="block text-sm font-medium text-gray-700">{{ __('Religion') }}</label>
    <input type="text" name="religion"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-6 sm:col-span-2">
    <label class="block text-sm font-medium text-gray-700">{{ __('Language') }}</label>
    <input type="text" name="language"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-6 sm:col-span-2">
    <label class="block text-sm font-medium text-gray-700">{{ __('Education') }}</label>
    <input type="text" name="education"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-6 sm:col-span-2">
    <label class="block text-sm font-medium text-gray-700">{{ __('Mother\'s Maiden Name') }}</label>
    <input type="text" name="mother_name"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-6 sm:col-span-2">
    <label class="block text-sm font-medium text-gray-700">{{ __('Father\'s Name') }}</label>
    <input type="text" name="father_name"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-6 bg-blue-50 p-1">
    <span class="text-3xl">{{ __('Contact Information') }}</span>
</div>
<div class="col-span-6 sm:col-span-2">
    <label class="block text-sm font-medium text-gray-700">{{ __('E-mail') }}</label>
    <input type="text" name="email"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-6 sm:col-span-2">
    <label class="block text-sm font-medium text-gray-700">{{ __('Contact') }} 1</label>
    <input type="text" name="contact_1"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-6 sm:col-span-2">
    <label class="block text-sm font-medium text-gray-700">{{ __('Contact') }} 2</label>
    <input type="text" name="contact_2"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-6 sm:col-span-1">
    <label class="block text-sm font-medium text-gray-700">{{ __('Applied From') }}</label>
    <select name="applied_using"
            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        <option value="online" selected>{{ __('Online') }}</option>
        <option value="walk-in">{{ __('Walk-In') }}</option>
        <option value="agent">{{ __('Agent') }}</option>
    </select>
</div>
<div class="col-span-6 sm:col-span-3">
</div>
<div class="col-span-6 sm:col-span-6">
    <label class="block text-sm font-medium text-gray-700">{{ __('Address') }}</label>
    <textarea type="text" name="address" rows="6"
              class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                </textarea>
</div>
<div class="col-span-6 bg-blue-50 p-1">
    <span class="text-3xl">{{ __('Others') }}</span>
</div>
<div class="col-span-6 sm:col-span-2">
    <label class="block text-sm font-medium text-gray-700">{{ __('Upload Resume/CV') }} (.docs,.pdf)</label>
    <label class="block text-sm font-medium text-gray-700"><i>{{ __('Path') }}:</i>
        <strong>@{{ file_path }}</strong></label>
    <div
        class="p-2 w-1/2 bg-red-200 mt-1 focus:ring-indigo-500 rounded-md h-25">
        <label class="block text-sm font-medium text-gray-700 text-center">
            {{ __('Choose a File') }}
            <input type="file" name="cv" v-on:change="fileUpload"
                   class="hidden"/>
        </label>
    </div>
</div>
