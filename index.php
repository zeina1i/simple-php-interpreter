<?php
require 'Util.php';
require 'Expr.php';
require 'Token.php';
require 'Lexer.php';
require 'Parser.php';

$lexer = new Lexer();
$tokens = $lexer->lex('123 + 45 + 21 + 321');
$parser = new Parser($tokens);
$ast = $parser->parse();

print_r($ast);