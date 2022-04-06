<?php

namespace App\Http\Livewire\A;

use Livewire\Component;
use App\Models\Examination;
use App\Models\ExaminationTestCenter;
use App\Models\Grouping;
use App\Models\TestCenter;
use Livewire\WithPagination;
use WireUi\Traits\Actions;
class ManageExamination extends Component
{
    // traits
    use WithPagination, Actions;
    // controls
    public $searchTerm='';
    public $set_id='';
    public $createExaminationModal=false;
    public $optionModal=false;
    public $editExaminationModal=false;
    public $title='';
    public $date='';
    public $school_year='';

    public $edit_title='';
    public $edit_date='';
    public $edit_school_year='';

    public function getExaminationProperty()
    {
        return Examination::where('id',$this->set_id)->withCount('examinationTestCenters')->first();
    }
    public function mount()
    {
    }
    public function render()
    {
        return view('livewire.a.manage-examination',[
            'examinations'=>Examination::where('title','like','%'.$this->searchTerm.'%')->paginate(10),
        ])
            ->layout('layouts.admin');
    }

    public function showOption($id)
    {
        $this->set_id = $id;
        $this->optionModal = true;
    }

    public function save()
    {
         $this->validate([
            'title'=>'required',
            'date'=>'required',
            'school_year'=>'required',
        ]);
        $this->createExamination();
        $this->notification()->notify([
            'title'=>'Success',
            'description'=>'Examination created successfully',
            'icon'=>'success',
        ]);
        $this->reset([
            'title',
            'date',
            'school_year',
        ]);
        $this->createExaminationModal=false;
    }

    public function createExamination()
    {
        $examination = Examination::create([
            'title'=>$this->title,
            'date'=>$this->date,
            'school_year'=>$this->school_year,
        ]);
        $this->saveTestCenters($examination->id);
    }

    public function saveTestCenters($examination_id)
    {
        // access campus  40 rooms 25 slots each 
        $access_campus = ExaminationTestCenter::create([
            'examination_id'=>$examination_id,
            'test_center_id'=>1,
        ]);
        for($i=1;$i<=40;$i++)
        {
           Grouping::create([
                'examination_test_center_id'=>$access_campus->id,
                'day_time'=>'AM 7:00 - 12:00',
                'room'=>'Room '.$i,
                'slots'=>25,
            ]);
            Grouping::create([
                'examination_test_center_id'=>$access_campus->id,
                'day_time'=>'PM 12:30 - 6:00',
                'room'=>'Room '.$i,
                'slots'=>25,
            ]);
        }
        // isulan campus 20 rooms 25 slots each AM and PM
        $isulan_campus = ExaminationTestCenter::create([
            'examination_id'=>$examination_id,
            'test_center_id'=>2,
        ]);
        for($i=1;$i<=20;$i++)
        {
           Grouping::create([
                'examination_test_center_id'=>$isulan_campus->id,
                'day_time'=>'AM 7:00 - 12:00',
                'room'=>'Room '.$i,
                'slots'=>25,
            ]);
            Grouping::create([
                'examination_test_center_id'=>$isulan_campus->id,
                'day_time'=>'PM 12:30 - 6:00',
                'room'=>'Room '.$i,
                'slots'=>25,
            ]);
        }
        // tacurong campus 20 rooms 25 slots each AM and PM
        $tacurong_campus = ExaminationTestCenter::create([
            'examination_id'=>$examination_id,
            'test_center_id'=>3,
        ]);
        for($i=1;$i<=20;$i++)
        {
           Grouping::create([
                'examination_test_center_id'=>$tacurong_campus->id,
                'day_time'=>'AM 7:00 - 12:00',
                'room'=>'Room '.$i,
                'slots'=>25,
            ]);
            Grouping::create([
                'examination_test_center_id'=>$tacurong_campus->id,
                'day_time'=>'PM 12:30 - 6:00',
                'room'=>'Room '.$i,
                'slots'=>25,
            ]);
        }
        // Bagumbayan campus 9 rooms 25 slots each AM and PM
        $bagumbayan_campus = ExaminationTestCenter::create([
            'examination_id'=>$examination_id,
            'test_center_id'=>4,
        ]);
        for($i=1;$i<=9;$i++)
        {
           Grouping::create([
                'examination_test_center_id'=>$bagumbayan_campus->id,
                'day_time'=>'AM 7:00 - 12:00',
                'room'=>'Room '.$i,
                'slots'=>25,
            ]);
            Grouping::create([
                'examination_test_center_id'=>$bagumbayan_campus->id,
                'day_time'=>'PM 12:30 - 6:00',
                'room'=>'Room '.$i,
                'slots'=>25,
            ]);
        }
        // kalamansig campus 10 rooms 25 slots each AM and PM
        $kalamansig_campus = ExaminationTestCenter::create([
            'examination_id'=>$examination_id,
            'test_center_id'=>5,
        ]);
        for($i=1;$i<=10;$i++)
        {
           Grouping::create([
                'examination_test_center_id'=>$kalamansig_campus->id,
                'day_time'=>'AM 7:00 - 12:00',
                'room'=>'Room '.$i,
                'slots'=>25,
            ]);
            Grouping::create([
                'examination_test_center_id'=>$kalamansig_campus->id,
                'day_time'=>'PM 12:30 - 6:00',
                'room'=>'Room '.$i,
                'slots'=>25,
            ]);
        }
        // palimbang campus 8 rooms 25 slots each AM only
        $palimbang_campus = ExaminationTestCenter::create([
            'examination_id'=>$examination_id,
            'test_center_id'=>6,
        ]);
        for($i=1;$i<=8;$i++)
        {
           Grouping::create([
                'examination_test_center_id'=>$palimbang_campus->id,
                'day_time'=>'AM 7:00 - 12:00',
                'room'=>'Room '.$i,
                'slots'=>25,
            ]);
        }
        // lutayan campus 9 rooms 25 slots each AM only
        $lutayan_campus = ExaminationTestCenter::create([
            'examination_id'=>$examination_id,
            'test_center_id'=>7,
        ]);
        for($i=1;$i<=9;$i++)
        {
           Grouping::create([
                'examination_test_center_id'=>$lutayan_campus->id,
                'day_time'=>'AM 7:00 - 12:00',
                'room'=>'Room '.$i,
                'slots'=>25,
            ]);
        }
    }



    public function edit()
    {
        $this->edit_title=$this->examination->title;
        $this->edit_date=$this->examination->date;
        $this->edit_school_year=$this->examination->school_year;
        $this->optionModal=false;
        $this->editExaminationModal=true;
    }

    public function update()
    {
        $this->validate([
            'edit_title'=>'required',
            'edit_date'=>'required',
            'edit_school_year'=>'required',
        ]);
        $this->examination->update([
            'title'=>$this->edit_title,
            'date'=>$this->edit_date,
            'school_year'=>$this->edit_school_year,
        ]);
        $this->notification()->notify([
            'title'=>'Success',
            'description'=>'Examination updated successfully',
            'icon'=>'success',
        ]);
        $this->editExaminationModal=false;
    }

    public function confirmDelete()
    {
        $this->optionModal=false;
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'You are about to delete this examination',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, delete it',
                'method' => 'delete',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }
    public function delete()
    {
        $this->examination->delete();
        $this->notification()->notify([
            'title'=>'Success',
            'description'=>'Examination deleted successfully',
            'icon'=>'success',
        ]);
    }
    public function open($id)
    {
        $this->set_id=$id;
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'You are about to open this examination',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, open it',
                'method' => 'openExamination',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }
    public function openExamination()
    {
        if ($this->examination->examination_test_centers_count<1) {
            $this->notification()->notify([
                'title'=>'Error',
                'description'=>'Examination has no test centers',
                'icon'=>'error',
            ]);
           
        }else{
           $this->examination->update([
                'isOpen'=>true,
            ]);
            $this->notification()->notify([
                'title'=>'Success',
                'description'=>'Examination opened successfully',
                'icon'=>'success',
            ]);
        }
    }
    public function close($id)
    {
        $this->set_id=$id;
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'You are about to close this examination',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, close it',
                'method' => 'closeExamination',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function closeExamination()
    {
        $this->examination->update([
            'isOpen'=>false,
        ]);
        $this->notification()->notify([
            'title'=>'Success',
            'description'=>'Examination closed successfully',
            'icon'=>'success',
        ]);
    }
}