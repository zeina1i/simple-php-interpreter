<?php


class Parser
{
	public function __construct(array $tokens)
	{
		$this->tokens = $tokens;
		$this->lookAhead = $tokens[0];
	}

	private $tokens;
	/** @var Token $lookAhead */
	private $lookAhead;

	public function parse()
	{
		$res = $this->expr();
		if ($this->lookAhead->getType() != Token::TYPE_EOF) {
			throw new Exception("Unknown token {$this->lookAhead->getText()} at position {$this->lookAhead->getStartPos()}");
		}

		return $res;
	}

	private function expr()
	{
		$numToken = $this->eat(Token::TYPE_NUM);
		return new Expr($numToken->getText(), $this->exprOpt());
	}

	private function exprOpt()
	{
		if ($this->lookAhead->getType() == Token::TYPE_PLUS) {
			$this->eat(Token::TYPE_PLUS);
			$numToken = $this->eat(Token::TYPE_NUM);

			return new Opt(intval($numToken->getText()), $this->exprOpt());
		}

		return new Epsilon();
	}

	private function eat(string $type) : Token
	{
		if ($this->lookAhead->getType() != $type) {
			throw new Exception("Expected: $type, got: {$this->lookAhead->getType()} at position {$this->lookAhead->getStartPos()}");
		}
		$currentToken = $this->tokens[0];

		$this->tokens = array_slice($this->tokens, 1, count($this->tokens) - 1);
		$this->lookAhead = $this->tokens[0];

		return $currentToken;
	}
}