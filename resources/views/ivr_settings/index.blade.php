@extends('layouts.app')

@section('content')
<div class="container">
    <nav class="" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/admin/settings">Settings</a></li>
            <li class="active breadcrumb-item" aria-current="page">IVR Settings</li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    IVR Settings
                </div>
                <div class="card-body">
                    <h1>IVR Settings</h1>

                    <form action="/admin/ivr-settings" method="post">
                        @csrf
                        @foreach($ivr_settings as $setting)
                            <div class="row">
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label for="digit{{$setting->id}}">Digit</label>
                                        <input type="number" name="digit[{{$setting->id}}]" id="digit{{$setting->id}}" value="{{$setting->digit}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name{{$setting->id}}">Name</label>
                                        <input type="text" name="name[{{$setting->id}}]" id="name{{$setting->id}}" value="{{$setting->name}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="phone_number{{$setting->id}}">Phone number</label>
                                        <input type="text" name="phone_number[{{$setting->id}}]" id="phone_number{{$setting->id}}" value="@if($setting->phone_number != '') {{$setting->phone_number}} @endif" class="form-control" @if($setting->phone_number == '') readonly="true" @endif>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    @if ($loop->first)
                                        <div class="form-group">
                                            <input type="checkbox" name="special_agent" id="special_agent{{$setting->id}}" value="1" onchange="changeCheckbox(this)" @if($setting->phone_number == '') checked="true" @endif>
                                            <label for="special_agent{{$setting->id}}">Is special agent?</label>
                                        </div>
                                    @endif
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <button class="btn btn-danger" type="button" onclick="deleteRow(this)">Delete</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <button class="btn btn-success" type="button" onclick="addRow()">Add Row</button>
                        <button class="btn btn-primary" @if($ivr_settings->count() == 0) style="display:none;" @endif>Save</button>
                    </form>

                    <div class="row new-row" style="display:none;">
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="digit">Digit</label>
                                <input type="number" name="digit[]" id="digit" value="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name[]" id="name" value="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="phone_number">Phone number</label>
                                <input type="text" name="phone_number[]" id="phone_number" value="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="checkbox" name="special_agent" id="special_agent" value="1" onchange="changeCheckbox(this)">
                                <label for="special_agent">Is special agent?</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <button class="btn btn-danger" type="button" onclick="deleteRow(this)">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    function addRow() {
        const clone = $('.new-row').clone();
        clone.removeClass('new-row');
        clone.show()
        $('form .btn-primary').before(clone);

        $('form .btn-primary').show()
    }

    function deleteRow(that) {
        $(that).parent().parent().parent().remove()
        $('form').submit()
    }

    function changeCheckbox(that) {
        const id = $(that).attr('id').substr(13)
        if($(that).is(':checked')) {
            $('#phone_number' + id).val('')
            $('#phone_number' + id).attr('readonly', true)
        } else {
            $('#phone_number' + id).attr('readonly', false)
        }
    }
</script>
@endsection
