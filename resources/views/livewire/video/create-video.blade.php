
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <form enctype="multipart/form-data">
                        <div x-data="{ uploading: false, progress: 0 }"
                             x-on:livewire-upload-start="uploading = true"
                             x-on:livewire-upload-finish="uploading = false, $wire.fileCompleted()"
                             x-on:livewire-upload-cancel="uploading = false"
                             x-on:livewire-upload-error="uploading = false"
                             x-on:livewire-upload-progress="progress = $event.detail.progress" class="mb-3">
                            <div x-show="uploading" class="progress mt-2 mb-4" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                <div max="100" x-bind:value="progress" class="progress-bar progress-bar-striped progress-bar-animated" x-bind:style="{ width: progress + '%' }"></div>
                            </div>
                            <label for="exampleInputEmail1" class="form-label">Video File</label>
                            <input type="file" class="form-control" id="exampleInputEmail1" wire:model="videoFile" >
                        </div>
                        @error('videoFile')
                        <div class="mb-4 text-center text-danger">{{$message}}</div>
                        @enderror
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
