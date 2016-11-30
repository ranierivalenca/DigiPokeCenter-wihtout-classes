<?php
require_once 'MonsterInterface.php';

interface DigimonInterface extends MonsterInterface {
    function __construct($nome, $apelido=null, $poderInicial=null);

    function setName($nome);
    function getName();
}
?>