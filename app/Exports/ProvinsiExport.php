<?php

namespace App\Exports;

use App\Models\BidangProvinsi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;


class ProvinsiExport implements FromCollection, WithHeadings, WithStrictNullComparison
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $provinsi = BidangProvinsi::with(['bidang' => function($q) {
            $q->select('id','nama_bidang');
        }, 'province'])->withCount('tim')->withCount(['pengunggah' => function($q) {
            $q->has('karya_provinsi');
        }])->get();

        $hasil = [];
        foreach ($provinsi as $item) {
            $hasil[] = ([
                'id' => $item->id,
                'provinsi' => $item->province->name,
                'bidang' => $item->bidang->nama_bidang,
                'pendaftar' => $item->tim_count,
                'pengunggah' => $item->pengunggah_count,
            ]);
        };

        return collect($hasil);

        // return $hasil;
    }

    public function headings(): array
    {
        return ["ID","Provinsi", "Bidang", "Pendaftar", "Pengunggah"];
    }
}