<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->simplePaginate(8);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
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
            'title' => 'required|max:30',
            'body' => 'required',
        ]);
        
        
        $postData = [
            'title' => $request->title,
            'body' => $request->body,
        ];

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('/', 's3');
            if ($filePath) {
                $postData['image'] = $filePath;
            } else {
                return back()->withInput()->withErrors(['file' => 'ファイルのアップロードに失敗しました。']);
            }
        }

        $post = Post::create($postData);
        session()->flash('success', '投稿に成功しました。');

        return redirect()->route('posts.index', ['id' => $post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Int $id)
    {
        $request->validate([
            'title' => 'required|max:20',
            'body' => 'required',
        ]);
        
        $post = Post::find($id);

        $postData = [
            'title' => $request->title,
            'body' => $request->body,
        ];

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('/', 's3');
            if ($filePath) {
                $postData['image'] = $filePath;
            } else {
                return back()->withInput()->withErrors(['file' => 'ファイルのアップロードに失敗しました。']);
            }
        }
    
        $post->update($postData);
        session()->flash('success', '投稿内容を変更しました。');

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Int $id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function search(Request $request)
    {
        
        $posts = Post::where('title', 'like', "%{$request->search}%")
                ->orWhere('body', 'like', "%{$request->search}%")
                ->orderBy('created_at', 'desc')
                ->paginate(8);

        $search_result = $request->search.'の検索結果'.$posts->total().'件';

        return view('posts.index', [
            'posts' => $posts,
            'search_result' => $search_result,
            'search_query'  => $request->search
        ]);
    }
}
