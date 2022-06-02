<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admins');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('news.index', ['news' => News::orderBy('id', 'desc')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        if ($request->notification) {
            Http::withHeaders([
                'Authorization' => 'Basic ' . env("ONESIGNAL_APP_KEY")
            ])->post('https://onesignal.com/api/v1/notifications', [
                'app_id' => env("ONESIGNAL_APP_ID"),
                'included_segments' =>  ["Subscribed Users"],
                'headings' => ["en" => $request->title],
                'contents' => ["en" => strip_tags($request->content)],
            ]);
        }

        News::create(['title' => $request->title, 'content' => $request->content]);

        return redirect()->route('news.index')
            ->with('success', "L'actualité a été crée");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('news.edit', ['news' => $news]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $news->update(['title' => $request->title, 'content' => $request->content]);

        return redirect()->route('news.index')
            ->with('success', "L'actualité a été modifiée");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('news.index')
            ->with('success', "L'actualité a été supprimée");
    }
}
