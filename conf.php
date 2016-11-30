<?php
  define('DS', DIRECTORY_SEPARATOR);

  spl_autoload_register(function($class_name) {
    $search_dir = function($class_name, $path) use (&$search_dir) {
        if (is_dir($path)) {
            $dir_contents = array_diff(scandir($path), ['.', '..']);
            if(in_array("{$class_name}.php", $dir_contents)) {
                include $path . DS . "{$class_name}.php";
                return true;
            }
            foreach($dir_contents as $file_or_dir) {
                if($search_dir($class_name, $path . DS . $file_or_dir)) {
                    return true;
                }
            }
        }
        return false;
    };
    $search_dir($class_name, 'classes');
    // $search_dir($class_name, 'lib');
    // if (file_exists("classes/{$class_name}.php")) {
    //   require_once "classes/{$class_name}.php";
    // }
  });

  session_start();

  include_once 'functions.php';

  $_SESSION['trainers'] = isset($_SESSION['trainers']) ? $_SESSION['trainers'] : array();
  // $_SESSION['groups'] = isset($_SESSION['groups']) ? $_SESSION['groups'] : array();

  if (empty($_SESSION['trainers']) || isset($_GET['init'])) {
    $_SESSION['trainers'] = array();
    include 'initial_data.php';
    redirect('/');
  }

  // $URLS = [
  //   'index' => '/',
  //   'trainers_index' => '/trainers.php',
  //   'trainers_add' => '/add_trainer.php',
  //   'trainers_view' => '/view_trainer.php',
  //   'trainers_remove' => '/remove_trainer.php',

  //   'monster_add' => 'add_monster.php',
  //   'monster_remove' => 'remove_monster.php',
  // ];



  $POKEMON_TYPES = [
    'agua',
    'fogo',
    'planta',
    'psiquico',
    'trevas',
    'luta'
  ];

  $COLORS = [
    'trainer' => [
      'bg' => 'orange',
      'fg' => 'white-text',
    ],
    'poketrainer' => [
      'bg' => 'purple darken-3',
      'fg' => 'white-text',
      'contrast-bg' => 'white',
      'contrast-fg' => 'purple-text text-darken-3',
    ],
    'pokemon' => [
      'bg' => 'purple darken-0',
      'fg' => 'white-text',
      'contrast-bg' => 'white',
      'contrast-fg' => 'purple-text text-darken-0',
    ],
    'digitrainer' => [
      'bg' => 'cyan darken-3',
      'fg' => 'white-text',
      'contrast-bg' => 'white',
      'contrast-fg' => 'cyan-text text-darken-3',
    ],
    'digimon' => [
      'bg' => 'cyan darken-0',
      'fg' => 'white-text',
      'contrast-bg' => 'white',
      'contrast-fg' => 'cyan-text text-darken-0',
    ],

    'group' => [
      'bg' => 'green',
      'fg' => 'white-text',
    ],

    'duel' => [
      'bg' => 'red darken-4',
      'fg' => 'white-text',
    ],
  ];

  $SECTIONS = [
    [
      "title" => "Treinadores",
      "url" => url('trainers'),
      "color" => $COLORS['trainer']['bg'],
      "color-text" => $COLORS['trainer']['fg']
    ],
    // [
    //   "title" => "Grupos",
    //   "url" => url('groups'),
    //   "color" => $COLORS['group']['bg'],
    //   "color-text" => $COLORS['group']['fg']
    // ],
    [
      "title" => "Duelos",
      "url" => url('duels'),
      "color" => $COLORS['duel']['bg'],
      "color-text" => $COLORS['duel']['fg']
    ],
  ];
?>