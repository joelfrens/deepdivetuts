<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Article;
use App\Setting;

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

        // Get the settings 
        $settings = Setting::pluck('value','code');
        
        return view('listing', [
            'articles' => $articles,
            'categories' => $categories,
            'tags' => $tags,
            'menus' => $menus,
            'keyword' => '',
            'settings' => $settings

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
    	return view('single',['article' => $articles, 'menus' => $menus,
            'keyword' => '']);
    }

    public function getArticlesByTag($tag) {
    	$menus = DB::table('menus')
                    ->get();

        echo $tag;
        exit;
    }

    public function getArticlesByCategory($category){
    	$menus = DB::table('menus')
                    ->get();

        // Get articles
    	// Get users articles
        $articles = DB::table('articles')
                    ->join('categories', 'articles.category_id', '=', 'categories.id')
                    ->join('users', 'articles.user_id', '=', 'users.id')
                    ->select('articles.*', 'categories.name as category_name', 'users.name as fullname')
                    ->where('categories.slug', '=', $category)
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
            'menus' => $menus,
            'keyword' => ''
        ]);
    }

    public function getMostViewedArticles() {


    }

    public function searchArticles(Request $request) {
        
        if (!isset($request->keyword)) {
            $keyword = '';
        }
        else {
            $keyword = $request->keyword;
        }

        $menus = DB::table('menus')
                    ->get();

        // Get articles
        // Get users articles
        $articles = DB::table('articles')
                    ->join('categories', 'articles.category_id', '=', 'categories.id')
                    ->join('users', 'articles.user_id', '=', 'users.id')
                    ->select('articles.*', 'categories.name as category_name', 'users.name as fullname')
                    ->where('articles.title', 'like', '%'.$keyword.'%')
                    ->orWhere('articles.content', 'like', '%'.$keyword.'%')
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

        // Get the settings 
        $settings = Setting::pluck('value','code');

        return view('listing', [
            'articles' => $articles,
            'categories' => $categories,
            'tags' => $tags,
            'menus' => $menus,
            'keyword' => $keyword,
            'settings' => $settings
        ]);
    }

    public function getPage($slug) {
        // Get header links
        $menus = DB::table('menus')
                    ->get();

        $page = DB::table('pages')
                    ->where('pages.slug', "=", $slug)
                    ->get();

        // Get the settings 
        $settings = Setting::pluck('value','code');
        
        return view('page',['page' => $page, 'menus' => $menus,
            'keyword' => '', 'settings' => $settings]);
    }

    public function getArchivesByMonth($month) {
    	
    }

    //public function 
}
