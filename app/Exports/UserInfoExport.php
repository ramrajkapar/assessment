<?php

namespace App\Exports;

use App\Models\UserInfo;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\DefaultValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class UserInfoExport extends DefaultValueBinder implements FromCollection, WithHeadings, ShouldAutoSize, WithCustomValueBinder
{
    protected $userInfos;


    public function __construct($userInfos)
    {
        $this->userInfos = $userInfos;
    }


    public function bindValue(Cell $cell, $value)
    {
        $column = $cell->getColumn();

        if (is_numeric($value)) {
            $cell->setValueExplicit($value, DataType::TYPE_STRING);

            return true;
        }

        // else return default behavior
        return parent::bindValue($cell, $value);
    }


    public function headings(): array
    {
        return [
            'name',
            'email',
            'phone',
            'address',
        ];
    }

    public function collection()
    {
        $final_export = [];
        $count = 1;
        foreach ($this->userInfos as $prop) {
            $item = [];

            $item[] = $prop->name ?? '';
            $item[] = $prop->email ?? '';
            $item[] = $prop->phone ?? '';
            $item[] = $prop->address ?? '';

            $final_export[] = $item;
        }

        return collect($final_export);
    }
}
