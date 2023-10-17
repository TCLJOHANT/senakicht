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
    public function render()
    {
      
        $comments = Comment::where('description', 'LIKE', '%' . $this->search . '%')->orderBy($this->ordenar,$this->direction)->get();
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
