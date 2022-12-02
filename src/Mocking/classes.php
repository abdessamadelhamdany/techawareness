<?php

namespace Techawareness\Mocking;

class Division
{
    protected $instance;

    public static function getInstance()
    {
        return static::$instance ?? new Division();
    }

    public function divide($x, $y)
    {
        if ((int) $y === 0) {
            throw new \Exception('Operation denied');
        }
        return $x / $y;
    }
}

class Calculator
{
    private Division $div;

    function __construct()
    {
        $this->div = new Division();
    }

    private function add($x, $y)
    {
        return $x + $y;
    }

    private function sub($x, $y)
    {
        return $x - $y;
    }

    private function mul($x, $y)
    {
        return $x * $y;
    }

    public function calculate($x, $y, $op)
    {
        if ($op === '+') {
            return $this->add($x, $y);
        }
        if ($op === '-') {
            return $this->sub($x, $y);
        }
        if ($op === 'x') {
            return $this->mul($x, $y);
        }
        if ($op === '/') {
            return Division::getInstance()
                ->divide($x, $y);
        }
        return 0;
    }
}
