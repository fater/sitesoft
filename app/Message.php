<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Message
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property string $message
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereUserId($value)
 */
class Message extends Model
{
    protected $table = 'messages';

    protected $fillable = ['message', 'user_id'];

    /**
     * Информация о пользователе
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Выборка всех сообщений пользователей по убыванию даты
     *
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection|static[]
     */
    public static function getAllMessages()
    {
        return (new self())
            ->orderBy('created_at', 'DESC')
            ->get();
    }
}
