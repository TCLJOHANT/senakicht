<?php

namespace App\Livewire\App;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use JeroenNoten\LaravelAdminLte\View\Components\Tool\Modal;
use Livewire\Component;

class ProfileEdit extends Component
{
    public $openModalUserEdit = false;
    public $avatar;
    public $name,$phone,$location,$email,$gender,$descripcion,$userId;
    public function mount(){
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->telefono;
        $this->gender = $user->gender;
        $this->descripcion = $user->descripcion;
        $this->location = $user->ubicacion;
        $this->userId =$user->id;
        $this->avatar = $user->profile_photo_url;
    }
    public function render()
    {
        return view('livewire.app.profile-edit');
    }
    public function openModal(){
        $this->openModalUserEdit = true;
    }
    public function updateUser(){
        $userData = [
            'name' => $this->name,
            'email' => $this->email,
            'telefono' => $this->phone,
            'descripcion' => $this->descripcion,
            'ubicacion' => $this->location,
            'gender' => $this->gender,

        ];
        $userEdit =User::find($this->userId);
        $userEdit->update($userData);
        $this->reset('openModalUserEdit','name','descripcion','gender','email','phone','location');
    }
    
}
