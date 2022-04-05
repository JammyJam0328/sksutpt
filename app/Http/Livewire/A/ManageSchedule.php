<?php

namespace App\Http\Livewire\A;

use Livewire\Component;

use App\Models\Schedule;
use App\Models\Portal;
use App\Models\TestCenter;
use App\Models\ScheduleTestCenter;
use App\Models\ScheduleTestCenterGroup;

use WireUi\Traits\Actions;
use Livewire\WithPagination;
class ManageSchedule extends Component
{
    // traits
    use WithPagination, Actions;
    // end traits
    
    // controls
    public $createScheduleModal=false;
    public $actionModal=false;
    public $editScheduleModal=false;
    public $scheduleDetailsModal=false;
    public $searchTerm='';
    public $set_id;

    // end controls

    // data
    public $testCenters=[];
    // 
    public $schedule_date;
    public $selectedTestCenters=[];
    // end data

    // props
    public $portalId;
    // end props
    public function mount($portal_id)
    {
        $this->portalId = $portal_id;
        $this->testCenters = TestCenter::all();
    }
    public function getScheduleProperty()
    {
        return Schedule::where('id',$this->set_id)->with(['scheduleTestCenters.scheduleTestCenterGroups'])->first();
    }
    public function render()
    {
        return view('livewire.a.manage-schedule',[
            'schedules'=>Schedule::where('portal_id',$this->portalId)->withCount('ScheduleTestCenters')->paginate(10),
        ])
        ->layout('layouts.admin');
    }
    public function showOption($id)
    {
        $this->set_id = $id;
        $this->actionModal = true;
    }

    public function createSchedule()
    {
        
        $this->validate([
            'schedule_date'=>'required|date',
        ]);
        if(count($this->selectedTestCenters)<1){
            $this->notification()->notify([
                'title'=>'Error!',
                'description'=>'Please select at least one test center',
                'icon'=>'error',
            ]);
            return;
        }

       $schedule = Schedule::create([
            'portal_id'=>$this->portalId,
            'date'=>$this->schedule_date,
        ]);
        foreach($this->selectedTestCenters as $testCenter){
            $scheduleTestCenterAm = ScheduleTestCenter::create([
                'schedule_id'=>$schedule->id,
                'test_center_id'=>$testCenter,
                'day_time'=>'AM',
                'capacity'=>'50',
            ]);
            ScheduleTestCenterGroup::create([
                'schedule_test_center_id'=>$scheduleTestCenterAm->id,
                'name'=>'Group 1',
            ]);
            ScheduleTestCenterGroup::create([
                'schedule_test_center_id'=>$scheduleTestCenterAm->id,
                'name'=>'Group 2',
            ]);

            $scheduleTestCenterPm = ScheduleTestCenter::create([
                'schedule_id'=>$schedule->id,
                'test_center_id'=>$testCenter,
                'day_time'=>'PM',
                'capacity'=>'50',
            ]);
            ScheduleTestCenterGroup::create([
                'schedule_test_center_id'=>$scheduleTestCenterPm->id,
                'name'=>'Group 3',
            ]);
            ScheduleTestCenterGroup::create([
                'schedule_test_center_id'=>$scheduleTestCenterPm->id,
                'name'=>'Group 4',
            ]);

        }
        $this->notification()->notify([
            'title'=>'Success!',
            'description'=>'Schedule created successfully',
            'icon'=>'success',
        ]);
        $this->createScheduleModal = false;
        $this->selectedTestCenters = [];
        $this->schedule_date = '';

    }

    public function viewDetails()
    {
        $this->actionModal = false;
        $this->scheduleDetailsModal = true;
    }
}