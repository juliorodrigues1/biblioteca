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
            dd($e->getMessage());
            return Response()->json([
                'status' => 'error',
                'message' => 'erro ao cadastrar usuário',
            ], 500);
        }
    }

    function registrationNumberGenerator() {
        $year = date('Y');

        // Gerar uma matrícula única baseada no ano atual
        $registration = $year . uniqid();

        return $registration;
    }
}
