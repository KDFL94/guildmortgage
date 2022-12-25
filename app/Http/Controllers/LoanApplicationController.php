<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\LoanApplication;
use App\Http\Resources\LoanApplicationResource;

class LoanApplicationController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loanApplications = LoanApplication::all();
    
        return $this->sendResponse(LoanApplicationResource::collection($loanApplications), 'Loan Applications retrieved successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $loanApplication = LoanApplication::with(['applicants', 'applicants.job', 'applicants.bank_account'])
            ->find($id);
  
        if ( is_null( $loanApplication ) ) {
            return $this->sendError('Loan Application not found.');
        }
   
        return $this->sendResponse(new LoanApplicationResource($loanApplication), 'Loan Application retrieved successfully.');
    }
}
