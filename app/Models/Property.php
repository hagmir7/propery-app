<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Property extends Model
{

    use SoftDeletes, HasSlug;


    protected $fillable = [
        'owner_id',
        'city_id',
        'title',
        'description',
        'content',
        'type',
        'operation',
        'rent_type',
        'price',
        'area_m2',
        'address',
        'location_map',
        'extra',
        'status',
        'slug'
    ];


    protected $casts = [
        'extra' => 'array',
        'price' => 'decimal:2',
        'price_per_day' => 'decimal:2',
        'price_per_month' => 'decimal:2',
    ];


    // Relations
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }


    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function images()
    {
        return $this->hasMany(PropertyImage::class);
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    public function features()
    {
        return $this->belongsToMany(Feature::class, 'property_feature');
    }


    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->doNotGenerateSlugsOnUpdate()
            ->saveSlugsTo('slug');
    }
}
