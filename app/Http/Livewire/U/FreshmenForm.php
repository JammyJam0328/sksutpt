<?php

namespace App\Http\Livewire\U;

use Livewire\Component;
use App\Models\Program;
use App\Models\Campus;
use App\Models\FreshmenApplication;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;
use App\Models\Payment;
use Carbon\Carbon;
class FreshmenForm extends Component
{
    use WithFileUploads, Actions;
    public $campuses=[];
    public $first_choice_campus;
    public $second_choice_campus;
    public $firstChoicePrograms=[];
    public $secondChoicePrograms=[];

    public $first_choice;
    public $second_choice;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $extension;
    public $date_of_birth;
    public $age;
    public $place_of_birth;
    public $present_address;
    public $permanent_address;
    public $province;
    public $contact_number;
    public $nationality;
    public $civil_status;
    public $tribe;
    public $religion;
    public $school_last_attended;
    public $school_last_attended_address;
    public $track_and_strand_taken;
    public $school_year_graduated;
    public $honor_or_awards_received;
    public $photo;
    public $copy_of_gpa;
    public $principal_certification_or_school_id;
    public $sex;
    // provinces of the philippines
    public $provinces = [        
    'Ilocos Norte',
    'Ilocos Sur',
    'La Union',
    'Pangasinan',
    'Batanes',
    'Cagayan',
    'Isabela',
    'Nueva Vizcaya',
    'Quirino',
    'Aurora',
    'Bataan',
    'Bulacan',
    'Pampanga',
    'Tarlac',
    'Zambales',
    'Nueva Ecija',
    'Cavite',
    'Laguna',
    'Batangas',
    'Rizal',
    'Quezon',
    'Occidental Mindoro',
    'Oriental Mindoro',
    'Marinduque',
    'Romblon',
    'Palawan',
    'Camarines Norte',
    'Camarines Sur',
    'Catanduanes',
    'Masbate',
    'Sorsogon',
    'Albay',
    'Aklan',
    'Antique',
    'Guimaras',
    'Capiz',
    'Iloilo',
    'Bohol',
    'Cebu',
    'Siquijor',
    'Negros Oriental',
    'Negros Occidental',
    'Biliran',
    'Leyte',
    'Northern Samar',
    'Samar',
    'Southern Leyte',
    'Eastern Samar',
    'Zamboanga Del Norte',
    'Zamboanga del Sur',
    'Zamboanga Sibugay',
    'Camiguin',
    'Bukidnon',
    'Lanao Del Norte',
    'Misamis Oriental',
    'Misamis Occidental',
    'Compostela Valley',
    'Davao del Norte',
    'Davao del Sur',
    'Davao Oriental',
    'Davao Occidental',
    'South Cotabato',
    'Cotabato',
    'Sultan Kudarat',
    'Sarangani',
    'Agusan del Norte',
    'Agusan del Sur',
    'Surigao del Norte',
    'Surigao del Sur',
    'Dinagat Islands',
    'Apayao',
    'Abra',
    'Benguet',
    'Ifugao',
    'Kalinga',
    'Mountain Province',
    'Basilan',
    'Lanao del Sur',
    'Maguindanao',
    'Sulu',
    'Tawi-Tawi'
    ];
    protected $validationAttributes=[
        'copy_of_gpa'=>'Scanned copy of SHS first semester report card',
        'photo'=>'Actual photo'
    ];
    public function updatedFirstChoiceCampus()
    {
         $this->freshmenApplication->update([
            'first_choice_campus'=>$this->first_choice_campus,
        ]);
        $this->firstChoicePrograms=Program::where('campus_id',$this->first_choice_campus)->get();
    }
    public function updatedSecondChoiceCampus()
    {
        $this->freshmenApplication->update([
            'second_choice_campus'=>$this->second_choice_campus,
        ]);
        $this->secondChoicePrograms=Program::where('campus_id',$this->second_choice_campus)->get();
    }
    public function mount()
    {
        $this->campuses=Campus::all();
        $this->setInitialValue();
    }
      public function getTrackStrands()
    {
        return [
            'ACADEMIC TRACK / ACCOUNTANCY, BUSINESS AND MANAGEMENT (ABM) STRAND',
            'ACADEMIC TRACK / HUMANITIES AND SOCIAL SCIENCES STRAND (HUMSS)',
            'ACADEMIC TRACK / SCIENCE, TECHNOLOGY, ENGINEERING AND MATHEMATICS (STEM) STRAND',
            'ACADEMIC TRACK / GENERAL ACADEMIC STRAND',
            'SPORTS TRACK',
            'ARTS AND DESIGN TRACK ',
            'TECHNICAL-VOCATIONAL LIVELIHOOD TRACK / HOME ECONOMICS',
            'TECHNICAL-VOCATIONAL LIVELIHOOD TRACK / INFORMATION AND COMMUNICATIONS TECHNOLOGY',
            'TECHNICAL-VOCATIONAL LIVELIHOOD TRACK / AGRI-FISHERY ARTS',
            'TECHNICAL-VOCATIONAL LIVELIHOOD TRACK / INDUSTRIAL ARTS',
        ];
    }

    public function getFreshmenApplicationProperty()
    {
        return FreshmenApplication::where('user_id',auth()->user()->id)->first();
    }
    public function render()
    {
        return view('livewire.u.freshmen-form');
    }

    public function setInitialValue()
    {
        if(auth()->user()->applicant_type!=='Freshmen'){
            abort(404);
        }
        $this->first_choice_campus=$this->freshmenApplication->first_choice_campus;
        $this->firstChoicePrograms = Program::where('campus_id',$this->first_choice_campus)->get();
        $this->first_choice = $this->freshmenApplication->first_choice;
        $this->second_choice_campus = $this->freshmenApplication->second_choice_campus;
        $this->secondChoicePrograms = Program::where('campus_id',$this->second_choice_campus)->get();
        $this->second_choice = $this->freshmenApplication->second_choice;
        $this->first_name = $this->freshmenApplication->first_name;
        $this->middle_name = $this->freshmenApplication->middle_name;
        $this->last_name = $this->freshmenApplication->last_name;
        $this->extension = $this->freshmenApplication->extension;
        $this->date_of_birth = $this->freshmenApplication->date_of_birth;
        $this->age = $this->freshmenApplication->age;
        $this->place_of_birth = $this->freshmenApplication->place_of_birth;
        $this->present_address = $this->freshmenApplication->present_address;
        $this->permanent_address = $this->freshmenApplication->permanent_address;
        $this->province = $this->freshmenApplication->province;
        $this->contact_number = $this->freshmenApplication->contact_number;
        $this->nationality = $this->freshmenApplication->nationality ;
        $this->civil_status = $this->freshmenApplication->civil_status;
        $this->tribe = $this->freshmenApplication->tribe;
        $this->religion = $this->freshmenApplication->religion;
        $this->school_last_attended = $this->freshmenApplication->school_last_attended;
        $this->school_last_attended_address = $this->freshmenApplication->school_last_attended_address;
        $this->track_and_strand_taken = $this->freshmenApplication->track_and_strand_taken;
        $this->school_year_graduated = $this->freshmenApplication->school_year_graduated;
        $this->honor_or_awards_received = $this->freshmenApplication->honor_or_awards_received;
        $this->photo = $this->freshmenApplication->photo;
        $this->copy_of_gpa = $this->freshmenApplication->copy_of_gpa;
        $this->principal_certification_or_school_id = $this->freshmenApplication->principal_certification_or_school_id;
        $this->sex = $this->freshmenApplication->sex;
    }

    public function updatedFirstChoice()
    {
        $this->freshmenApplication->update([
            'first_choice'=>$this->first_choice,
        ]);
    }
    public function updatedSecondChoice()
    {
        $this->freshmenApplication->update([
            'second_choice'=>$this->second_choice,
        ]);
    }
    public function updatedFirstName()
    {
        $this->freshmenApplication->update([
            'first_name'=>$this->first_name,
        ]);
    }
    public function updatedMiddleName()
    {
        $this->freshmenApplication->update([
            'middle_name'=>$this->middle_name,
        ]);
    }
    public function updatedLastName()
    {
        $this->freshmenApplication->update([
            'last_name'=>$this->last_name,
        ]);
    }
    public function updatedExtension()
    {
        $this->freshmenApplication->update([
            'extension'=>$this->extension,
        ]);
    }
    public function updatedDateOfBirth()
    {
        $this->freshmenApplication->update([
            'date_of_birth'=>$this->date_of_birth,
        ]);
        $this->age = Carbon::parse($this->date_of_birth)->age;
          $this->freshmenApplication->update([
            'age'=>$this->age,
        ]);
    }
    public function updatedAge()
    {
        $this->freshmenApplication->update([
            'age'=>$this->age,
        ]);
    }
    public function updatedPlaceOfBirth()
    {
        $this->freshmenApplication->update([
            'place_of_birth'=>$this->place_of_birth,
        ]);
    }
    public function updatedPresentAddress()
    {
        $this->freshmenApplication->update([
            'present_address'=>$this->present_address,
        ]);
    }
    public function updatedPermanentAddress()
    {
        $this->freshmenApplication->update([
            'permanent_address'=>$this->permanent_address,
        ]);
    }
    public function updatedProvince()
    {
        $this->freshmenApplication->update([
            'province'=>$this->province,
        ]);
    }
    public function updatedContactNumber()
    {
        $this->validate([
            'contact_number' => 'required|numeric|digits:11'
        ]);
        $this->freshmenApplication->update([
            'contact_number'=>$this->contact_number,
        ]);
    }
    public function updatedNationality()
    {
        $this->freshmenApplication->update([
            'nationality'=>$this->nationality
        ]);
    }
  
    public function updatedCivilStatus()
    {
        $this->freshmenApplication->update([
            'civil_status'=>$this->civil_status
        ]);
    }
    public function updatedTribe()
    {
        $this->freshmenApplication->update([
            'tribe'=>$this->tribe
        ]);
    }
    public function updatedReligion()
    {
        $this->freshmenApplication->update([
            'religion'=>$this->religion
        ]);
    }
    public function updatedSchoolLastAttended()
    {
        $this->freshmenApplication->update([
            'school_last_attended'=>$this->school_last_attended
        ]);
    }
    public function updatedSchoolLastAttendedAddress()
    {
        $this->freshmenApplication->update([
            'school_last_attended_address'=>$this->school_last_attended_address
        ]);
    }

    public function updatedTrackAndStrandTaken()
    {
        $this->freshmenApplication->update([
            'track_and_strand_taken'=>$this->track_and_strand_taken
        ]);
    }
    public function updatedSchoolYearGraduated()
    {
        $this->freshmenApplication->update([
            'school_year_graduated'=>$this->school_year_graduated
        ]);
    }
    public function updatedHonorOrAwardsReceived()
    {
        $this->freshmenApplication->update([
            'honor_or_awards_received'=>$this->honor_or_awards_received
        ]);
    }
    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg'
        ]);
        $this->freshmenApplication->update([
            'photo'=>$this->photo->store('f-photo','public'),
        ]);
        $this->photo = $this->freshmenApplication->photo;
    }
    public function updatedCopyOfGpa()
    {
        $this->validate([
            'copy_of_gpa'=>'required|mimes:pdf',
        ]);
        $this->freshmenApplication->update([
            'copy_of_gpa'=>$this->copy_of_gpa->store('f-gpa','public'),
        ]);
        $this->copy_of_gpa = $this->freshmenApplication->copy_of_gpa;
    }
    public function updatedPrincipalCertificationOrSchoolId()
    {
        $this->validate([
            'principal_certification_or_school_id'=>'required|mimes:pdf',
        ]);
        $this->freshmenApplication->update([
            'principal_certification_or_school_id'=>$this->principal_certification_or_school_id->store('f-cert','public'),
        ]);
        $this->principal_certification_or_school_id = $this->freshmenApplication->principal_certification_or_school_id;
    }
 
    public function updatedSex()
    {
        $this->freshmenApplication->update([
            'sex'=>$this->sex,
        ]);
    }
    public function saveConfirmation()
    {
        $this->validate([
            'first_choice'=>'required',
            'second_choice'=>'required',
            'first_name'=>'required',
            'extension'=>'nullable',
            'middle_name'=>'nullable',
            'last_name'=>'required',
            'date_of_birth'=>'required',
            'age'=>'required',
            'place_of_birth'=>'required',
            'present_address'=>'required',
            'permanent_address'=>'required',
            'province'=>'required',
            'contact_number'=>'required',
            'nationality'=>'required',
            'civil_status'=>'required',
            'tribe'=>'required',
            'religion'=>'required',
            'school_last_attended'=>'required',
            'school_last_attended_address'=>'required',
            'track_and_strand_taken'=>'required',
            'school_year_graduated'=>'required',
            'honor_or_awards_received'=>'nullable',
            'photo'=>'required',
            'copy_of_gpa'=>'required',
            'principal_certification_or_school_id'=>'required',
            'sex'=>'required',
        ]);
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'You are about to finalize your applicaion. The action cannot be undone.',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, finalize',
                'method' => 'finalize',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function finalize()
    {
        auth()->user()->update([
            'applicant_state'=>'finalized',
        ]);
        Payment::create([
            'user_id'=>auth()->user()->id,
            'application_type'=> auth()->user()->applicant_type,
            'application_id'=>$this->freshmenApplication->id,
        ]);
        $this->emitUp('finalize');
    }
}