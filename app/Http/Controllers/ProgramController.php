<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\program;
use App\Models\instansi_model as instansi;
use App\Models\program_categories;
use Aws_lib;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;


class ProgramController extends Controller
{

    private $filepath = '/public/program/';

    /* -------------------------------------------------------------------------- */
    /*                                    View                                    */
    /* -------------------------------------------------------------------------- */

    public function view_index()
    {
        if (Auth::user()->role == "ADMIN") {
            $programList = program::where('instansi_id', Auth::user()->instansi_id)->get();
        } else {
            $programList = program::all();
        }
        return view('administrator.program', ['programList' => $programList]);
    }

    public function view_create()
    {
        $instansiList = instansi::all();
        $programCategorisList = program_categories::all();
        return view('administrator.program_new', ['instansiList' => $instansiList, 'programCategorisList' => $programCategorisList]);
    }

    public function view_edit($id)
    {
        $data = program::findOrFail($id);
        $instansiList = instansi::all();
        $programCategorisList = program_categories::all();
        return view('administrator.program_edit', ['program' => $data, 'instansiList' => $instansiList, 'programCategorisList' => $programCategorisList]);
    }

    /* -------------------------------------------------------------------------- */
    /*                                  Mutation                                  */
    /* -------------------------------------------------------------------------- */

    public function mutate_create(Request $request)
    {

        $program = $request->url;
        if (!Str::contains($program, "https")) {
            $program =  'https://' . $program;
        }

        $customMessages = [
            'program.required' => 'Pastikan program terisi dengan benar',
            'gambar.required' => 'Pastikan gambar terisi dengan benar',
            'kategori.required' => 'Pastikan kategori terisi dengan benar',
            'tag.required' => 'Pastikan tag terisi dengan benar',
            'url.required' => 'Pastikan url terisi dengan benar',
            'editor.required' => 'Pastikan deskripsi terisi dengan benar',
            'editor.required' => 'Pastikan deskripsi terisi dengan benar',
            'instansi.required' => 'Pastikan instansi terisi dengan benar',
            'program.unique' => "Nama program sudah pernah di gunakan"
        ];

        $validatedData = $request->validate([
            'program' => 'required|unique:program,name',
            'gambar' => 'required|image|mimes:jpeg,png,jpg',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg',
            'id_categori' => 'required',
            'tag' => 'required',
            'url' => 'required',
            'editor' => 'required',
            'editor' => 'required',
            'instansi' => 'required|numeric',
        ], $customMessages);

        $filename = time() . '_' . $request->file('gambar')->getClientOriginalName();
        $thumbname = time() . '_' . $request->file('thumbnail')->getClientOriginalName();

        $post = program::create([
            'id' => rand(1, 99999999),
            'name' => $request->program,
            'image' => $filename,
            'thumbnail' => $thumbname,
            'category' => $request->kategori,
            'program_categories_id' => $request->id_categori,
            'tag' => $request->tag,
            'url' => $program,
            'description' => $request->editor,
            'featured' => ($request->fitur) ? 1 : 0,
            'instansi_id' => $request->instansi,
            'harga' => $request->harga,
            'call_center' => $request->call_center,
            'slug' => Str::slug($request->program, '-'),
        ]);
        if ($post) {
            session()->flash('message-success', 'Program ' . $request->program . ' berhasil disimpan');
            $request->file('gambar')->storeAs($this->filepath, $filename);
            $request->file('thumbnail')->storeAs($this->filepath, $thumbname);

            if (env('USE_CDN')) {
                require_once app_path('Helpers/Aws_lib.php');
                $aws = new Aws_lib();
                $aws->upload_file('./storage/program/' . $filename, 'uploads/pos-pintar/storage/program/' . $filename);
                $aws->upload_file('./storage/program/' . $thumbname, 'uploads/pos-pintar/storage/program/' . $thumbname);
            }
        }
        return redirect()->route("view_admin_program");
    }

    public function mutate_delete($id)
    {
        try {
            $data = program::findOrFail($id);
            $data->delete();

            Storage::delete($this->filepath . $data->image);
            session()->flash('message-success', 'Program ' . $data->name . ' berhasil dihapus');
        } catch (QueryException $e) {
            session()->flash('message-deleted', 'Program ' . $data->name . ' gagal dihapus');
        }
        return redirect()->route("view_admin_program");
    }

    public function mutate_edit(Request $request)
    {

        $program = $request->url;
        if (!Str::contains($program, "https")) {
            $program =  'https://' . $program;
        }

        $customMessages = [
            'program.required' => 'Pastikan program terisi dengan benar',
            'id_categori.required' => 'Pastikan kategori terisi dengan benar',
            'tag.required' => 'Pastikan tag terisi dengan benar',
            'url.required' => 'Pastikan url terisi dengan benar',
            'editor.required' => 'Pastikan deskripsi terisi dengan benar',
            'harga.required' => 'Pastikan harga terisi dengan benar',
            'instansi.required' => 'Pastikan instansi terisi dengan benar',
        ];

        $validatedData = $request->validate([
            'program' => 'required',
            'id_categori' => 'required',
            'tag' => 'required',
            'url' => 'required',
            'harga' => 'required',
            'editor' => 'required',
            'instansi' => 'required|numeric',
        ], $customMessages);

        if (env('USE_CDN')) {
            require_once app_path('Helpers/Aws_lib.php');
            $aws = new Aws_lib();
        }

        $flight = program::find($request->id);
        if ($request->hasFile('gambar')) {
            $filename = time() . '_' . $request->file('gambar')->getClientOriginalName();

            Storage::delete($this->filepath . $flight->image);
            $flight->image = $filename;
            $request->file('gambar')->storeAs($this->filepath, $filename);

            if (env('USE_CDN')) {
                $aws->upload_file('./storage/program/' . $filename, 'uploads/pos-pintar/storage/program/' . $filename);
            }
        }
        if ($request->hasFile('thumbnail')) {
            $thumbname = time() . '_' . $request->file('thumbnail')->getClientOriginalName();

            Storage::delete($this->filepath . $flight->thumbnail);
            $flight->thumbnail = $thumbname;
            $request->file('thumbnail')->storeAs($this->filepath, $thumbname);

            if (env('USE_CDN')) {
                $aws->upload_file('./storage/program/' . $thumbname, 'uploads/pos-pintar/storage/program/' . $thumbname);
            }
        }
        $flight->name = $request->program;
        $flight->featured = ($request->fitur) ? 1 : 0;
        $flight->program_categories_id = $request->id_categori;
        $flight->tag = $request->tag;
        $flight->url = $program;
        $flight->harga = $request->harga;
        $flight->call_center = $request->call_center;
        $flight->description = $request->editor;
        $flight->slug = Str::slug($request->program, '-');
        $flight->instansi_id = $request->instansi;
        $flight->save();
        session()->flash('message-edit', 'Program ' . $request->program . ' berhasil diubah!');
        return redirect()->route("view_admin_program");
    }

    /* -------------------------------------------------------------------------- */
    /*                                     API                                    */
    /* -------------------------------------------------------------------------- */


    public function delete(string $id)
    {
        $data = program::find($id);
        if ($data == null) {
            return response(null, 404);
        }

        if ($data->delete()) {
            Storage::delete($this->filepath . $data->logo);
        }

        return response(null, 204);
    }

    public function ProgramDetail($slug)
    {
        $program = program::where('slug', $slug)->first();
        // dd($program->logo);
        return view("administrator.program_detail", ['program' => $program]);
    }
}
