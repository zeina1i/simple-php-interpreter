<?php


class Expr
{
	private $num;
	private $exprOpt;

	public function __construct(int $num, ExprOpt $exprOpt)
	{
		$this->num = $num;
		$this->exprOpt = $exprOpt;
	}

	/**
	 * @return int
	 */
	public function getNum(): int
	{
		return $this->num;
	}

	/**
	 * @return ExprOpt
	 */
	public function getExprOpt(): ExprOpt
	{
		return $this->exprOpt;
	}
}

interface ExprOpt {

}

class Epsilon implements ExprOpt {

}

class Opt implements ExprOpt {

	private $num;
	private $exprOpt;

	public function __construct(int $num, ExprOpt $exprOpt)
	{
		$this->num = $num;
		$this->exprOpt = $exprOpt;
	}

	/**
	 * @return int
	 */
	public function getNum(): int
	{
		return $this->num;
	}

	/**
	 * @return ExprOpt
	 */
	public function getExprOpt(): ExprOpt
	{
		return $this->exprOpt;
	}
}