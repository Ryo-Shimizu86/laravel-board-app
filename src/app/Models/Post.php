<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Post extends Model
{
    /**
     * モデルに関連づけるテーブル
     * 
     * @var string
     */
    protected $table = 'posts';

    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
