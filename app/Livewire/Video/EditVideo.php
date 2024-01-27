<?php

namespace App\Livewire\Video;

use App\Models\Channel;
use App\Models\Video;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.app-component')]

class EditVideo extends Component
{
    public Video $video;
    public Channel $channel;

    public function mount(Channel $channel, Video $video)
    {
        $this->channel = $channel;
        $this->video = $video;
    }
    public function render()
    {
        return view('livewire.video.edit-video');
    }
}
