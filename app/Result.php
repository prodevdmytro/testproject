<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Result extends Model
{

    use Sortable;
    
    protected $fillable = [
        'proj_id', 'proj_name', 'team', 'account', 'bidding_time', 'award_time', 'acept_time', 'member', 'client_info', 'price', 'completed_time', 'other','state', 'job_site'
    ];

    public $sortable = ['proj_id', 'proj_name', 'team', 'account', 'bidding_time', 'award_time', 'acept_time', 'member', 'client_info', 'price', 'completed_time', 'other','state','job_site'
    ];
}