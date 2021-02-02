<?php

namespace App\Http\Livewire;

use App\Notifications\PostCreatedNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class FireNotification extends Component
{
    public function fireNotification()
    {
        Notification::send(Auth::user(), new PostCreatedNotification());
    }

    public function render()
    {
        return view('livewire.fire-notification');
    }
}
