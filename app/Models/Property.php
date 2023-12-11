<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Property extends Model
{
    protected $fillable = ['property_name','property_slug', 'phone', 'email', 'price','currency', 'description', 'inclusions_exclusions', 'primary_image'];


    public static function boot()
    {
        parent::boot();

        static::creating(function ($property) {
            $property->property_slug = $property->generateUniqueSlug($property->property_name);
        });
    }

    protected function generateUniqueSlug($name)
    {
        $slug = Str::slug($name);
        $count = 1;

        while (static::where('property_slug', $slug)->exists()) {
            $slug = Str::slug($name) . '-' . $count;
            $count++;
        }

        return $slug;
    }

    public function facilities()
    {
        return $this->hasMany(PropertyFacility::class);
    }

}

