<?php
include("AllegroApi.php");
include("AllegroField.php");
include("AllegroFieldset.php");

$API_KEY = '';
$LOGIN  = '';
$PASSWORD = '';
$WSDL = 'https://webapi.allegro.pl.webapisandbox.pl/service.php?wsdl';

$api = new AllegroApi($LOGIN, $PASSWORD, $API_KEY, $WSDL);
$fieldset = new AllegroFieldset();

$image = file_get_contents("test.jpg");

$fieldset
    ->add(new AllegroField(1, "TEST", AllegroField::VALUE_STRING))
    ->add(new AllegroField(2, 67421, AllegroField::VALUE_INT))
    ->add(new AllegroField(4, 1, AllegroField::VALUE_INT))
    ->add(new AllegroField(5, 2, AllegroField::VALUE_INT))
    ->add(new AllegroField(8, 200, AllegroField::VALUE_FLOAT))
    ->add(new AllegroField(9, 1, AllegroField::VALUE_INT))
    ->add(new AllegroField(10, 1, AllegroField::VALUE_INT))
    ->add(new AllegroField(11, "TESTOWA", AllegroField::VALUE_STRING))
    ->add(new AllegroField(24, "TESTOWA", AllegroField::VALUE_STRING))
    ->add(new AllegroField(32, "22-210", AllegroField::VALUE_STRING))
    ->add(new AllegroField(2609, 1, AllegroField::VALUE_INT))
    ->add(new AllegroField(2702, "102", AllegroField::VALUE_STRING))
    ->add(new AllegroField(2703, 1, AllegroField::VALUE_INT))
    ->add(new AllegroField(2731, 1, AllegroField::VALUE_INT))
    ->add(new AllegroField(20053, 1, AllegroField::VALUE_INT))
    ->add(new AllegroField(22207, 1, AllegroField::VALUE_FLOAT))
    ->add(new AllegroField(25179, 1, AllegroField::VALUE_INT))
    ->add(new AllegroField(36, 10, AllegroField::VALUE_FLOAT))
    ->add(new AllegroField(16, $image, AllegroField::VALUE_IMAGE))
;

try{
    var_dump($api->newAuction($fieldset->toArray()));
}catch (Exception $e){
    var_dump($e);
}



