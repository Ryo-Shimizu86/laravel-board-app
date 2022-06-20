<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 投稿画面表示
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::with('user')->orderBy('updated_at', 'DESC')->paginate(3);
        // dd($posts);
        return view('post', ['posts' => $posts]);
    }

    /**
     * 投稿保存処理
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        $posts = $request->all();
        $post = new Post();
        $post->message = $posts['postMessage'];
        $post->user_id = \Auth::id();
        $post->save();
        return redirect( route('home') );
    }

    /**
     * 投稿詳細処理
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function detail(Request $request)
    {
        $post = Post::find($request->id);
        return view('detail', ['post' => $post]);
    }
}
