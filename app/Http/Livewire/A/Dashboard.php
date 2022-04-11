<?php

namespace App\Http\Livewire\A;

use Livewire\Component;
use App\Models\Examination;
use App\Models\ExaminationTestCenter;
use App\Models\Payment;
use App\Models\Grouping;

use App\Models\User;

class Dashboard extends Component
{
    
    public function getAvailableSlots()
    {
        $slots = 0;
        $examination = Examination::where('isOpen',1)->first();
        $examinationTestCenters = ExaminationTestCenter::where('examination_id',$examination->id)->get();
        foreach($examinationTestCenters as $examinationTestCenter)
        {
            $slots += Grouping::where('examination_test_center_id',$examinationTestCenter->id)
                                ->sum('slots');
        }
        $payment_count = Payment::where('payment_status','!=','pending')->where('payment_status','!=','rejected')->count();
        return $slots-$payment_count;
    }
    public function getPendingPayment()
    {
        return Payment::where('payment_status','to-review')->count();
    }
    public function getTotalUsers()
    {
        return User::where('role','user')->count();
    }
    public function render()
    {
        return view('livewire.a.dashboard')
        ->layout('layouts.admin');
    }
}