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
class UpdateImageOnPermit extends Component
{
    use WithFileUploads, Actions;
    public $updatePhotoModal = false;
    public $new_photo;   
    public $application;
    public function mount()
    {
        $type = auth()->user()->applicant_type;
        $this->application = $type == 'Freshmen' ? FreshmenApplication::where('user_id', auth()->user()->id)->first() : TransfereeApplication::where('user_id', auth()->user()->id)->first();
    }
    public function render()
    {
        return view('livewire.update-image-on-permit');
    }

    public function submitHandler()
    {
        $this->validate([
            'new_photo' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $this->application->update([
            'photo' => $this->new_photo->store('f-photo', 'public'),
        ]);
        $this->updatePhotoModal = false;
        $this->new_photo = null;
        $this->notification()->notify([
            'title' => 'Success!',
            'description' => 'Image successfully updated. Your permit will be refreshed in a few seconds. Please wait.',
            'icon' => 'success',
        ]);
        $this->emitUp('imageUpdated');
    }
}