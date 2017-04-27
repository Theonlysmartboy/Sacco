<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
   protected $table = 'groups';
    protected $primaryKey = 'id';
    
      /**
     * Get MentorshipSession associated with Mentee
     */
    public function subproject()
    {
        return $this->hasMany('App\Group', 'id', 'Name');
    }
    
    /*
        Get associated person
    */
    public function group()
    {
        return $this->hasMany('App\Member', 'id');
    }
}
