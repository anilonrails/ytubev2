<?php

namespace App\Livewire\Video;

use App\Models\Channel;
use App\Models\Video;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.app')]
class CreateVideo extends Component
{

    use WithFileUploads;
    public Channel $channel;

    public Video $video;

    #[Rule('required|mimes:mp4')]
    public $videoFile;

    public function mount(Channel $channel)
    {
        $this->channel = $channel;
    }
    public function render()
    {
        return view('livewire.video.create-video');
    }

    public function fileCompleted()
    {
        $this->validate();
        $this->video = $this->channel->videos()->create([
            'title'=>'untitled',
            'description'=>'none',
            'uuid'=>uniqid(true),
        ]);

        $channel = $this->channel;
        $video = $this->video;
        return redirect()->route('video.edit', ['channel'=>$channel, 'video'=>$video] );
    }

    public function uploadFile()
    {
        $this->validate();
    }
}
