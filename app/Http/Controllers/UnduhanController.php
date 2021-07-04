<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Unduhan;
use Storage;

class UnduhanController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            return datatables()->of(Unduhan::query())
            ->editColumn('edit', function ($data) {
                $mystring = '<a href="'.route("unduhan.edit", $data->id).'" class="bg-indigo-500 text-white p-2 rounded mr-2 font-bold">Edit</a><a href="'.route("hapus.unduhan", $data->id).'" onclick="return confirm(`Apakah anda ingin menghapus ?`)" class="bg-red-500 text-white p-2 rounded mr-2 font-bold">Hapus</a>';
                return $mystring;
            })
            ->editColumn('file', function ($data) {
                if ($data->type == 0)
                {
                    $berkas = '<a href="'.asset('uploads/'.$data->berkas).'" class="bg-indigo-500 text-white p-2 rounded mr-2 font-bold">Buka Berkas</a>';
                }

                else if ($data->type == 1)
                {
                    $berkas = '<a href="'.$data->url.'" class="bg-indigo-500 text-white p-2 rounded mr-2 font-bold">Buka Tautan</a>';
                }

                return $berkas;
            })
            ->rawColumns(['edit','file'])
            ->make(true);
        }
        return view('admin.unduhan.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'type' => 'required',
        ]);

        if ($request->type == 0) {
            Unduhan::create([
                'judul' => $request->judul,
                'type' => $request->type,
                'berkas' => $request->file('berkas')->store('unduhan'), 
            ]);
        } else if ($request->type == 1) {
            Unduhan::create([
                'judul' => $request->judul,
                'type' => $request->type,
                'url' => $request->url,
            ]);
        }

        return redirect()->route('unduhan.index');
    }

    public function edit($id)
    {
        $unduhan = Unduhan::find($id);
        return view('admin.unduhan.edit', compact('unduhan'));        
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required',
            'type' => 'required',
            
        ]);
        
        $file = Unduhan::find($id);

        if ($file->type == $request->type) {
            if ($request->type == 0) {
                Storage::delete($file->berkas);
                $file->update([
                    'judul' => $request->judul,
                    'type' => $request->type,
                    'berkas' => $request->file('berkas')->store('unduhan'), 
                ]);
            } else if ($request->type == 1) {
                $file->update([
                    'judul' => $request->judul,
                    'type' => $request->type,
                    'url' => $request->url,
                ]);
            }
        } else {
            if (empty($file->berkas)) {
                if ($request->type == 0) {
                    Storage::delete($file->berkas);
                    $file->update([
                        'judul' => $request->judul,
                        'type' => $request->type,
                        'berkas' => $request->file('berkas')->store('unduhan'), 
                    ]);
                } else if ($request->type == 1) {
                    $file->update([
                        'judul' => $request->judul,
                        'type' => $request->type,
                        'url' => $request->url,
                    ]);
                }
            } else {
                Storage::delete($file->berkas);
                if ($request->type == 0) {
                    $file->update([
                        'judul' => $request->judul,
                        'type' => $request->type,
                        'berkas' => $request->file('berkas')->store('unduhan'), 
                    ]);
                } else if ($request->type == 1) {
                    $file->update([
                        'judul' => $request->judul,
                        'type' => $request->type,
                        'url' => $request->url,
                    ]);
                }
            }
        }

        return redirect()->route('unduhan.index');
      }
 
    public function destroy($id)
    {
        $file = Unduhan::find($id);

        if (!$file) {
            return redirect()->back();
        }
        
        if (!empty($file->berkas))
        {
            Storage::delete($file->berkas);
        }
        
        $file->delete();
        return redirect()->route('unduhan.index');
    }      
}
