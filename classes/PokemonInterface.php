<?php
require_once 'MonsterInterface.php';

interface PokemonInterface extends MonsterInterface {
    function __construct($especie, $tipo, $apelido=null, $poderInicial=null);

    function setTipo($tipo);
    function getTipo();
    function setEspecie($especie);
    function getEspecie();
}
?>