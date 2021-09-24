<?php

class Lexer {

	public function lex(string $input) : array {
		$tokens = [];
		$currentPos = 0;
		while ($currentPos < strlen($input)) {
			$tokenStartPos = $currentPos;
			$lookAhead = $input[$currentPos];
			if ($lookAhead == ' ') {
				$currentPos++;
			} elseif ($lookAhead == '+') {
				$tokens[] = new Token(Token::TYPE_PLUS, $lookAhead, $tokenStartPos);
				$currentPos++;
			} elseif ($lookAhead == '*') {
				$tokens[] = new Token(Token::TYPE_TIMES, $lookAhead, $tokenStartPos);
				$currentPos++;
			} elseif (is_numeric($lookAhead)) {
				$text = '';
				while ($currentPos < strlen($input) && is_numeric($input[$currentPos])) {
					$text.= $input[$currentPos];
					$currentPos++;
				}
				$tokens[] = new Token(Token::TYPE_NUM, $text, $tokenStartPos);
			} elseif (Util::isLetter($lookAhead)) {
				$text = '';
				while ($currentPos < strlen($input) && Util::isLetter($input[$currentPos])) {
					$text.= $input[$currentPos];
					$currentPos++;
				}
				switch ($text) {
					case 'true':
						$type = Token::TYPE_TRUE;
						break;
					case 'false':
						$type = Token::TYPE_FALSE;
						break;
					default:
						$type = Token::TYPE_IDENTIFIER;
				}

				$tokens[] = new Token($type, $text, $tokenStartPos);
			} else {
				throw new Exception("Unknown character $lookAhead at position $currentPos");
			}
		}
		$tokens[] = new Token(Token::TYPE_EOF, '<EOF>', $currentPos);

		return $tokens;
	}
}