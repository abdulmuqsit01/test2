<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\program;
use App\Models\instansi_model as instance;
use App\Models\user_enrollment;
use App\Models\program_categories;
use App\Models\interest;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\EmailController as EmailController;
use App\Models\EmailModel;
use App\Models\PosLocation;

class MobileController extends Controller
{
    /* -------------------------------------------------------------------------- */
    /*                                    View                                    */
    /* -------------------------------------------------------------------------- */

    public function view_landing(Request $request)
    {
        $programList = DB::select('SELECT program.name, program.image,program_categories.name AS program_kategori, program.harga, program.tag, program.slug from program LEFT JOIN program_categories ON program.program_categories_id=program_categories.id order by program.name asc;');
        $programListFeatured = DB::select('SELECT * FROM program WHERE featured=1 LIMIT 20');
        // dd($programListFeatured);

        return view('mobile/home', [
            'getData' => [
                'categoryList' => program_categories::all(),
                'programListFeture' => program::where('featured', '=', '1')->limit(3)->get(),
                'programListFetures' => program::where('featured', '=', '1')->limit(5)->get(),
                'program_enroll' => user_enrollment::pluck('program_id')->toArray(),
                'instansiList' => instance::all(),

                'filterByCategoryList' => DB::select('SELECT DISTINCT program_categories.name, program_categories.id FROM program left JOIN program_categories ON program.program_categories_id=program_categories.id;'),

                'filterByInstansiList' => DB::select('SELECT DISTINCT instansi.name, instansi.id FROM program left JOIN instansi ON program.instansi_id=instansi.id;'),
            ],
            'programList' => $programList,
            'programListFeatured' => $programListFeatured
        ]);
    }
    public function view_landing_all(Request $request)
    {
        $programList = DB::select('SELECT program.name, program.image,program_categories.name AS program_kategori, program.harga, program.tag, program.slug from program LEFT JOIN program_categories ON program.program_categories_id=program_categories.id;');
        if ($request->ajax()) {
            $view = view('mobile/data/Programlist', compact('programList'))->render();
            return response()->json($view);
        }
    }
    public function view_landing_category(Request $request)
    {
        $category = $request->category;

        $sql = "SELECT program.name, program.image,program_categories.name AS program_kategori, program.harga, program.tag, program.slug from program LEFT JOIN program_categories ON program.program_categories_id=program_categories.id WHERE program_categories.id = ?";

        $programList = DB::select($sql, [$category]);

        if ($request->ajax()) {
            $view = view('mobile/data/Programlist', compact('programList'))->render();
            return response()->json($view);
        }
    }

    public function view_landing_instansi(Request $request, $instansi)
    {
        // $instansi = $request->instansi;

        $sql = "SELECT program.name, program.image,program_categories.name AS program_kategori, program.harga, program.tag, program.slug from program LEFT JOIN program_categories ON program.program_categories_id=program_categories.id LEFT JOIN instansi ON program.instansi_id=instansi.id WHERE instansi.id = ?";
        $programList = DB::select($sql, [$instansi]);
        if ($request->ajax()) {
            $view = view('mobile/data/Programlist', compact('programList'))->render();
            return response()->json($view);
        }
    }
    public function view_profile(Request $request)
    {
        $user = $request->session()->get('user_data') ?? null;

        if (session()->missing('user_data')) {
            return view('mobile/profile', ['user' => $user, 'program_enroll' => []]);
        }

        $program_enroll = user_enrollment::with('program')->where('mobile_user', '=', $user['id'])->get();

        return view('mobile/profile', ['user' => $user, 'program_enroll' => $program_enroll]);
    }

    public function view_enrollment()
    {
        $user = session()->get('user_data') ?? null;

        if (session()->missing('user_data')) {
            return view('mobile/enrollment', ['program_enroll' => []]);
        }

        $program_enroll = user_enrollment::with('program')->where('mobile_user', '=', $user['id'])->get();


        return view('mobile/enrollment', ['program_enroll' => $program_enroll]);
    }

    public function user_program_personalization(Request $request)
    {
        $userData = $request->session()->get('user_data');
        $userId = $userData['id'];

        if ($userId != null) {
            $programListQuery = 'SELECT DISTINCT program.name,program.id,program.image, program_categories.name AS program_kategori,program_categories.id ,program.harga,program.tag, program.slug FROM program LEFT JOIN program_categories ON program.program_categories_id = program_categories.id left JOIN interests ON interests.categories_id = program_categories.id WHERE interests.mobile_user = ? ORDER BY program.name asc;';

            $programList = DB::select($programListQuery, [$userId]);

            if ($request->ajax()) {
                $view = view('mobile/data/Programlist', compact('programList'))->render();
                return response()->json($view);
            }
        }
    }

    public function view_program_detail(string $slug, Request $request)
    {
        $cabangList = PosLocation::all();

        $user = $request->session()->get("user_data");

        $program = program::where('slug', $slug)->first();
        $instance = $program->instansi;
        if ($program == null || $instance == null) {
            abort(404);
        }

        $isEnrolledTo = $user == null ?
            false :
            user_enrollment::where("program_id", $program->id)
            ->where("mobile_user", $user['id'])
            ->first() != null;

        return view('mobile/program', [
            'program' => $program,
            'instance' => $instance,
            'isEnrolledTo' => $isEnrolledTo,
            'user' => $user,
            'cabangList' => $cabangList,
        ]);
    }
    public function view_category_list()
    {
        $categoryList = program_categories::all();
        return view('mobile/category', ['categoryList' => $categoryList]);
    }
    public function view_program_populer()
    {
        $programList = program::where('featured', '=', '1')->limit(5)->get();
        return view('mobile/program_populer', ['programList' => $programList]);
    }
    public function view_program_by_category($category)
    {
        $programList = program::whereHas('programCategories', function ($query) use ($category) {
            $query->where('name', 'LIKE', "%$category%");
        })->get();
        $enroll = user_enrollment::where('mobile_user', '1212')->pluck('program_id')->toArray();
        return view('mobile/program_by_category', ['programList' => $programList, 'enroll' => $enroll, 'category' => $category]);
    }

    public function view_interest(Request $request)
    {
        $userData = $request->session()->get('user_data');
        $userId = $userData['id'] ?? null;
        $result = interest::where('mobile_user', '=', $userId)->first();
        if ($result) {
            return redirect()->route("view_mobile_home");
        }
        return view('mobile.interest', ['list' => program_categories::all(), 'login' => ($userId == null ? false : true)]);
    }

    public function view_instansi()
    {
        $query = 'SELECT name, logo,slug FROM instansi;';

        $programList = DB::select($query);

        return view('mobile.see_all_program_by_instansi', ['programList' => $programList]);
    }

    public function view_program_by_instansi($name)
    {
        // $sort = request()->query('name');

        $query = 'SELECT program.name,program.image, program.tag,program.slug,program.harga,program_categories.name AS program_categories_name,instansi.logo as instansi_logo FROM program LEFT JOIN program_categories ON program.program_categories_id=program_categories.id LEFT JOIN instansi ON program.instansi_id=instansi.id WHERE instansi.slug=?';

        $queryLogo = 'SELECT instansi.logo from instansi WHERE instansi.slug=? limit 1';

        $programList = DB::select($query, [$name]);
        $logo = DB::select($queryLogo, [$name]);

        return view('mobile.program_by_instansi', ['program' => $programList, 'logo' => $logo]);
    }

    /* -------------------------------------------------------------------------- */
    /*                                  Mutation                                  */
    /* -------------------------------------------------------------------------- */

    public function mutate_enroll(Request $request)
    {

        $user = $request->session()->get("user_data");

        if ($user == null) {
            return abort(401);
        }

        $programID = $request->program_id;
        // dd($programID);
        // if ($programID == null || gettype($programID) != '') {
        //     return abort(400, "Invalid program ID");
        // }

        // test validate
        $customMessages = [
            'program_id.required' => 'Pastikan program_id terisi dengan benar',
            'program_id.numeric' => 'Pastikan program_id sudah dalam bentuk numeric',
        ];

        $validatedData = $request->validate([
            'program_id' => 'required|numeric',
        ], $customMessages);

        // $program = program::where('id', $programID)->first();
        $programQuery = 'SELECT program.id, program.name,program.call_center,instansi.email, program.image,program.url,program.description, instansi.name AS instansi FROM program LEFT JOIN instansi ON program.instansi_id=instansi.id WHERE program.id = ? LIMIT 1';

        $program = DB::select($programQuery, [$programID]);

        if ($program == null) {
            return abort(400, "Program tidak ada atau tidak tersedia");
        }

        if (is_null($request->id_lokasi)) {
            return redirect()->back();
        } else {
            $resultUserEnrollment = user_enrollment::create([
                'id' => rand(1, 99999999),
                'mobile_user' => $user['id'],
                'nama' => $user['fullname'],
                'alamat' => $user['alamat'],
                'id_address' => $request->address_id,
                'no_hp' => $user['no_hp'],
                'email' => $user['email'],
                'program_id' => $programID,
                'lokasi_kantor_pos' => $request->id_lokasi,
            ]);

            $resultEmail = EmailModel::create([
                'id' => rand(1, 9999),
                'destination_email' => $user['email'],
                'url' => $program[0]->url,
                'call_center' => $program[0]->call_center,
                'alamat' => $user['alamat'],
                'program' => $program[0]->name,
                'instansi' => $program[0]->instansi,
                'nama' => $user['fullname'],
                'no_hp' => $user['no_hp'],
                'instanceEmail' => $program[0]->email,
                'from' => env('MAIL_FROM_ADDRESS'),
                'lokasi_kantor_pos' => $request->id_lokasi,
            ]);

            if (!$resultUserEnrollment) {
                return abort(500, "Gagal melakukan enroll");
            } else if (!$resultEmail) {
                return abort(500, "Gagal melakukan enroll");
            }
        }




        // $sendEmailController = new Emailcontroller($emailData);
        // $sendEmailController->mutate_send_email();

        return Redirect::to($program[0]->url);
    }


    public function mutate_interest(Request $request)
    {
        $user = $request->session()->get("user_data");

        if ($user == null) {
            return abort(401);
        }


        for ($i = 0; $i < (count($_POST) - 1); $i++) {
            interest::create([
                'id' => rand(1, 99999999),
                'mobile_user' => $user["id"],
                'categories_id' => $_POST[$i],
            ]);
        }
        return redirect()->route("view_mobile_home");
    }
}
