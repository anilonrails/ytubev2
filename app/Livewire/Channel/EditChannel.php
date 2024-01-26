<?php

namespace App\Livewire\Channel;

use App\Models\Channel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditChannel extends Component
{

    use WithFileUploads;

    use AuthorizesRequests;

    public $name;
    public $description;
    public $image;
    public $slug;

    public $channel;

    public function mount(Channel $channel)
    {
        $this->channel = $channel;
        $this->name = $channel->name;
        $this->description = $channel->description;
        $this->image = $channel->image;
        $this->slug = $channel->slug;
    }

    public function rules()
    {
        return [
            "name"=>"required|min:1|max:100|unique:channels,name,".$this->channel->id,
            "slug"=>"required|min:1|max:100|unique:channels,slug,".$this->channel->id,
            "image"=>"nullable|image",
            "description"=>"nullable|min:2",
        ];
    }

    public function update()
    {
        $this->authorize('edit', $this->channel);

       $validated = $this->validate();
       $this->channel->update($validated);
       session()->flash('message','Channel Updated');
    }
    public function render()
    {
        return view('livewire.channel.edit-channel');
    }
}
