<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination; //paginacion sin recargar pagina
use Spatie\Permission\Models\Role;

class ShowUser extends Component
{
    use WithPagination;
    public $search;
    public $openModal = false;
    public $titleModal = "Crear Usuario";
    public $btnModal = "Crear";

    public $name,$email,$password,$rol,$avatar;
    protected $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        ];
    public function render()
    {
        $users =  User::where('name', 'LIKE', '%' . $this->search . '%')->with('roles:name')->paginate(5);
        $roles = Role::all();
        return view('livewire.admin.users.show-user',compact('users','roles'));
    }

    public function save(){
        $this->validate();
        $this->password= Hash::make($this->password);
        $user = User::create(['name'=>$this->name,'email'=>$this->email,'password'=>$this->password]);
        $user->roles()->attach($this->rol); // Asociar el rol al usuario
        $this->reset(['openModal','name','email','password','rol','avatar']);
        // // emitir
        // $this->dispatch('render')->to(ShowComment::class);

    }
    public function destroyUser(User $user){
        $user->delete();
    }

    public function modalEdit(User $user){
        $this->name=$user->name;
         $this->email=$user->email;
         $this->password=$user->password;
         foreach ($user["roles"] as $rol) {
            $this->rol=$rol->name;
        }


         $this->titleModal = "Editar a" . " " . $user->name;
        $this->btnModal = "Actualizar";
         $this->openModal= true;
    }
    public function abrirModal(){
        $this->reset(['openModal','name','email','password','rol','avatar']);
        $this->openModal = true;
    }

}
