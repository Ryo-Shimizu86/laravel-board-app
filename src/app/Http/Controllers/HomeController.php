<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Exception;
use Log;


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
        $posts = Post::with('user')->orderBy('updated_at', 'DESC')->paginate(12);
        return view('post', ['posts' => $posts]);
    }

    /**
     * 投稿保存処理
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(StorePostRequest $request)
    {
        $posts = $request->all();

        try {
            $post = new Post();
            $post->message = $posts['postMessage'];
            $post->user_id = \Auth::id();
            $post->save();
            return redirect( route('home') );
        } catch (Exception $e) {
            Log::error($e);
            return redirect()->route('home')
                ->withErrors(['error' => '投稿メッセージの保存に失敗しました。']);
        }
    }

    /**
     * 投稿詳細表示
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function detail(Request $request)
    {
        $post = Post::find($request->id);
        return view('detail', ['post' => $post]);
    }

    /**
     * 投稿更新
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request)
    {
        $postId = $request->id;
        Post::where('id', $postId)->update(['message' => $request->postMessage]);
        $post = Post::where('id', $postId)->first();
        return view('detail', ['post' => $post]);
    }

    /**
     * 投稿削除
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function delete(Request $request)
    {
        try {
            $postId = $request->id;
            Post::find($postId)->delete();
            return redirect()->route('home');
        } catch (Exception $e) {
            Log::error($e);
            return redirect()->route('detail', ['id' => $postId])
                ->withErrors(['error' => '投稿メッセージの削除に失敗しました。']);
        }
    }
}
