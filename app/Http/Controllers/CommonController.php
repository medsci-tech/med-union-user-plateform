<?php

namespace App\Http\Controllers;

/**
 * Class CommonController
 * 公共函数
 * @package App\Http\Controllers
 */
class CommonController extends Controller
{
    /**
     * CommonController constructor.
     * auth 验证
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
}
