<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeCategoryIdInArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles',function (Blueprint $table){
            // $table->tinyInteger('category_id')->unsigned()->default(0)->comment('分类id')->change();
            // dbal 不支持修改成 tinyinteger；为了兼容更多类型的数据库，需要用替代方案，使用 boolean 类型；
            $table->boolean('category_id')->unsigned()->default(0)->comment('分类id')->change();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
        $table->integer('category_id')->unsigned()->default(0)->comment('分类id')->change();
        });
    }
}
