<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\BidangProvinsi;
use App\Models\Bidang;
use App\Exports\ProvinsiExport;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $provinsi = Province::with(['bidang_provinsi.bidang' => function($q) {
            $q->select('id','nama_bidang');
        }, 'bidang_provinsi' => function($q) {
            $q->withCount('tim')->withCount(['pengunggah' => function($q) {
                $q->has('karya_provinsi');
            }]);
        }])->get();
        //return $provinsi;
        return view('admin.dashboard', compact('provinsi'));
    }

    public function geospasial()
    {
        return view('admin.geospasial');
    }

    public function tes()
    {
        $tes = Province::all();
        $hasil = [];

        $geoJSONdata = [];

        foreach ($tes as $data) {

            $geoJSONdata[] = ([
                'type'       => 'Feature',
                'properties' => ([
                    'id' => $data->id,
                    'nama' => $data->name,
                    'lat' => $data->latitude,
                    'lon' => $data->longitude,
                    'coordinate' => $data->latitude.', '.$data->longitude,
                    'map_popup_content' =>'<div class="my-2"><strong>'.__('Provinsi').':</strong><br>'.$data->name.' ('.$data->latitude.', '.$data->longitude.')</div><div class="my-2"><strong>'.__('Peserta').':</strong><br><ol>'.peserta($data->id).'</ol></div>',
                    // 'data' => peserta($data->id),
                ]),
                'geometry'   => [
                    'type'        => 'Point',
                    'coordinates' => [
                        $data->longitude,
                        $data->latitude,
                    ],
                ],
            ]);
        }

        

        return response()->json([
            'type'     => 'FeatureCollection',
            'features' => $geoJSONdata,
        ]);

    }

    public function indexx()
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

        return $hasil;
        //return view('admin.dashboard', compact('provinsi'));
    }

    public function export()
	{
		return Excel::download(new ProvinsiExport, 'report.xlsx');
	}

    public function grafik()
    {
        $provinsi = Province::all();
        $bidang = Bidang::all();
        return view('admin.grafik', compact('provinsi','bidang'));
    }

    public function bidang_prov($bidang)
    {
        $bidang = BidangProvinsi::with('province','bidang')->withCount('tim')->withCount(['pengunggah' => function($q) {
            $q->has('karya_provinsi');
        }])->where('bidang_id',$bidang)->get();

        $hasil = [];
        foreach ($bidang as $item) {
            $pendaftar= 0;
            $pengunggah= 0;
            $pendaftar += $item->tim_count;
            $pengunggah += $item->pengunggah_count;

            $hasil[] = ([
                'id' => $item->id,
                'nama_bidang' => $item->bidang->nama_bidang.' '.$item->province->name,
                'pendaftar' => $pendaftar,
                'pengunggah' => $pengunggah,
            ]);
        };

        echo json_encode($hasil);
    }

    public function per_bidang()
    {
        $bidang = Bidang::with(['bidang_provinsi' => function($q) {
            $q->withCount('tim')->withCount(['pengunggah' => function($q) {
                $q->has('karya_provinsi');
            }]);
        }])->get();

        $hasil = [];
        foreach ($bidang as $item) {
            $pendaftar= 0;
            $pengunggah= 0;
            foreach ($item->bidang_provinsi as $items) {
                $pendaftar += $items->tim_count;
                $pengunggah += $items->pengunggah_count;
            }

            $hasil[] = ([
                'id' => $item->id,
                'nama_bidang' => $item->nama_bidang,
                'pendaftar' => $pendaftar,
                'pengunggah' => $pengunggah,
            ]);
        };

        echo json_encode($hasil);
    }

    public function per_bidang_provinsi($province)
    {
        if ($province == 0) {
            $bidang = Bidang::with(['bidang_provinsi' => function($q) use ($province) {
                $q->withCount('tim')->withCount(['pengunggah' => function($q) use ($province) {
                    $q->has('karya_provinsi');
                }]);
            }])->get();
        } else {
            $bidang = Bidang::with(['bidang_provinsi' => function($q) use ($province) {
                $q->withCount('tim')->withCount(['pengunggah' => function($q) use ($province) {
                    $q->has('karya_provinsi');
                }])->where('province_id',$province);
            }])->get();
        }
        
        $hasil = [];
        foreach ($bidang as $item) {
            $pendaftar= 0;
            $pengunggah= 0;
            foreach ($item->bidang_provinsi as $items) {
                $pendaftar += $items->tim_count;
                $pengunggah += $items->pengunggah_count;
            }

            $hasil[] = ([
                'id' => $item->id,
                'nama_bidang' => $item->nama_bidang,
                'pendaftar' => $pendaftar,
                'warna_satu' => sprintf("#%06x",rand(0,16777215)),
                'warna_dua' => sprintf("#%06x",rand(0,16777215)),
                'pengunggah' => $pengunggah,
            ]);
        };

        echo json_encode($hasil);
    }

    public function bid_per($province)
    {
        if ($province == 0) {
            $bidang = Bidang::with(['bidang_provinsi' => function($q) use ($province) {
                $q->withCount('tim')->withCount(['pengunggah' => function($q) use ($province) {
                    $q->has('karya_provinsi');
                }]);
            }])->get();
        } else {
            $bidang = Bidang::with(['bidang_provinsi' => function($q) use ($province) {
                $q->withCount('tim')->withCount(['pengunggah' => function($q) use ($province) {
                    $q->has('karya_provinsi');
                }])->where('province_id',$province);
            }])->get();
        }
        
        $hasil = [];
        foreach ($bidang as $item) {
            $pendaftar= 0;
            $pengunggah= 0;
            foreach ($item->bidang_provinsi as $items) {
                $pendaftar += $items->tim_count;
                $pengunggah += $items->pengunggah_count;
            }

            $hasil[] = ([
                'id' => $item->id,
                'nama_bidang' => $item->nama_bidang,
                'pendaftar' => $pendaftar,
                'pengunggah' => $pengunggah,
                'warna' => sprintf("#%06x",rand(0,16777215)),
                'persentase' => round(persentase($data->peserta_count),2),
            ]);
        };

        echo json_encode($hasil);
    }

    public function informasi()
    {
        return view('admin.informasi');
    }
}
