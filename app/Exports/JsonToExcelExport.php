<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;

class JsonToExcelExport implements FromCollection

{
    use Exportable;

    protected $jsonFilePath;

    public function __construct($jsonFilePath)
    {
        $this->jsonFilePath = $jsonFilePath;
    }

    public function collection()
    {
        $jsonData = file_get_contents($this->jsonFilePath);

        // Decode the JSON data into an associative arrays
        $dataArray = json_decode($jsonData, true);

        // Convert array of objects into Laravel collection
        $collection = collect($dataArray);

        // Add headings manually
        $collection->prepend(['name', 'email', 'phone', 'address']);

        return $collection;
    }
}
