<?php 
namespace App\Controllers;
use App\Models\Home;
use App\Providers\View;

class HomeController {
    public function index() {
        $model = new Home();
        $data = $model->getData();
        if($data){
            return View::render('home', ['data' => $data]);
        }else{
            return View::render('error');
        }
    } 
}
?>