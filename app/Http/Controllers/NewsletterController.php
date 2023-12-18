<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsletterController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = Newsletter::all();

        return view('news/news',[
            'activeNews'=>'active',
            'news'=>$news
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('news/tambahnews',[
            'activeNews'=>'active',
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'news_image'=>'image',
            'title'=>'required|max:255',
            'content'=>'',
        ]);

        if($request->file('news_image')){
            $validatedData['news_image'] = $request->file('news_image')->store('images',['disk'=>'public']);

        Newsletter::create([
            'news_image'=>$validatedData['news_image'],
            'title'=>$validatedData['title'],
            'content'=>$validatedData['content'],
            'created_at'=>now(),
        ]);

        }else{
            Newsletter::create([
                'title'=>$validatedData['title'],
                'content'=>$validatedData['content'],
                'created_at'=>now(),
            ]);
        }

        return redirect()->route('berita');
    }

    /**
     * Display the specified resource.
     */
    public function show(Newsletter $newsletter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Newsletter $newsletter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Newsletter $newsletter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Newsletter $news2)
    {
        if($news2->news_image){
            if(Storage::disk('public')->exists($news2->news_image)){
                Storage::disk('public')->delete($news2->news_image);
            }

        }

        $news2->delete();

        return redirect()->route('berita');
    }
}
