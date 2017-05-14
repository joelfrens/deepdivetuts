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

    	$articles = DB::table('articles')
                    ->join('categories', 'articles.category_id', '=', 'categories.id')
                    ->join('users', 'articles.user_id', '=', 'users.id')
                    ->select('articles.*', 'categories.name as category_name', 'users.name as fullname')
                    ->where('articles.active', "=", 1)
                    ->paginate(15);

        $menus = $this->getMenus();
        $categories = $this->getCategories();
        $tags = $this->getTags();
        $settings = $this->getSettings();
        
        $articles = $this->attachTagsToArticles($articles);

        return view('themes.default.listing', [
            'articles' => $articles,
            'categories' => $categories,
            'tags' => $tags,
            'menus' => $menus,
            'keyword' => '',
            'settings' => $settings
        ]);
    }

    public function show($slug){

    	$articles = DB::table('articles')
                    ->join('categories', 'articles.category_id', '=', 'categories.id')
                    ->join('users', 'articles.user_id', '=', 'users.id')
                    ->select('articles.*', 'categories.name as category_name', 'users.name as fullname')
                    ->where('articles.slug', "=", $slug)
                    ->get();
    	
        $menus = $this->getMenus();
        $categories = $this->getCategories();
        $tags = $this->getTags();
        $settings = $this->getSettings();
        
        $articles = $this->attachTagsToArticles($articles);

        return view('themes.default.single-right',[
            'article' => $articles, 
            'menus' => $menus,
            'categories' => $categories,
            'tags' => $tags,
            'keyword' => '',
            'settings' => $settings
        ]);
    }

    public function getArticlesByCategory($category){
    	
        $articles = DB::table('articles')
                    ->join('categories', 'articles.category_id', '=', 'categories.id')
                    ->join('users', 'articles.user_id', '=', 'users.id')
                    ->select('articles.*', 'categories.name as category_name', 'users.name as fullname')
                    ->where('categories.slug', '=', $category)
                    ->paginate(15);

        $menus = $this->getMenus();
        $categories = $this->getCategories();
        $tags = $this->getTags();
        $settings = $this->getSettings();
        
        $articles = $this->attachTagsToArticles($articles);

        return view('themes.default.listing', [
            'articles' => $articles,
            'categories' => $categories,
            'tags' => $tags,
            'menus' => $menus,
            'keyword' => '',
            'settings' => $settings
        ]);
    }

    public function searchArticles(Request $request) {
        
        if (!isset($request->keyword)) {
            $keyword = '';
        }
        else {
            $keyword = $request->keyword;
        }

        $articles = DB::table('articles')
                    ->join('categories', 'articles.category_id', '=', 'categories.id')
                    ->join('users', 'articles.user_id', '=', 'users.id')
                    ->select('articles.*', 'categories.name as category_name', 'users.name as fullname')
                    ->where('articles.title', 'like', '%'.$keyword.'%')
                    ->orWhere('articles.content', 'like', '%'.$keyword.'%')
                    ->paginate(15);

        $menus = $this->getMenus();
        $categories = $this->getCategories();
        $tags = $this->getTags();
        $settings = $this->getSettings();

        $articles = $this->attachTagsToArticles($articles);

        return view('themes.default.listing', [
            'articles' => $articles,
            'categories' => $categories,
            'tags' => $tags,
            'menus' => $menus,
            'keyword' => $keyword,
            'settings' => $settings
        ]);
    }

    public function getPage($slug) {
        $menus = DB::table('menus')
                    ->get();

        $page = DB::table('pages')
                    ->where('pages.slug', "=", $slug)
                    ->get();

        $tags = $this->getTags();
        $settings = Setting::pluck('value','code');
        $categories = $this->getCategories();
        
        return view('themes.default.page',[
            'page' => $page, 
            'menus' => $menus,
            'tags' => $tags,
            'keyword' => '', 
            'settings' => $settings,
            'categories' => $categories,
        ]);
    }

    public function getMenus() {
        $menus = DB::table('menus')
                    ->get();
        return $menus;
    }

    public function getSettings() {
        $settings = Setting::pluck('value','code');
        
        return $settings;        
    }

    public function getTags() {
        $tags = DB::table('tags')
                    ->get();
        
        return $tags;
    }

    public function getCategories() {
        $categories = DB::table('categories')
                    ->get();

        return $categories;
    }

    public function attachTagsToArticles($articles) {

        foreach ($articles as $article) {
            
            $item = \App\Article::with('tag')->findORFail($article->id);
                        
            $selectedtags = array();

            foreach ($item['tag'] as $tag) {
                $selectedtags[$tag['slug']] = $tag['name'];
            }
            $article->tags = $selectedtags;

        }

        return $articles;
    }

    public function getArticlesByTag($tag) {
        $articles = DB::table('articles')
                    ->join('categories', 'articles.category_id', '=', 'categories.id')
                    ->join('users', 'articles.user_id', '=', 'users.id')
                    ->join('article_tag', 'article_tag.article_id', '=', 'articles.id')
                    ->join('tags', 'article_tag.tag_id', '=', 'tags.id')
                    ->select('articles.*', 'categories.name as category_name', 'users.name as fullname')
                    ->where('tags.slug', '=', $tag)
                    ->paginate(15);

        $menus = $this->getMenus();
        $categories = $this->getCategories();
        $tags = $this->getTags();
        $settings = $this->getSettings();
        
        $articles = $this->attachTagsToArticles($articles);

        return view('themes.default.listing', [
            'articles' => $articles,
            'categories' => $categories,
            'tags' => $tags,
            'menus' => $menus,
            'keyword' => '',
            'settings' => $settings
        ]);
    }

    /* TO DO */
    public function getArchivesByMonth($month) {
        
    }

    /* TO DO */
    public function getMostViewedArticles() {

    }
    
}
