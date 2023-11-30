<?php

namespace App\Livewire;

use Livewire\Component;

class LikePost extends Component
{

    // VARIABLES ENTRANTES
    public $post;

    // VARIABLES SALIENTES
    public $isLiked;
    public $likes;

    public function mount($post)
    {
        // LO MONTA POR PRIMERA VEZ
        $this->isLiked = $post->checkLike(auth()->user());
        $this->likes = $post->likes->count();
    }

    public function render()
    {
        return view('livewire.like-post');
    }

    public function like()
    {
        if ($this->post->checkLike(auth()->user())) {
            $this->post->likes()->where('post_id', $this->post->id)->delete();
            $this->isLiked = false;
            $this->likes--;
        } else {
            $this->post->likes()->create([
                'user_id' => auth()->user()->id,
                'post_id' => $this->post->id,
            ]);
            $this->isLiked = true;
            $this->likes++;
        }
    }
}
