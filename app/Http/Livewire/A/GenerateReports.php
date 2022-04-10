<?php

namespace App\Http\Livewire\A;

use Livewire\Component;
use App\Models\Examination;
use App\Models\ExaminationTestCenter;
use App\Models\Grouping;
use App\Models\TestCenter;
use App\Models\Payment;
use App\Models\Permit;
use App\Models\FreshmenApplication;
use App\Models\TransfereeApplication;
use Notification;
use App\Notifications\SendEmailNotification;
use Livewire\WithPagination;
use WireUi\Traits\Actions;
class GenerateReports extends Component
{
    use WithPagination, Actions;
    public $testCenter;
    public $examination;
    public $groupings=[];
    public $selected_grouping;
    public $permits=[];
    
    public function mount()
    {
        $this->examination = Examination::where('isOpen',1)->with('examinationTestCenters.testCenter')->first();
    }
    public function render()
    {
        return view('livewire.a.generate-reports')
        ->layout('layouts.report-layout');
    }

    public function updatedTestCenter()
    {
        $this->groupings = Grouping::where('examination_test_center_id',$this->testCenter)->get();
    }
    public function getGroupingProperty()
    {
        return Grouping::where('id',$this->selected_grouping)->with('examinationTestCenter.testCenter')->first();
    }
    public function updatedSelectedGrouping()
    {
        $this->permits = Permit::where('grouping_id',$this->selected_grouping)
                                ->with('user.freshmenApplication')
                                ->with('user.transfereeApplication')
                                ->get();
    }
}