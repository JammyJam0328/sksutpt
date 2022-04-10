<?php

namespace App\Http\Livewire\A;

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
class ManageAllPayment extends Component
{
    use WithPagination, Actions;
    public $set_id;
    public $optionModal=false;
    public $viewApplicationModal=false;
    public $applicant_type='';
    public function getApplicationProperty()
    {
        if ($this->applicant_type=='Freshmen') {
            return FreshmenApplication::where('user_id',$this->set_id)->first();
        }else{
            return TransfereeApplication::where('user_id',$this->set_id)->first();
        }
    }

    public function render()
    {
        return view('livewire.a.manage-all-payment',[
            'payments'=>Payment::where('payment_status','approved')->with(['user.freshmenApplication','user.transfereeApplication'])->paginate(10),
        ])
            ->layout('layouts.admin');
    }

    public function showOption($id,$applicant_type)
    {
        $this->applicant_type=$applicant_type;
        $this->set_id=$id;
        $this->optionModal=true;
    }

    public function viewApplication()
    {
        $this->viewApplicationModal=true;
        $this->optionModal=false;
    }
}