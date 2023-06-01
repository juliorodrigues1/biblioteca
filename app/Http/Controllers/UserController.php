<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Services\UserService;

class UserController extends Controller
{
    private $userService;

    /**
     * @param $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }


    public function store(CreateUserRequest $request)
    {
        return $this->userService->store($request);
    }

    public function show(int $id)
    {
        return $this->userService->show($id);
    }

    public function index()
    {
        return $this->userService->index();
    }

    public function update(UpdateUserRequest $request, int $id)
    {
        return $this->userService->update($request, $id);
    }

    public function destroy(int $id)
    {
        return $this->userService->destroy($id);
    }

}
