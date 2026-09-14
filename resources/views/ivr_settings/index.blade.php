<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <ol class="list-none p-0 inline-flex text-sm sm:text-base">
                <li class="flex items-center ml-1 dark:text-gray-300">
                    <a href="{{ route('dashboard') }}">{{ __('Home') }}</a>
                </li>
                <li class="flex items-center ml-1 dark:text-gray-300">
                    <a href="{{ route('admin.settings.index') }}">{{ __('Settings') }}</a>
                </li>
                <li class="flex items-center ml-1 dark:text-gray-300">
                    {{ __('IVR Settings') }}
                </li>
            </ol>
        </h2>
    </x-slot>

    <div class="pt-6">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h3>IVR Settings</h3>
            </div>
            <div class="card-body p-4">
                <p class="mb-4 dark:text-gray-300">Map a digit a caller presses to a name and a phone number to route the call to. The first row is used as the "special agent" destination when no phone number is set.</p>

                {{ html()->form('POST', '/admin/ivr-settings')->open() }}
                    @foreach($ivr_settings as $setting)
                        <div class="ivr-setting-row grid grid-cols-12 gap-2 items-end pb-3">
                            <div class="col-span-2 sm:col-span-1">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="digit{{$setting->id}}">Digit</label>
                                <input type="number" name="digit[{{$setting->id}}]" id="digit{{$setting->id}}" value="{{$setting->digit}}" class="form-input w-full rounded">
                            </div>
                            <div class="col-span-10 sm:col-span-3">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="name{{$setting->id}}">Name</label>
                                <input type="text" name="name[{{$setting->id}}]" id="name{{$setting->id}}" value="{{$setting->name}}" class="form-input w-full rounded">
                            </div>
                            <div class="col-span-12 sm:col-span-3">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="phone_number{{$setting->id}}">Phone number</label>
                                <input type="text" name="phone_number[{{$setting->id}}]" id="phone_number{{$setting->id}}" value="@if($setting->phone_number != ''){{$setting->phone_number}}@endif" class="form-input w-full rounded" @if($setting->phone_number == '') readonly @endif>
                            </div>
                            <div class="col-span-8 sm:col-span-3">
                                @if ($loop->first)
                                    <div class="flex items-center gap-2 pb-2">
                                        <input type="checkbox" name="special_agent" id="special_agent{{$setting->id}}" value="1" class="form-checkbox" onchange="changeCheckbox(this)" @if($setting->phone_number == '') checked @endif>
                                        <label for="special_agent{{$setting->id}}">Is special agent?</label>
                                    </div>
                                @endif
                            </div>
                            <div class="col-span-4 sm:col-span-2">
                                <button class="btn btn-red" type="button" onclick="deleteRow(this)">Delete</button>
                            </div>
                        </div>
                    @endforeach
                    <button class="btn btn-green" type="button" onclick="addRow()">Add Row</button>
                    <button class="btn btn-blue" @if($ivr_settings->count() == 0) style="display:none;" @endif>Save</button>
                {{ html()->form()->close() }}

                <div class="ivr-setting-row new-row grid grid-cols-12 gap-2 items-end pb-3" style="display:none;">
                    <div class="col-span-2 sm:col-span-1">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="digit">Digit</label>
                        <input type="number" name="digit[]" id="digit" value="" class="form-input w-full rounded">
                    </div>
                    <div class="col-span-10 sm:col-span-3">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="name">Name</label>
                        <input type="text" name="name[]" id="name" value="" class="form-input w-full rounded">
                    </div>
                    <div class="col-span-12 sm:col-span-3">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="phone_number">Phone number</label>
                        <input type="text" name="phone_number[]" id="phone_number" value="" class="form-input w-full rounded">
                    </div>
                    <div class="col-span-8 sm:col-span-3">
                        <div class="flex items-center gap-2 pb-2">
                            <input type="checkbox" name="special_agent" id="special_agent" value="1" class="form-checkbox" onchange="changeCheckbox(this)">
                            <label for="special_agent">Is special agent?</label>
                        </div>
                    </div>
                    <div class="col-span-4 sm:col-span-2">
                        <button class="btn btn-red" type="button" onclick="deleteRow(this)">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function addRow() {
            const clone = $('.new-row').clone();
            clone.removeClass('new-row');
            clone.show();
            $('form .btn-blue').before(clone);
            $('form .btn-blue').show();
        }

        function deleteRow(that) {
            $(that).closest('.ivr-setting-row').remove();
            $('form').submit();
        }

        function changeCheckbox(that) {
            const id = $(that).attr('id').substr(13);
            if ($(that).is(':checked')) {
                $('#phone_number' + id).val('');
                $('#phone_number' + id).attr('readonly', true);
            } else {
                $('#phone_number' + id).attr('readonly', false);
            }
        }
    </script>
</x-admin-layout>

