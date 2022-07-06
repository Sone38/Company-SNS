<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Like;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

use function PHPUnit\Framework\isNull;

// 投稿機能


class PostsController extends Controller
{
    public function topIndex() {
        //全ての投稿を取得
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('top-admin.top-admin-main', compact('posts'));
    }

    public function preIndex() {
        //全ての投稿を取得
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('pre-admin.pre-admin-main', compact('posts'));
    }

    public function index() {
        //全ての投稿を取得
        $posts = Post::orderBy('created_at', 'desc')->get();
        $data = [];
        $like_model = new Like;

        $data = [
            'posts' => $posts,
            'like_model' => $like_model,
        ];

        return view('general', $data);
    }

    public function ajaxlike(Request $request) {
        $id = Auth::user()->id;
        $post_id = $request->post_id;
        $like = new Like;
        $post = Post::findOrFail($post_id);

        if($like->alreadyLiked($id, $post_id)) {
            $like = Like::where('post_id', $post_id)->where('user_id', $id)->delete();
        }else {
            $like = new Like;
            $like->post_id = $request->post_id;
            $like->user_id = Auth::user()->id;
            $like->save();
        }

        $postLikesCount = $post->loadCount('likes')->likes_count;

        $json = [
            'postLikesCount' => $postLikesCount,
        ];
        return response()->json($json);
    }

    public function store(Request $request) {
        //バリデーション
        $validator = Validator::make($request->all(), [
            'post_title' => 'required|max:100',
            'post_content' => 'required|max:255',
        ]);

        //バリデーションエラー
        if($validator->fails()) {
            return redirect(route('top-admin-post'))
            ->withInput()
            ->withErrors($validator);
        }

        // 登録処理
        $posts = new Post;
        $posts->post_title = $request->post_title;
        $posts->post_content = $request->post_content;
        $posts->user_id = Auth::id();
        $posts->save();

        return redirect(route('top-admin-main'));
    }

    public function edit($id) {
        $post = Post::find($id);
        
        return view('/top-admin/top-admin-post-edit', compact('post'));
    }

    public function editComplete(Request $request, $id) {
        $edited = Post::find($id);

        //　バリデーション
        $validator = Validator::make($request->all(), [
            'post_title' => 'required|max:100',
            'post_content' => 'required|max:255',
        ]);
        //  バリデーションエラー
        if($validator->fails()) {
            return redirect(route('top-admin-post-edit'))
            ->withInput()
            ->withErrors($validator);
        }

        // 編集内容の登録処理
        $edited->post_title = $request->post_title;
        $edited->post_content = $request->post_content;
        $edited->user_id = Auth::id();
        $edited->save();
        $request->flush();
        
        return redirect(route('top-admin-main'));
    }
}
