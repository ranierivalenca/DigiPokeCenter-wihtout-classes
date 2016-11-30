<?php
  function debug($wat) {
    file_put_contents("php://stdout", $wat);
  }

  function url() {
    $args = func_get_args();
    if (count($args) == 0) {
      return '/';
    }
    return '/' . implode('/', $args);
  }

  function display($template, array $vars = null) {
    global $SECTIONS, $POKEMON_TYPES, $COLORS;

    if (is_array($vars)) {
      foreach ($vars as $var => $value) {
        $$var = $value;
      }
    }

    ob_start();
    include "templates/{$template}.php";
    $content = ob_get_clean();
    include "templates/main.php";
  }

  function json($data) {
    echo json_encode($data);
  }

  function redirect() {
    $url = call_user_func_array('url', func_get_args());
    header('Location: ' . $url);
    exit();
  }

  class Utils
  {
    static function trainerPower(Trainer $trainer) {
      return array_reduce($trainer->getMonsters(),
        function($input, $monster) {
          return $input + $monster->poderTotal();
        },
        0
      );
    }
  }
?>