<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\Video;
class PopularVideos extends AbstractWidget
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
        $popular = Video::orderBy('views', 'DESC')->limit(6)->get();

        return view('widgets.popular_videos', [
            'config' => $this->config,
            'popular' => $popular,
        ]);
    }
}
