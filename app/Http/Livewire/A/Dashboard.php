<?php

namespace App\Http\Livewire\A;

use Livewire\Component;
use App\Models\Examination;
use App\Models\ExaminationTestCenter;
use App\Models\Payment;
use App\Models\User;

class Dashboard extends Component
{
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