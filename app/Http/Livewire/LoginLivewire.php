<?php

namespace App\Http\Livewire;
use Session;
use App\Models\Customer;
use Livewire\Component;

class LoginLivewire extends Component
{

    public $name;
    public $password;
    public $button;

    
    public function mount()
    {
        session()->flash('name','');
        session()->flash('password','');
    }
    public function render()
    {
        return view('livewire.login-livewire');
        
    }
    public function check1()
    {
        if($this->name == "12345" && $this->password == "12345"){
            session()->forget('name');
            session()->forget('password');
        }elseif($this->name == "12345" && $this->password !== "12345"){
            session()->forget('name');
            session()->flash('password','Undefined Password');
        }else{
            $customer4 = Customer::where('name',$this->name)->get();
            if($customer4->count() !== 0){
                $customer = Customer::where('name',$this->name)->first();
            if($customer->password !== $this->password){
                session()->flash('password','Undefined Password');
            }elseif($customer->name == $this->name && $customer->password == $this->password){
                session()->forget('name');
                session()->forget('password');
            }else{
                session()->flash('password','Undefined Password');
            }
        }else{
            session()->flash('password','Undefined Password');
        }
        }
        
       
    }

    public function check2()
    {
        
        if($this->name == "12345" && $this->password == "12345"){
            session()->forget('name');
            session()->forget('password');
        }elseif($this->name !== "12345" && $this->password == "12345"){
            session()->forget('password');
            session()->flash('name','Undefined Name');
        }else{
            $customer1 = Customer::where('name',$this->name)->get();
            if($customer1->count() !== 0){
            $customer2 = Customer::where('name',$this->name)->first();
            if($customer2->name == $this->name){
            session()->flash('name','Undefined Name');
            }elseif($customer2->name == $this->name && $customer2->password == $this->password){
                session()->forget('name');
                session()->forget('password');
            }else{
                session()->flash('name','Undefined Name');
            }
        }else{
            session()->flash('name','Undefined Name');
        }
        }
    }
}
