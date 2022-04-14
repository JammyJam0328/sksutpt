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
class ManagePayments extends Component
{
    use WithPagination, Actions;
    public $set_id;
    public $optionModal=false;
    public $showProofModal=false;
    public $viewApplicationModal=false;
    public $testCenters=[];
    public $examination_id;
    public $examinationTestCenters=[];
    public $test_center;
    public $tab;
    public function getApplicationProperty()
    {
        $user = Payment::where('id',$this->set_id)->with('user')->first()->user;
        $this->tab = $user->applicant_type;
        return  $this->tab =='Freshmen' ? FreshmenApplication::where('user_id',$user->id)->first() : TransfereeApplication::where('user_id',$user->id)->first();
    }
    public function mount() 
    {
        $this->examination_id=Examination::where('isOpen',1)->first() ? Examination::where('isOpen',1)->first()->id : null;
        $this->examinationTestCenters = ExaminationTestCenter::where('examination_id',$this->examination_id)->with('testCenter')->get();
    }

    public function getPaymentProperty()
    {
        return Payment::where('id',$this->set_id)->with(['proofs','user'])->first();
    }
    public function render()
    {
        return view('livewire.a.manage-payments',[
            'payments'=>Payment::where('payment_status','to-review')->with(['user.freshmenApplication','user.transfereeApplication'])->paginate(10),
        ])
        ->layout('layouts.admin');
    }
    public function showDetails()
    {
         $this->optionModal=false;
        $this->viewApplicationModal=true;
    }
    public function showOption($id)
    {
        $this->set_id=$id;
        $this->optionModal=true;
    }

    public function showProofs()
    {
        $this->optionModal=false;
        $this->showProofModal=true;
    }

    public function updatedTestCenter()
    {
        $grouping =  Grouping::where('examination_test_center_id',$this->test_center)
                        ->where('occupied_slots','<',25)
                        ->first();
        if($grouping)
        {
        //    
        }
        else
        {
            
            $this->notification()->notify([
                'title'=>'Failed',
                'description'=>'No available Slots',
                'icon'=>'error',
            ]);
            $this->test_center='';
            return;
        }
    }

    public function approvePaymentConfirmation()
    {
        $this->validate([
            'test_center'=>'required|in:'.implode(',',$this->examinationTestCenters->pluck('id')->toArray()),
        ]);
         $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Are you sure you want to approve this payment?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, I am sure',
                'method' => 'approvePayment',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function approvePayment()
    {
        $this->payment->user()->update([
            'selected_test_center'=>$this->test_center,
        ]);
        $this->payment->update([
            'amount_paid'=>'275',
            'date_paid'=>now(),
            'payment_status'=>'approved',
        ]);
        $this->payment->user->update([
            'applicant_state'=>'select_room',
        ]);
        // $details = [
        //     'subject' => 'Payment Approved',
        //     'username' => $this->payment->user->name,
        //     'message' => 'Your payment has been approved. Please open the application and time slot',
        // ];
        // $this->payment->user->notify(new SendEmailNotification($details));
        $this->notification()->notify([
            'title'=>'Success',
            'description'=>'Payment has been approved',
            'icon'=>'success',
        ]);
         $this->test_center='';
         $this->showProofModal=false;
    }

    public function rejectPaymentConfirmation()
    {
         $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Are you sure you want to reject this payment?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, I am sure',
                'method' => 'rejectPayment',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function rejectPayment()
    {
        $this->payment->update([
            'payment_status'=>'rejected',
        ]);
        $this->payment->user()->update([
            'applicant_state'=>'payment_rejected',
        ]);
        // $details = [
        //     'subject' => 'Payment Rejected',
        //     'username' => $this->payment->user->name,
        //     'message' => 'Sorry,  Your application was disapproved due to incompliance with the requirements in payment.',
        // ];
        // $this->payment->user->notify(new SendEmailNotification($details));
        $this->notification()->notify([
            'title'=>'Success',
            'description'=>'Payment has been rejected',
            'icon'=>'success',
        ]);
        $this->reset();
    }


}