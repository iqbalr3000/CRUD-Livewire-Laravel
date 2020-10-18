<form>
    <div class="form-group">
        <label for="exampleFormControlInput1">Name :</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Name" wire:model="name" autocomplete="off">
        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Study Group :</label>
        <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="Enter Study Group" wire:model="study_group">
        @error('study_group') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <button wire:click.prevent="store()" class="btn btn-success">Save</button>
</form>