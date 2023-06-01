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

    public function show(int $id){
        $book = Book::with('genre')->find($id);
        if(!$book){
            return Response()->json([
                'status' => 'error',
                'message' => 'livro não encontrado',
            ], 404);
        }

        return Response()->json($book, 200);

    }

    public function index(){
        $books = Book::with('genre')->paginate(10);
        return Response()->json($books, 200);
    }

}
