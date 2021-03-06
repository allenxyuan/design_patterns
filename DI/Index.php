<?php
/**
 * Created by PhpStorm.
 * User: allen
 * Date: 2018/11/4
 * Time: 9:10 PM
 */

namespace Allen\DesignPatterns\DI;

require __DIR__ . '/../vendor/autoload.php';

/**
 * 依赖注入,控制反转
 * 参考资料：https://laravelacademy.org/post/769.html
 * https://blog.csdn.net/bestone0213/article/details/47424255
 * https://www.cnblogs.com/painsOnline/p/5138806.html
 * Class Index
 * @package Allen\DesignPatterns\DI
 */
class Index
{

    // 命名空间前缀
    private $_namespace = '\\'.__NAMESPACE__.'\\';

    // 容器类
    protected $container;

    public function __construct()
    {
        $this->container = new Container();
    }

    public function run()
    {
        //$a = $this->continer->get($this->_namespace.'A');
        $a = $this->container->get(A::class);
        $a->test();
        // $a->callA();

        $b = $this->container->get(B::class);
        $b->callB();
    }

    public function runTest()
    {

        // $this->continer->set('Test',new Test('张三'));
        // $test = $this->continer->get('Test');

        $test = $this->container->get(Test::class,array('张三'));
        $test->test();
    }

    public function runClosure()
    {
        $this->container->set('foo',function($container,$params,$config){
            pp($container);
            p($params);
            p($config);
        });

        $this->container->get('foo',['name'=>'foo'],['key'=>'test']);
    }

}

hoops();

$obj = new Index();

// $obj->run();

$obj->runTest();

// $obj->runClosure();

//$ref = new \ReflectionClass('\Allen\DesignPatterns\DI\Index');
//$instance = $ref->newInstanceArgs(array($ref));
//$instance->run();
//p($instance,1);