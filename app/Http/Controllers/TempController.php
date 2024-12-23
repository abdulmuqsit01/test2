<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
// REMOVE USE
use App\Models\program;
use App\Models\instansi_model as instansi;
use App\Models\program_categories;
use App\Models\user_enrollment;






class TempController extends Controller
{
    /* -------------------------------------------------------------------------- */
    /*                                    View                                    */
    /* -------------------------------------------------------------------------- */
    public function list()
    {
        $listEnroll = user_enrollment::all();
        return view('temp.list', ['enroll' => $listEnroll]);
    }
    public function view_admin_enrollment_edit($id)
    {
        // dd($id);
        $enroll = user_enrollment::where('id', '=', $id)->get();
        // dd($enroll[0]->program_id);
        $program = program::where('id', '=', $enroll[0]->program_id)->get();
        $programCategorisList = program_categories::all();
        return view('temp.enrollment_edit', ['program' => $program, 'enroll' => $enroll, 'programCategorisList' => $programCategorisList]);
    }
    /* -------------------------------------------------------------------------- */
    /*                                  Mutation                                  */
    /* -------------------------------------------------------------------------- */
    public function mutate_admin_enrollment_edit(Request $request)
    {

        $data = user_enrollment::find($request->id);

        $data->nama = $request->nama;
        $data->no_hp = $request->no_hp;
        $data->email = $request->email;
        $data->kabupaten = $request->kabupaten;
        $data->kecamatan = $request->kecamatan;
        $data->provinsi = $request->provinsi;
        $data->id_address = $request->address_id;





        $data->save();

        return redirect()->back();
    }
}
