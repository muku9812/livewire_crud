<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
public $count=1;
public function Add(){
$this->count++;
}

public function substract(){
    $this->count--;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
