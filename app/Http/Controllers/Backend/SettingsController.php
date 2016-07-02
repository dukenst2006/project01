<?php

namespace App\Http\Controllers\Backend;

use App\Settings;
use App\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\Backend\Access\Settings\StoreSettingsRequest;

use App\Http\Requests;
use Artisan;

class SettingsController extends Controller
{

    public function index()
    {

        $settings = Settings::all();
        return view('backend.index', compact('settings'));

    }

    //
    public function edit()
    {
        // $customer = $this->customers->findOrThrowException($id, true);
        $settings = Settings::find(1);
        //dd($settings);
//        if(is_null($settings)){
//            return view(backend.index);
//        }
        return view('backend.settings')
            ->withSettings($settings);
    }


    public function store(StoreSettingsRequest $request)
    {
        $settings = new Settings;
        $settings->name = $request->app_name;
//        $destinationPath = 'img'; // upload path
//        $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
//        $fileName = rand(11111, 99999) . '.' . $extension; // renameing image
//        Input::file('image')->move($destinationPath, $fileName);// uploading file to given path
        $settings = Settings::create(['name' => $request->name,
            'number' => $request->number,
            'lastname' => $request->lastname,
            'cin' => $request->cin,
            'sex' => $request->sex,
            'address' => $request->address,
            'occupation' => $request->occupation,
            'phone'     => $request->phone,
            'user_id' => $request->user_id,
            //'image'   => '/img/'.$fileName,
        ]);
        return redirect()->route('admin.settings')->withFlashSuccess(trans('settings.alert_success'));
    }
    public function update(){
        $settings = Settings::find(1);
        $settings->fill(Input::all());
//        if (Input::hasFile('image')){
//            $destinationPath = 'img'; // upload path
//            $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
//            $fileName = rand(11111, 99999) . '.' . $extension; // renameing image
//            Input::file('image')->move($destinationPath, $fileName);// uploading file to given path
//            $settings->update(['image' => '/img/'.$fileName]);
//        }
        $settings->save();
        return redirect()->route('admin.settings')->withFlashSuccess(trans('settings.alert_success'));
    }
    public function convert()
    {
       return dd(Input::all());
    }

    public function dashboard(){
        $settings = Settings::all();
            return view('backend.dashboard', compact('settings'));
    }
    
    public function backup(){
        Artisan::call('backup:run', [
            '--only-files' => true,
        ]);
        return redirect('admin/dashboard')->withFlashSuccess(trans('alerts.backend.backup.success'));
    }
}
