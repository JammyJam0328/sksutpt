<?php

namespace App\Http\Livewire\U;

use Livewire\Component;
use App\Models\Program;
use App\Models\Campus;
use App\Models\TransfereeApplication;
use WireUi\Traits\Actions;
use Livewire\WithFileUploads;
use App\Models\Payment;
use Carbon\Carbon;
class TransfereeForm extends Component
{
    use WithFileUploads, Actions;
    public $campuses=[];
    public $programs=[];
    public $campusChoice;
   public $program_choice_campus;
   public $program_choice;
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
   public $civil_status;
   public $tribe;
   public $religion;
   public $previous_program_taken;
   public $last_school_attended;
   public $school_year_last_attended;
   public $photo;
    public $hd_or_good_moral;
   public $sex;
   public $nationality;
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
    protected $validationAttributes = [
        'hd_or_good_moral'=>'Honorable Dismissal or Good Moral',
        'photo'=>'Actual photo'
    ];
    public function updatedCampusChoice()
    {
        $this->programs = Program::where('campus_id',$this->campusChoice)->get();
        $this->transfereeApplication->update([
            'program_choice_campus' => $this->campusChoice
        ]);
    }
   public function mount()
   {
       $this->campuses = Campus::all();
       $this->setInitialValue();
   }
   public function getTransfereeApplicationProperty()
   {
         return TransfereeApplication::where('user_id',auth()->user()->id)->first();
   }
    public function render()
    {
        return view('livewire.u.transferee-form');
    }
    public function setInitialValue()
    {
        if(auth()->user()->applicant_type!=='Transferee'){
            abort(404);
        }
        $this->campusChoice=$this->transfereeApplication->program_choice_campus;
        $this->programs = Program::where('campus_id',$this->campusChoice)->get();
        $this->program_choice = $this->transfereeApplication->program_choice;
        $this->first_name = $this->transfereeApplication->first_name;
        $this->middle_name = $this->transfereeApplication->middle_name;
        $this->last_name = $this->transfereeApplication->last_name;
        $this->extension = $this->transfereeApplication->extension;
        $this->date_of_birth = $this->transfereeApplication->date_of_birth;
        $this->age = $this->transfereeApplication->age;
        $this->place_of_birth = $this->transfereeApplication->place_of_birth;
        $this->present_address = $this->transfereeApplication->present_address;
        $this->permanent_address = $this->transfereeApplication->permanent_address;
        $this->province = $this->transfereeApplication->province;
        $this->contact_number = $this->transfereeApplication->contact_number;
        $this->nationality = $this->transfereeApplication->nationality ;
        $this->civil_status = $this->transfereeApplication->civil_status;
        $this->tribe = $this->transfereeApplication->tribe;
        $this->religion = $this->transfereeApplication->religion;
        $this->previous_program_taken = $this->transfereeApplication->previous_program_taken;
        $this->last_school_attended = $this->transfereeApplication->last_school_attended;
        $this->school_year_last_attended = $this->transfereeApplication->school_year_last_attended;
        $this->photo = $this->transfereeApplication->photo;
        $this->hd_or_good_moral = $this->transfereeApplication->hd_or_good_moral;
        $this->sex = $this->transfereeApplication->sex;
    }

    public function updatedProgramChoice()
    {
        $this->transfereeApplication->update([
            'program_choice' => $this->program_choice
        ]);
    }
    public function updatedFirstName()
    {
        $this->transfereeApplication->update([
            'first_name' => $this->first_name
        ]);
    }
    public function updatedMiddleName()
    {
        $this->transfereeApplication->update([
            'middle_name' => $this->middle_name
        ]);
    }
    public function updatedLastName()
    {
        $this->transfereeApplication->update([
            'last_name' => $this->last_name
        ]);
    }
    public function updatedExtension()
    {
        $this->transfereeApplication->update([
            'extension' => $this->extension
        ]);
    }
    public function updatedDateOfBirth()
    {
        $this->transfereeApplication->update([
            'date_of_birth' => $this->date_of_birth
        ]);
        $this->age = Carbon::parse($this->date_of_birth)->age;
         $this->transfereeApplication->update([
            'age' => $this->age
        ]);     

    }
    public function updatedAge()
    {
        $this->transfereeApplication->update([
            'age' => $this->age
        ]);
    }
    public function updatedPlaceOfBirth()
    {
        $this->transfereeApplication->update([
            'place_of_birth' => $this->place_of_birth
        ]);
    }
    public function updatedPresentAddress()
    {
        $this->transfereeApplication->update([
            'present_address' => $this->present_address
        ]);
    }
    public function updatedPermanentAddress()
    {
        $this->transfereeApplication->update([
            'permanent_address' => $this->permanent_address
        ]);
    }

    public function updatedProvince()
    {
        $this->transfereeApplication->update([
            'province' => $this->province
        ]);
    }
    public function updatedContactNumber()
    {
        // contact number should be 11 digits and numeric
        $this->validate([
            'contact_number' => 'required|numeric|digits:11'
        ]);
        $this->transfereeApplication->update([
            'contact_number' => $this->contact_number
        ]);
    }
    public function updatedCivilStatus()
    {
        $this->transfereeApplication->update([
            'civil_status' => $this->civil_status
        ]);
    }
    public function updatedTribe()
    {
        $this->transfereeApplication->update([
            'tribe' => $this->tribe
        ]);
    }
    public function updatedReligion()
    {
        $this->transfereeApplication->update([
            'religion' => $this->religion
        ]);
    }
    public function updatedPreviousProgramTaken()
    {
        $this->transfereeApplication->update([
            'previous_program_taken' => $this->previous_program_taken
        ]);
    }
    public function updatedLastSchoolAttended()
    {
        $this->transfereeApplication->update([
            'last_school_attended' => $this->last_school_attended
        ]);
    }
    public function updatedSchoolYearLastAttended()
    {
        $this->transfereeApplication->update([
            'school_year_last_attended' => $this->school_year_last_attended
        ]);
    }
    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg'
        ]);
        $this->transfereeApplication->update([
            'photo' => $this->photo->store('f-photo','public'),
        ]);
        $this->photo = $this->transfereeApplication->photo;
    }
    public function updatedHdOrGoodMoral()
    {
        $this->validate([
            'hd_or_good_moral' => 'required|mimes:pdf'
        ]);
        $this->transfereeApplication->update([
            'hd_or_good_moral' => $this->hd_or_good_moral->store('f-moral','public'),
        ]);
        $this->hd_or_good_moral = $this->transfereeApplication->hd_or_good_moral;
    }
    public function updatedSex()
    {
        $this->transfereeApplication->update([
            'sex'=>$this->sex,
        ]);
    }
    public function updatedNationality()
    {
        $this->transfereeApplication->update([
            'nationality'=>$this->nationality,
        ]);
    }

      public function saveConfirmation()
    {
        $this->validate([
           'campusChoice'=>'required',
           'program_choice'=>'required',
           'first_name'=>'required',
           'middle_name'=>'nullable',
           'last_name'=>'required',
           'extension'=>'nullable',
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
           'previous_program_taken'=>'required',
           'last_school_attended'=>'required',
           'school_year_last_attended'=>'required',
           'photo'=>'required',
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
            'application_type'=>auth()->user()->applicant_type,
            'application_id'=>$this->transfereeApplication->id,
        ]);
        $this->emitUp('finalize');
    }
}