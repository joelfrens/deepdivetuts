<?php

namespace App\Http\Controllers\admin;

use DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;

class TagController extends Controller
{
    /**
     * Categories constructor
     * Invokes Auth middleware
     */
    public function __contruct()
    {
        $this->middleware('auth');
    }

    /**
     * Lists all tags
     *
     * @param Request $request
     *
     * @return Array $tags
     */
    public function index(Request $request)
    {   

        // Get tags
        $tags = DB::table('tags')->paginate(5); 
        
        // Send array of tags to the view
        return view('admin.tag.index', [
            'tags' => $tags,
        ]);

    }

    /**
     * Add the Tag in the database
     *
     * @param Request $request
     *
     * @return Array $tags
     */
    public function add(Request $request)
    {

        // Validate the inputs
        // title and content inputs are required
        $this->validate($request, [
            "name" => 'required'
        ]);

        // Save the Tag
        $tag = new \App\Tag;
        $tag->name = $request->name;
        $tag->status = 1;
        $tag->save();
        
        // Set the success message
        $request->session()->flash('alert-success', 'Tag has been added!');

        // Redirect to the tags page
        return redirect('/admin/tags');

    }

    /**
     * Edit Tag
     * @param integer $id [Tag Id]
     *
     * @return array $Tag [Tag details]
     */
    public function edit($id)
    {   

        // Get Tag details based on the Id
        $tag = \App\Tag::findORFail($id);

        //Return the Tag details to the view
        return view('admin.tag.edit')->with('tag',$tag);

    }

    /**
     * Updates Tags
     * @param int $id [Tag ID]
     * @param Request $request [All Tag information]
     *
     * @return Redirects to tags page
     */
    public function update($id, 
                           Request $request)
    {   
        
        // Get Tag details
        $tag = \App\Tag::findORFail($id);

        // Validations
        $this->validate($request, [
            'name' => 'required'
        ]);

        // Request all inputs
        $input = $request->all();

        // Update the record
        $tag->fill($input)->save();

        // Session flash message
        $request->session()->flash('alert-success', 'Tag has been updated!');

        // Redirect to the tags page
        return redirect('/admin/tags');
        
    }

    /**
     * @param Request $request [All Tag information]
     * @param Tag $Tag [Tag Id]
     *
     * @return Redirects to tags page 
     */
    public function destroy($id){

        // Delete Tag
        // delete
        $tag = \App\Tag::find($id);
        $tag->delete();

        // Success delete message
        Session::flash('message', 'Successfully deleted the tag!');

        // Redirect to tags page
        return redirect('/admin/tags');

    }

}