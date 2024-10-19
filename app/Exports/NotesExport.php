<?php

namespace App\Exports;

use App\Models\Note;
use Maatwebsite\Excel\Concerns\FromCollection;

class NotesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Note::all();
    }
}
