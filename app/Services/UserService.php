<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserService
{
    public function store($request)
    {
        try {
            DB::beginTransaction();
            $user = new User();
            $user->nome = $request->nome;
            $user->email = $request->email;

            $user->save();
            DB::commit();
            return Response()->json($user, 201);

        }catch (\Exception $e) {
            DB::rollBack();
            return Response()->json([
                'status' => 'error',
                'message' => 'erro ao cadastrar usuário',
            ], 500);
        }
    }

    public function show(int $id)
    {
        $user = User::find($id);
        if(!$user) {
            return Response()->json([
                'status' => 'error',
                'message' => 'usuário não encontrado',
            ], 404);
        }

        return Response()->json($user, 200);
    }

    public function index()
    {
        $users = User::paginate(10);
        return Response()->json($users, 200);
    }
}
