<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\Post;
class RecentPosts extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //

        $posts = Post::where('status', 1)->orderby('created_at')->paginate(2);

        return view('widgets.recent_posts_grid', [
            'config' => $this->config,
            'posts' => $posts
        ]);
    }
}
