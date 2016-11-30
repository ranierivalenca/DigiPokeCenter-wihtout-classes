<?php
  session_start();

  $_SESSION['trainers'] = isset($_SESSION['trainers']) ? $_SESSION['trainers'] : array();
  $_SESSION['groups'] = isset($_SESSION['groups']) ? $_SESSION['groups'] : array();

  $db = new PDO('sqlite:pokeDigiCenter.sqlite');
  $db->setAttribute(PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION);

  // Create table evolutions if table does not exist
  $db->exec("
      CREATE TABLE IF NOT EXISTS evolutions (
          id INTEGER UNIQUE,
          up TEXT,
          down TEXT,
          applied NUMERIC
      );
  ");

  $evolutions = array_diff(scandir('evolutions'), ['.', '..']);
  foreach($evolutions as $evolution) {
    $file = 'evolutions' . DS . $evolution;
    $id = split('\.', $evolution)[0];

    list($up, $down) = split("\n-- !\n", file_get_contents($file));
    $up = trim($up);
    $down = trim($down);

    $result = $db->query("SELECT * FROM evolutions WHERE id = '$id'");
    if ($result->fetch() !== false) {
      list($_up, $_down) = $db->query("SELECT up, down FROM evolutions WHERE id = '$id'")->fetch();
      if ($_up != $up || $_down != $down) {
        $result->closeCursor();
        $db->exec(trim($_down));

        $db->exec("UPDATE evolutions
                   SET up = '$up',
                       down = '$down'
                   WHERE id = '$id'
        ");

        list($_up) = $db->query("SELECT up FROM evolutions WHERE id = '$id'")->fetch();
        $db->exec($_up);
      }
    } else {
      $r = $db->exec("INSERT INTO evolutions (id, up, down)
                      VALUES ('$id', '$up', '$down');
      ");
      list($_up) = $db->query("SELECT up FROM evolutions WHERE id = '$id'")->fetch();
      $db->exec($_up);
    }
  }

?>