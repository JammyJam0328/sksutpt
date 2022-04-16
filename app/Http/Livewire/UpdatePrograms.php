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
use Carbon\Carbon;
class UpdatePrograms extends Component
{
    use WithFileUploads, Actions;
    public $updatefModal = false;
    public $updatetModal= false;
    public $campuses=[];
    public $firstChoicePrograms=[];
    public $secondChoicePrograms=[];
    
    public $first_selected_campus;
    public $second_selected_campus;

    public $first_selected_program;
    public $second_selected_program;

    public $program_choice_campuses=[];
    public $program_choice_programs=[];
    public $program_choice_campus;
    public $program_choice;
    public function mount()
    {
        $this->campuses = Campus::all();
        // $programs = Program::all();
        // $this->program_choice_campuses = $campuses;
        // $this->firstChoiceCampuses = $campuses;
        // $this->secondChoiceCampuses = $campuses;
    }

    public function updatedFirstSelectedCampus()
    {
        $this->firstChoicePrograms = Program::where('campus_id', $this->first_selected_campus)->get();
    }
    public function updatedSecondSelectedCampus()
    {
        $this->secondChoicePrograms = Program::where('campus_id', $this->second_selected_campus)->get();
    }

    public function updatedProgramChoiceCampus()
    {
        $this->program_choice_programs = Program::where('campus_id', $this->program_choice_campus)->get();
    }

    public function getApplicationProperty()
    {
        return auth()->user()->applicant_type == "Freshmen" ? FreshmenApplication::where('user_id', auth()->user()->id)->first() : TransfereeApplication::where('user_id', auth()->user()->id)->first();
    }

    public function render()
    {
        return view('livewire.update-programs');
    }

    public function updateFPrograms()
    {
        $this->validate([
            'first_selected_campus' => 'required',
            'first_selected_program' => 'required',
            'second_selected_campus' => 'required',
            'second_selected_program' => 'required',
        ]);
        $this->application->update([
            'first_choice_campus' => $this->first_selected_campus,
            'first_choice' => $this->first_selected_program,
            'second_choice_campus' => $this->second_selected_campus,
            'second_choice' => $this->second_selected_program,
        ]);
        $this->notification()->notify([
            'title' => 'Success',
            'description' => 'Programs updated successfully. Your permit will be updated shortly.',
            'icon' => 'success',
        ]);
        $this->updatefModal = false;
        $this->emitUp('refresh');
    }

    public function updatedTPrograms()
    {
        $this->validate([
            'program_choice_campus' => 'required',
            'program_choice' => 'required',
        ]);
        $this->application->update([
            'program_choice_campus' => $this->program_choice_campus,
            'program_choice' => $this->program_choice,
        ]);
        $this->notification()->notify([
            'title' => 'Success',
            'description' => 'Programs updated successfully',
            'icon' => 'success',
        ]);
        $this->updatetModal = false;
    }
}