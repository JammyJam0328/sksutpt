<?php

namespace App\Http\Livewire\A;

use Livewire\Component;
use App\Models\Examination;
use App\Models\ExaminationTestCenter;
use App\Models\Grouping;
use App\Models\TestCenter;
use App\Models\FreshmenApplication;
use App\Models\TransfereeApplication;
use Livewire\WithPagination;
use WireUi\Traits\Actions;
class ManageApplications extends Component
{
    // traits
    use WithPagination, Actions;
    public $searchTerm='';
    public $set_id;
    public $optionModal=false;
    public $viewApplicationModal=false;
    public $tab='freshmen';
    public function getApplicationProperty()
    {
        return $this->tab=='freshmen' ? FreshmenApplication::where('id',$this->set_id)->first() : TransfereeApplication::where('id',$this->set_id)->first();
    }
    public function updatedTab()
    {
        $this->set_id='';
    }
    public function render()
    {
    return view('livewire.a.manage-applications',[
        'applications'=>$this->tab=='freshmen' ? FreshmenApplication::where('last_name','like','%'.$this->searchTerm.'%')->orWhere('first_name','like','%'.$this->searchTerm.'%')->whereHas('user',function($query){
            $query->where('applicant_state','!=','pending');
        })->paginate(10) : TransfereeApplication::where('last_name','like','%'.$this->searchTerm.'%')->orWhere('first_name','like','%'.$this->searchTerm.'%')->whereHas('user',function($query){
            $query->where('applicant_state','!=','pending');
        })->paginate(10),
    ])
        ->layout('layouts.admin');
    }

    public function showOption($id)
    {
        $this->set_id=$id;
        $this->optionModal=true;
    }
    public function viewApplication()
    {
        $this->viewApplicationModal=true;
        $this->optionModal=false;

    }
}