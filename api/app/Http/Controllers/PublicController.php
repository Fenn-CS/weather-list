<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function status()
    {
        return response()->json([
            'message' => 'Service up and running!',
        ]);
    }

    public function getUsers()
    {
        return response()->json([
            \App\Models\User::all()
        ]);
    }

    public function getUser(int $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'message' => 'User not found',
            ], 404);
        }

        return response()->json([
            $user
        ]);
    }
}
