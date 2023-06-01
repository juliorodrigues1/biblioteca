<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLoanRequest;
use App\Services\LoanService;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    private LoanService $loanService;

    /**
     * @param LoanService $loanService
     */
    public function __construct(LoanService $loanService)
    {
        $this->loanService = $loanService;
    }

    public function store(CreateLoanRequest $request)
    {
        return $this->loanService->loan($request);
    }

}
