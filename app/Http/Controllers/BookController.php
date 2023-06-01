<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBookRequest;
use App\Services\BookService;
use Illuminate\Http\Request;

class BookController extends Controller
{
    private BookService $bookService;

    /**
     * @param BookService $bookService
     */
    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function store(CreateBookRequest $request)
    {
        return $this->bookService->store($request);
    }

}