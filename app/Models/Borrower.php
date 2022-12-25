<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Job;
use App\Models\BankAccount;

class Borrower extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'job_id',
        'bank_account_id',
    ];

    /**
     * Get the job associated with the borrower.
     *
     * @method null
     */

    public function job()
    {
        return $this->hasOne(Job::class, 'id', 'job_id');
    }

    /**
     * Get the job associated with the borrower.
     *
     * @method null
     */

    public function bank_account()
    {
        return $this->hasOne(BankAccount::class, 'id', 'bank_account_id');
    }
}
