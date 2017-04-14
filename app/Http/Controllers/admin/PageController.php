<?php
namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Page;
use DB, Session, Crypt, Hash;
use App\Category;
use Illuminate\Support\Facades\Input;
use Validator;

class PageController extends Controller
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
     * Lists all articles
     *
     * @param Request $Request
     *  
     * @return Array $artcles
     */
    public function index(Request $request)
    {   

        // Get users articles
        $pages = DB::table('pages')
                    ->paginate(15);

        // Send array of pages to the view
        return view('admin.page.index', [
            'pages' => $pages
        ]);

    }

    public function show()
    {
        // get all the pages
        $pages = DB::table('pages')->paginate(15);

        return $pages;
        exit;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.page.create', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "title" => 'required',
            "content" => 'required'
        ]);

        if ($request->schedule_on == "")
        {
            $schedule_on = null;
        }
        else
        {
            $schedule_on = $request->schedule_on;
        }

        if ($request->start_date == "")
        {
            $start_date = null;
        }
        else
        {
            $start_date = $request->start_date;
        }

        if ($request->end_date == "")
        {
            $end_date = null;
        }
        else
        {
            $end_date = $request->end_date;
        }

        $page = new \App\Page();
        $page->title = $request->title;
        $page->content = $request->content;
        $page->meta_keywords = $request->meta_keywords;
        $page->meta_description = $request->meta_description;
        $page->parent = null;
        $page->schedule_on = $schedule_on;
        $page->start_date = $start_date;
        $page->end_date = $end_date;
        $page->active = $request->active;
        $page->image = '';

        //get image
        $destinationPath = 'uploads';
        $filename = '';

        $file = Input::file('featuredimage');
            
        $rules = array('file' => 'required');
        $validator = Validator::make(array('file' => $file), $rules);

        if ($validator->passes()){
            $filename = $file->getClientOriginalName();
            $file->move($destinationPath, $filename);
        }

        if($filename != '')
            $page->image = $filename;
        else
            $page->image = '';

        $page->save();

        // Set the success message
        $request->session()->flash('alert-success', 'Page has been added!');

        // Redirect to the page listing
        return redirect('/admin/pages');

    }

    /**
     * Edit page
     *
     * @param integer $id [page Id]
     *
     * @return array $page [page details]
     */
    public function edit($id)
    {   

        // Get article details based on the Id
        $page = \App\Page::findORFail($id);

        return view('admin.page.edit')
                    ->with('page',$page);

    }

    /**
     * Updates pages
     *
     * @param int $id [article ID]
     * @param Request $request [All article information]
     *
     * @return Redirects to articles page
     */
    public function update($id, 
                           Request $request)
    {   
        
        // Get article details
        $page = \App\Page::findORFail($id);

        // Validations
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);

        if ($request->schedule_on == "")
        {
            $schedule_on = null;
        }
        else
        {
            $schedule_on = $request->schedule_on;
        }

        if ($request->start_date == "")
        {
            $start_date = null;
        }
        else
        {
            $start_date = $request->start_date;
        }

        if ($request->end_date == "")
        {
            $end_date = null;
        }
        else
        {
            $end_date = $request->end_date;
        }
        
        $page->title = $request->title;
        $page->content = $request->content;
        $page->meta_keywords = $request->meta_keywords;
        $page->meta_description = $request->meta_description;
        $page->parent = null;
        $page->schedule_on = $schedule_on;
        $page->start_date = $start_date;
        $page->end_date = $end_date;
        $page->active = $request->active;
        
        //get image
        $destinationPath = 'uploads';
        $filename = '';
        $file = Input::file('featuredimage');
        
        $rules = array('file' => 'required');
        $validator = Validator::make(array('file' => $file), $rules);

        if ($validator->passes()){
            $filename = $file->getClientOriginalName();
            $file->move($destinationPath, $filename);
        }

        if($file != '')
            $page->image = $filename;
        
        $page->save();

        $request->session()->flash('alert-success', 'Page has been updated!');

        return redirect('/admin/pages');
        
    }

    /**
     * @param Request $request [All article information]
     *
     * @param Article $article [Article Id]
     *
     * @return Redirects to articles page 
     */
    public function destroy(Request $request, 
                            \App\Page $page){

        // Delete page
        $page->delete();

        // Success delete message
        $request->session()->flash('alert-success', 'Page has been deleted!');

        // Redirect to pages page
        return redirect('/admin/pages');

    }
    
}