<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Article;

class FrontController extends Controller
{
    public function index()
    {	

    	// Get header links
    	$menus = DB::table('menus')
                    ->get();

    	// Get articles
    	// Get users articles
        $articles = DB::table('articles')
                    ->join('categories', 'articles.category_id', '=', 'categories.id')
                    ->join('users', 'articles.user_id', '=', 'users.id')
                    ->select('articles.*', 'categories.name as category_name', 'users.name as fullname')
                    ->paginate(10);

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

        return view('listing', [
            'articles' => $articles,
            'categories' => $categories,
            'tags' => $tags,
            'menus' => $menus
        ]);

    	
    }

    public function show($slug){

    	// Get header links
    	$menus = DB::table('menus')
                    ->get();

        $articles = DB::table('articles')
                    ->join('categories', 'articles.category_id', '=', 'categories.id')
                    ->select('articles.*', 'categories.name as category_name')
                    ->where('articles.slug', "=", $slug)
                    ->get();
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
    	return view('single',['article' => $articles, 'menus' => $menus]);
    }
}
