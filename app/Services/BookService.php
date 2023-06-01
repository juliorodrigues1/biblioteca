<?php

namespace App\Services;

use App\Models\Book;
use Illuminate\Support\Facades\DB;

class BookService
{
    public function store($request)
    {
        try {
            DB::beginTransaction();
            $book = Book::create($request->all());
            DB::commit();
            return Response()->json($book, 201);
        }catch (\Exception $e) {
            DB::rollBack();
            return Response()->json([
                'status' => 'error',
                'message' => 'erro ao cadastrar livro',
            ], 500);
        }
    }

}
