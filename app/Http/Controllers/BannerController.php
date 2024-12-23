<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\program;
use Aws_lib;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;

class BannerController extends Controller
{

    private $filepath = '/public/banner/';

    function view_index()
    {
        $Banner = Banner::all();
        return view('administrator.banner', ['banner' => $Banner]);
    }
    public function view_create()
    {
        return view('administrator.banner_new', ['programList' => program::all()]);
    }
    public function view_edit($id)
    {
        $data = Banner::findOrFail($id);
        return view('administrator.banner_edit', ['banner' => $data, 'programList' => program::all()]);
    }
    /* -------------------------------------------------------------------------- */
    /*                                  Mutation                                  */
    /* -------------------------------------------------------------------------- */
    public function mutate_create(Request $request)
    {
        $customMessages = [
            'image.image' => "Pastikan file yang diinput merupakan gambar",
            'image.required' => "Pastikan file yang diinput merupakan gambar",
        ];

        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ], $customMessages);

        $filename = time() . '_' . $request->file('image')->getClientOriginalName();

        if ($request['flexRadioDefault'] == 'PILOT') {
            $post = Banner::create([
                'id' => rand(1, 99999999),
                'program_id' => $request['idProgram'],
                'name' => $filename, 'name' => $filename,
            ]);
        } else {
            $post = Banner::create([
                'id' => rand(1, 99999999),
                'name' => $filename, 'name' => $filename,
            ]);
        }
        if ($post) {
            session()->flash('message-success', 'Banner berhasil disimpan');
            $request->file('image')->storeAs($this->filepath, $filename);

            if (env('USE_CDN')) {
                require_once app_path('Helpers/Aws_lib.php');
                $aws = new Aws_lib();
                $aws->upload_file('./storage/banner/' . $filename, 'uploads/pos-pintar/storage/banner/' . $filename);
            }
        }

        return redirect()->route('view_banner_create');
    }
    public function mutate_delete($id)
    {
        // $data = instance::findOrFail($id);
        // $data->delete();
        try {
            $data = Banner::findOrFail($id);
            $data->delete();

            Storage::delete('/public/banner/' . $data->name);
            session()->flash('message-success', 'Banner berhasil dihapus');
        } catch (QueryException $e) {
            session()->flash('message-deleted', 'Banner gagal dihapus');
        }

        return redirect()->route('view_admin_banner');
    }
    public function mutate_edit(Request $request)
    {
        $data = Banner::find($request->id);
        if ($request->hasFile('image')) {
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();

            Storage::delete('/public/banner/' . $data->name);
            $data->name = $filename;
            $request->file('image')->storeAs($this->filepath, $filename);

            if (env('USE_CDN')) {
                require_once app_path('Helpers/Aws_lib.php');
                $aws = new Aws_lib();
                $aws->upload_file('./storage/banner/' . $filename, 'uploads/pos-pintar/storage/banner/' . $filename);
            }
        }
        if ($request['flexRadioDefault'] == "PILOT") {
            $data->program_id = $request['idProgram'];
        } else {
            $data->program_id = null;
        }
        $data->save();
        session()->flash('message-success', 'Banner  berhasil diubah');
        return redirect()->route("view_admin_banner");
    }

    /* -------------------------------------------------------------------------- */
    /*                                     API                                    */
    /* -------------------------------------------------------------------------- */

    public function delete(string $id)
    {
        $data = Banner::find($id);
        if ($data == null) {
            return response(null, 404);
        }

        if ($data->delete()) {
            Storage::delete('/public/banner/' . $data->image);
        }
        return response(null, 204);
    }
}
