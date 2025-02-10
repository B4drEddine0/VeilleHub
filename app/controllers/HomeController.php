<?php 
require_once ('../core/BaseController.php');
class HomeController extends BaseController {


   public function index() {
    $this->render('Home');
   }

 

}