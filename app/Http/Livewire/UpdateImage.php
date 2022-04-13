<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Examination;
use App\Models\ExaminationTestCenter;
use App\Models\Grouping;
use App\Models\TestCenter;
use App\Models\Payment;
use App\Models\FreshmenApplication;
use App\Models\TransfereeApplication;
use Notification;
use App\Notifications\SendEmailNotification;
use Livewire\WithPagination;
use WireUi\Traits\Actions;
// livewire file upload
use Livewire\WithFileUploads;
class UpdateImage extends Component
{
    use WithPagination, Actions, WithFileUploads;
    public $filter="Freshmen";
    public $searchTerm="";
    
    public $selected_id;
    public function getApplicationProperty()
    {
        return  $this->filter =='Freshmen' ? FreshmenApplication::where('id',$this->selected_id)->first() : TransfereeApplication::where('id',$this->selected_id)->first();
    }
    public function render()
    {
        return view('livewire.update-image',[
            'applications'=>$this->filter =='Freshmen' ? FreshmenApplication::where('last_name','like','%'.$this->searchTerm.'%')->orWhere('first_name','like','%'.$this->searchTerm.'%')->with('user')->get() : TransfereeApplication::where('last_name','like','%'.$this->searchTerm.'%')->orWhere('first_name','like','%'.$this->searchTerm.'%')->with('user')->get(),
        ]);
    }
    public function selectStudent($id)
    {
        $this->selected_id=$id;
        $this->searchTerm='';
    }
    public $new_image;
    public function updateImage()
    {
        $this->validate([
            'new_image'=>'required|image|mimes:jpeg,png,jpg',
        ]);
        $this->application->update([
            'photo'=>$this->new_image->store('f-photo','public'),
        ]);
        $this->new_image='';
        $this->selected_id='';
        $this->notification()->notify([
            'title'=>'Image Updated',
            'description'=>'Image has been updated',
            'icon'=>'success',
        ]);
    }
}