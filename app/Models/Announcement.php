<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'category_id',
        'created_by',
        'publish_at',
        'expire_at',
        'is_active',
    ];

    protected $casts = [
        'publish_at' => 'datetime',
        'expire_at' => 'datetime',
        'is_active' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withPivot('is_read', 'read_at')
            ->withTimestamps();
    }
}
