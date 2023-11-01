<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination; //paginacion sin recargar pagina
use Spatie\Permission\Models\Role;

class ShowUser extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $search;
    public $openModal = false;
    public $titleModal = "Crear Usuario";
    public $btnModal = "Crear";

    public $name,$email,$password,$rol,$avatar,$userId;
    protected $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'rol' => 'required'
        ];
    public function render()
    {
        $users =  User::where('name', 'LIKE', '%' . $this->search . '%')->with('roles:name')->paginate(5);
        $roles = Role::all();
        return view('livewire.admin.users.show-user',compact('users','roles'));
    }

    public function save(){
        $this->validate();
        $this->avatar = $this->avatar->store('profile-photos');
        $this->password= Hash::make($this->password);
        $user = User::create(['name'=>$this->name,'email'=>$this->email,'password'=>$this->password,'profile_photo_path'=>$this->avatar]);
        
        if($this->btnModal=="Crear"){ 
            User::create($user); 
        }else{ 
            User::findOrFail($this->userId)->update($user);
        }
        
        $rol = Role::where('name', $this->rol)->first(); // Obtener el rol por nombre
        if ($rol) {
            $user->roles()->attach($rol->id); // Asociar el ID del rol al usuario
            $this->reset(['openModal','name','email','password','rol','avatar','userId']); 
        }

    }
    public function destroyUser(User $user){
        $user->delete();
    }

    public function modalEdit(User $user){
        $this->userId = $user->id;
        $this->name=$user->name;
         $this->email=$user->email;
         $this->password=$user->password;
         $this->avatar = $user->profile_photo_url;
         foreach ($user["roles"] as $rol) {
            $this->rol =$rol->name;
        }
         $this->titleModal = "Editar a" . " " . $user->name;
        $this->btnModal = "Actualizar";
         $this->openModal= true;
    }
    public function abrirModal(){
        $this->reset(['openModal','name','email','password','rol','avatar']);
        $this->openModal = true;
    }
    //reiniciar paginacion si se cambia la variable search
    public function updatingSearch(){
        $this->resetPage();
    }
  

}
