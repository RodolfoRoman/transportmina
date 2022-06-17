<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Costcenter;
use App\Models\SubCostcenter;

class SelectComponent extends Component
{
    public $costcenter, $subCostcenter;
    public $costcenters = [], $subCostcenters = [];

    public function mount(){
        $this->costcenters = Costcenter::All();
        $this->subCostcenters = collect();
    }

    public function updatedCostcenter($value){
        $this->subCostcenters = SubCostcenter::where('costcenter_id',$value)->get();
        $this->subCostcenter = $this->subCostcenters->first()->id ?? null;
    }

    public function render()
    {
        return view('livewire.select-component');
    }
}
