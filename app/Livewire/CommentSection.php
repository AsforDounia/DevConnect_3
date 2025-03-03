<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;
use App\Models\Post;

class CommentSection extends Component
{
    public $post;
    public $content = '';
    public $comments;

    protected $rules = [
        'content' => 'required|string|max:500',
    ];


    public function addComment()
    {
        $this->validate();

        Comment::create([
            'content' => $this->content,
            'post_id' => $this->post->id,
            'user_id' => auth()->id(),
        ]);

        $this->content = '';
        $this->comments = $this->post->comments()->latest()->get();
    }

    public function render()
    {
        return view('livewire.comment-section');
    }
}
