<div>
    <form wire:submit.prevent="update" enctype="multipart/form-data">
        @if(session()->has('message'))
            <div class="alert alert-success" role="alert">
                {{session('message')}}
            </div>
        @endif

        @if($channel->image)
            <img src="{{ asset('images' . '/' . $channel->image)}}" style="max-height: 150px" class="mt-2 mb-4" alt="">
        @endif

        <div class="form-group">
            <label for="name">Channel Name</label>
            <input wire:model.live.debounce.300ms="name" type="text" class="form-control" id="name"
                   aria-describedby="name" placeholder="Channel Name">
            @error('name')
            <div class="text-danger mt-2">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group mt-3">
            <label for="slug">Channel Slug</label>
            <input wire:model.live.debounce.300ms="slug" type="text" class="form-control" id="slug"
                   aria-describedby="slug" placeholder="Channel Slug">
            @error('slug')
            <div class="text-danger mt-2">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group mt-3">
            <label for="description">Channel Name</label>
            <textarea wire:model.live.debounce.300ms="description" class="form-control" id="description"
                      aria-describedby="description" placeholder="Channel Description" rows="5"></textarea>
            @error('description')
            <div class="text-danger mt-2">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group mt-3">
            @if(is_string($image))

            @elseif($image)
                <img
                    src="{{ $image->temporaryUrl() }}"
                    class='' style="max-height:100px "
                    alt=''>
            @endif
            <input type="file" class="form-control" wire:model.live.delay="image"/>
            <div wire:loading wire:target="image">Uploading...</div>
            @error('image')

            <div class="text-danger mt-2">{{$message}}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</div>
