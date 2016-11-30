<?php
require_once 'TrainerInterface.php';

interface PokeTrainerInterface extends TrainerInterface {
    function __construct($nome, $sobrenome, $idade);

    function addMonster(PokemonInterface $monster);
}
?>