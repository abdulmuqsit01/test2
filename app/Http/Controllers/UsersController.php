<?php

namespace App\Http\Controllers;

use App\Models\program;
use App\Models\user_enrollment;
use App\Http\Middleware\EncryptCookies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Session\SessionManager;
use Illuminate\Encryption\Encrypter;
use Illuminate\Cookie\CookieValuePrefix;
use App\Models\interest;

class UsersController extends Controller
{
    /**
     * The encrypter instance.
     *
     * @var Encrypter
     */
    protected $encrypter;
    /**
     * @var SessionManager
     */
    protected $manager;

    public function __construct(SessionManager $manager, Encrypter $encrypter)
    {
        $this->manager = $manager;
        $this->encrypter = $encrypter;
    }

    /**
     * @return \Illuminate\Contracts\Session\Session
     */
    private function createSession()
    {
        return $this->manager->driver();
    }

    private function encryptSessionID(string $name, string $value)
    {
        return $this->encrypter->encrypt(
            CookieValuePrefix::create($name, $this->encrypter->getKey()) . $value,
            EncryptCookies::serialized($name)
        );
    }

    private function getData()
    {
    }

    /* -------------------------------------------------------------------------- */
    /*                                     API                                    */
    /* -------------------------------------------------------------------------- */

    public function authenticate_token(Request $request)
    {
        $session = $this->createSession();

        $token = $request->bearerToken();
        if ($token == null) {
            return response("Empty token given", 400);
        }

        $response = Http::withHeaders([
            'Authorization' => $token,
        ])->get('https://api.digitaldesa.id/account');

        // return response()->json($response->json('data')['user']['address']);

        if ($response->status() !== 200) {
            return response()->json(["message" => 'Unauthorized'], 401);
        }

        $splittedToken = explode('.', $token);
        $decodedToken = base64_decode($splittedToken[1]);

        $decodedToken = json_decode($decodedToken, true);

        $decodedToken['alamat'] = $response->json('data')['user']['address'];
        $decodedToken['no_hp'] = $response->json('data')['user']['phone'];

        $session->put("user_data", $decodedToken);
        $session->save();
        return response()->json([
            'id_e' => $this->encryptSessionID($session->getName(), $session->getId()),
            'id' => $session->getId(),
            'name' => $session->getName()
        ]);
    }

    public function enroll(Request $request)
    {
        $user = $request->session()->get("user_data");
        if ($user == null) {
            return response(null, 401);
        }

        $programID = $request->input("program_id");
        if ($programID == null || gettype($programID) != 'number') {
            return response("Invalid program ID", 400);
        }

        $program = program::where('id', $programID)->first();
        if ($program == null) {
            return response("Program tidak ada atau tidak tersedia", 400);
        }

        $result = user_enrollment::create([
            'id' => rand(1, 99999999),
            'mobile_user' => $user["id"],
            'program_id' => $programID,
        ]);

        if ($result) {
            return response(null, 201);
        } else {
            return response("Gagal melakukan enroll", 500);
        }
    }

    public function landing_page_search($search)
    {
        // $programList = program::where('name', 'LIKE', "%$search%")->paginate(5);
        $programList = program::where('name', 'LIKE', "%$search%")
            ->orWhereHas('programCategories', function ($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%");
            })
            ->paginate(5);
        return view('mobile/users_landing_page', ['getData' => $this->getData(), 'programList' => $programList]);
    }

    public function landing_page_get($search)
    {
        $programList = program::whereHas('instansi', function ($query) use ($search) {
            $query->where('slug', $search);
        })->paginate(5);
        return view('mobile/users_landing_page', ['getData' => $this->getData(), 'programList' => $programList]);
    }

    public function info_dump(Request $request)
    {
        return response()->json([
            "headers" => collect($request->header())->transform(function ($item) {
                return $item[0];
            }),
            "session_id" => $request->session()->getId()
        ]);
    }


    public function check_interest($userId)
    {
        $result = interest::where('mobile_user', '=', $userId)->first();
        return $result;
    }
}
