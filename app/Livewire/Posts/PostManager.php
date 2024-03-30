<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use App\Models\Post;

class PostManager extends Component
{
    public $posts, $title, $body, $postId;
    public $isOpen = false;
    public $updateMode = false;

    public function render()
    {
        $this->posts = Post::all();
        return view('livewire.posts.post-manager');
    }
    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }
    public function openModal()
    {
        $this->isOpen = true;
    }
    public function closeModal()
    {
        $this->resetInputFields();
        $this->isOpen = false;
    }
    public function store()
    {
        $validatedData = $this->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
        Post::updateOrCreate(
            ['id' => $this->postId],
            [
                'title' => $this->title,
                'body' => $this->body,
            ],
        );
        // Post::create($validatedData);
        session()->flash('message', $this->postId ? 'Post updated successfully.' : 'Post created successfully.');

        $this->closeModal();
        $this->resetInputFields();
        return $this->redirect('/post-manager');
    }
    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->postId = $id;
        $this->title = $post->title;
        $this->body = $post->body;
        $this->updateMode = true;
        $this->openModal();
    }

    public function delete($id)
    {
        Post::find($id)->delete();
        session()->flash('message', 'Post deleted successfully.');
    }
    private function resetInputFields()
    {
        $this->title = '';
        $this->body = '';
        $this->postId = null;
        $this->updateMode = false;
    }
}
