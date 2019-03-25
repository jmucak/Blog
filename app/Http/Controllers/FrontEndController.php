<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Category;
use App\Post;

class FrontEndController extends Controller
{
    public function index() {

        $page_title = Setting::first()->site_name;
        $settings = Setting::first();
        $categories = Category::take(5)->get(); // take(4) znači prva 4 retka, get() zbog buildera
        $first_post = Post::orderBy('created_at', 'desc')->first();
        $second_post = Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first();
        $third_post = Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first();
        $laravel = Category::find(1);
        $laravel_posts = $laravel->posts()->orderBy('created_at', 'desc')->take(3)->get();
        $wordpress = Category::find(2);
        $wordpress_posts = $wordpress->posts()->orderBy('created_at', 'desc')->take(3)->get();

        return view('index')->with('page_title', $page_title)->with('categories', $categories)->with('first_post', $first_post)->with('second_post', $second_post)->with('third_post', $third_post)->with('laravel', $laravel)->with('wordpress', $wordpress)->with('laravel_posts', $laravel_posts)->with('wordpress_posts', $wordpress_posts)->with('settings', $settings);
    }

    public function singlePost($slug) {

        $post = Post::where('slug', $slug)->first();
        $categories = Category::take(5)->get();
        $settings = Setting::first();
        $page_title = Setting::first()->site_name;

        return view('single')->with('post', $post)->with('title', $post->title)->with('categories', $categories)->with('settings', $settings)->with('page_title', $page_title);
    }
}
