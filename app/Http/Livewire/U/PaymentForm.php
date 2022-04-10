<?php

namespace App\Http\Livewire\U;

use Livewire\Component;
use App\Models\Program;
use App\Models\Campus;
use App\Models\FreshmenApplication;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;
use App\Models\Payment;
use App\Models\Proof;
class PaymentForm extends Component
{
    use WithFileUploads, Actions;
    public $proof_of_payments=[];
    public function getPaymentProperty()
    {
        return Payment::where('user_id',auth()->user()->id)->first();
    }
    public function render()
    {
        return view('livewire.u.payment-form',[
            'paymentDetails'=>Payment::where('user_id',auth()->user()->id)->first(),
        ]);
    }

    public function savePayment()
    {
        if (count($this->proof_of_payments)<1) {
            $this->notification()->notify([
                'title'=>'Error',
                'description'=>'Please upload at least one proof of payment',
                'icon'=>'error',
            ]);
            return;
        }
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Are you sure you want to submit your payment?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, submit payment',
                'method' => 'confirmPayments',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }
    public function confirmPayments()
    {
        foreach($this->proof_of_payments as $proof_of_payment)
        {
           Proof::create([
               'payment_id'=>$this->payment->id,
               'file_name'=>$proof_of_payment->store('proof','public'),
           ]);
        }
        $this->payment->update([
            'amount_paid'=>'275',
            'payment_status'=>'to-review',
        ]);
        auth()->user()->update([
            'applicant_state'=>'payment_submitted',
        ]);
        $this->notification()->notify([
            'title'=>'Success',
            'description'=>'Payment submitted successfully',
            'icon'=>'success',
        ]);
        $this->emitUp('paymentSubmitted');
    }
}