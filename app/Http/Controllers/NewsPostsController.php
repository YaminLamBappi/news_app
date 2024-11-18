<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Category;
use App\Models\news_posts;
use Illuminate\Http\Request;

class NewsPostsController extends Controller
{
    public function public_index()
    {
        $posts = news_posts::with('category')->where('status', 'Active')->get();
        return view("public", compact("posts"));
    }

    public function index()
    {
        $posts = news_posts::with('category')->get();
        return view("news-list", compact("posts"));
    }

    public function create_view()
    {
        $categories = Categories::all();
        return view("create-post", compact("categories"));
    }

    public function store(Request $request)
    {
        $request->validate([
            "title" => "required",
            "description" => "required",
            "image" => "required|image",
            "category_id" => "required|exists:categories,id",
        ]);

        $post = new news_posts();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->category_id = $request->category_id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $post->image = 'images/' . $imageName;
        }

        $post->save();

        return redirect()->route('dashboard');
    }

    public function view($id)
    {
        $post = news_posts::with('category')->findOrFail($id);
        $post->increment('views');

        return view('view_news', compact('post'));
    }

    public function like($id)
    {
        $post = news_posts::findOrFail($id);
        $post->increment('likes');

        return redirect()->back();
    }

    public function active_post($id)
    {
        $post = news_posts::findOrFail($id);
        $post->status = 'Active';
        $post->save();

        return redirect()->back();
    }

    public function inactive_post($id)
    {
        $post = news_posts::findOrFail($id);
        $post->status = 'Inactive';
        $post->save();

        return redirect()->back();
    }

    public function update_view($id)
    {
        $post = news_posts::findOrFail($id);
        $categories = Categories::all();

        return view('update_post', compact('post', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "title" => "required",
            "description" => "required",
            "category_id" => "required|exists:categories,id",
            "image" => "nullable|image",
        ]);

        $post = news_posts::findOrFail($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->category_id = $request->category_id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $post->image = 'images/' . $imageName;
        }

        $post->save();

        return redirect()->route('all-post');
    }

    public function destroy($id)
    {
        $post = news_posts::findOrFail($id);
        $post->delete();

        return redirect()->route('all-post');
    }
}
