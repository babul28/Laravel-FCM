<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UpdateFcmToken extends Component
{
    public $fcm_token;

    public function mount()
    {
        $this->fcm_token = Auth::user()->fcm_token;
    }

    public function updateFcmToken()
    {
        $this->validate([
            'fcm_token' => 'required|string'
        ]);

        Auth::user()->update([
            'fcm_token' => $this->fcm_token
        ]);

        session()->flash('message', 'Successfully updated FCM Token');
    }

    public function render()
    {
        return view('livewire.update-fcm-token');
    }
}
