<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;//软删除

class Article extends Model
{
	use SoftDeletes;
    /**
    *获取文章列表
    */
    public function articleList(){
    	$data = $this->select('category_id','title','content')
    	->where('title','<>','文章1')
    	// ->whereIn('id',[1,2,3,4,5,6])
    	->groupBy('category_id')
    	->orderBy('id','desc')
    	->get();
    	return $data;
    }

     /**
     * 允许赋值的字段
     *
     * @var array
     */
    	protected $fillable = ['category_id', 'title', 'content'];
		//软删除
    	
}

