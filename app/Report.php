<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Report extends Model
{

    use Sortable;
    
    protected $fillable = [
        'name', 'date', 'total_hours', 'account', 'bids', 'bidding_hours', 'chats', 'chatting_hours', 'Awards', 'Acepts', 'pending_tasks', 'task_hours','team','state','description'
    ];

    public $sortable = ['name', 'date', 'total_hours', 'account', 'bids', 'bidding_hours', 'chats', 'chatting_hours', 'Awards', 'Acepts', 'pending_tasks', 'task_hours', 'team','state','description'];
}