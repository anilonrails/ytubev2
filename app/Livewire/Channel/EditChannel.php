<?php

namespace App\Livewire\Channel;

use Livewire\Component;

class EditChannel extends Component
{

    public $name = 'Xiou Chaeng';

    public function submit()
    {
        dd("Form submitted successfully.");
    }
    public function render()
    {
        return view('livewire.channel.edit-channel');
    }
}
