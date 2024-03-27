<?php

namespace App\Http\Controllers;

use App\Jobs\ConvertJsonToExcel;
use App\Models\Document;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use App\Models\User;
use Generator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class JsonToExcelController extends Controller
{
    public function convert(Request $request)
    {
        if ($request->hasFile('jsonFile')) {
            $file = $request->file('jsonFile');
            $customFileName = uniqid() . '_' . rand(1000, 9999) . '_' . $file->getClientOriginalName(); // generating unique value with appending file name
            $customDirectory = Document::$JSONFileDirectory; // specify the directory name
            $path = $file->storeAs($customDirectory, $customFileName, 'public');
            $documentData = [
                'json_file' => $customFileName,
                'date' => date('Y-m-d')
            ];
            $document = Document::create($documentData);
            if (!$document) {
                return redirect()->back()->with('error', 'Document not found');
            }

            ConvertJsonToExcel::dispatch($document->id);
            Log::info('The task is assigned to queue job');
            return redirect()->back()->with('success', 'Conversion process started, please check after some time.');
        }
    }
}
