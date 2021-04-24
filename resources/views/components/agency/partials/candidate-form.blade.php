<div class="col-span-6 bg-blue-50 p-1">
    <span class="text-3xl">{{ __('Preferred Positions') }}</span>
</div>
<div class="col-span-6 sm:col-span-2">
    <label class="block text-sm font-medium text-gray-700">{{ __('Position') }} 1</label>
    <input type="text" name="position_1" autocomplete="position_1" value="{{ $results->position_1 ?? null }}"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-6 sm:col-span-2">
    <label class="block text-sm font-medium text-gray-700">{{ __('Position') }} 2</label>
    <input type="text" name="position_2" autocomplete="position_2" value="{{ $results->position_2 ?? null }}"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-6 sm:col-span-2">
    <label class="block text-sm font-medium text-gray-700">{{ __('Position') }} 3</label>
    <input type="text" name="position_3" autocomplete="position_3" value="{{ $results->position_3 ?? null }}"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-6">
    <label class="block text-sm font-medium text-gray-700">{{ __('Skills and Experience') }} (Separate with
        commas)</label>
    <input type="text" name="skills" autocomplete="skills" value="{{ $results->skills ?? null }}"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>

<div class="col-span-6 bg-blue-50 p-1">
    <span class="text-3xl">{{ __('Travel Information') }}</span>
</div>
<div class="col-span-3 sm:col-span-2">
    <label class="block text-sm font-medium text-gray-700">{{ __('Passport') }}</label>
    <input type="text" name="passport" value="{{ $results->passport ?? null }}"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-3 sm:col-span-2">
    <label class="block text-sm font-medium text-gray-700">{{ __('Place Issued') }}</label>
    <input type="text" name="place_issue" value="{{ $results->place_issue ?? null }}"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-3 sm:col-span-2">
    <label class="block text-sm font-medium text-gray-700">{{ __('Date Of Issued') }}</label>
    <input type="date" name="dos" value="{{ $results->dos ?? null }}"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-3 sm:col-span-2">
    <label class="block text-sm font-medium text-gray-700">{{ __('Date Of Expiry') }}</label>
    <input type="date" name="doe" value="{{ $results->doe ?? null }}"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-3 sm:col-span-2">
    <label class="block text-sm font-medium text-gray-700">{{ __('Travel Status') }}</label>
    <select name="travel_status" @isset($results) v-model="select_box.travel_status" @endisset
    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        <option value="1st time abroad">{{ __('1st Time Abroad') }}</option>
        <option value="ex-abroad">{{ __('Ex-Abroad') }}</option>
    </select>
</div>
<div class="col-span-3 sm:col-span-2">
    <label class="block text-sm font-medium text-gray-700">{{ __('IQAMA') }}</label>
    <input type="text" name="iqama" value="{{ $results->iqama ?? null }}"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
{{------------------------------- Employment History--}}
<div class="col-span-6 bg-blue-50 p-1">
    <span class="text-3xl">{{ __('Employment History') }}</span>
</div>
<div class="col-span-6 p-1">
    <div class="flex flex-row">
        <div class="flex-grow m-1">
            <label class="block text-sm font-medium text-gray-700">{{ __('Country') }}</label>
            <input type="text" v-model="hold_emp.country"
                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>
        <div class="flex-grow m-1">
            <label class="block text-sm font-medium text-gray-700">{{ __('Position') }}</label>
            <input type="text" v-model="hold_emp.position"
                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>
        <div class="flex-grow m-1">
            <label class="block text-sm font-medium text-gray-700">{{ __('Year') }}</label>
            <input type="text" v-model="hold_emp.year"
                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>
        <div class="flex-grow m-1">
            <label class="block text-sm font-medium text-gray-700">{{ __('Company') }}</label>
            <input type="text" v-model="hold_emp.company"
                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>
        <div class="m-1 pt-7">
            <button type="button" @click="add_emp()"
                    class="inline-flex justify-center py-2 px-2 border
                                        border-transparent shadow-sm text-sm font-medium rounded-md text-white
                                        bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2
                                        focus:ring-offset-2 focus:ring-indigo-500 font-bold">
                <i class="fas fa-plus-circle"></i>
            </button>
        </div>
    </div>
    <div class="flex flex-row" v-for="item in employment">
        <div class="flex-grow m-1">
            <label class="block text-sm font-medium text-gray-700">{{ __('Country') }}</label>
            <label class="block text-sm font-medium text-gray-700 font-bold">@{{ item.country }}</label>
        </div>
        <div class="flex-grow m-1">
            <label class="block text-sm font-medium text-gray-700">{{ __('Position') }}</label>
            <label class="block text-sm font-medium text-gray-700 font-bold">@{{ item.position }}</label>
        </div>
        <div class="flex-grow m-1">
            <label class="block text-sm font-medium text-gray-700">{{ __('Year') }}</label>
            <label class="block text-sm font-medium text-gray-700 font-bold">@{{ item.year }}</label>
        </div>
        <div class="flex-grow m-1">
            <label class="block text-sm font-medium text-gray-700">{{ __('Company') }}</label>
            <label class="block text-sm font-medium text-gray-700 font-bold">@{{ item.company }}</label>
        </div>
        <div class="m-1 pt-7">
            <button type="button" @click="remove_emp(item)"
                    class="inline-flex justify-center py-2 px-2 border
                                        border-transparent shadow-sm text-sm font-medium rounded-md text-white
                                        bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2
                                        focus:ring-offset-2 focus:ring-indigo-500 font-bold">
                <i class="fas fa-trash"></i>
            </button>
        </div>
    </div>
</div>
<input name="employment" v-model="JSON.stringify(employment)" hidden>
{{---------------------------- Personal Information--}}
<div class="col-span-6 bg-blue-50 p-1">
    <span class="text-3xl">{{ __('Personal Information') }}</span>
</div>
<div class="col-span-6 sm:col-span-2">
    <label class="block text-sm font-medium text-gray-700">
        {{ __('First Name') }}</label>
    <input type="text" name="first_name" autocomplete="first_name" value="{{ $results->first_name ?? null }}"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-6 sm:col-span-2">
    <label class="block text-sm font-medium text-gray-700">{{ __('Middle Name') }}</label>
    <input type="text" name="middle_name" value="{{ $results->middle_name ?? null }}"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-6 sm:col-span-2">
    <label class="block text-sm font-medium text-gray-700">{{ __('Last Name') }}</label>
    <input type="text" name="last_name" value="{{ $results->last_name ?? null }}"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-3 sm:col-span-1">
    <label class="block text-sm font-medium text-gray-700">{{ __('Birth Date') }}</label>
    <input type="date" name="birth_date" value="{{ $results->birth_date ?? null }}"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-3 sm:col-span-1">
    <label class="block text-sm font-medium text-gray-700">{{ __('Birth Place') }}</label>
    <input type="text" name="birth_place" value="{{ $results->birth_place ?? null }}"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-3 sm:col-span-1">
    <label class="block text-sm font-medium text-gray-700">{{ __('Gender') }}</label>
    <select name="gender" @isset($results) v-model="select_box.gender" @endisset
    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        <option value="male">{{ __('Male') }}</option>
        <option value="female">{{ __('Female') }}</option>
    </select>
</div>
<div class="col-span-6">
</div>
<div class="col-span-3 sm:col-span-1">
    <label class="block text-sm font-medium text-gray-700">
        {{ __('Civil Status') }}
    </label>
    <select name="civil_status" @isset($results) v-model="select_box.civil_status" @endisset
    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        <option value="single">{{ __('Single') }}</option>
        <option value="married">{{ __('Married') }}</option>
        <option value="widowed">{{ __('Widowed') }}</option>
        <option value="separated">{{ __('Separated') }}</option>
    </select>
</div>
<div class="col-span-3 sm:col-span-2">
    <label class="block text-sm font-medium text-gray-700">{{ __('Spouse Name') }}</label>
    <input type="text" name="spouse" value="{{ $results->spouse ?? null }}"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-6 sm:col-span-3">
</div>
<div class="col-span-3 sm:col-span-1">
    <label class="block text-sm font-medium text-gray-700">{{ __('Blood Type') }}</label>
    <input type="text" name="blood_type" value="{{ $results->blood_type ?? null }}"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-3 sm:col-span-1">
    <label
        class="block text-sm font-medium text-gray-700">{{ __('Height') }} (cm.)</label>
    <input type="text" name="height" value="{{ $results->height ?? null }}"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-3 sm:col-span-1">
    <label
        class="block text-sm font-medium text-gray-700">{{ __('Weight') }} (kg.)</label>
    <input type="text" name="weight" value="{{ $results->weight ?? null }}"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-3">
</div>
<div class="col-span-6 sm:col-span-2">
    <label class="block text-sm font-medium text-gray-700">{{ __('Religion') }}</label>
    <input type="text" name="religion" value="{{ $results->religion ?? null }}"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-6 sm:col-span-2">
    <label class="block text-sm font-medium text-gray-700">{{ __('Language') }}</label>
    <input type="text" name="language" value="{{ $results->language ?? null }}"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-6 sm:col-span-2">
    <label class="block text-sm font-medium text-gray-700">{{ __('Education') }}</label>
    <input type="text" name="education" value="{{ $results->education ?? null }}"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-6 sm:col-span-2">
    <label class="block text-sm font-medium text-gray-700">{{ __('Mother\'s Maiden Name') }}</label>
    <input type="text" name="mother_name" value="{{ $results->mother_name ?? null }}"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-6 sm:col-span-2">
    <label class="block text-sm font-medium text-gray-700">{{ __('Father\'s Name') }}</label>
    <input type="text" name="father_name" value="{{ $results->father_name ?? null }}"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-6 bg-blue-50 p-1">
    <span class="text-3xl">{{ __('Next Of Kin Information') }}</span>
</div>
<div class="col-span-6 sm:col-span-2">
    <label class="block text-sm font-medium text-gray-700">{{ __('Next of Kin') }}</label>
    <input type="text" name="kin" value="{{ $results->kin ?? null }}"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-6 sm:col-span-2">
    <label class="block text-sm font-medium text-gray-700">{{ __('Relationship with Kin') }}</label>
    <input type="text" name="kin_relationship" value="{{ $results->kin_relationship ?? null }}"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-6 sm:col-span-2">
    <label class="block text-sm font-medium text-gray-700">{{ __('Contact of Kin') }}</label>
    <input type="text" name="kin_contact" value="{{ $results->kin_contact ?? null }}"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-6">
    <label class="block text-sm font-medium text-gray-700">{{ __('Address of Kin') }}</label>
    <textarea type="text" name="kin_address" rows="6"
              class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
    >{{ $results->kin_address ?? null }}</textarea>
</div>
{{---------------------------- Contact Information'--}}
<div class="col-span-6 bg-blue-50 p-1">
    <span class="text-3xl">{{ __('Contact Information') }}</span>
</div>
<div class="col-span-6 sm:col-span-2">
    <label class="block text-sm font-medium text-gray-700">{{ __('E-mail') }}</label>
    <input type="text" name="email" value="{{ $results->email ?? null }}"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-6 sm:col-span-2">
    <label class="block text-sm font-medium text-gray-700">{{ __('Facebook Account') }}</label>
    <input type="text" name="fb_account" value="{{ $results->fb_account ?? null }}"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-6 sm:col-span-2">
    <label class="block text-sm font-medium text-gray-700">{{ __('Contact') }} 1</label>
    <input type="text" name="contact_1" value="{{ $results->contact_1 ?? null }}"
           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-6 sm:col-span-2">
    <label class="block text-sm font-medium text-gray-700">{{ __('Contact') }} 2</label>
    <input type="text" name="contact_2" value="{{ $results->contact_2 ?? null }}"
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
              class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
    >{{ $results->address ?? null }}</textarea>
</div>
<div class="col-span-6 bg-blue-50 p-1">
    <span class="text-3xl">{{ __('Documents') }}</span>
</div>
<div class="col-span-6 sm:col-span-2">
    @if(isset($doc[0]))
        <a target="_blank" href="/{{ $doc[0]->path }}"
           class="p-2 w-1/2 text-blue-600 hover:underline mt-1 rounded-md h-25">
            View Doc</a>
    @endif
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


<x-slot name="scripts">
    <script>
        const e = new Vue({
            el: '#app',
            data() {
                return {
                    file_path: '',
                    filename: '',
                    select_box: {
                        gender: '{{ $results->gender ?? null }}',
                        civil_status: '{{ $results->civil_status ?? null  }}',
                        applied_using: '{{ $results->applied_using ?? null  }}',
                        travel_status: '{{ $results->travel_status ?? null  }}',
                    },
                    hold_emp: {
                        country: '',
                        position: '',
                        year: '',
                        company: '',
                    },
                    employment: {!! $employment ?? '[]' !!}
                }
            },
            methods: {
                fileUpload(e) {
                    console.log(e.target.files)
                    this.file_path = e.target.files[0].name
                },
                remove_emp(item) {
                    this.employment.splice(item);
                },
                add_emp() {
                    if (this.hold_emp.country === '' && this.hold_emp.position === '' && this.hold_emp.year === '' && this.hold_emp.company === '')
                        return false;
                    this.employment.push(this.hold_emp);
                    this.hold_emp = {
                        country: '',
                        position: '',
                        year: '',
                        company: '',
                    }
                }
            }
        });
    </script>

</x-slot>
