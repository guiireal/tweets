<?php

namespace App\Http\Livewire;

use App\Models\Tweet;
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
        $tweets = Tweet::with('user')->paginate(2);

        return view('livewire.show-tweets', [
            'tweets' => $tweets
        ]);
    }

    public function store()
    {
        $this->validate();

        Tweet::create([
            'content' => $this->content,
            'user_id' => 1
        ]);

        $this->content = '';
    }
}
