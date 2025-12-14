<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller {

    public function index() {
        $users = User::paginate(10);
        return UserResource::collection($users);
    }

    public function store(StoreUserRequest $request) {
        $data = $request->validated();
        $data["password"] = bcrypt($data["password"]);

        $user = User::create($data);
        return new UserResource($user);
    }

    public function show(User $user) {
        return new UserResource($user);
    }

    public function update(UpdateUserRequest $request, User $user) {
        $data = $request->validated();

        if (!empty($data["password"])) {
            $data["password"] = bcrypt($data["password"]);
        } else {
            unset($data["password"]);
        }

        $user->update($data);
        return new UserResource($user);
    }

    public function destroy(User $user) {
        $user->delete();
        return response()->noContent();
    }
}
