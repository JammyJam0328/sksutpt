<?php

namespace App\Http\Livewire\Result;

use Livewire\Component;
use App\Models\Program;
use App\Models\Campus;
use App\Models\FreshmenApplication;
use App\Models\TransfereeApplication;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;
use App\Models\Payment;
use App\Models\Permit;
use App\Models\Result;
class Report extends Component
{
    public $per_campus="";
    public $first_choice="";
    public $applications=[];
    public $passers =[];
    public $passers_examinee_ids=[];
    public function mount()
    {
        $this->passers = Result::where('overall_score','>=','520')->get();
        $this->passers_examinee_ids = $this->passers->pluck('examinee_id')->toArray();
        $this->applications = Permit::whereIn('permit_number', $this->passers_examinee_ids)
                        ->with(['user.freshmenApplication','user.TransfereeApplication'])->get();
    }
    public function render()
    {
        return view('livewire.result.report');
    }

    public function getScore($examinee_id)
    {
        foreach($this->passers as $passer){
            if ($passer->examinee_id == $examinee_id){
                 return $passer->overall_score;
            }
        }
    }

    public function getCountByCampus($campus_id)
    {
        $count = 0;
        foreach ($this->applications as $application) {
            if ($application->user->applicant_type == 'Freshmen'){
                $freshmen_application = $application->user->freshmenApplication;
                if ($freshmen_application->first_choice_campus == $campus_id){
                    $count++;
                }
            }else{
                $transferee_application = $application->user->transfereeApplication;
                if ($transferee_application->program_choice_campus == $campus_id){
                    $count++;
                }
            }
        }

        return $count;
    }
}