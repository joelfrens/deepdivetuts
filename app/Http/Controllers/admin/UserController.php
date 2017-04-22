<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Page;
use DB, Session, Crypt, Hash;
use App\Category;
use App\Setting;
use App\User;
use Illuminate\Support\Facades\Input;
use Validator;


class UserController extends Controller
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
        $users = DB::table('users')->paginate(15);
        // load the view and pass the settings
        return view('admin.user.index', ['users' => $users]);
    }

    public function show()
    {
        // get all the settings
        $users = DB::table('users')->paginate(15);

        // load the view and pass the settings
        //return view('admin.category.index', ['settings' => $settings]);
        return $users;
        exit;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.user.create');
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
            'name'       => 'required|max:255',
            'email'       => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        );
        $validator = Validator::make(Input::all(), $rules);


        $this->validate($request, [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('admin/users/create')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            // store
            $user = new User;
            $user->name = Input::get('name');
            $user->email = Input::get('email');
            $user->password = bcrypt(Input::get('password'));
            $user->status = Input::get('status');
            $user->type = '';

            $user->save();

            // redirect
            Session::flash('message', 'Successfully created User!');
            return redirect('admin/users');
            
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
        $user = User::find($id);
        // show the edit form and pass the category
        return view('admin.user.edit')
            ->with('user', $user);
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
            'name'       => 'required|max:255',
            'email'       => 'required|email|max:255'
        );
        $validator = Validator::make(Input::all(), $rules);
		
		$this->validate($request, [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('admin/users/create')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            // store
            $user = User::find($id);
            $user->name = Input::get('name');
            $user->email = Input::get('email');
            if (Input::get('password') != ""){
            	$user->password = bcrypt(Input::get('password'));
            }
            
            $user->status = Input::get('status');
            //get image
            
            $user->save();

            // redirect
            Session::flash('message', 'Successfully updated User!');
            return redirect('admin/users');
            
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
        $user = Setting::find($id);
        $user->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the user!');
        return redirect('admin/users')->with('status', 'User Deleted!');
    }
}
