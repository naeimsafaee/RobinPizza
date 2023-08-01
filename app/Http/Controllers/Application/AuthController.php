<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


/**
 * @group Client management
 *
 * APIs for managing users
 */
class AuthController extends Controller
{



    public function store(RegisterRequest $request)
    {

        $client = Client::query()->create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(new ClientResource($client));
    }

    public function destroy($id)
    {
        $client = Client::query()->findOrFail($id);
        $client->delete();
        return response()->json('ok');


    }
}
