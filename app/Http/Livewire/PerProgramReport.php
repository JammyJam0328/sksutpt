<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\{Program,Result,Permit,Payment,FreshmenApplication,TransfereeApplication};
class PerProgramReport extends Component
{
    public $selected_program="";
    public $programs=[];
    public $passers=[];
    public $examinee_ids=[];

    public function mount()
    {
        $this->passers = Result::where('overall_score','>=','520')->get();
        $this->examinee_ids = $this->passers->pluck('examinee_id')->toArray();
        $this->programs = Program::all();
    }
    public function render()
    {
        return view('livewire.per-program-report',[
            'permits' => Permit::whereIn('permit_number', $this->examinee_ids)
                            ->whereHas('user.freshmenApplication', function($query) {
                                $query->where('first_choice',$this->selected_program);
                            })->orWhereHas('user.transfereeApplication', function($query) {
                                $query->where('program_choice',$this->selected_program);
                            })
                            ->with(['user.freshmenApplication','user.TransfereeApplication'])->get(),
        ]);
    }

    public function getScore($examinee_id)
    {
        // map the passers and return where the examinee_id matches
        foreach($this->passers as $passer){
            if ($passer->examinee_id == $examinee_id){
                return $passer->overall_score;
            }
        }
    }
}
