<?php
  /**
  *
  */
  class TrainersController extends Controller
  {

    function index() {
      display('trainers');
    }

    function add() {
      $data = $this->request->data;

      if ($this->request->method == 'POST') {
        $fields = ['type', 'nome', 'sobrenome', 'idade'];

        if ($this->notEmpty($fields) && $this->in('type', ['POKEMON', 'DIGIMON'])) {
          if ($data->type == 'DIGIMON') {
            $_SESSION['trainers'][] = new DigiTrainer($data->nome, $data->sobrenome, $data->idade);
          } else {
            $_SESSION['trainers'][] = new PokeTrainer($data->nome, $data->sobrenome, $data->idade);
          }
          redirect('trainers');
        }
      }

      display('add_trainer', (array) $data);
    }

    function remove($id) {
      if (isset($_SESSION['trainers'][$id])) {
        unset($_SESSION['trainers'][$id]);
      }
      redirect('trainers');
    }

    function view($id) {
      if (!isset($_SESSION['trainers'][$id])) {
        return redirect('trainers');
      }

      display('view_trainer', [
        'trainer' => $_SESSION['trainers'][$id],
        'id' => $id
      ]);
    }



    function add_monster($trainer_id) {
      global $POKEMON_TYPES;

      if (!isset($_SESSION['trainers'][$trainer_id])) {
        return redirect('trainers');
      }

      $trainer = $_SESSION['trainers'][$trainer_id];

      $data = $this->request->data;

      if ($this->request->method == 'POST') {
        $fields = is_a($trainer, 'DigiTrainer') ? ['nome'] : ['tipo', 'especie'];
        $fields = array_merge($fields, ['poder']);

        if (is_a($trainer, 'DigiTrainer') && $this->notEmpty($fields)) {
          $data->apelido = $data->apelido ?: $data->nome;
          $_SESSION['trainers'][$trainer_id]->addMonster(new Digimon($data->nome, $data->apelido, $data->poder));
          return redirect('trainers', 'view', $trainer_id);
        } elseif (is_a($trainer, 'PokeTrainer') && $this->notEmpty($fields) && $this->in('tipo', $POKEMON_TYPES)) {
            $data->apelido = $data->apelido ?: $data->especie;
            $_SESSION['trainers'][$trainer_id]->addMonster(new Pokemon($data->tipo, $data->especie, $data->apelido, $data->poder));
          return redirect('trainers', 'view', $trainer_id);
        }
      }

      $template = 'add_pokemon';
      if (is_a($trainer, 'DigiTrainer')) {
        $template = 'add_digimon';
      }

      display($template,
        array_merge([
          'trainer' => $trainer,
          'trainer_id' => $trainer_id
        ], (array) $data)
      );
    }

    function remove_monster($trainer_id, $id) {
      if (isset($_SESSION['trainers'][$trainer_id])) {
        $_SESSION['trainers'][$trainer_id]->removeMonster($id);
      }
      redirect('trainers', 'view', $trainer_id);
    }

  }
?>