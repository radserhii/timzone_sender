<?php

namespace App\Services;


use App\Campaign;
use App\Subscriber;
use Carbon\Carbon;

class PushSendService
{
    private $campaigns;
    private $subscribers;

    public function __construct()
    {
        $this->campaigns = Campaign::all();
        $this->subscribers = Subscriber::all();
    }

    public function pushSend()
    {
        foreach ($this->subscribers as $subscriber) {
            foreach ($this->campaigns as $campaign) {
                $subscriberTime = $this->roundTime(Carbon::now($subscriber->timezone))->format('H:i');
                if($subscriberTime == $campaign->time) {
                    echo "Campaign name: " . $campaign->name . " Time: " . $campaign->time . "\n";
                    echo "Send push to:" . "\n";
                    echo "Subscriber: " . $subscriber->name . " Subscriber zones time: " .  Carbon::now($subscriber->timezone) . "\n";
                }
            }
        }
    }

    /**
     * @param \DateTime $datetime
     * @param int $precision - round up to minutes
     * @return \DateTime
     */
    private function roundTime(\DateTime $datetime, $precision = 10)
    {
        $ts = $datetime->getTimestamp();
        $s = ($precision * 60);
        $remainder = $ts % $s;
        if ($remainder > 0) {
            $datetime->setTimestamp($ts + $s - $remainder);
        }
        return $datetime;
    }
}