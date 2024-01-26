<?php

namespace App\Livewire\Channel;

use App\Models\Channel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Intervention\Image\Encoders\MediaTypeEncoder;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManager;

class EditChannel extends Component
{

    use WithFileUploads;

    use AuthorizesRequests;

    public $name;
    public $description;
    public $image;
    public $dbImage;
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
            "name" => "required|min:1|max:100|unique:channels,name," . $this->channel->id,
            "slug" => "required|min:1|max:100|unique:channels,slug," . $this->channel->id,
            "image" => "nullable|image",
            "description" => "nullable|min:2",
        ];
    }

    public function update(): void
    {
        $this->authorize('edit', $this->channel);

        $this->validate();

        if ($this->image) {
            $image = $this->image->storeAs('images', $this->channel->uuid . '.png');

            $image = ImageManager::gd()->read($image);
            $image->resize(600,600)->encode(new MediaTypeEncoder('png'));


            $this->channel->update([
                'name' => $this->name,
                'slug' => $this->slug,
                'description' => $this->description,
                'image' => $image
            ]);
        } else {
            $this->channel->update([
                'name' => $this->name,
                'slug' => $this->slug,
                'description' => $this->description,
            ]);
        }

        session()->flash('message', 'Channel Updated');
    }

    public function render()
    {
        return view('livewire.channel.edit-channel');
    }
}
