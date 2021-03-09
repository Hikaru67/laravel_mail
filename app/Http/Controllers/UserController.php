<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Get all Users in the db
     * @return User[]
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Get User by id
     * @param string $id
     * @return User|null
     */
    public function show(string $id): ?User
    {
        return User::find($id);
    }
}
