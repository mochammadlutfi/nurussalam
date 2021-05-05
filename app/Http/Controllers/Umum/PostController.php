<?php

namespace App\Http\Controllers\Umum;

use App\Models\Post;
use App\Models\Visitor;
use App\Models\PostKategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 1)->orderby('created_at')->paginate(6);
        // dd($posts);
        return view('umum.post.index', compact('posts'));
    }

    public function detail($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $post->increment('views', 1);
        $post->save();
        $kategori = PostKategori::latest()->get();

        $tracker                 = new Visitor();
        $tracker->page_type      = 2;
        $tracker->slug           = $slug;
        $tracker->url            = \Request::url();
        $tracker->source_url     = \url()->previous();
        $tracker->ip             = \Request()->ip();
        $tracker->agent_browser  = UserAgentBrowser(\Request()->header('User-Agent'));
        $tracker->save();
        
        return view('umum.post.detail', compact('post', 'kategori'));
    }
}
