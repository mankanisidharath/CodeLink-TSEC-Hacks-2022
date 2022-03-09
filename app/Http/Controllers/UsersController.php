<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{

    public function index()
    {

    }

    public function show($id)
    {

    }

    public function edit(User $user)
    {

    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $rules = User::getUpdateValidationRules();
        $rules['email'][] = 'unique:users,email,'.$this->user->id;
        Utils::validateOrThrow($rules, $request->toArray());
        return DB::transaction(function () use($request){
            return $this->update($request->toArray());
        });
    }

    public function destroy(User $user)
    {

    }
}
