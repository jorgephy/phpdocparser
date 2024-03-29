<?php
/**
 * PhpDocParser file
 * 
 * @package \PhpDocParser
 * @copyright Copyright (C) 2019 Jorge Phy Labs, Inc. All rights reserved.
 * @author Jorge Phy <dev.jorgephy@gmail.com>
 * @link https://github.com/jorgephy/phpdocparser
 * @version SVN: v0.1
 */
 
namespace Phy;

/**
 * PhpDocParser class
 *
 * @author Jorge Phy <dev.jorgephy@gmail.com>
 * @package \PhpDocParser
 */
class PhpDocParser
{
	/**
	 * @access private
	 * @var string
	 */
	private $_file = null;
	
	/**
	 * @access private
	 * @var array
	 */
	private $_headers = array(
		'package' => null,
		'license' => null,
		'author' => null,
		'link' => null,
		'copyright' => null,
		'version' => null,
	);
	
	/**
	 * Constructor.
	 * 
	 * @access public
	 * @param string Nome do ficheiro
	 * @throws \Exception
	 * @return void
	 */
	public function __construct($fileName)
	{
		if (! is_file($fileName) or ! is_readable($fileName)) {
			throw new PhpDocParserException(sprintf("Ficheiro %s n�o encontrado.", $fileName));
		}
		
		$this->_file = $fileName;
	}
	
	/**
	 * Recupera�� de anota��es
	 * 
	 * @access public
	 * @return array
	 */
	public function parse()
	{
		$tokens = token_get_all(file_get_contents($this->_file));
		
		foreach ($tokens as $token) {
			if (is_array($token) && T_DOC_COMMENT == $token[0]) {
				
				$comments = str_replace("\r\n", "\n", $token[1]);
				
				$lines = explode("\n", $comments);
				
				foreach ($lines as $line) {
					$line = trim($line, "\t\r\n   \0\x0B* ");
					
					if (preg_match('/^@([A-Za-z0-9\-_]+) ?(.*)$/', $line, $matches)) {
						if (! in_array($matches[1], array_keys($this->_headers))) {
							continue;
						}
						
						$this->_headers[$matches[1]] = $matches[2];
					}
				}
			}
		}
		
		return $this->_headers;
	}
}