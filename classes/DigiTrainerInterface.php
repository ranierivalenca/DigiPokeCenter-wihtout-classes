<?php
require_once 'TrainerInterface.php';

interface DigiTrainerInterface extends TrainerInterface {
    function __construct($nome, $sobrenome, $idade);

    function addMonster(DigimonInterface $monster);
}
?>