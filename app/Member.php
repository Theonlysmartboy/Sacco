<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';
    protected $primaryKey = 'id';
    
      /**
     * Get MentorshipSession associated with Mentee
     */
    public function subproject()
    {
        return $this->hasMany('App\SubProject', 'id', 'Name');
    }
    
    /*
        Get associated person
    */
    public function member()
    {
        return $this->hasOne('App\Member', 'id', 'group_id');
    }
}
