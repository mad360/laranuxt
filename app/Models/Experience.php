<?php

namespace App\Models;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * */

use acidjazz\Humble\Models\Session;
use acidjazz\Humble\Traits\Humble;
use Database\Factories\UserFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $table = 'experiences';
    public $timestamps = true;


    protected $fillable = [
        'title',
        'description',
    ];
}
