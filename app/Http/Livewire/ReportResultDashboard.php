<?php

namespace App\Http\Livewire;

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


class ReportResultDashboard extends Component
{
    public $per_campus="";
    public $first_choice="";
    public $applications=[];
    public $passers =[];
    
    public function getApplications()
    {
        $applications = Permit::whereIn('permit_number', $this->passers)
                        ->with(['user.freshmenApplication','user.TransfereeApplication'])->get();
                        return $applications;
    }
    public $passersScores=[];


    public function getScore($examinee_id)
    {
        foreach($this->passersScores as $passer){
            if ($passer->examinee_id == $examinee_id){
                 return $passer->overall_score;
            }
        }
    }


    public function mount()
    {
        $this->passersScores = Result::where('overall_score','>=','520')->get();
        $this->passers = $this->passersScores->pluck('examinee_id')->toArray();
    }
    public function render()
    {
        if ($this->per_campus == "") {
            $this->applications = $this->getApplications();
        }else{
            if ($this->first_choice == "") {
                $this->applications = Permit::whereIn('permit_number', $this->passers)
                                ->whereHas('user.freshmenApplication', function($query) {
                                    $query->where('first_choice_campus',$this->per_campus);
                                })
                                ->orWhereHas('user.transfereeApplication', function($query) {
                                    $query->where('program_choice_campus',$this->per_campus);
                                })
                        ->with(['user.freshmenApplication','user.transfereeApplication'])->get();
            }else{
                $this->applications = Permit::whereIn('permit_number', $this->passers)
                                ->whereHas('user.freshmenApplication', function($query) {
                                    $query->where('first_choice','like','%'.$this->first_choice.'%');
                                })
                                ->orWhereHas('user.transfereeApplication', function($query) {
                                    $query->where('program_choice','like','%'.$this->first_choice.'%');
                                })
                        ->with(['user.freshmenApplication','user.transfereeApplication'])->get();
            }
          
        }
       
        return view('livewire.report-result-dashboard');
    }

    public function updatedPerCampus()
    {
      $this->first_choice = "";
    }
}