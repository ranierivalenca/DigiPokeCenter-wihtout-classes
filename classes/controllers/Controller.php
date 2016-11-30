<?php
  /**
  *
  */
  class Controller
  {
    protected $request;

    public function __construct() {
      $args = func_get_args();
      $i = func_num_args();
      if (method_exists($this, $f = '__construct' . $i)) {
        call_user_func_array(array($this, $f), $args);
      }
    }

    public function __construct2($method, $data) {
      $this->request = (object) array('method' => $method, 'data' => $data);
    }

    protected function notEmpty($vars) {
      return array_reduce(
        array_map(function($var) { return $this->request->data->$var; }, $vars),
        function($x, $y) {
          return $x && !empty($y);
        },
        true
      );
    }

    protected function in($var, $values) {
      return in_array($this->request->data->$var, $values);
    }

    function index() {
      display('index');
    }
  }
?>