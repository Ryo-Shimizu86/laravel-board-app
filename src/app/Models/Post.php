<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * モデルに関連づけるテーブル
     * 
     * @var string
     */
    protected $table = 'posts';
}
