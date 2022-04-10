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
    public function render()
    {
        return view('livewire.a.denied-payments',[
            'payments'=>Payment::where('payment_status','rejected')->with(['user.freshmenApplication','user.transfereeApplication'])->paginate(10),
        ])->layout('layouts.admin');
    }
}