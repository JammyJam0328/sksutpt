<?php

namespace App\Http\Livewire\A;

use Livewire\Component;
use App\Models\Examination;
use App\Models\ExaminationTestCenter;
use App\Models\Grouping;
use App\Models\TestCenter;
use Livewire\WithPagination;
use WireUi\Traits\Actions;
class ViewExaminationDetails extends Component
{
    use WithPagination, Actions;
    public $set_id;
    public $addTestCenterModal=false;
    public $testCenters=[];
    public $selectedTestCenters=[];
    public function mount($examination_id)
    {
        $this->set_id = $examination_id;
        $this->testCenters=TestCenter::all();
    }
    public function getExaminationProperty()
    {
        return Examination::where('id',$this->set_id)->with(['examinationTestCenters.testCenter'])->first();
    }
    public function render()
    {
        return view('livewire.a.view-examination-details',[
            'examinationTestCenters'=>ExaminationTestCenter::where('examination_id',$this->set_id)
            ->with(['testCenter'])
                ->get(),
        ])
        ->layout('layouts.admin');
    }

    public function save()
    {
        if(count($this->selectedTestCenters)<1){
            $this->notification()->notify([
                'title'=>'Error',
                'description'=>'Please select at least one test center',
                'icon'=>'error',
            ]);
            return;
        }

        foreach ($this->selectedTestCenters as $testCenter) {
           $examinationTestCenter = ExaminationTestCenter::create([
                'examination_id'=>$this->examination->id,
                'test_center_id'=>$testCenter,
            ]);
            Grouping::create([
                'examination_test_center_id'=>$examinationTestCenter->id,
                'day_time'=>'AM',
                'room'=>'Room A',
            ]);
            Grouping::create([
                'examination_test_center_id'=>$examinationTestCenter->id,
                'day_time'=>'AM',
                'room'=>'Room B',
            ]);
            Grouping::create([
                'examination_test_center_id'=>$examinationTestCenter->id,
                'day_time'=>'PM',
                'room'=>'Room C',
            ]);
            Grouping::create([
                'examination_test_center_id'=>$examinationTestCenter->id,
                'day_time'=>'PM',
                'room'=>'Room D',
            ]);
        }
        $this->selectedTestCenters=[];
        $this->addTestCenterModal = false;
        $this->notification()->notify([
            'title'=>'Success',
            'description'=>'Test centers added successfully',
            'icon'=>'success',
        ]);
    }
}