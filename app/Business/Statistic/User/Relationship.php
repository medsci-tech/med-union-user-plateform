<?php


namespace App\Business\Statistic\User;


use Jenssegers\Mongodb\Eloquent\Model;

class Relationship extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'relationships';
    protected $dates = ['create_time'];
    public $timestamps = false;
    protected $guarded = [];
}