<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index(){
    	$array = ['','我','学',false,'习',null,'laravel'];
	    $collect = collect($array);
	    //froget() 删除 ‘我’字
		//filter() 过滤为假的值
		//implode() 用 - 链接
		dump($collect->forget(1)->filter()->implode('-'));

    }
    

}
