<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Card
 *
 * @property int $id
 * @property string $name
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $category_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Card newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Card newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Card query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Card whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Card whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Card whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Card whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Card whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Card whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Card extends Model
{
    /**
     * Allowed image types for the cards.
     *
     * @var array
     */
    public const ALLOWED_IMAGE_TYPES = ['jpeg'];

    /**
     * Allowed sound file types for the cards.
     *
     * @var array
     */
    public const ALLOWED_SOUND_TYPES = ['wav'];

    /**
     * Cache keys prefix.
     *
     * @var string
     */
    public const CACHE_PREFIX = 'cards_';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'title', 'category_id'];

    public $timestamps = null;

    function categories()
    {
        $this->belongsTo(Category::class);
    }
}
