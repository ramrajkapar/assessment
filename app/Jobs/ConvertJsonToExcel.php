<?php

namespace App\Jobs;

use App\Exports\JsonToExcelExport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Document;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ConvertJsonToExcel implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $documentId;

    public function __construct($documentId)
    {
        $this->documentId = $documentId;
    }

    public function handle()
    {
        $document = Document::find($this->documentId);

        if (!$document) {
            Log::info('Document does not found in documents table.');
            return;
        }

        $jsonFilePath = storage_path('app/public/uploads/jsonFile/' . $document->json_file);

        if (!file_exists($jsonFilePath)) {
            Log::info('File does not exists or not found.');
            return;
        }

        // Generate Excel file unique name
        $excelFileName = str_replace('.json', '.xlsx', $document->json_file);
        $excelFilePath = 'uploads/excelFile/' . $excelFileName;

        //generating excel file and storing it into the specified directory
        Excel::store(new JsonToExcelExport($jsonFilePath), $excelFilePath, 'public');

        // Update document with Excel file name
        $document->excel_file = $excelFileName;
        $document->save();
        Log::info('Successfully Excel file generated corresponding to JSON File.');
    }
}
