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
class UpdateExtension extends Component
{
    use WithPagination, Actions;
    public $filter="Freshmen";
    public $search="N/A";

    public function render()
    {
        return view('livewire.update-extension',[
            'applications'=>$this->filter =='Freshmen' ? FreshmenApplication::where('extension',$this->search)->with('user')->get() : TransfereeApplication::where('extension',$this->search)->with('user')->get(),
        ]);
    }
    public $set_id;
    public function getApplicationProperty()
    {
        return $this->filter =='Freshmen' ? FreshmenApplication::where('id',$this->set_id)->first() : TransfereeApplication::where('id',$this->set_id)->first();
    }
    public function clearExtension($ap_id)
    {
        $this->set_id=$ap_id;
         $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Are you sure you want to clear the extension?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, I am sure',
                'method' => 'confirmClearExtension',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function confirmClearExtension()
    {
         $this->application->update([
            'extension'=>'',
        ]);
        $this->notification()->notify([
            'title'=>'Extension Cleared',
            'description'=>'Extension has been cleared',
            'icon'=>'success',
        ]);
    }
}