<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LoanApplicationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // prepare variables
        $applicants = ( ( !is_null( $this->applicants ) ) ) ? $this->applicants : [];
        $total_annual_income = 0;
        $bank_account_total = 0;
        $borrowers = [];

        // get totals
        if ( !empty( $applicants ) && !is_null( $applicants ) ) {
            foreach( $applicants as $key => $applicant ) {
                $borrowers[$key] = [
                    'name' => $applicant->name,
                    'bank_account_balance' => 0,
                    'annual_income' => 0
                ];

                // add total annual income
                if ( !is_null( $applicant->job ) ) {
                    $borrower_annual_income = $applicant->job->annual_income;
                    $borrowers[$key] = [...$borrowers[$key], 'annual_income' => $borrower_annual_income];
                    $total_annual_income = ( $total_annual_income + $borrower_annual_income );
                }

                // add bank account totals
                if ( !is_null( $applicant->bank_account ) ) {
                    $bank_account_balance = $applicant->bank_account->balance;
                    $borrowers[$key] = [...$borrowers[$key], 'bank_account_balance' => $bank_account_balance];
                    $bank_account_total = ( $bank_account_total + $bank_account_balance );
                }
            }
        }
        
        // return data
        return [
            'id' => $this->id,
            'created_at' => $this->created_at->format('m/d/Y'),
            'updated_at' => $this->updated_at->format('m/d/Y'),
            'applicants' => $borrowers,
            'application_totals' => [
                'total_annual_income' => number_format( (float) $total_annual_income, '2', '.', '' ),
                'bank_account_total' => number_format( (float) $bank_account_total, '2', '.', '' ),
            ],
        ];
    }
}
