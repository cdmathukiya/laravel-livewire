<!-- resources\views\livewire\posts\post-manager.blade.php -->
@extends('layouts.app')

@section('content')
    <div>
        <div class="col-md-12 mb-2">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <!-- Button to Open Modal -->
            <button wire:click="create" type="button" class="btn btn-info btn-lg" data-toggle="modal"
                data-target="#postModal">Create New Post</button>

            <!-- Modal -->
            <div wire:ignore.self class="modal" id="postModal" tabindex="-1" role="dialog"
                aria-labelledby="postModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="postModalLabel">Post Details</h5>
                            <button type="button" class="close btn btn-default" data-dismiss="modal"
                                aria-label="Close" wire:click="closeModal">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Form for Creating/Updating Posts -->
                            <form wire:submit.prevent="store">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" wire:model="title">
                                    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="body">Body</label>
                                    <textarea class="form-control" id="body" rows="3" wire:model="body"></textarea>
                                    @error('body') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- List of Posts -->
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Body</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->body }}</td>
                                        <td>
                                            <button wire:click="edit({{ $post->id }})" class="btn btn-primary">Edit</button>
                                            <button wire:click="delete({{ $post->id }})" class="btn btn-danger">Delete</button>
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
@endsection
