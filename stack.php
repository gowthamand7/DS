<?php

interface stack
{
    public function push($value);

    public function pop();

    public function peek();
}
