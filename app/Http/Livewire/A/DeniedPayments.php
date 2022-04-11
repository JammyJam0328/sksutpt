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
class DeniedPayments extends Component
{
    use WithPagination, Actions;
    public $set_id;
    public function getPaymentProperty()
    {
        return Payment::where('id',$this->set_id)->with(['proofs','user'])->first();
    }
    public function render()
    {
        return view('livewire.a.denied-payments',[
            'payments'=>Payment::where('payment_status','rejected')->with(['user.freshmenApplication','user.transfereeApplication'])->paginate(10),
        ])->layout('layouts.admin');
    }
    public function confirmReevaluation($id)
    {
        $this->set_id=$id;
         $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Are you sure you want to reevaluate this payment?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, I am sure',
                'method' => 'returnToReview',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function returnToReview()
    {
        $this->payment->update([
            'payment_status'=>'to-review',
        ]);
        $this->payment->user()->update([
            'applicant_state'=>'payment_submitted',
        ]);

         $details = [
            'subject' => 'Payment Re evaluation',
            'username' => $this->payment->user->name,
            'message' => 'Your payment is now being re evaluated. Please wait for the admin to review your payment.',
        ];
        $this->payment->user->notify(new SendEmailNotification($details));
        $this->notification()->notify([
            'title'=>'Success',
            'description'=>'Payment is now returned to review',
            'icon'=>'success',
        ]);
    }
}