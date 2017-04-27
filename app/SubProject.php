<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubProject extends Model
{
    protected $table = 'subprojects';
    protected $primaryKey = 'id';
    
      /**
     * Get MentorshipSession associated with Mentee
     */
    public function group()
    {
        return $this->hasMany('App\Group', 'id', 'name');
    }
    
    /*
        Get associated person
    */
    public function subproject()
    {
        return $this->hasOne('App\SubProject', 'id', 'name');
    }
}
