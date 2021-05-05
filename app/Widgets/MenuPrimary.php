<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\Fraksi;
class MenuPrimary extends AbstractWidget
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

        $fraksi = Fraksi::orderBy('nama', 'DESC')->get();
        return view('widgets.menu_primary', [
            'config' => $this->config,
            'fraksi' => $fraksi
        ]);
    }
}
