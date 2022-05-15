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

        // Get all records
        $users = User::all();

        Log::debug($users);

        // Set default response
        $response_text = "Users retrieved successfully.";
        $response_code = Response::HTTP_OK;

        // Return response
        return response()->json([
            'users' => $users,
            'response_text' => $response_text,
            'response_code' => $response_code
        ]);
    }
}
