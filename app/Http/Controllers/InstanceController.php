<?php

namespace App\Http\Controllers;

use App\Models\instansi_model as instance;
use Aws_lib;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;

class InstanceController extends Controller
{

    private $filepath = '/public/instance_logo/';

    /* -------------------------------------------------------------------------- */
    /*                                    View                                    */
    /* -------------------------------------------------------------------------- */

    public function view_index()
    {
        $instanceList = instance::all();
        return view('administrator.instance', ['InstanceList' => $instanceList]);
    }

    public function view_create()
    {
        return view('administrator.instance_new');
    }

    public function view_edit($id)
    {
        $data = instance::findOrFail($id);
        return view('administrator.instance_edit', ['instance' => $data, 'id' => $id]);
    }

    /* -------------------------------------------------------------------------- */
    /*                                  Mutation                                  */
    /* -------------------------------------------------------------------------- */

    public function mutate_create(Request $request)
    {
        $customMessages = [
            'instance.required' => 'Pastikan instansi terisi dengan benar',
            'logo.required' => 'Pastikan logo terisi dengan benar',
            'logo.image' => "Pastikan format gambar yang diinput benar",
            'instance.unique' => "Nama instansi sudah pernah di gunakan"
        ];

        $validatedData = $request->validate([
            'instance' => 'required|max:255|unique:instansi,name',
            'logo' => 'required|image|mimes:jpeg,png,jpg',
        ], $customMessages);

        $filename = time() . '_' . $request->file('logo')->getClientOriginalName();

        $post = instance::create([
            'id' => rand(1, 99999999),
            'name' => $request->instance,
            'email' => $request->email,
            'logo' => $filename,
            'slug' => Str::slug($request->instance, '-'),
        ]);
        if ($post) {
            session()->flash('message-success', 'Instansi ' . $request->instance . ' berhasil disimpan');
            $request->file('logo')->storeAs($this->filepath, $filename);

            if (env('USE_CDN')) {
                require_once app_path('Helpers/Aws_lib.php');
                $aws = new Aws_lib();
                $aws->upload_file('./storage/instance_logo/' . $filename, 'uploads/pos-pintar/storage/instance_logo/' . $filename);
            }
        }

        return redirect()->route('view_admin_instance');
    }

    public function mutate_delete($id)
    {
        // $data = instance::findOrFail($id);
        // $data->delete();
        try {
            $data = instance::findOrFail($id);
            $data->delete();

            Storage::delete($this->filepath . $data->logo);
            session()->flash('message-deleted', 'Instansi ' . $data->name . ' berhasil dihapus');
        } catch (QueryException $e) {
            session()->flash('message-deleted', 'Instansi ' . $data->name . ' gagal dihapus');
        }

        return redirect()->route('view_admin_instance');
    }

    public function mutate_edit(Request $request)
    {
        $flight = instance::find($request->id);
        if ($request->hasFile('logo')) {
            $filename = time() . '_' . $request->file('logo')->getClientOriginalName();

            Storage::delete($this->filepath . $flight->logo);
            $flight->logo = $filename;
            $request->file('logo')->storeAs($this->filepath, $filename);

            if (env('USE_CDN')) {
                require_once app_path('Helpers/Aws_lib.php');
                $aws = new Aws_lib();
                $aws->upload_file('./storage/instance_logo/' . $filename, 'uploads/pos-pintar/storage/instance_logo/' . $filename);
            }
        }
        $flight->name = $request->instance;
        $flight->email = $request->email;
        $flight->slug = Str::slug($request->instance, '-');

        $flight->save();
        session()->flash('message-edit', 'Instansi ' . $request->instance . ' berhasil diubah');
        return redirect()->route("view_admin_instance");
    }

    /* -------------------------------------------------------------------------- */
    /*                                     API                                    */
    /* -------------------------------------------------------------------------- */

    public function delete(string $id)
    {
        $data = instance::find($id);
        if ($data == null) {
            return response(null, 404);
        }

        if ($data->delete()) {
            Storage::delete($this->filepath . $data->logo);
        }

        return response(null, 204);
    }

    public function InstanceDetail($slug)
    {
        $instance = instance::where('slug', $slug)->first();
        // dd($instance->logo);
        return view('administrator.instance_detail', ['instance' => $instance]);
    }
}
