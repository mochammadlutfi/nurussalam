<?php

namespace App\Widgets;

use App\Models\Fraksi;
use Arrilot\Widgets\AbstractWidget;

class FraksiWidget extends AbstractWidget
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
        $data = Fraksi::orderBy('nama', 'DESC')->get();
        return view('widgets.fraksi', [
            'config' => $this->config,
            'data' => $data,
        ]);
    }
}
