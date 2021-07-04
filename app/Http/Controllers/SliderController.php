<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Models\Slider;

class SliderController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            return datatables()->of(Slider::query())
            ->editColumn('edit', function ($data) {
                $mystring = '<a href="'.route("slider.edit", $data->id).'" class="bg-indigo-500 text-white p-2 rounded mr-2 font-bold">Edit</a><a href="'.route("hapus.slider", $data->id).'" onclick="return confirm(`Apakah anda ingin menghapus ?`)" class="bg-red-500 text-white p-2 rounded mr-2 font-bold">Hapus</a>';
                return $mystring;
            })
            ->rawColumns(['edit'])
            ->make(true);
        }
        return view('admin.slider.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:1024',
        ]);

        Slider::create([
            'title' => $request->title,
            'image' => $request->file('image')->store('slider'), 
        ]);

        return redirect()->route('slider.index');
    }

    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:1024',
        ]);

        $slider = Slider::find($id);

        if (empty($request->file('image'))) {
            $slider->update([
                'title' => $request->title,
            ]);
        } else {
            Storage::delete($slider->image);
            $slider->update([
                'title' => $request->title,
                'image' => $request->file('image')->store('slider'), 
            ]);
        }

        return redirect()->route('slider.index');
    }

    public function destroy($id)
    {
        $slider = Slider::find($id);
        if (!$slider) {
            return redirect()->back();
        }
        Storage::delete($slider->image);
        $slider->delete();
        return redirect()->route('slider.index');
    }


}
