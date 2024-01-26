<?php

namespace App\Livewire\Video;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]

class ShowVideo extends Component
{
    public function render()
    {
        return view('livewire.video.show-video');
    }
}
