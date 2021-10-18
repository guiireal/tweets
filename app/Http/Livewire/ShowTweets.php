<?php

namespace App\Http\Livewire;

use App\Models\Tweet;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ShowTweets extends Component
{
    use WithPagination;

    public $content = 'Apenas um teste';

    protected $rules = [
        'content' => 'required|min:3|max:255',
    ];

    public function render()
    {
        $tweets = Tweet::with('user')->latest()->paginate(3);

        return view('livewire.show-tweets', [
            'tweets' => $tweets
        ]);
    }

    public function store()
    {
        $this->validate();

        /** @var User $user */
        $user = auth()->user();

        $user->tweets()->create([
            'content' => $this->content,
        ]);

        $this->content = '';
    }

    public function like(Tweet $tweet)
    {
        $tweet->likes()->create([
            'user_id' => auth()->id(),
        ]);
    }

    public function deslike(Tweet $tweet)
    {
        $tweet->likes()->delete();
    }
}
