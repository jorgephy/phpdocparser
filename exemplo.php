<?php
/**
 * @package Phpdocparser
 * @author Jorge Phy <dev.jorgephy@gmail.com>
 * @copyright Copyright (c) Jorge Phy Labs, Inc. 
 * @license MIT License
 * @link https://github.com/jorgephy/phpdocparser
 * @version Release: v0.1 2019/23
 */

use Phy\PhpDocParser;

require(dirname(__FILE__) . '/autoload.php');

//Nome do ficheiro e a sua localização
$file = dirname(__FILE__) . '/' . basename(__FILE__);

$parser = new PhpDocParser($file);
$document = $parser->parse();

//Retorna em array
var_dump($document);