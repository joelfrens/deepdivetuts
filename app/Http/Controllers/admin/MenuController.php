<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Page;
use DB, Session, Crypt, Hash;
use App\Category;
use App\Menu;
use Illuminate\Support\Facades\Input;
use Validator;

class MenuController extends Controller
{   
    /**
     * Articles constructor
     * Invokes Auth middleware
     */
    public function __contruct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Get users articles
        $menus = DB::table('menus')
                    ->paginate(15);

        // Send array of pages to the view
        return view('admin.menu.index', [
            'menus' => $menus
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $parentMenus = Menu::pluck('title','id');
        //dd($parentMenus);
        return view('admin.menu.create', ['parentMenus' => $parentMenus]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'title'       => 'required',
            'link'       => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect('admin/menus/create')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            // store
            $menu = new Menu;
            $menu->title       = Input::get('title');
            $menu->link       = Input::get('link');
            $menu->active       = Input::get('active');
            $menu->parent = Input::get('parent');

            $menu->save();

            // redirect
            Session::flash('message', 'Successfully created Menu!');
            return redirect('admin/menus');
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get all the pages
        $menus = DB::table('menus')->paginate(15);

        return $menus;
        exit;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the category
        $menu = Menu::find($id);

        $parentMenus = Menu::pluck('title','id');
        // show the edit form and pass the category
        return view('admin.menu.edit', ['menu' => $menu, 'parentMenus' => $parentMenus]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'title'       => 'required',
            'link'       => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect('admin/menus/create')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            // store
            $menu = Menu::find($id);
            $menu->title       = Input::get('title');
            $menu->link       = Input::get('link');
            $menu->active       = Input::get('active');
            $menu->parent = Input::get('parent');
            //get image
            
            $menu->save();

            // redirect
            Session::flash('message', 'Successfully updated menu!');
            return redirect('admin/menus');
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete
        $menu = Menu::find($id);
        $menu->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the menu!');
        return redirect('admin/menus')->with('status', 'Menu Deleted!');
    }
}
