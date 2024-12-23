<?php

namespace App\Http\Controllers;

use App\Models\PosLocation;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class PosLocationController extends Controller
{

    public function view_create_location()
    {
        return view('administrator.pos_location_new');
    }

    public function view_location()
    {
        $location = PosLocation::all();

        return view('administrator.pos_location', ['location' => $location]);
    }

    public function view_location_edit($id)
    {
        $location = PosLocation::findOrFail($id);

        return view('administrator.pos_location_edit', ['location' => $location]);
    }

    public function mutate_create_location(Request $request)
    {

        $customMessages = [
            'pos_location.required' => 'Pastikan lokasi pos terisi dengan benar',
            'kcu_or_kcp.required' => 'Pastikan lokasi kcu/kcp terisi dengan benar',
        ];

        $validatedData = $request->validate([
            'pos_location' => 'required',
            'kcu_or_kcp' => 'required',
        ], $customMessages);

        try {
            PosLocation::create([
                'id' => rand(1, 99999999),
                'pos_location' => $request->pos_location,
                'kcu_or_kcp' => $request->kcu_or_kcp,
            ]);

            session()->flash('message-success', 'lokasi pos gagal dibuat');
        } catch (QueryException $th) {
            session()->flash('message-deleted', 'lokasi pos gagal dibuat');
        }

        return redirect()->route("view_location");
    }

    public function mutate_edit(Request $request)
    {
        try {
            $data = PosLocation::find($request->id);
            $data->pos_location = $request->pos_location;
            $data->kcu_or_kcp = $request->kcu_or_kcp;


            $data->save();
        } catch (QueryException $th) {
            session()->flash('message-deleted', 'lokasi pos gagal diubah');
            return redirect()->route("view_location");
        }


        session()->flash('message-success', 'lokasi pos berhasil diubah');
        return redirect()->route("view_location");
    }

    public function mutate_delete($id)
    {
        try {
            $data = PosLocation::findOrFail($id);
            $data->delete();
        } catch (QueryException $th) {
            session()->flash('message-deleted', 'lokasi pos gagal dihapus');
            return redirect()->route("view_location");
        }

        session()->flash('message-deleted', 'lokasi pos berhasil dihapus');
        return redirect()->route("view_location");
    }
}
