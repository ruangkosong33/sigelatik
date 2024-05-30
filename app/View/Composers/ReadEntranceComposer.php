<?php

namespace App\View\Composers;

use App\Models\Entrance;
use App\Models\Notification;
use Illuminate\View\View;

class ReadEntranceComposer
{
    public function compose(View $view): void
    {
        // $read_sum = Entrance::where('read', 0)->get()->count();
        $read_reg = Notification::where('type', 'register')->where('read', 0)->get()->count();
        $read_ticket = Notification::where('type', 'ticket')->where('read', 0)->get()->count();
        $read_comment = Notification::where('type', 'comment')->where('read', 0)->get()->count();
        $view->with(['read_reg' => $read_reg, 'read_ticket' => $read_ticket, 'read_comment' => $read_comment]);
    }
}
