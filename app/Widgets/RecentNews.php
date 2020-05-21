<?php

namespace App\Widgets;
use App\Summary;
use Arrilot\Widgets\AbstractWidget;

class RecentNews extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = ['count'=>5];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $test = 123124123;

        return view('widgets.recent_news', [
            'config' => $this->config,
            'test'=>$test
        ]);
    }
}
