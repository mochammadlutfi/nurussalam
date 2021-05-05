<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\Slider;
class SliderWidget extends AbstractWidget
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
        $data = Slider::where('is_active', 1)->orderBy('created_at', 'DESC')->get();

        return view('widgets.slider_widget', [
            'config' => $this->config,
            'data' => $data,
        ]);
    }
}
