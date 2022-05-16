<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // GET /users

        // Set default response
        $response_code = Response::HTTP_OK;

        // Return response
        return response()->json([
            'users' => $this->getAllRecords(),
        ], $response_code);
    }

    public function getAllRecords()
    {
        return User::all();
    }
}
