<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model {
    use HasFactory;
    
    protected $table = 'posts';
    protected $fillable = ['title', 'slug', 'author', 'body'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter($query, array $filters)
    {
        if (!empty($filters['search'])) {
            $search = $filters['search'];
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%')
                ->orWhereHas('user', function ($q2) use ($search) {
                    $q2->where('name', 'like', '%' . $search . '%');
                })
                ->orWhereHas('category', function ($q3) use ($search) {
                    $q3->where('name', 'like', '%' . $search . '%');
                });
            });
        }

        if (!empty($filters['category'])) {
            $query->whereHas('category', function ($q) use ($filters) {
                $q->where('slug', $filters['category']);
            });
        }

        if (!empty($filters['author'])) {
            $query->whereHas('user', function ($q) use ($filters) {
                $q->where('username', $filters['author']);
            });
        }
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }


}
