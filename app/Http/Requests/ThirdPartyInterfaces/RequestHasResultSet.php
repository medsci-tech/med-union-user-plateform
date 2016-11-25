<?php


namespace App\Http\Requests\ThirdPartyInterfaces;


use App\Http\Requests\Request;

/**
 * Class RequestHasResultSet
 * @package App\Http\Requests\ThirdPartyInterfaces
 * @mixin Request
 */
trait RequestHasResultSet
{
    /**
     * @var array
     */
    protected $resultSet;

    /**
     * @return array
     */
    public function getResultSet()
    {
        return $this->resultSet;
    }

    /**
     * @param array $set
     */
    public function setResultSet(array $set)
    {
        $this->resultSet = $set;
    }
}