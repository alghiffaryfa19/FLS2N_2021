<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Jenjang;
use App\Models\Province;
use App\Models\NisnJuara;
use App\Models\District;
use App\Models\BidangProvinsi;
use App\Models\User;
use App\Models\Biodata;
use App\Models\Anggota;
use Illuminate\Support\Str;
use App\Models\Slider;
use App\Models\Kendala;
use App\Models\Video;
use App\Models\Faq;
use App\Models\Unduhan;
use App\Models\Countdown;
use App\Models\Kategori;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use App\Models\Sekolah;
use App\Models\Berita;
use App\Models\Info;
use Illuminate\Support\Facades\Hash;
use DB;

class FrontendController extends Controller
{

   public function index()
   {
      $video = Video::with('user')->latest()->take(5)->get();
      $info = Info::latest()->take(3)->get();
      $berita = Berita::latest()->take(3)->get();
      $slider = Slider::latest()->get();
      $time = Countdown::find(1);
      return view('frontend.welcome', compact('video','info','berita','slider','time'));
   }

   public function bidang()
   {
      $kategori = Kategori::with('bidang')->get();
      return view('frontend.bidang', compact('kategori'));
   }

   public function video()
   {
      // $video = Video::with('user')->latest()->paginate(6);
      // $videos = '';
      // if ($request->ajax()) {
      //    foreach ($video as $item) {
      //          $videos.='<div class="col-md-4 mb-5">
      //          <div class="pb-2">
      //              <a data-fancybox="video-gallery" href="'.route('detail_video', $item->slug).'">
      //                  <img src="'.thumbnail($item->url).'" alt="{item.title}" class="img-thumbnail" />
      //              </a>
      //          </div>
      //          <span class="badge badge-pill badge-primary text-white">'.$item->user->name.'</span> <br>                   
      //          <h6 class="mt-2 txt-title-black">'.$item->judul.'</h6>
      //      </div>';
      //       }
      //    return $videos;
      // }

      return view('frontend.video');
   }

   function load_video(Request $request)
   {
      if($request->ajax())
      {
         if($request->id > 0)
         {
            $data = Video::with('user')
            ->where('id', '<', $request->id)
            ->orderBy('id', 'DESC')
            ->limit(3)
            ->get();
         }
         
         else
         {
            $data = Video::with('user')
            ->orderBy('id', 'DESC')
            ->limit(3)
            ->get();
         }
         $output = '';
         $last_id = '';
         if(!$data->isEmpty())
         {
            foreach($data as $item)
            {
               $output .= '<div class="col-md-4 mb-5">
               <div class="pb-2">
                   <a data-fancybox="video-gallery" href="'.route('detail_video', $item->slug).'">
                       <img src="'.thumbnail_video($item->url).'" alt="{item.title}" class="img-thumbnail" />
                   </a>
               </div>
               <span class="badge badge-pill badge-primary text-white">'.$item->user->name.'</span> <br>                   
               <h6 class="mt-2 txt-title-black">'.$item->judul.'</h6>
           </div>';
               $last_id = $item->id;
            }

            if ($data->count() >= 3) {
               $output .= '<div class="justify-content-center align-self-center" id="load_more">
            <button type="button" name="load_more_button" class="btn btn-success form-control" data-id="'.$last_id.'" id="load_more_button">Video Lain</button>
            </div>';
            }
            
            
         }
         else
         {
            $output .= '<div class="justify-content-center align-self-center"  id="load_more">
            <button type="button" name="load_more_button" class="btn btn-info form-control">Belum Ada Video</button>
            </div>
            ';
         }
         
         echo $output;
      }
   }

   public function informasi()
   {
      // $info = Info::latest()->paginate(3);
      // $infos = '';
      // if ($request->ajax()) {
      //    foreach ($info as $item) {
      //          $infos.='<a href="'.$item->url.'" target="_blank" class="link-info">
      //          <h5>'.$item->judul.'</h5>
      //          <p>Selengkapnya</p>
      //      </a>   ';
      //       }
      //    return $infos;
      // }

      return view('frontend.informasi');
   }

   function load_info(Request $request)
   {
      if($request->ajax())
      {
         if($request->id > 0)
         {
            $data = Info::where('id', '<', $request->id)
            ->orderBy('id', 'DESC')
            ->limit(3)
            ->get();
         }
         
         else
         {
            $data = Info::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
         }
         $output = '';
         $last_id = '';
         if(!$data->isEmpty())
         {
            foreach($data as $item)
            {
               $output .= '<a href="'.$item->url.'" target="_blank" class="link-info">
               <h5>'.$item->judul.'</h5>
               <p>Selengkapnya</p>
               </a>';
               $last_id = $item->id;
            }

            if ($data->count() >= 3) {
               $output .= '<div class="justify-content-center align-self-center" id="load_more">
            <button type="button" name="load_more_button" class="btn btn-success form-control" data-id="'.$last_id.'" id="load_more_button">Informasi Lain</button>
            </div>';
            }
            
            
         }
         else
         {
            $output .= '<div class="justify-content-center align-self-center"  id="load_more">
            <button type="button" name="load_more_button" class="btn btn-info form-control">Belum Ada Informasi</button>
            </div>
            ';
         }
         
         echo $output;
      }
   }

   public function faq()
   {
      $faq = Faq::all();
      return view('frontend.faq', compact('faq'));
   }

   public function detail_video(Video $video)
   {
      $detail = $video->load('user');
      return view('frontend.detail_video', compact('detail'));
   }

   public function anggota()
   {
      $jenjang = Jenjang::find(1);

      return view('auth.anggota', compact('jenjang'));
   }

   public function detail_berita(Berita $berita)
   {
      $detail = $berita->load('user');
      return view('frontend.detail_berita', compact('detail'));
   }

   public function berita()
   {
      // $berita = Berita::with('user')->latest()->paginate(3);
      // $news = '';
      // if ($request->ajax()) {
      //    foreach ($berita as $item) {
      //       $tgl = Carbon::parse($item->created_at)->format('d M Y');
      //          $news.='<div class="card">
      //          <img src="'.asset('uploads/'.$item->thumbnail).'" alt="">
      //          <div class="text-berita">
      //              <small class="text-span text-muted"><i class="fas fa-user"></i> '.$item->user->name.' | <i class="fas fa-calendar-day"></i> '.$tgl.'</small>
      //              <h4>'.$item->judul.'</h4>
      //              <p>'.Str::limit(str_replace("&nbsp;", ' ', strip_tags($item->content)), 300, ' [....]').'</p>
      //              <a href="'.route('detail_berita', $item->slug).'">Selengkapnya</a>
      //          </div>                            
      //      </div>';
      //       }
      //    return $news;
      // }

      return view('frontend.berita');
   }

   function load_berita(Request $request)
   {
      if($request->ajax())
      {
         if($request->id > 0)
         {
            $data = Berita::with('user')
            ->where('id', '<', $request->id)
            ->orderBy('id', 'DESC')
            ->limit(3)
            ->get();
         }
         
         else
         {
            $data = Berita::with('user')
            ->orderBy('id', 'DESC')
            ->limit(3)
            ->get();
         }
         $output = '';
         $last_id = '';
         if(!$data->isEmpty())
         {
            foreach($data as $item)
            {
               $tgl = Carbon::parse($item->created_at)->format('d M Y');
               $output .= '<div class="card">
               <img src="'.asset('uploads/'.$item->thumbnail).'" alt="">
               <div class="text-berita">
                   <small class="text-span text-muted"><i class="fas fa-user"></i> '.$item->user->name.' | <i class="fas fa-calendar-day"></i> '.$tgl.'</small>
                   <h4>'.$item->judul.'</h4>
                   <p>'.Str::limit(str_replace("&nbsp;", ' ', strip_tags($item->content)), 300, ' [....]').'</p>
                   <a href="'.route('detail_berita', $item->slug).'">Selengkapnya</a>
               </div>                            
           </div>';
               $last_id = $item->id;
            }

            if ($data->count() >= 3) {
               $output .= '<div style="margin-top: 10px" class="justify-content-center align-self-center" id="load_more">
            <button type="button" name="load_more_button" class="btn btn-success form-control" data-id="'.$last_id.'" id="load_more_button">Berita Lain</button>
            </div>';
            }
            
            
         }
         else
         {
            $output .= '<div class="justify-content-center align-self-center"  id="load_more">
            <button type="button" name="load_more_button" class="btn btn-info form-control">Belum Ada Berita</button>
            </div>
            ';
         }
         
         echo $output;
      }
   }

   public function unduhan()
   {
      // $unduhan = Unduhan::latest()->paginate(3);
      // $berkas = '';
      // if ($request->ajax()) {
      //    foreach ($unduhan as $item) {
      //          if ($item->type == 0) {
      //             $file = asset('uploads/'.$item->berkas);
      //          } else {
      //             $file = $item->url;
      //          }
               
      //          $berkas.='<div class="bs-calltoaction bs-calltoaction-primary">
      //          <div class="row">
      //              <div class="col-md-9 cta-contents">
      //                  <h1 class="cta-title">'.$item->judul.'</h1>
      //              </div>
      //              <div class="col-md-3 cta-button">
      //                  <a href="'.$file.'" class="btn btn-lg btn-block btn-primary">Unduh</a>
      //              </div>
      //           </div>
      //      </div>';
      //       }
      //    return $berkas;
      // }
      return view('frontend.unduhan');
   }

   function load_unduhan(Request $request)
   {
      if($request->ajax())
      {
         if($request->id > 0)
         {
            $data = Unduhan::where('id', '<', $request->id)
            ->orderBy('id', 'DESC')
            ->limit(3)
            ->get();
         }
         
         else
         {
            $data = Unduhan::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
         }
         $output = '';
         $last_id = '';
         if(!$data->isEmpty())
         {
            foreach($data as $item)
            {
               if ($item->type == 0) {
                  $file = asset('uploads/'.$item->berkas);
               } else {
                  $file = $item->url;
               }
               $output .= '<div class="bs-calltoaction bs-calltoaction-primary">
               <div class="row">
                   <div class="col-md-9 cta-contents">
                       <h1 class="cta-title">'.$item->judul.'</h1>
                   </div>
                   <div class="col-md-3 cta-button">
                       <a href="'.$file.'" class="btn btn-lg btn-block btn-primary">Unduh</a>
                   </div>
                </div>
           </div>';
               $last_id = $item->id;
            }

            if ($data->count() >= 3) {
               $output .= '<div style="margin-top: 10px" class="justify-content-center align-self-center" id="load_more">
            <button type="button" name="load_more_button" class="btn btn-success form-control" data-id="'.$last_id.'" id="load_more_button">Dokumen Lain</button>
            </div>';
            }
            
            
         }
         else
         {
            $output .= '<div class="justify-content-center align-self-center"  id="load_more">
            <button type="button" name="load_more_button" class="btn btn-info form-control">Belum Ada Dokumen</button>
            </div>
            ';
         }
         
         echo $output;
      }
   }

   public function daftar(Request $request)
   {
     $this->validate($request, [
        'nisn' => 'required',
        'tanggal_lahir' => 'required',
      ]);

      $countdown = Countdown::find(1);

      if (now()->isBefore($countdown->pendaftaran_pengunggahan)) {
         $response = Http::withBasicAuth('puspresnas', 'Pu5pReSn4s123!@#')->post('https://pelayanan.data.kemdikbud.go.id/api/puspresnas/siswa?id='.$request->nisn.'');
         $data = $response->json();
         if ($data && $data['tanggal_lahir'] == $request->tanggal_lahir) {
            $detail = Jenjang::find($request->jenjang);
            $datas = $data;
            if ($datas['tingkat_pendidikan'] < $detail->kelas_minimal) {
               return redirect()->route('register')->with('kelas',$datas['tingkat_pendidikan']);
            } else {
               $myString = $detail->jenjang;
               $myArray = explode(',', $myString);
               if (in_array($datas['bentuk_pendidikan'], $myArray)) {
                  $sekolah = Http::withBasicAuth('puspresnas', 'Pu5pReSn4s123!@#')->post('https://pelayanan.data.kemdikbud.go.id/api/puspresnas/sekolah?id='.$datas['npsn'].'');
                  $data_sekolah = $sekolah->json();
                  return view('frontend.daftar', compact('datas','detail','data_sekolah'));
               } else {
                   return redirect()->route('register')->with('salah_jenjang',$datas['bentuk_pendidikan']);
               }
               // return $detail->jenjang[0];
            } 
         } else {
            return redirect()->route('register')->with('nisn_not_found','Maaf');
         }
      } else {
         $tutup = Carbon::parse($countdown->pendaftaran_pengunggahan)->format('d M Y h:i:s');
         return redirect('login')->with('waktu_habis',$tutup);
      }
   }

   public function daftar_anggota(Request $request)
   {
     $this->validate($request, [
        'nisn' => 'required',
        'kode' => 'required',
        'tanggal_lahir' => 'required',
      ]);

      $countdown = Countdown::find(1);

      if (Carbon::now()->isBefore($countdown->pendaftaran_pengunggahan)) {
         $response = Http::withBasicAuth('puspresnas', 'Pu5pReSn4s123!@#')->post('https://pelayanan.data.kemdikbud.go.id/api/puspresnas/siswa?id='.$request->nisn.'');
         $data = $response->json();
         if ($data && $data['tanggal_lahir'] == $request->tanggal_lahir) {
            $detail = Jenjang::find($request->jenjang);
            $datas = $data;
            if ($datas['tingkat_pendidikan'] < $detail->kelas_minimal) {
               return redirect()->route('anggotas')->with('kelas',$datas['tingkat_pendidikan']);
            } else {
               $myString = $detail->jenjang;
               $myArray = explode(',', $myString);
               if (in_array($datas['bentuk_pendidikan'], $myArray)) {
   
                  if (kode($request->kode)) {
                     if (ketua($request->nisn)) {
                        return redirect()->route('anggotas')->with('ketua','ketua');
                     } else {
                        $ketua = Biodata::with('user','tim.bidang_provinsi.bidang','tim.bidang_provinsi.province')->where('kode',$request->kode)->first();
                        if (bidang_ketua($ketua->id) == 1) {
                           if (cek_anggota($request->kode)) {
                              return redirect()->route('anggotas')->with('sudah_diisi','ketua');
                           } else {
                              $sekolah = Http::withBasicAuth('puspresnas', 'Pu5pReSn4s123!@#')->post('https://pelayanan.data.kemdikbud.go.id/api/puspresnas/sekolah?id='.$datas['npsn'].'');
                              $data_sekolah = $sekolah->json();
                              return view('frontend.daftar_anggota', compact('ketua','datas','detail','data_sekolah'));
                           }
                        } else {
                           return redirect()->route('anggotas')->with('bidang_mandiri','ketua');
                        }
                     }
                  } else {
                     return redirect()->route('anggotas')->with('kode','kode');
                  }
               } else {
                   return redirect()->route('anggotas')->with('salah_jenjang',$datas['bentuk_pendidikan']);
               }
            } 
         } else {
            return redirect()->route('anggotas')->with('nisn_not_found','Maaf');
         }
      }

      else {
         $tutup = Carbon::parse($countdown->pendaftaran_pengunggahan)->format('d M Y h:i:s');
         return redirect('login')->with('waktu_habis',$tutup);
      }
   }

   public function kecamatan(Request $request)
   {
      $search = $request->search;
      if($search == '')
      {
         $kecamatan = District::with('regency.province')->orderby('name','asc')->limit(5)->get();
      } else {
         $kecamatan = District::with('regency.province')->orderby('name','asc')
         ->where('name', 'like', '%' .$search . '%')
         ->orWhereHas('regency', function($q) use ($search){
            $q->where('name', 'like', '%' .$search . '%');
         })
         ->orWhereHas('regency', function($q) use ($search){
            $q->whereHas('province', function($q) use ($search){
               $q->where('name', 'like', '%' .$search . '%');
            });
         })
         ->get();
      }
  
      $response = array();
      foreach($kecamatan as $item){
         $response[] = array(
            "id"=>$item->id,
            "text"=>$item->name.', '.$item->regency->name.', '.$item->regency->province->name,
         );
      }
  
      echo json_encode($response);
      exit;
   }

   public function province(Request $request)
   {
      $search = $request->search;
      if($search == '')
      {
         $province = Province::orderby('name','asc')->select('id','name')->limit(5)->get();
      } else {
         $province = Province::orderby('name','asc')->select('id','name')->where('name', 'like', '%' .$search . '%')->limit(5)->get();
      }
  
      $response = array();
      foreach($province as $item){
         $response[] = array(
            "id"=>$item->id,
            "text"=>$item->name
         );
      }
  
      echo json_encode($response);
      exit;
   }

   public function bidang_provinsi(Request $request)
   {
      $search = $request->search;
      $province_id = $request->province_id;
      if($search == '')
      {
         $bidang = BidangProvinsi::with('bidang','province')->where('province_id',$province_id)->orderby('id','asc')->limit(15)->get();
      } else {
         $bidang = BidangProvinsi::with('bidang','province')->where('province_id',$province_id)->orderby('id','asc')
         ->whereHas('bidang', function($q) use ($search){
            $q->where('nama_bidang', 'like', '%' .$search . '%');
         })
         ->orWhereHas('province', function($q) use ($search){
            $q->where('name', 'like', '%' .$search . '%');
         })
         ->get();
      }
  
      $response = array();
      foreach($bidang as $item){
         $response[] = array(
            "id"=>$item->id,
            "text"=>$item->bidang->nama_bidang.', '.$item->province->name,
         );
      }
  
      echo json_encode($response);
      exit;
   }

   public function registration_ketua(Request $request)
   {
      $validator = Validator::make($request->all(), [
         'nisn' => 'required|unique:biodatas',
         'name' => 'required|string|max:255',
         'jenis_kelamin' => 'required',
         'agama' => 'required',
         'tempat_lahir' => 'required',
         'tanggal_lahir' => 'required',
         'nohp' => 'required',
         'kelas' => 'required',
         'kelurahan' => 'required',
         'district_id' => 'required',
         'jalan' => 'required',
         'no_rmh' => 'required',
         'rt_rw' => 'required',
         'kodepos' => 'required',
         'email' => 'required|string|email|max:255|unique:users',
         'email_pribadi' => 'required|string|email|max:255',
         'password' => 'required|string|confirmed|min:8',
         'nik' => 'required|unique:biodatas',
         'nama_sekolah' => 'required',
         'jenis_sekolah' => 'required',
         'npsn' => 'required',
         'telp_sekolah' => 'required',
         'kelurahan_sekolah' => 'required',
         'district_sekolah_id' => 'required',
         'jalan_sekolah' => 'required',
         'no_rmh_sekolah' => 'required',
         'rt_rw_sekolah' => 'required',
         'kodepos_sekolah' => 'required',
         'province_id' => 'required',
         'bidang_id' => 'required',
      ]);


      $bidang = BidangProvinsi::find($request->bidang_id);
      if (juara($request->nisn,$bidang->bidang_id)) {
         $juara = NisnJuara::with('bidang')->where('nisn',$request->nisn)->where('bidang_id',$bidang->bidang_id)->first();
         return redirect()->route('register')->with('sudah_juara',$juara->bidang->nama_bidang);
      } else {

         if (cek_peserta($request->bidang_id,$request->npsn)) {
            return redirect()->route('register')->with('peserta_sudah_ada','ada');
         } else {

            if ($validator->fails()) {
               return redirect()->route('register')->withErrors($validator);
            } else {
               DB::beginTransaction();

               try{
         
                  $sekolah = Sekolah::create([
                     'nama_sekolah' => $request->nama_sekolah,
                     'npsn' => $request->npsn,
                     'telp_sekolah' => $request->telp_sekolah,
                     'status' => $request->jenis_sekolah,
                     'kelurahan' => $request->kelurahan_sekolah,
                     'alamat_sekolah_siln' => $request->alamat_sekolah_siln,
                     'district_id' => $request->district_sekolah_id,
                     'jalan' => $request->jalan_sekolah,
                     'no_rmh' => $request->no_rmh_sekolah,
                     'rt_rw' => $request->rt_rw_sekolah,
                     'kodepos' => $request->kodepos_sekolah,
                  ]);
         
                  $tim = $sekolah->tim()->create([
                     'province_id' => $request->province_id,
                     'bidang_id' => $request->bidang_id,
                  ]);
         
                  $tim->pembimbing()->create([]);
         
                  $user = User::create([
                     'name' => ucwords($request->name),
                     'email' => $request->email,
                     'password' => Hash::make($request->password),
                     'role' => 4,
                  ]);
                   
                  $words = explode(" ", $request->name);
                  $acronym = "";
           
                  foreach ($words as $w) {
                     $acronym .= $w[0];
                  }
           
                  $number = str_shuffle(rand(1,123456789));
           
                  $ketua = $user->biodata()->create([
                     'nisn' => $request->nisn,
                     'kode' => $acronym.$number,
                     'kip' => $request->kip,
                     'email_pribadi' => $request->email_pribadi,
                     'nik' => $request->nik,
                     'jenis_kelamin' => $request->jenis_kelamin,
                     'agama' => $request->agama,
                     'alamat_siln' => $request->alamat_siln,
                     'tempat_lahir' => $request->tempat_lahir,
                     'tanggal_lahir' => $request->tanggal_lahir,
                     'ukuran_baju' => $request->ukuran_baju,
                     'nohp' => $request->nohp,
                     'kelas' => $request->kelas,
                     'jalan' => $request->jalan,
                     'no_rmh' => $request->no_rmh,
                     'rt_rw' => $request->rt_rw,
                     'kodepos' => $request->kodepos,
                     'kelurahan' => $request->kelurahan,
                     'district_id' => $request->district_id,
                     'tim_id' => $tim->id,
                  ]);
         
                  $ketua->ayahibu_ketua()->create([
                     'nama_ibu' => $request->nama_ibu,
                     'pekerjaan_ibu' => $request->pekerjaan_ibu,
                     'pendidikan_terakhir_ibu' => $request->pendidikan_terakhir_ibu,
                     'nama_ayah' => $request->nama_ayah,
                     'pekerjaan_ayah' => $request->pekerjaan_ayah,
                     'pendidikan_terakhir_ayah' => $request->pendidikan_terakhir_ayah,
                  ]);
         
                   DB::commit();
         
                   return redirect()->route('login')
                               ->with('sukses','Something Went Wrong!');
         
               } catch(\Exception $e) {
                   DB::rollback();
                   return "gagal";
                   //return redirect()->route('register')->with('warning','Something Went Wrong!');
               }
            }
         }
      }
   }

   public function registration_anggota(Request $request)
   {
      $validator = Validator::make($request->all(), [
         'nisn' => 'required|unique:anggotas',
         'name' => 'required|string|max:255',
         'jenis_kelamin' => 'required',
         'agama' => 'required',
         'tempat_lahir' => 'required',
         'tanggal_lahir' => 'required',
         'nohp' => 'required',
         'kelas' => 'required',
         'kelurahan' => 'required',
         'district_id' => 'required',
         'jalan' => 'required',
         'no_rmh' => 'required',
         'rt_rw' => 'required',
         'kodepos' => 'required',
         'email' => 'required|string|email|max:255|unique:users',
         'email_pribadi' => 'required|string|email|max:255',
         'password' => 'required|string|confirmed|min:8',
         'nik' => 'required|unique:anggotas',
      ]);

      $bidang = BidangProvinsi::find($request->bidang_idd ?? 1);
      if (juara($request->nisn,$bidang->bidang_id ?? 1)) {
         $juara = NisnJuara::with('bidang')->where('nisn',$request->nisn)->where('bidang_id',$bidang->bidang_id)->first();
         return redirect()->route('anggotas')->with('sudah_juara',$juara->bidang->nama_bidang);
      } else {

         if ($validator->fails()) {
            return redirect()->route('register')->withErrors($validator);
         } else {
            DB::beginTransaction();

            try{
      
               $user = User::create([
                  'name' => ucwords($request->name),
                  'email' => $request->email,
                  'password' => Hash::make($request->password),
                  'role' => 5,
               ]);
        
               $anggota = $user->anggota()->create([
                  'nisn' => $request->nisn,
                  'kip' => $request->kip,
                  'email_pribadi' => $request->email_pribadi,
                  'nik' => $request->nik,
                  'jenis_kelamin' => $request->jenis_kelamin,
                  'agama' => $request->agama,
                  'tempat_lahir' => $request->tempat_lahir,
                  'tanggal_lahir' => $request->tanggal_lahir,
                  'ukuran_baju' => $request->ukuran_baju,
                  'nohp' => $request->nohp,
                  'kelas' => $request->kelas,
                  'jalan' => $request->jalan,
                  'no_rmh' => $request->no_rmh,
                  'alamat_siln' => $request->alamat_siln,
                  'rt_rw' => $request->rt_rw,
                  'kodepos' => $request->kodepos,
                  'kelurahan' => $request->kelurahan,
                  'district_id' => $request->district_id,
                  'tim_id' => $request->tim_id,
               ]);
      
               $anggota->ayahibu_anggota()->create([
                  'nama_ibu' => $request->nama_ibu,
                  'pekerjaan_ibu' => $request->pekerjaan_ibu,
                  'pendidikan_terakhir_ibu' => $request->pendidikan_terakhir_ibu,
                  'nama_ayah' => $request->nama_ayah,
                  'pekerjaan_ayah' => $request->pekerjaan_ayah,
                  'pendidikan_terakhir_ayah' => $request->pendidikan_terakhir_ayah,
               ]);
      
                DB::commit();
      
                return redirect()->route('login')
                            ->with('sukses','Something Went Wrong!');
      
            } catch(\Exception $e) {
                DB::rollback();
                return "gagal";
                //return redirect()->route('register')->with('warning','Something Went Wrong!');
            }  
         }
      }
   }

   public function cari_email()
   {
      return view('frontend.forgot_email');
   }

   public function lupa_email(Request $request)
   {
      $nisn = $request->nisn;
      $nama_ibu = $request->nama_ibu;
      $tgl_lahir = $request->tgl_lahir;
      $ketua = $request->ketua;

      if ($request->ketua == 1)
      {
         $cari = Biodata::with('user')->where('nisn',$nisn)->where('tanggal_lahir',$tgl_lahir)
         ->whereHas('ayahibu_ketua', function($q) use ($nama_ibu){
            $q->where('nama_ibu', 'like', '%' .$nama_ibu . '%');
         })->first();

         if ($cari) {
            return response()->json($cari);
         } else {
            return 0;
         }
         
      } else {
         $cari = Anggota::with('user')->where('nisn',$nisn)->where('tanggal_lahir',$tgl_lahir)
         ->whereHas('ayahibu_anggota', function($q) use ($nama_ibu){
            $q->where('nama_ibu', 'like', '%' .$nama_ibu . '%');
         })->first();

         if ($cari) {
            return response()->json($cari);
         } else {
            return 0;
         }
      }
   }

   public function cari_password()
   {
      return view('frontend.forgot_password');
   }

   public function lupa_password(Request $request)
   {
      $nisn = $request->nisn;
      $email = $request->email;
      $nama_ibu = $request->nama_ibu;
      $tgl_lahir = $request->tgl_lahir;
      $ketua = $request->ketua;

      if ($request->ketua == 1)
      {
         $cari = User::where('email',$email)->whereHas('biodata', function($q) use ($nisn,$tgl_lahir,$nama_ibu){
            $q->where('nisn', $nisn)->where('tanggal_lahir', $tgl_lahir)
            ->whereHas('ayahibu_ketua', function($q) use ($nama_ibu){
               $q->where('nama_ibu', 'like', '%' .$nama_ibu . '%');
            });
         })->first();

         if ($cari) {
            return response()->json($cari);
         } else {
            return 0;
         }
         
      } else {
         $cari = User::where('email',$email)->whereHas('anggota', function($q) use ($nisn,$tgl_lahir,$nama_ibu){
            $q->where('nisn', $nisn)->where('tanggal_lahir', $tgl_lahir)
            ->whereHas('ayahibu_anggota', function($q) use ($nama_ibu){
               $q->where('nama_ibu', 'like', '%' .$nama_ibu . '%');
            });
         })->first();

         if ($cari) {
            return response()->json($cari);
         } else {
            return 0;
         }
      }
   }

   public function update_password(Request $request)
   {
      $request->validate([
         'password' => 'required|string|min:8',
         'user_id' => 'required',
         'email' => 'required',
      ]);

      $user = User::where('id',$request->user_id)->where('email',$request->email)->first();
      $user->update([
         'password' => Hash::make($request->password),
      ]);

      return redirect()->route('login');
   }

   public function cek_tiket()
   {
      return view('frontend.cek_tiket');
   }

   public function cek_tikets(Request $request)
   {
      $kode = $request->kode;
      $kendala = Kendala::with('bidang')->where('kode',$kode)->first();
      if ($kendala) {

         if (empty($kendala->solution)) {
            $solusi = '<div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Mohon Maaf Belum Ada Jawaban</h4>
            <p>'.$kendala->judul.'</p>
            <hr>
            <p class="mb-0">'.$kendala->detail.'</p>
          </div>';
         } else {
            $solusi = '<div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Sudah Ada Balasan Narahubung</h4>
            <p>'.$kendala->judul.'</p>
            <hr>
            <p class="mb-0">'.$kendala->detail.'</p>
            <hr>
            <p class="mb-0">'.$kendala->solution.'</p>
          </div>';
         }
         
         
         
         echo $solusi;
      } else {
         return 0;
      }
   }
}
