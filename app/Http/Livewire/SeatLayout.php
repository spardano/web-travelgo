<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SeatLayout extends Component
{
    public $numRows = 1;
    public $numColumns = 1;
    public $displayMap = false;

    public function render()
    {
        return view('livewire.seat-layout');
    }

    public function generateSeatMap()
    {
        $this->displayMap = true;
    }
}
