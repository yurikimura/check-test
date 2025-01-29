<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class UsersExportClass implements FromCollection, WithHeadings
{
    protected $name;
    protected $gender;

    public function __construct($name, $gender)
    {
        $this->name = $name;
        $this->gender = $gender;
    }

    public function collection()
    {
        // データ取得ロジック
        return new Collection([
            ['Name' => $this->name, 'Gender' => $this->gender]
        ]);
    }

    public function headings(): array
    {
        return ['Name', 'Gender'];
    }
}
