<?php

namespace App\Console\Commands;

use App\Campaign;
use App\Services\PushSendService;
use App\Subscriber;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SendPush extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'push:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send push notification';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        (new PushSendService())->pushSend();
    }
}
