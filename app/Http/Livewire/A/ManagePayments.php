<?php

namespace App\Http\Livewire\A;

use Livewire\Component;
use App\Models\Examination;
use App\Models\ExaminationTestCenter;
use App\Models\Grouping;
use App\Models\TestCenter;
use App\Models\Payment;
use Notification;
use App\Notifications\SendEmailNotification;
use Livewire\WithPagination;
use WireUi\Traits\Actions;
class ManagePayments extends Component
{
    use WithPagination, Actions;
    public $filter="payment_submitted";
    public $set_id;
    public $optionModal=false;
    public $showProofModal=false;
    public function getPaymentProperty()
    {
        return Payment::where('id',$this->set_id)->with(['proofs','user'])->first();
    }
    public function render()
    {
        return view('livewire.a.manage-payments',[
            'payments'=>Payment::whereHas('user',function($query){
                $query->where('applicant_state','like','%'.$this->filter.'%');
            })->with('user')->paginate(10),
        ])
        ->layout('layouts.admin');
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

    public function approvePaymentConfirmation()
    {
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
        $this->payment->update([
            'amount_paid'=>'275',
            'date_paid'=>now(),
            'payment_status'=>'approved',
        ]);
        $this->payment->user->update([
            'applicant_state'=>'select_room',
        ]);
        $details = [
            'subject' => 'Payment Approved',
            'username' => $this->payment->user->name,
            'message' => 'Your payment has been approved. Please open the application to select test center',
        ];
        $this->payment->user->notify(new SendEmailNotification($details));
        $this->notification()->notify([
            'title'=>'Success',
            'description'=>'Payment has been approved',
            'icon'=>'success',
        ]);
        $this->reset();
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
        $details = [
            'subject' => 'Payment Rejected',
            'username' => $this->payment->user->name,
            'message' => 'Sorry, your payment has been rejected.',
        ];
        $this->payment->user->notify(new SendEmailNotification($details));
        $this->notification()->notify([
            'title'=>'Success',
            'description'=>'Payment has been rejected',
            'icon'=>'success',
        ]);
        $this->reset();
    }


}