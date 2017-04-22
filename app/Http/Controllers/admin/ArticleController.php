<?php

namespace App\Http\Controllers\admin;

use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
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
        $articles = DB::table('articles')
                    ->join('categories', 'articles.category_id', '=', 'categories.id')
                    ->join('users', 'articles.user_id', '=', 'users.id')
                    ->select('articles.*', 'categories.name as category_name', 'users.name as fullname')
                    ->paginate(15);

        // Get all categories
        $categories = \App\Category::pluck('name','id');
        
        // Get all tags
        $tags = \App\Tag::pluck('name','id');
        
        foreach ($articles as $article) {
            // Get article details based on the Id
            $item = \App\Article::with('tag')->findORFail($article->id);
            // add tags to the articles
                        
            $selectedtags = array();

            foreach ($item['tag'] as $tag) {
                $selectedtags[] = $tag['name'];
            }
            $article->tags = $selectedtags;

        }

        // $articles = DB::table('articles')->get(); <- just for reference
        // Send array of articles to the view
        return view('admin.article.index', [
            'articles' => $articles,
            'categories' => $categories,
            'tags' => $tags
        ]);

    }

    public function show()
    {
        // get all the categories
        $articles = DB::table('articles')->paginate(15);

        // load the view and pass the categories
        //return view('admin.category.index', ['categories' => $categories]);
        return $articles;
        exit;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // Get all categories
        $categories = \App\Category::pluck('name','id');
        
        // Get all tags
        $tags = \App\Tag::pluck('name','id');

        // $articles = DB::table('articles')->get(); <- just for reference
        // Send array of articles to the view
        return view('admin.article.create', [
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

        //dd($request);
        //dd($request->user());
        // Validate the inputs
        // title and content inputs are required
        $this->validate($request, [
            "title" => 'required',
            "content" => 'required'
        ]);

        // Add the article
        //$user = $request->user();
        // $request->user()->articles adds the user Id in the database
        $article = $request->user()->article()->create([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category,
            'active' => $request->status,
            'meta_keywords' => 'test',
            'image' => ''
        ]);
        
        // Set destination path for the image uploads
        $destinationPath = 'uploads';
            
        // Multiple images input
        $files = \Input::file('image');

        // Upload images
        $id = $article->id;
        $uploaded = $this->uploadImages($files,$id,$article);

        //Upload Tags
        if (sizeof($request->tags) > 0) {
            foreach ($request->tags as $key => $value) {
                $article->tag()->attach($value);
            }
        }

        // Session flash message
        $request->session()->flash('alert-success', 'Article has been updated!');

        // Set the success message
        $request->session()->flash('alert-success', 'Article has been added!');

        // Redirect to the articles page
        return redirect('/admin/articles');

    }

    /**
     * Edit article
     *
     * @param integer $id [article Id]
     *
     * @return array $article [article details]
     */
    public function edit($id)
    {   

        // Get article details based on the Id
        $article = \App\Article::with('tag')->findORFail($id);

        // Get images
        $images = \App\article_images::where('article_id', $id)->get();
        
        // Get all categories
        $categories = \App\Category::pluck('name','id');

        // Get all tags
        $tags = \App\Tag::pluck('name','id');
        
        $selectedtags = array();

        foreach ($article['tag'] as $tag) {
            $selectedtags[] = $tag['id'];
        }
        //dd($article['tag']);
        //Return the article details to the view
        return view('admin.article.edit')
                    ->with('article',$article)
                    ->with('images',$images)
                    ->with('categories',$categories)
                    ->with('tags',$tags)
                    ->with('selectedtags', $selectedtags);

    }

    /**
     * Updates articles
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
        $article = \App\Article::findORFail($id);

        // Validations
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);

        // Request all inputs
        $input = $request->all();

        // Save the input
        //$article->fill($input)->save();
        \App\Article::where('id', $id)
          ->update([
                'title' => $request->title,
                'content' => $request->content,
                'category_id' => $request->category_id,
                'active' => $request->status,
                'meta_keywords' => 'test'
            ]);

        // Multiple images input
        $files = \Input::file('image');
        
        //upload Images
        $uploaded = $this->uploadImages($files,$id,$article);

        //Upload Tags
        $article->tag()->detach();
        if (sizeof($request->tags) > 0) {
            foreach ($request->tags as $key => $value) {
                $article->tag()->attach($value);
            }
        }

        // Session flash message
        $request->session()->flash('alert-success', 'Article has been updated!');

        // Redirect to the articles page
        return redirect('/admin/articles');
        
    }

    /**
     * @param Request $request [All article information]
     *
     * @param Article $article [Article Id]
     *
     * @return Redirects to articles page 
     */
    public function destroy(Request $request, 
                            \App\Article $article){

        // Delete article
        $article->delete();

        // Success delete message
        $request->session()->flash('alert-success', 'Article has been deleted!');

        // Redirect to articles page
        return redirect('/admin/articles');

    }

    /**
     * Upload images to the 'uploads' folder
     * @param Array $files
     * @param Integer $id
     * @return Boolean true/false 
     */
    public function uploadImages($files,
                                 $id,
                                 $article)
    {   

        // Set destination path for the image uploads
        $destinationPath = 'uploads';

        // Images count
        $file_count = sizeof($files);

        // rules for image array input
        //'required|mimes:png,gif,jpeg,txt,pdf,doc'
        $rules = array('file' => 'required'); 
        
        if($file_count > 0){
            # Process all the images array
            foreach($files as $file) {
                
                // Validate image to be only png,gif,jpeg,txt,pdf,doc
                $validator = \Validator::make(array('file'=> $file), $rules);
                
                // Check for validation
                if($validator->passes()){

                    // set filname
                    $filename = $file->getClientOriginalName();

                    // upload the files to the destination folder
                    $upload_success = $file->move($destinationPath, $filename);

                    // Add images
                    $image = new \App\article_images(array(
                        'article_id' => $id,
                        'image' => $filename
                    ));

                    // Perform save query
                    $image = $article->article_images()->save($image);

                    // return success
                    if($image)
                        return true;

                }
            
            }
        }
    }

}
