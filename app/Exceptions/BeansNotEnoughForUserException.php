<?php


namespace App\Exceptions;


class BeansNotEnoughForUserException extends \Exception
{
    protected $message = '用户迈豆不足';
}