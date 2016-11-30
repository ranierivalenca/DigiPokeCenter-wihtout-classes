<?php
  include_once "conf.php";

  debug("\n|----\n");
  debug('requested: ' . $_SERVER['REQUEST_URI']);
  debug("\n----|\n");
  // $_SERVER['SCRIPT_NAME'] = '/index.php';
  if (is_file($_SERVER['DOCUMENT_ROOT'] . $_SERVER['REQUEST_URI'])) {
    debug('serving as-is');
    include $_SERVER['DOCUMENT_ROOT'] . $_SERVER['REQUEST_URI'];
    exit();
  } else {
    $uri = $_SERVER['REQUEST_URI'];

    $args = split('/', substr($uri, 1));
    $controller = array_shift($args);
    $method = array_shift($args);

    if (is_null($controller)) {
      $controller = '';
    }
    $controller = ucfirst($controller) . 'Controller';
    if (is_null($method) || $method == '') {
      $method = 'index';
    }

    $request_method = $_SERVER['REQUEST_METHOD'];
    $request_data = (object) $_GET;
    if ($request_method == 'POST') {
      $request_data = (object) $_POST;
    }

    $instance = NULL;
    if (class_exists($controller)) {
      $instance = new $controller($request_method, $request_data);
    }

    if(!is_callable(array($instance, $method))) {
      echo '404';
      echo '<br>';
      echo 'controller: ';
      var_dump($controller);
      echo '<br>';
      echo 'instance: ';
      var_dump($instance);
      echo '<br>';
      echo 'method: ';
      var_dump($method);
      exit();
    }
    call_user_func_array(array($instance, $method), $args);

  }

?>