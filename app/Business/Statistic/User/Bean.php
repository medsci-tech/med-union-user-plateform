<?php


namespace App\Business\Statistic\User;


use Jenssegers\Mongodb\Eloquent\Model;

class Bean extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'beans';
    protected $dates = ['create_time', 'optimizing_health_mate_wechat_2016.create_time'];
    public $timestamps = false;
    protected $guarded = [];
}