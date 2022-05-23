<?php

namespace App\Http\Livewire\A;

use Livewire\Component;
use App\Models\Portal;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
class ManagePortals extends Component
{
    // traits
    use WithPagination, Actions;
    // end traits
    // controls
    public $createPortalModal=false;
    public $actionModal=false;
    public $editPortalModal=false;
    public $manageSchedulesModal=false;
    public $searchTerm='';
    // end controls
    // data
    public $schoolYears=[
        '2021-2022',
        '2022-2023',
        '2023-2024',
        '2024-2025',
        '2025-2026',
    ];
    public $set_id;
    public $title;
    public $school_year;
    public $edit_title;
    public $edit_school_year;
    // end data
    // custom validation property
    protected $validationProperties=[
        'edit_title'=>'title',
        'edit_school_year'=>'school_year',
    ];
    // end custom validation property

    // computed
    public function getPortalProperty()
    {
        return Portal::where('id',$this->set_id)->first();
    }
    public function render()
    {
        return view('livewire.a.manage-portals',[
            'portals'=>Portal::where('title','like','%'.$this->searchTerm.'%')->paginate(10),
        ])
        ->layout('layouts.admin');
    }

    public function create()
    {
        $this->validate([
            'title'=>'required',
            'school_year'=>'required',
        ]);
        Portal::create([
            'title'=>$this->title,
            'school_year'=>$this->school_year,
        ]);
        $this->reset([
            'title',
            'school_year',
            'createPortalModal',
        ]);

        $this->notification([
            'title'=>'Success!',
            'description'=>'Portal created successfully',
            'icon'=>'success'
        ]);
        
    }

    public function showOption($id)
    {
        $this->set_id=$id;
        $this->actionModal=true;
    }
    public function edit()
    {
        $this->edit_title=$this->portal->title;
        $this->edit_school_year=$this->portal->school_year;
        $this->actionModal=false;
        $this->editPortalModal=true;
    }
    public function update()
    {
        $this->validate([
            'edit_title'=>'required',
            'edit_school_year'=>'required',
        ]);
        $this->portal->update([
            'title'=>$this->edit_title,
            'school_year'=>$this->edit_school_year,
        ]);

        $this->reset([
            'edit_title',
            'edit_school_year',
            'editPortalModal',
        ]);
        $this->notification([
            'title'=>'Success!',
            'description'=>'Portal updated successfully',
            'icon'=>'success'
        ]);
    }

    public function deleteConfirmation()
    {
        $this->actionModal=false;
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Are you sure you want to delete this portal?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, delete it',
                'method' => 'deletePortal',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function deletePortal()
    {
        $this->portal->delete();

        $this->notification([
            'title'=>'Success!',
            'description'=>'Portal deleted successfully',
            'icon'=>'success'
        ]);
    }

    public function manageSchedules()
    {
        $this->actionModal=false;
        $this->manageSchedulesModal=true;
    }
    
   
}