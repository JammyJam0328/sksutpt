<?php

namespace App\Http\Livewire\U;

use Livewire\Component;
use App\Models\Program;
use App\Models\Campus;
use App\Models\FreshmenApplication;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;
use App\Models\Payment;
use App\Models\Permit;

class GeneratedPermit extends Component
{
    public function render()
    {
        return view('livewire.u.generated-permit',[
            'permit'=>Permit::where('user_id',auth()->user()->id)->with(['testCenter','examination','grouping'])->first(),
        ]);
    }
}