<?php

namespace App\Widgets;

use App\Models\Post;
use Arrilot\Widgets\AbstractWidget;

class PopularPosts extends AbstractWidget
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

        $popular = Post::where('status', 1)->orderBy('views', 'DESC')->limit(4)->get();


        return view('widgets.popular_posts', [
            'config' => $this->config,
            'popular' => $popular,
        ]);
    }
}
