<?php

namespace App\Imports\pkg_Conges;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class CongeImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //
    }
}
