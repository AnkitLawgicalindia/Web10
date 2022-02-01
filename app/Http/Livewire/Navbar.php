<?php

namespace App\Http\Livewire;
// use App\Models\Product_Category;
use App\Models\Product_Item;
use Livewire\Component;

class Navbar extends Component
{
    public $product_id;
    public function render()
    {
        return view('livewire.navbar')->with([
            'product'=>Product_Item::where('category_id',$this->product_id)->get(),
        ]);
    }
}
