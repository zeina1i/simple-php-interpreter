<?php


class Token
{
	const TYPE_NUM = 'num';
	const TYPE_PLUS = 'plus';
	const TYPE_TIMES = 'times';
	const TYPE_IDENTIFIER = 'identifier';
	const TYPE_TRUE = 'true';
	const TYPE_FALSE = 'false';
	const TYPE_EOF = 'eof';

	private $type;
	private $text;
	private $startPos;

	public function __construct(string $type, string $text, int $startPos)
	{
		$this->type = $type;
		$this->text = $text;
		$this->startPos = $startPos;
	}

	/**
	 * @return string
	 */
	public function getType(): string
	{
		return $this->type;
	}

	/**
	 * @return string
	 */
	public function getText(): string
	{
		return $this->text;
	}

	/**
	 * @return int
	 */
	public function getStartPos(): int
	{
		return $this->startPos;
	}
}