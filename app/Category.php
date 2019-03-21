<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Category
 *
 * @property int $id
 * @property string $name
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Category extends Model
{
    /**
     * Allowed image types for the categories.
     *
     * @var array
     */
    public const ALLOWED_IMAGE_TYPES = ['jpeg'];

    /**
     * Cache key.
     *
     * @var string
     */
    public const CACHE_KEY = 'categories';

    /**
     * Cache key prefix.
     *
     * @var string
     */
    public const CACHE_PREFIX = 'category_';

    /**
     * Default value in categories list.
     *
     * @var string
     */
    public const DEFAULT_VALUE = 'Выбрать категорию';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'title'];

    public function cards()
    {
        $this->hasMany(Card::class);
    }
}
