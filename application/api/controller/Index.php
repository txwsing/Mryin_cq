<?php
/**
 * Created by PhpStorm.
 * User: ww
 * Date: 2017/10/30
 * Time: 15:22
 */

namespace app\api\controller;


use app\api\model\Carousel as CarouselModel;
use app\lib\exception\CarouselMissException;
use think\Exception;
use think\Db;

class Index
{
    /**
     * 获取轮播图信息
     * @url /Carousel/:id
     * @http GET
     *
     */
    public function getCarousel()
    {

        $carousel = CarouselModel::getCarousel();

        //会抛出CarouselMissException的异常给render()方法，从而进行异常处理
        if(!$carousel){
            return new CarouselMissException(['404']);
        }
        return $carousel;
    }

    /**
     * 获取分类信息
     */
    public function getClassify()
    {
        $data['provinces'] = Db::name('provinces')->field('provinceid,province')->select();
        $data['category'] = Db::name('category')->field('id,title')->select();
        $data['brand'] = Db::name('brand')->field('id,title')->select();
        return $data;

    }

    /**
     * 获取地区
     */


    /**
     * 获取分类
     */

    /**
     * 获取品牌
     */

    /**
     * 获取年限
     */

    /**
     * 排序
     */


}