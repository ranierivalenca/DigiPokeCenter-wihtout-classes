<?php
  /**
  *
  */
  class DuelsController extends Controller
  {

    function index() {
      $trainers = $_SESSION['trainers'];
      $trainers = array_filter(
        $trainers,
        function($trainer) {
          return sizeof($trainer->getMonsters()) > 0;
        }
      );
      uasort(
        $trainers,
        function($t1, $t2) {
          return Utils::trainerPower($t2) - Utils::trainerPower($t1);
        }
      );
      display('duels', [
        'trainers' => $trainers
      ]);
    }

    function fight() {
      if (!isset($this->request->data->t0) || !isset($this->request->data->t2)) {
        json(['status' => 'empty_ids']);
        return;
      }

      $t1_id = $this->request->data->t0;
      $t2_id = $this->request->data->t2;
      if (!isset($_SESSION['trainers'][$t1_id]) || !isset($_SESSION['trainers'][$t2_id])) {
        json(['status' => 'unset_trainers']);
        return;
      }
      $_SESSION['trainers'][$t1_id]->duelar($_SESSION['trainers'][$t2_id]);
    }

  }
?>