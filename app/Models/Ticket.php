<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    const PRIORITY = [
        'low' => 'Low',
        'medium' => 'Medium',
        'high' => 'High',
    ];

    const STATUS = [
        'open' => 'Open',
        'closed' => 'Closed',
        'solved' => 'Solved',
    ];
    protected $fillable = ['title', 'description', 'comment', 'priority', 'status', 'assigned_by', 'assigned_to'];

    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function assignedBy()
    {
        return $this->belongsTo(User::class, 'assigned_by');
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
