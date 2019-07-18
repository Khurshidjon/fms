<?php

namespace App\Exports;

use App\Application;
use Maatwebsite\Excel\Concerns\FromCollection;

class ApplicationExport implements FromCollection
{
    public $result;

    public function __construct($result)
    {
        $this->result = $result;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->result;
    }
}
