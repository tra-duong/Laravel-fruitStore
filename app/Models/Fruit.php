<?php

namespace App\Models;

use App\Enums\UnitEnum;
use App\Models\FruitCategory;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fruit extends Model
{
    use HasFactory;
    use HasSlug;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'price',
        'unit',
        'stock',
        'category_id',
    ];

    /**
     * Summary of casts
     * @var array
     */
    protected $casts = [
        'unit' => UnitEnum::class,
    ];

    /**
     * Get the category of the fruit.
     */
    public function category()
    {
        return $this->belongsTo(FruitCategory::class, 'category_id');
    }

    /**
     * Cast types.
     * @param mixed $key
     * @return string
     */
    public function getCastType($key)
    {
        if ($key === 'unit') {
            return 'string';
        }

        return parent::getCastType($key);
    }

    /**
     * Auto generate slug.
     * @return \Spatie\Sluggable\SlugOptions
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
}
