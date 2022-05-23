<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Result;
use App\Models\Permit;
class ReleaseResult extends Component
{
    public $examinee_id="";
    public $print_verified=false;
    public $name='';
    public function mount()
    {
        $this->examinee_id = auth()->user()->permit->permit_number;
    }
    public function render()
    {
        return view('livewire.release-result',[
            'result' => Result::where('examinee_id', $this->examinee_id)->first(),
        ]);
    }
    public function getInterpretation($score)
    {
            if($score >= "200" && $score <= "325"){
                return "Low";
            }elseif($score >="326" && $score <= "425"){
                return "Below Average";
            }elseif($score >="426" && $score <= "475"){
                return "Low Average";
            }elseif($score >="476" && $score <= "525"){
                return "Middle Average";
            }elseif($score >="526" && $score <= "575"){
                return "High Average";
            }elseif($score >="576" && $score <= "675"){
                return "Above Average";
            }elseif($score >="676" && $score <= "800"){
                return "Outstanding";
            }
    }

    public function print()
    {
        $this->print_verified=true;
        $this->dispatchBrowserEvent('start-printing');
    }
}