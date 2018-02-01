<?php
namespace App\Controller\index;
use Symfony\Component\HttpFoundation\Response;


class Model {
    public $text;
    public function __construct() {
    $this->text = '<h1>Hello World!</h1>'; }        
}

class View {

    private $model;
    public function __construct(Model $model) {
    $this->model = $model; }

    public function output() {
        return '<a href="mvc.php?action=afterClicking">' . $this->model->text . '</a>';
    }
}

class Controller {
    private $model;
    public function __construct(Model $model) {
    $this->model = $model;
    }

    public function afterClicking() {
    $this->model->text = '<h1>Updated Hello World!</h1>';
    }

}

$model = new Model();
$controller = new Controller($model);
$view = new View($model);
if (isset($_GET['action'])) $controller->{$_GET['action']}();
echo $view->output();



// references used 
// https://r.je/mvc-in-php.html 
// http://www.studentstutorial.com/php/mvc/mvc-hello-world.php