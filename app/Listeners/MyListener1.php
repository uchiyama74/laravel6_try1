<?php

namespace App\Listeners;

use App\Events\MyEvent1;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MyListener1
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  MyEvent1  $event
     * @return void
     */
    public function handle(MyEvent1 $event)
    {
        app('log')->notice("MyListener1 Post[{$event->getPost()->id}].", $event->getPost()->toArray());
    }
}
