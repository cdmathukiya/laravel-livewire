<div class="card">
    <div class="card-body">
        <form>
            <div class="form-group">
                <label for="exampleFormControlInput1">Name:</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Name"
                    wire:model="name">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput2">Address:</label>
                <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="Enter Address"
                    wire:model="address">
                @error('address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput3">mobile:</label>
                <input type="text" class="form-control" id="exampleFormControlInput3" placeholder="Enter mobile"
                    wire:model="mobile">
                @error('mobile')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput4">city:</label>
                <input type="text" class="form-control" id="exampleFormControlInput4" placeholder="Enter city"
                    wire:model="city">
                @error('city')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button wire:click.prevent="store()" class="btn btn-success">Save</button>
        </form>

    </div>
</div>
