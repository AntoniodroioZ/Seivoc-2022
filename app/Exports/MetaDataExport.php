<?php

namespace App\Exports;

use App\Models\metainfoU;
use Maatwebsite\Excel\Concerns\FromCollection;

class MetaDataExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $count = metainfoU::all()->countBy('referencia');
		$newArray = [];
		foreach ($count as $key => $value) {
			array_push($newArray,["referencia"=>$key,"repeticiones"=>$value]);
		}
		return collect($newArray);
    }
}
