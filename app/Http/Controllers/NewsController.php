<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return News::all();

        $news = News::with([
            'reactions',
            //'comments'
            'comments.reactions'
        ])->get();
        //dd($news);
        return response()->json($news);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|min:3',
            'content' => 'required|string|min:30',
            'author' => 'required|string|min:3',
            'category_Id' => 'required|exists:categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news_images', 'public');
        } else {
            $imagePath = null; 
        }

        $news = new News();
        $news->title = $request->input('title');
        $news->content = $request->input('content');
        $news->author = $request->input('author');
        $news->category_id = $request->input('category_Id');
        $news->img = $imagePath; 
        $news->save();

        return response()->json([
            'message' => 'Новость успешно добавлена',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {

        return $news;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
