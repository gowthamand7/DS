<?php

require_once 'autoLoad.php';

class infix2Postfix extends stack_LinkedList {

    private $expression = null;
    private $out = null;
    private $operators = array('^' => 9,
        '*' => 8,
        '/' => 8,
        '%' => 8,
        '+' => 5,
        '-' => 5,
        '(' => 0,
        ')' => 0);

    function __construct ($expression)
    {
        $this->expression = $expression;

    }

    function is_operator ($char)
    {
        return array_key_exists ($char, $this->operators);

    }

    function convert()
    {
        $expression = '(' . preg_replace ('/\s+/', '', $this->expression) . ')';

        $this->out = '';

        for ($i = 0; $i < strlen ($expression); $i++)
        {
            $char = $expression[$i];

            if ($this->is_operator ($char))
            {
                if ($char == '(')
                {
                    $this->push ($char);
                } else if ($char == ')')
                {
                    while ($this->count > 0 && ($top = $this->peek ()) != '(')
                    {
                        $this->out .= $this->pop ();
                    }
                    $this->pop ();
                } else
                {
                    while ($this->count > 0)
                    {
                        $peek = $this->peek ();

                        if ($this->precedence ($char) <= $this->precedence ($peek))
                        {
                            $this->out .= $this->pop ();
                        } else
                        {
                            break;
                        }
                    }

                    $this->push ($char);
                }
            } else
            {
                $this->out .= $char;
            }
        }

        while ($this->count > 0)
        {
            if ($this->peek () == '(')
            {
                $this->pop ();
            } else
            {
                $this->out .= $this->pop ();
            }
        }

        return $this->out;

    }

    function precedence ($opchar)
    {
        return $this->operators[$opchar];

    }

    function getprecedence ($char)
    {
        if ($char == '+' || $char == '-')
            return(1);
        if ($char == '*' || $char == '/' || $char == '%')
            return(2);
        if ($char == '^')
            return(3);
        if ($char == '(' || $char == ')')
            return(5);
        return(4);

    }

}

$d = new infix2Postfix ("a+b^(c-d)+z*h");
echo $d->convert();
