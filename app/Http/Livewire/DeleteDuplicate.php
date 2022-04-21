<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Permit;
use WireUi\Traits\Actions;

class DeleteDuplicate extends Component
{
    use Actions;
    public $permit_number='';
    public $permit;
    public function render()
    {
        return view('livewire.delete-duplicate',[
            'permits'=>Permit::where('permit_number',$this->permit_number)->with('user.freshmenApplication')
                                ->with('user.transfereeApplication')->get()
        ]);
    }

    public function deletePermit($id)
    {
        $permit = Permit::where('id',$id)->first();
         $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Are you sure you want to delete this permit?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, I am sure',
                'method' => 'approveDelete',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function approveDelete()
    {
        $this->permit->delete();
        $this->notification()->notify([
            'title'=>'Success',
            'description'=>'Permit Deleted',
            'icon'=>'success',
        ]);
        $this->permit_number='';
    }
}