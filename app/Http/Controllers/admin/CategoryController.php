<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Validator;
use DB, Session, Crypt, Hash;
use Illuminate\Support\Facades\Input;


class CategoryController extends Controller
{   

    /**
     * CategoryController constructor.
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
        // get all the categories
        $categories = DB::table('categories')->paginate(15);

        // load the view and pass the categories
        return view('admin.category.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'name'       => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);


        $this->validate($request, [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('admin/categories/create')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            // store
            $category = new Category;
            $category->name       = Input::get('name');
            $category->visible       = Input::get('visible');
            $category->desc       = Input::get('desc');

            //get image
            $destinationPath = 'uploads';
            $filename = '';

            $file = Input::file('categoryimage');
            
            $rules = array('file' => 'required');
            $validator = Validator::make(array('file' => $file), $rules);

            if ($validator->passes()){

                $filename = $file->getClientOriginalName();

                $file->move($destinationPath, $filename);

            }

            if($filename != '')
                $category->category_image = $filename;
            else
                $category->category_image = '';

            $category->save();

            // redirect
            Session::flash('message', 'Successfully created Category!');
            return redirect('admin/categories');
            
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
        $category = Category::find($id);
        // show the edit form and pass the category
        return view('admin.category.edit')
            ->with('category', $category);
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
        );
        $validator = Validator::make(Input::all(), $rules);


        $this->validate($request, [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('admin/categories/create')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            // store
            $category = Category::find($id);
            $category->name       = Input::get('name');
            $category->visible       = Input::get('visible');
            $category->desc       = Input::get('desc');
            $category->save();

            // redirect
            Session::flash('message', 'Successfully updated category!');
            return redirect('admin/categories');
            
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
        $category = Category::find($id);
        $category->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the category!');
        return redirect('admin/categories')->with('status', 'Category Deleted!');
    }
}
