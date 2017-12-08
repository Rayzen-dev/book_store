<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoanHistory extends Model
{
    protected $table = "loansHistory";

    protected $fillable = [
    	'id_customer', 'id_book', 'bring_back',
    ];
}
