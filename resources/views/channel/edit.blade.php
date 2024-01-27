<x-app-component>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <livewire:channel.edit-channel channel="{{$channel->slug}}"  />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-component>
