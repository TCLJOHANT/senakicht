<?php

namespace App\Livewire\App\Components\Shared\Card;

use Livewire\Component;

class CardComment extends Component
{
    public $comment,$openModalDetailComment=false;

    public function mount($comment)
    {
        $this->comment = $comment;
    }
    public function render()
    {
        return view('livewire.app.components.shared.card.card-comment');
    }
}
