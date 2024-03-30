<div>
    <div class="col-md-12 mb-2">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

    @if($updateMode)
        @include('livewire.update')
    @else
        @include('livewire.create')
    @endif
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Mobile</th>
                                <th>City</th>
                                <th width="150px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>{{ $customer->id }}</td>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->address }}</td>
                                    <td>{{ $customer->mobile }}</td>
                                    <td>{{ $customer->city }}</td>
                                    <td>
                                        <button wire:click="edit({{ $customer->id }})"
                                            class="btn btn-primary btn-sm">Edit</button>
                                        <button wire:click="deleteCustomer({{ $customer->id }})"
                                            class="btn btn-danger btn-sm">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
