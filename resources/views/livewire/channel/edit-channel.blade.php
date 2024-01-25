<div>
    <form wire:submit.prevent="submit">
    <input type="text" wire:model.live="name">
    The Master doesn't talk, he acts. -- {{$name}}
        <button>Submit</button>
    </form>
</div>
