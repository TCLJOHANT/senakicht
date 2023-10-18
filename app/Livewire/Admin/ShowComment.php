<?php

namespace App\Livewire\Admin;

use App\Models\Comment;
use Livewire\Component;
use Livewire\WithPagination;
class ShowComment extends Component
{
    use WithPagination;
    public $search;
    public $ordenar = "description";
    public $direction = "desc";
    protected $paginationTheme = "bootstrap";

    // public function delete(Comment $comment){
    //     $comment->delete();
    //     $this->dispatch('render')->to(ShowComment::class);
    // }
    protected $listeners = ['render'=>'render'];
    public function render()
    {
      //->orderBy($this->ordenar,$this->direction)
        $comments = Comment::where('description', 'LIKE', '%' . $this->search . '%')->get();
        return view('livewire.admin.show-comments',compact('comments'));
    }
    public function order($ordenar){
        if($this->ordenar == $ordenar){
            if($this->direction == 'desc'){
                $this->direction == 'asc';
            }else{
                $this->direction == 'desc';
            }
        }else{
            $this->ordenar = $ordenar;
            $this->direction == 'asc';
        }
    }
    // $users = $data->toArray();
    // $users['links'] = $data->links()->toHtml();
    // $users = $usersData->items();
    // $users =User::all();
}
