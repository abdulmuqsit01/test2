<?php

namespace App\Http\Controllers;

use App\Models\user_enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserEnrollmentController extends Controller
{
    public function view_user_enrollment(){
        $dataQuery= 'SELECT user_enrollment.lokasi_kantor_pos, user_enrollment.created_at AS tanggal_registrasi,CASE WHEN user_enrollment.mobile_user IS NULL THEN "desktop" ELSE "mobile" END AS device,user_enrollment.nama,user_enrollment.email,user_enrollment.no_hp,user_enrollment.alamat,user_enrollment.provinsi,user_enrollment.kabupaten,user_enrollment.kecamatan,program.name AS program,instansi.name AS instansi FROM user_enrollment LEFT JOIN program ON program.id = user_enrollment.program_id LEFT JOIN instansi ON instansi.id = program.instansi_id WHERE user_enrollment.nama != "" ORDER BY user_enrollment.created_at;';

        $data = DB::select($dataQuery);

        return view('administrator.user_enrollment', ['data' => $data]);
    }
}
