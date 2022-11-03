<?php

namespace App\Models;

use App\Http\Services\SetPublicationDate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "title",
        "status",
        "body",
        "user_id",
        "publication_date",
    ];

    protected static function booted()
    {
        static::creating(function ($post) {
            SetPublicationDate::handle($post);
        });
        static::updated(function ($post) {
            SetPublicationDate::handle($post);
        });
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
