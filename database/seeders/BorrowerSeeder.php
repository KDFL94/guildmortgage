<?php

namespace Database\Seeders;

use App\Models\Borrower;
use App\Models\Job;
use App\Models\BankAccount;
use App\Models\LoanApplication;
use App\Models\LoanApplicant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BorrowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create loan application
        $loan_application = LoanApplication::create();
        
        // create 2 borrowers
        Borrower::factory()
            ->count(2)
            ->create()
            ->each(function ($borrower, $key) use ($loan_application) {
                // create job
                $job = Job::factory()->make();
                $job->save();

                // add job to borrower
                $borrower->job_id = $job->id; 

                // add bank account to borrower if not first
                if ( $key !== 0 ) {
                    // create bank account
                    $bankAccount = BankAccount::factory()->make();
                    $bankAccount->borrower_id = $borrower->id;
                    $bankAccount->save();

                    // add bank account to borrower
                    $borrower->bank_account_id = $bankAccount->id; 
                }
                
                // save borrower
                $borrower->save();

                // create new loan applicant
                LoanApplicant::create([
                    'loan_application_id' => $loan_application->id,
                    'borrower_id' => $borrower->id
                ]);
            });
    }
}
