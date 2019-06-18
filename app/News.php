<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'news';

    protected $fillable = ['title', 'content', 'user_id'];

    /**
     * Pega o usuário criador da notícia
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
