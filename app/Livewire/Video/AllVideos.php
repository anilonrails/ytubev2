<?php

namespace App\Livewire\Video;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.app-component')]

class AllVideos extends Component
{
    public function render()
    {
        return view('livewire.video.all-videos');
    }
}
