<?php

namespace App\Http\Livewire;
use App\Models\Customer_product;
use App\Models\Delivery_address;
use Livewire\Component;

class CustomerProduct extends Component
{
    public $id2;
    public function render()
    {
        return view('livewire.customer-product')->with([
            'delivery'=>delivery_address::where('id',$this->id2)->first(),
        ]);
    }
}
