<?php

namespace App\Http\Livewire\U;

use Livewire\Component;
use App\Models\Program;
use App\Models\Campus;
use App\Models\FreshmenApplication;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;
use App\Models\Payment;
use App\Models\TestCenter;
use App\Models\Grouping;
use App\Models\Examination;
use App\Models\ExaminationTestCenter;

use App\Models\Proof;
use App\Models\Permit;
class SelectRoom extends Component
{
    use WithFileUploads, Actions;
    public $testCenters=[];
    public $examination_id;
    public $selected_day_time;
    public $selected_test_center;
    public $current_room;
    public function mount()
    {
        $this->examination_id=Examination::where('isOpen',1)->first()->id;
        $this->testCenters = ExaminationTestCenter::where('examination_id',$this->examination_id)->with('testCenter')->get();
    }
    public function getGroupingProperty()
    {
        return Grouping::where('examination_test_center_id',$this->selected_test_center)
                        ->where('occupied_slots','<=',25)
                        ->where('day_time',$this->selected_day_time)
                        ->first();
    }
  
    public function render()
    {
        return view('livewire.u.select-room');
    }

    public function save()
    {
        $this->validate([
            'selected_day_time'=>'required',
            'selected_test_center'=>'required',
        ]);
        $this->grouping->update([
            'occupied_slots'=>$this->grouping->occupied_slots+1,
        ]);
        auth()->user()->update([
            'applicant_state'=>'release-permit',
        ]);
        $permit_id = Permit::latest()->first() ? Permit::latest()->first()->permit_number + 1 : 111110;
        Permit::create([
            'user_id'=>auth()->user()->id,
            'grouping_id'=>$this->grouping->id,
            'test_center_id'=>$this->grouping->examinationTestCenter->test_center_id,
            'examination_id'=>$this->grouping->examinationTestCenter->examination_id,
            'permit_number'=> $permit_id,
            'examination_date'=>$this->grouping->examinationTestCenter->examination->date,
            'examination_day_time'=>$this->grouping->day_time,
            'examination_room'=>$this->grouping->room,
            'chair_number'=>$this->grouping->occupied_slots,
        ]);
        $this->notification()->notify([
            'title'=>'Success',
            'description'=>'You have successfully selected your room',
            'icon'=>'success',
        ]);
        $this->emitUp('roomSelected');
    }

}