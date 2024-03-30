<!-- resources/views/livewire/student/edit.blade.php -->
<div>
    <div class="container mt-3">
        <div class="card">
            <div class="card-header">
                <h1>Edit</h1>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="update">
                    <input type="hidden" wire:model="student_id">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" wire:model="name">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" wire:model="email">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                    <button wire:click="resetInputFields" class="btn btn-secondary mt-3">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
