<?php

namespace App\Services;

use App\Models\Book;
use App\Models\User;
use App\Models\UserBooks;
use Illuminate\Support\Facades\DB;

class LoanService
{
    public function loan($request)
    {
        try {
            DB::beginTransaction();
            $book = Book::find($request->livro_id);
            if (!$book) {
                return Response()->json([
                    'status' => 'error',
                    'message' => 'livro não encontrado',
                ], 404);
            }
            $user = User::find($request->usuario_id);
            if (!$user) {
                return Response()->json([
                    'status' => 'error',
                    'message' => 'usuário não encontrado',
                ], 404);
            }

            if ($book->situacao == 'Emprestado') {
                return Response()->json([
                    'status' => 'error',
                    'message' => 'livro já emprestado',
                ], 404);
            }

            $book->situacao = 2;
            $book->save();

            $userBook = UserBooks::create([
                'livro_id' => $request->livro_id,
                'usuario_id' => $request->usuario_id,
                'data_devolucao' => date('Y-m-d', strtotime($request->data_devolucao)),
                'situacao' => 1,
            ]);
            DB::commit();
            return Response()->json($userBook, 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return Response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }


    }

    public function devolution($request)
    {
        try {
            DB::beginTransaction();
            $book = Book::find($request->livro_id);
            if (!$book) {
                return Response()->json([
                    'status' => 'error',
                    'message' => 'livro não encontrado',
                ], 404);
            }
            $user = User::find($request->usuario_id);
            if (!$user) {
                return Response()->json([
                    'status' => 'error',
                    'message' => 'usuário não encontrado',
                ], 404);
            }

            if ($book->situacao == 'Disponível') {
                return Response()->json([
                    'status' => 'error',
                    'message' => 'livro não emprestado',
                ], 404);
            }

            $userBook = UserBooks::where('livro_id', $request->livro_id)
                ->where('usuario_id', $request->usuario_id)
                ->where('situacao', 1)
                ->orWhere('situacao', 3)
                ->first();

            if (!$userBook) {
                return Response()->json([
                    'status' => 'error',
                    'message' => 'livro não emprestado para este usuário',
                ], 404);
            }

            if($request->situacao == 2){
                $book->situacao = 1;
                $book->save();
            }

            $userBook->situacao = $request->situacao;
            if($request->data_devolucao){
                $userBook->data_devolucao = date('Y-m-d', strtotime($request->data_devolucao));
            }
            $userBook->save();

            DB::commit();
            return Response()->json($userBook, 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return Response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }



}
