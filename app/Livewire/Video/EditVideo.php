<?php

namespace App\Livewire\Video;

use App\Models\Channel;
use App\Models\Video;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]

class EditVideo extends Component
{
    public Video $video;
    public Channel $channel;
    public function render()
    {
        return view('livewire.video.edit-video');
    }
}
