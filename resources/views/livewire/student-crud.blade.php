<!-- resources/views/livewire/student-crud.blade.php -->
<div>
    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    @if (!$updateMode)
        @include('livewire.student.create')
    @else
        @include('livewire.student.edit')
    @endif
    <div class="container">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h1>Student Crud </h1>
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>
                                        <button wire:click="edit({{ $student->id }})"
                                            class="btn btn-primary btn-sm">Edit</button>
                                        <button wire:click="delete({{ $student->id }})"
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
