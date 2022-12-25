<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class LoanApplication extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'borrower_id'
    ];

    /**
     * Get the applicants/borrowers for the loan application.
     *
     * @method null
     */

    public function applicants()
    {
        return $this->hasManyThrough(
            Borrower::class, 
            LoanApplicant::class, 
            'loan_application_id', 
            'id',
            'id',
            'borrower_id'
        );
    }
}
