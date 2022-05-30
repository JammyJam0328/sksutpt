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
    public $per_campus="1";
    public $first_choice="";
    public $applications=[];
    public $passers =[];

    public function getPassers()
    {
        $this->passers = Result::where('overall_score','>=','520')->pluck('examinee_id')->toArray();
    }
    public function getApplications()
    {
        $applications = Permit::whereIn('permit_number', $this->passers)
                        ->with(['user.freshmenApplication','user.TransfereeApplication'])->get();
                        return $applications;
    }
    public function mount()
    {
        $this->getPassers();
    }
    public function render()
    {
        $this->applications = $this->getApplications() == null ? [] : $this->getApplications();
        return view('livewire.report-result-dashboard');
    }
    
    public function updatedFirstChoice()
    {
           $this->applications = Permit::whereIn('permit_number', $this->passers)
                                ->whereHas('user.freshmenApplication', function($query) {
                                    $query->where('first_choice','like','%'.$this->first_choice.'%');
                                })
                                ->orWhereHas('user.transfereeApplication', function($query) {
                                    $query->where('program_choice','like','%'.$this->first_choice.'%');
                                })
                        ->with(['user.freshmenApplication','user.TransfereeApplication'])->get();
    }
}