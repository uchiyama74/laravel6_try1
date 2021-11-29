<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Redis as RedisFacade;

class Try1Job implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // app('log')->notice('This is the Try1Job.handle.');

        RedisFacade::throttle('try1JobtTrottle')->block(0)->allow(1)->every(60)->then(
            function () {
            app('log')->notice('This is the Try1Job.handle.');
            },
            function () {
            app('log')->error('Try1Job can not obtain the lock.');
            return $this->release(60);
        });
    }
}
