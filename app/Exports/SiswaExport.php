<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SiswaExport implements FromQuery, WithMapping, ShouldAutoSize, WithHeadings
{
  use Exportable;

  public function query() {
    return User::query();
  }
  public function map($siswa): array
  {
    return [
      $siswa->nis,
      $siswa->name,
      $siswa->gender,
      $siswa->email,
      $siswa->kelas,
    ];
  }
public function headings(): array
    {
        return [
            'NIS',
            'NAMA',
            'GENDER',
            'EMAIL',
            'KELAS',
        ];
    }
}