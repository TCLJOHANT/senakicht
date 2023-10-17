<?php

namespace App\Livewire\Admin;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateComment extends Component
{
    public $open = false;
    public $description, $ranting;
    public $rules = ['description'=>'required|max:100','ranting'=>'required'];
    public function save(){
        $this->validate();
        Comment::create(['description'=>$this->description,'ranting'=>$this->ranting,'user_id'=>Auth::user()->id]);
        $this->reset(['open','description','ranting']);
        // emitir
        $this->dispatch('render')->to(ShowComment::class);

    }
    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }
    public function render()
    {
        return view('livewire.admin.create-comment');
    }
}
