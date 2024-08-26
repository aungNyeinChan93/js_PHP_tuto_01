<?php

namespace App\Http\Livewire;

use Livewire\Component;

class App extends Component


{
    public $message= "red";
    public function render()
    {
        return view('livewire.app');
    }

    public function change(){
        if($this->message =="red"){
            $this->message= "green";
        }else{
            $this->message= "red";
        }
    }
}
