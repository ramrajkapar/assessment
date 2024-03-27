<?php

namespace App;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class JsonToExcelExport implements FromQuery
{
    use Exportable;

    protected $jsonFilePath;

    public function __construct($jsonFilePath)
    {
        $this->jsonFilePath = $jsonFilePath;
    }

    public function query()
    {
        // Open the JSON file for reading
        $jsonFile = fopen($this->jsonFilePath, 'r');

        if ($jsonFile === false) {
            return null;
        }

        // Read JSON data line by line
        while (($jsonLine = fgets($jsonFile)) !== false) {
            $data = json_decode($jsonLine, true);

            if (!is_array($data)) {
                continue; // Skip invalid JSON lines
            }

            yield $data;
        }

        // Close the JSON file handle
        fclose($jsonFile);
    }
}
