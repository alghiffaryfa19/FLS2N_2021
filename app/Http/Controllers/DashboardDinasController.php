<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BidangProvinsi;
use App\Models\Tim;

class DashboardDinasController extends Controller
{
    public function dashboard()
    {
        $bidang = BidangProvinsi::with(['province','bidang' => function($q) {
            $q->select('id','nama_bidang');
        }])->withCount('tim')->withCount(['pengunggah' => function($q) {
            $q->has('karya_provinsi');
        }])->where('province_id',auth()->user()->dinas->province_id)->get();

        return view('dinas.dashboard', compact('bidang'));
    }

    public function peserta()
    {
        $biodata = Tim::with('biodata.user','anggota.user','sekolah.district.regency','bidang_provinsi.bidang','unggahan','karya_provinsi')->whereHas('bidang_provinsi', function($wkwk) {
            $wkwk->where('province_id',auth()->user()->dinas->province_id);
        });

        if(request()->ajax())
        {
            return datatables()->of($biodata->select('tims.*'))
            ->editColumn('edit', function ($data) use ($biodata) {
                $mystring = '<a href="'.route('detail_peserta', $data->id).'" class="bg-indigo-500 text-white p-2 rounded mr-2 font-bold">Detail</a>';
                
                return $mystring;
            })
            ->editColumn('berkas', function ($data) use ($biodata) {
                if ($data->unggahan()->exists()) {
                    $mystring = '<span class="text-green-500">Sudah Unggah</span>';
                } else {
                    $mystring = '<span class="text-red-500">Belum Unggah</span>';
                }
                
                return $mystring;
            })
            ->editColumn('karya', function ($data) use ($biodata) {
                if ($data->karya_provinsi()->exists()) {
                    $mystring = '<span class="text-green-500">Sudah Unggah</span>';
                } else {
                    $mystring = '<span class="text-red-500">Belum Unggah</span>';
                }
                
                return $mystring;
            })
            ->editColumn('st', function ($data) use ($biodata) {
                if ($data->lolos == 0) {
                    $mystring = '<span class="text-red-500">Tidak Lolos Berkas</span>';
                } elseif ($data->lolos_berkas == 1) {
                    $mystring = '<span class="text-green-500">Lolos Berkas</span>';
                } else {
                    $mystring = '<span class="text-yellow-500">Belum ditentukan</span>';
                }
                
                return $mystring;
            })
            
            ->rawColumns(['edit','st','berkas','karya'])
            ->make(true);
        }
        return view('dinas.peserta.index');
    }

    public function detail_peserta($id)
    {
        $biodata = Tim::with('biodata.user','anggota.user','sekolah','unggahan.berkasss','karya_provinsi.unggahan_bidang')->find($id);
        return view('dinas.peserta.detail', compact('biodata'));
    }

    public function export_data()
	{
		return Excel::download(new PesertaExport, 'peserta_report.xlsx');
	}
}
