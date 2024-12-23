<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;

use App\Models\program_categories as kategori;
use Aws_lib;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;


class kategoriController extends Controller
{

    private $filepath = '/public/kategori_image/';

    public function view_index()
    {
        $kategoriList = kategori::all();
        return view('administrator.kategori', ['kategori' => $kategoriList]);
    }

    public function view_create()
    {
        return view('administrator.kategori_new');
    }

    public function view_edit($id)
    {
        $data = kategori::findOrFail($id);
        return view('administrator.kategori_edit', ['kategori' => $data, 'id' => $id]);
    }

    public function mutate_delete($id)
    {
        try {
            $data = kategori::findOrFail($id);
            $data->delete();

            Storage::delete($this->filepath . $data->image);
            Storage::delete($this->filepath . $data->thumbnail);
            session()->flash('message-success', 'kategori ' . $data->name . ' berhasil dihapus');
        } catch (QueryException $e) {
            session()->flash('message-deleted', 'kategori ' . $data->name . ' gagal dihapus');
        }

        return redirect()->route('view_admin_kategori');
    }

    public function mutate_create(Request $request)
    {
        $customMessages = [
            'nama.required' => 'Pastikan nama terisi dengan benar',
            'image.required' => 'Pastikan image terisi dengan benar',
            'image.image' => "Pastikan format gambar yang diinput benar",
            'nama.unique' => "Nama kategori sudah pernah di gunakan"
        ];

        $request->validate([
            'nama' => 'required|max:255|unique:program_categories,name',
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg',
        ], $customMessages);

        try {
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $thumbname = time() . '_' . $request->file('thumbnail')->getClientOriginalName();

            kategori::create([
                'id' => rand(1, 99999999),
                'name' => $request->nama,
                'slug' => Str::slug($request->nama, '-'),
                'image' => $filename,
                'thumbnail' => $thumbname,

            ]);
            session()->flash('message-success', 'kategori ' . $request->nama . ' berhasil disimpan');
            $request->file('image')->storeAs($this->filepath, $filename);
            $request->file('thumbnail')->storeAs($this->filepath, $thumbname);

            if (env('USE_CDN')) {
                require_once app_path('Helpers/Aws_lib.php');
                $aws = new Aws_lib();
                $aws->upload_file('./storage/kategori_image/' . $filename, 'uploads/pos-pintar/storage/kategori_image/' . $filename);
                $aws->upload_file('./storage/kategori_image/' . $thumbname, 'uploads/pos-pintar/storage/kategori_image/' . $thumbname);
            }
        } catch (QueryException $e) {
            session()->flash('message-deleted', 'kategori ' . $request->nama . ' gagal disimpan');
        }

        return redirect()->route('view_kategori_create');
    }

    public function mutate_edit(Request $request)
    {
        if (env('USE_CDN')) {
            require_once app_path('Helpers/Aws_lib.php');
            $aws = new Aws_lib();
        }

        $flight = kategori::find($request->id);
        if ($request->hasFile('image')) {
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();

            Storage::delete($this->filepath . $flight->image);
            $flight->image = $filename;
            $request->file('image')->storeAs($this->filepath, $filename);

            if (env('USE_CDN')) {
                $aws->upload_file('./storage/kategori_image/' . $filename, 'uploads/pos-pintar/storage/kategori_image/' . $filename);
            }
        }
        if ($request->hasFile('thumbnail')) {
            $thumbname = time() . '_' . $request->file('thumbnail')->getClientOriginalName();

            Storage::delete($this->filepath . $flight->thumbnail);
            $flight->thumbnail = $thumbname;
            $request->file('thumbnail')->storeAs($this->filepath, $thumbname);

            if (env('USE_CDN')) {
                $aws->upload_file('./storage/kategori_image/' . $thumbname, 'uploads/pos-pintar/storage/kategori_image/' . $thumbname);
            }
        }
        $flight->name = $request->nama;

        $flight->save();
        session()->flash('message-success', 'kategori ' . $request->nama . ' berhasil diubah');

        return redirect()->route("view_admin_kategori");
    }
}
