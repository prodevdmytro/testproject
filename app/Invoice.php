<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Invoice extends Model
{
    use Sortable;
    
    protected $fillable = [
        'team', 'job_site', 'account', 'invoice', 'date', 'checker', 'other', 'state' ];

    public $sortable = ['team', 'job_site', 'account', 'invoice', 'date', 'checker', 'other', 'state'];
}
