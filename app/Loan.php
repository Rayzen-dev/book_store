<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $table = "loans";

    protected $fillable = [
    	'id_book', 'id_customer', 'time',
    ];
}
