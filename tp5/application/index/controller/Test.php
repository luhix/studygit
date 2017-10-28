<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use app\index\model\Datas;
use think\Cookie;
class Test extends Controller
{
    public function index() {
       $data = new Datas;
       $data->name     = 'thinkphp1';
       $data->status    = 1;
       $data->create_time = time();
       $data->save();
    }

    public function upd() {
       
        $res = Datas::all();
        foreach($res as $v) {
            $d[] = $v->toArray();  //将插查询出来的对象转成数组
        }
        for($i=0;$i<count($d);$i++){
            $row[] = $d[$i];
        }

        dump($row);

       /*  $res = Datas::get(28);
        // $d = $res->toArray();
        $res->create_time = time();
        $res->save(); */
    }


    public function del() {
       $d =  Datas::destroy(1);
       echo $d;
    }

    public function lst() {
       /*  $d = Datas::get(2);
        $r = $d-> toArray(); */
        $res = Datas::withTrashed()->find(1);

        echo $_ENV;
    }

    public function play() {
        // Cookie::init(['prefix'=>'think_','expire'=>60,'path'=>'/']);
        // Cookie::set('name1','value','10');
    }
}