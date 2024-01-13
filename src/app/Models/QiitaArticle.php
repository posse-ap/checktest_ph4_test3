<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QiitaArticle extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'url', 'article_id'];
}
