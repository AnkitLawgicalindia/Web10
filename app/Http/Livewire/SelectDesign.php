<?php

namespace App\Http\Livewire;
use App\Models\Designs;
use Livewire\Component;

class SelectDesign extends Component
{
    public $design;
    public $id2;
    public function render()
    {
        return view('livewire.select-design');
    }
    public function select()
    {
        $this->design = $this->id2;
    }
}
