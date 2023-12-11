<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyFacility extends Model
{
    protected $fillable = ['facility_name', 'status','property_id'];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}

