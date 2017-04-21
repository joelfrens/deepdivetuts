<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Page;
use DB, Session, Crypt, Hash;
use App\Category;
use App\Setting;
use Illuminate\Support\Facades\Input;
use Validator;

class SettingsController extends Controller
{
    /**
     * SettingController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // get all the settings
        $settings = DB::table('settings')->paginate(15);
        // load the view and pass the settings
        return view('admin.setting.index', ['settings' => $settings]);
    }

    public function show()
    {
        // get all the settings
        $settings = DB::table('settings')->paginate(15);

        // load the view and pass the settings
        //return view('admin.category.index', ['settings' => $settings]);
        return $settings;
        exit;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.setting.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required',
            'code'       => 'required',
            'value'       => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);


        $this->validate($request, [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('admin/settings/create')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            // store
            $setting = new Setting;
            $setting->name       = Input::get('name');
            $setting->code       = Input::get('code');
            $setting->value       = Input::get('value');
            $setting->type = '';

            $setting->save();

            // redirect
            Session::flash('message', 'Successfully created Setting!');
            return redirect('admin/settings');
            
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        // get the category
        $setting = Setting::find($id);
        // show the edit form and pass the category
        return view('admin.setting.edit')
            ->with('setting', $setting);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required',
            'code'       => 'required',
            'value'       => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);


        $this->validate($request, [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('admin/settings/create')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            // store
            $setting = Setting::find($id);
            $setting->name       = Input::get('name');
            $setting->code       = Input::get('code');
            $setting->value       = Input::get('value');
            $setting->type = '';
            //get image
            
            $setting->save();

            // redirect
            Session::flash('message', 'Successfully updated setting!');
            return redirect('admin/settings');
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        // delete
        $setting = Setting::find($id);
        $setting->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the setting!');
        return redirect('admin/settings')->with('status', 'Setting Deleted!');
    }
}
