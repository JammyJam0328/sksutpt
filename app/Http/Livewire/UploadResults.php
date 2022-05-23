<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Result;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
class UploadResults extends Component
{
    use WithFileUploads, Actions;
    public $file;
    public function render()
    {
        return view('livewire.upload-results');
    }

    public function uploadExcel()
    {
        $this->validate([
            'file' => 'required|file|mimes:xlsx,xls',
        ]);
        Excel::import(new UsersImport, $this->file);
        $this->notification([
            'title'       => 'Success',
            'description' => 'Results uploaded successfully',
            'icon'        => 'success'
        ]);
    }
}