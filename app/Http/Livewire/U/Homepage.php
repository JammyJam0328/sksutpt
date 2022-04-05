<?php

namespace App\Http\Livewire\U;

use Livewire\Component;
use App\Models\Program;
use App\Models\Campus;
use App\Models\Examination;
use App\Models\TransfereeApplication;
use App\Models\FreshmenApplication;
class Homepage extends Component
{
    protected $listeners = ['finalize'=>'$refresh','paymentSubmitted'=>'$refresh','roomSelected'=>'$refresh'];
    public $selected_type;
    public function checkOpenExamination()
    {
        $examination = Examination::where('isOpen',1)->first();
        if($examination)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function render()
    {
        return view('livewire.u.homepage',[
            'applicant_type'=>auth()->user()->applicant_type,
        ])
        ->layout('layouts.user');
    }

    public function setTypeHandler()
    {
        $examination_id=Examination::where('isOpen',1)->first()->id;
        auth()->user()->update([
            'applicant_type'=>$this->selected_type,
        ]);
        if($this->selected_type == 'Transferee')
        {
           TransfereeApplication::create([
                'user_id'=>auth()->user()->id,
                'examination_id'=>$examination_id,
            ]);
        }elseif($this->selected_type == 'Freshmen')
        {
            FreshmenApplication::create([
                'user_id'=>auth()->user()->id,
                'examination_id'=>$examination_id,
            ]);
        }
    }
}