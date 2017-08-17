<?php

require_once 'autoLoad.php';

class infix2Postfix extends stack_LinkedList
{
    private $expression = null;
    private $out = null;
    private $operators = ['^' => 9,
        '*'                   => 8,
        '/'                   => 8,
        '%'                   => 8,
        '+'                   => 5,
        '-'                   => 5,
        '('                   => 0,
        ')'                   => 0, ];

    public function __construct($expression)
    {
        $this->expression = $expression;
    }

    public function is_operator($char)
    {
        return array_key_exists($char, $this->operators);
    }

    public function convert($expression = null)
    {
        if ($expression == null) {
            $expression = '('.preg_replace('/\s+/', '', $this->expression).')';
        } else {
            $expression = '('.preg_replace('/\s+/', '', $expression).')';
        }

        $this->out = '';

        for ($i = 0; $i < strlen($expression); $i++) {
            $char = $expression[$i];

            if ($this->is_operator($char)) {
                if ($char == '(') {
                    $this->push($char);
                } elseif ($char == ')') {
                    while ($this->count > 0 && ($top = $this->peek()) != '(') {
                        $this->out .= $this->pop();
                    }
                    $this->pop();
                } else {
                    while ($this->count > 0) {
                        $peek = $this->peek();

                        if ($this->precedence($char) <= $this->precedence($peek)) {
                            $this->out .= $this->pop();
                        } else {
                            break;
                        }
                    }

                    $this->push($char);
                }
            } else {
                $this->out .= $char;
            }
        }

        while ($this->count > 0) {
            if ($this->peek() == '(') {
                $this->pop();
            } else {
                $this->out .= $this->pop();
            }
        }

        return $this->out;
    }

    public function precedence($opchar)
    {
        return $this->operators[$opchar];
    }

    public function getprecedence($char)
    {
        if ($char == '+' || $char == '-') {
            return 1;
        }
        if ($char == '*' || $char == '/' || $char == '%') {
            return 2;
        }
        if ($char == '^') {
            return 3;
        }
        if ($char == '(' || $char == ')') {
            return 5;
        }

        return 4;
    }
}
