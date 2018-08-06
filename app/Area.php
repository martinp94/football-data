<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{

    public static function countries()
    {
    	$countries = [];

    	foreach(static::continents() as $continent) 
    	{
    		$countries = array_merge($countries, $continent->parentArea()->get()->toArray());

    	}

    	return collect($countries)->sortBy('name')->values()->all();
    	
    }

    public static function continents()
    {
    	return static::world()->parentArea()->get();
    }

    public static function world()
    {
    	return static::find(2267);
    }

    public function childArea()
    {
    	return $this->belongsTo(Area::class, 'parentAreaId', 'id');
    }

    public function parentArea()
    {
    	return $this->hasMany(Area::class, 'parentAreaId', 'id');
    }

    public function teams()
    {
        //return $this->hasMany('App\Team', 'id' , 'area');
    }

    public function competitions()
    {
        return $this->hasMany('App\Competition', 'area', 'id');
    }

}
