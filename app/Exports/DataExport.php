<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;

class DataExport implements FromCollection
{
    use Exportable;

    public $data = array();

    public function __construct($data){
    	$this->data = $data;
    }

    public function collection()
    {         
        return collect($this->data);
    }     
}
