<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'json_file',
        'excel_file',
        'date',
        'remarks',
    ];

    public static $JSONFileDirectory = 'uploads/jsonFile';
    public static $ExcelFileDirectory = 'uploads/excelFile';
}
