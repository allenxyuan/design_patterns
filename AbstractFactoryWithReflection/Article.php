<?php
/**
 * Created by PhpStorm.
 * User: allen
 * Date: 2018/10/31
 * Time: 11:17 PM
 */

namespace Allen\DesignPatterns\AbstractFactoryWithReflection;


interface Article
{
    public function select();

    public function insert();
}