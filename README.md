Php Document Parser
====================

PhpDocParser class

0.0 Introdução
----------------

PhpDocParser é uma classe simples para apontar anotação ou documentação da classe ou de ficheiro `(.php, etc.)`.
Note que a documentação do ficheiro sempre começa com `@`


1.0 Exemplo
------------

```php
use Phy\PhpDocParser;

//Nome do ficheiro e a sua localização
$file = "/path/PhpDocParser.php";

$parser = new PhpDocParser($file);
$document = $parser->parse();

//
var_dump($document);
```

2.0 Changelog
-------------
* **[2019-07-23]** Versão inicial

## Author
Jorge Phy <dev.jorgephy@gmail.com>
