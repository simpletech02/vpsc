<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $dates = [
        'dt_added'
    ];

    public $timestamps = false;

    public function countries()
    {
        return $this->belongsToMany(
            Country::class,
            'company_country',
            'company_id',
            'country_id',
            'company_id'
        )->orderBy('name');
    }

    public function paymentOptions()
    {
        return $this->belongsToMany(
            PaymentOption::class,
            'company_payment_option',
            'company_id',
            'option_id',
            'company_id'
        );
    }
}
