<?php

namespace App\Http\Controllers;

use App\Models\banner_model;
use App\Models\desktop_user_model;
use App\Models\program;
use App\Models\user_enrollment;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\instansi_model as instance;
use App\Models\program_categories;
use App\Models\interest;
use App\Models\Banner;
use Exception;
use App\Http\Controllers\EmailController as EmailController;
use App\Models\EmailModel;
use App\Models\PosLocation;

class DesktopController extends Controller
{
    public function mutate_register(Request $request)
    {
        $programID = $request->program_id;

        $programQuery = 'SELECT program.id, program.name,program.call_center,instansi.email, program.image,program.url,program.description, instansi.name AS instansi FROM program LEFT JOIN instansi ON program.instansi_id=instansi.id WHERE program.id = ? LIMIT 1';

        //normalize phone number
        if (substr($request->no_hp, 0, 1) == 0) {
            $phoneNumber = mb_substr($request->no_hp, 1);
        } else if (substr($request->no_hp, 0, 2) == 62) {
            $phoneNumber = mb_substr($request->no_hp, 2);
        } else {
            $phoneNumber = $request->no_hp;
        }

        $program = DB::select($programQuery, [$programID]);

        if ($program[0] == null) {
            return abort(400, "Program tidak ada atau tidak tersedia");
        }

        $customMessages = [
            'nama.required' => 'Pastikan nama terisi dengan benar',
            'provinsi.required' => 'Pastikan provinsi terisi dengan benar',
            'provinsi.required' => 'Pastikan provinsi terisi dengan benar',
            'no_hp.required' => 'Pastikan no hp terisi dengan benar',
            'no_hp.max' => 'Pastikan no hp tidak lebih dari 13 karakter',
            'platform.required' => 'Pastikan platform terisi dengan benar',
            'email.required' => 'Pastikan platform terisi dengan benar',
            'email.email' => 'Pastikan anda menuliskan email dengan benar',

        ];
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'provinsi' => 'required',
            'provinsi' => 'required',
            'no_hp' => 'required|max:13',
            'email' => 'required|email',
        ], $customMessages);

        try {
            if ($request->terms == "valid") {
                user_enrollment::create([
                    'id' => rand(1, 99999999),
                    'nama' => $request->nama,
                    'provinsi' => $request->provinsi,
                    'kecamatan' => strtoupper($request->kecamatan),
                    'kabupaten' => $request->kabupaten,
                    'id_address' => $request->address_id,
                    'no_hp' => ('+62' . $phoneNumber),
                    'email' => $request->email,
                    'program_id' => $programID,
                    'mobile_user' => null,
                    'lokasi_kantor_pos' => $request->id_lokasi,
                    // 'platform' => 'desktop',
                ]);;

                EmailModel::create([
                    'id' => rand(1, 9999),
                    'destination_email' => $request->email,
                    'url' => $program[0]->url,
                    'call_center' => $program[0]->call_center,
                    'alamat' => (strtoupper($request->kecamatan) . ', ' . $request->kabupaten . ', ' . $request->provinsi),
                    'program' => $program[0]->name,
                    'instansi' => $program[0]->instansi,
                    'nama' => $request->nama,
                    'no_hp' => ('+62' . $phoneNumber),
                    'instanceEmail' => $program[0]->email, 'from' => env('MAIL_FROM_ADDRESS'),
                    'lokasi_kantor_pos' => $request->id_lokasi,
                ]);

                // $sendEmailController = new EmailController($emailData);
                // $sendEmailController->mutate_send_email();

            } else {
                $customMessages = ['custom_error' => 'Pastikan syarat dan ketentuan telah disetujui'];
                // return redirect()->back()->withErrors($customMessages);
                return response()->json($customMessages);
            }
        } catch (QueryException $e) {
            $customMessages = ['custom_error' => 'Gagal melakukan pendaftaran'];
            // return redirect()->back()->withErrors($customMessages);
            return response()->json($customMessages);
        }

        return response()->json(['success' => true]);
    }
    /* -------------------------------------------------------------------------- */
    /*                                    View                                    */
    /* -------------------------------------------------------------------------- */
    public function view_home(Request $request)
    {
        // $programListPilot = Banner::where('program_id', '=', null)->get();
        $programListPilot = DB::select('SELECT banner.id,banner.name,banner.program_id,program.slug from banner INNER JOIN program ON banner.program_id=program.id;');
        $programListMain = DB::select('SELECT * from banner where program_id is null');
        $bannerList = Banner::all();
        $programList = DB::select('SELECT program.name, program.image,program_categories.name AS program_kategori, program.harga, program.tag, program.slug from program LEFT JOIN program_categories ON program.program_categories_id=program_categories.id;');
        return view('desktop.homescreen', [
            'getData' => [
                'banner' => banner_model::all(),
                'banner' => banner_model::all(),
                'categoryList' => program_categories::all(),
                'programListFeture' => program::where('featured', '=', '1')->limit(3)->get(),
                'programListFetures' => program::where('featured', '=', '1')->limit(5)->get(),
                'program_enroll' => user_enrollment::pluck('program_id')->toArray(),
                'instansiList' => instance::all(),
                'filterByCategoryList' => DB::select('SELECT DISTINCT program_categories.name, program_categories.id FROM program left JOIN program_categories ON program.program_categories_id=program_categories.id;'),
                'filterByInstansiList' => DB::select('SELECT DISTINCT instansi.name, instansi.id FROM program left JOIN instansi ON program.instansi_id=instansi.id;'),
            ],
            'programList' => $programList,
            'programListMain' => $programListMain,
            'programListPilot' => $programListPilot,
            'bannerList' => $bannerList,
        ]);
    }
    public function view_category(Request $request)
    {
        $category = $request->category;
        // dd($category);
        $sql = "SELECT program.name, program.image,program_categories.name AS program_kategori,program_categories.image AS kategori_image,program.harga, program.tag, program.slug from program LEFT JOIN program_categories ON program.program_categories_id=program_categories.id WHERE program_categories.slug = ?";

        $programList = DB::select($sql, [$category]);

        $kategoriQuery = 'SELECT program_categories.image, program_categories.thumbnail, program_categories.name FROM program_categories WHERE program_categories.slug = ?';


        $kategori = DB::select($kategoriQuery, [$category]);

        return view('desktop.view_program_by_category', ['programList' => $programList, 'kategori' => $kategori]);
    }
    public function view_instansi(Request $request)
    {
        $name = $request->instansi;
        // $query = 'SELECT program.name, program.image,instansi.name AS instansi,instansi.logo,program.harga, program.tag, program.slug from program LEFT JOIN instansi ON program.instansi_id=instansi.id WHERE instansi.name = ?';
        $query = 'SELECT program.name,program.image, program.tag,program.slug,program.harga,program_categories.name AS program_categories_name,instansi.logo as instansi_logo FROM program LEFT JOIN program_categories ON program.program_categories_id=program_categories.id LEFT JOIN instansi ON program.instansi_id=instansi.id WHERE instansi.slug=?';
        $queryLogo = 'SELECT instansi.logo as logo,instansi.name from instansi WHERE instansi.slug=? limit 1';
        $programList = DB::select($query, [$name]);
        $instansi = DB::select($queryLogo, [$name]);
        return view('desktop.view_program_by_instansi', ['programList' => $programList, 'instansi' => $instansi]);
    }

    public function view_detail_course(Request $request)
    {
        $cabangList = PosLocation::all();

        $program = program::where('slug', $request->slug)->first();
        return view('desktop.view_detail_course', ['program' => $program, 'cabangList' => $cabangList]);
    }
}
