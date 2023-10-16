<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
class UsersIndex extends Component
{
    use WithPagination;
    public $search = "vs";
    protected $paginationTheme = "bootstrap";
    public function render()
    {

        $users = User::where('name','LIKE', '%' . $this->search . '%')->paginate(4);
        // $users = $data->toArray();
        // $users['links'] = $data->links()->toHtml();
        return view('livewire.admin.users-index',compact('users'));
    }
    // $users = $usersData->items();
    // $users =User::all();
}
