<?php

namespace Westlinks\SimpleIvr\Http\Controllers;

use Westlinks\SimpleIvr\Models\IvrSetting;
use Illuminate\Http\Request;

class IvrSettingController extends Controller
{
    public function index()
    {
        $ivr_settings = IvrSetting::all();

        return view('simple-ivr::ivr_settings.index', compact('ivr_settings'));
    }

    public function store(Request $request)
    {
        IvrSetting::truncate();
        if(count($request->digit) > 0) {
            foreach($request->digit as $key => $value) {
                $setting = IvrSetting::where('digit', $value)->first();
                if($setting) {
                    $setting->update([
                        'name' => $request->name[$key],
                        'phone_number' => $request->phone_number[$key]
                    ]);
                } else {
                    $setting = IvrSetting::create([
                        'digit' => $value,
                        'name' => $request->name[$key],
                        'phone_number' => $request->phone_number[$key]
                    ]);
                }
            }
        }

        return redirect(route('ivr_settings.index'));
    }
}
