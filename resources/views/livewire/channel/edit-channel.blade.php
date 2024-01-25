<div>
    <form wire:submit.prevent="update" enctype="multipart/form-data">
        @if(session()->has('message'))
            <div class="alert alert-success" role="alert">
                {{session('message')}}
            </div>
        @endif
        <div class="form-group">
            <label for="name">Channel Name</label>
            <input wire:model.live.debounce.300ms="name" type="text" class="form-control" id="name" aria-describedby="name" placeholder="Channel Name" >
            @error('name')
            <div class="text-danger mt-2">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group mt-3">
            <label for="slug">Channel Slug</label>
            <input wire:model.live.debounce.300ms="slug" type="text" class="form-control" id="slug" aria-describedby="slug" placeholder="Channel Slug" >
            @error('slug')
            <div class="text-danger mt-2">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group mt-3">
            <label for="description">Channel Name</label>
            <textarea wire:model.live.debounce.300ms="description" class="form-control" id="description" aria-describedby="description" placeholder="Channel Description" rows="5" ></textarea>
            @error('description')
            <div class="text-danger mt-2">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group mt-3">
            <input type="file" class="form-control" wire:model.live="image" />
            @error('image')
            <div class="text-danger mt-2">{{$message}}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</div>
