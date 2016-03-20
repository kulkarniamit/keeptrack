<?php
/**
 * Created by PhpStorm.
 * User: amit
 * Date: 3/17/16
 * Time: 10:37 AM
 */

// Enabling the below use statement causes an error during seeding, so take care of it
//use Eloquent;

class Application extends Eloquent {
    protected $table    = 'applications';
    public static $rules = array(
        'jobid'                 =>'required|unique:applications',
        'company'               =>'required|min:2',
        'role'                  =>'required|min:2',
        'joblink'               =>'url',
        'appliedon'             =>'required',
    );
    public function user(){
        return $this->hasOne('User','id','user_id');
    }
}

