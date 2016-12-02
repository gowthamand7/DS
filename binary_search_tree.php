<?php

require_once 'autoLoad.php';

class binary_search_tree {

    private $root = null;

    function insert ($value)
    {
        $node = $this->root;

        if ($this->root == null)
        {
            $this->root = new node ($value);
            return true;
        } else
        {
            while ($node)
            {
                if ($value > $node->value)
                {

                    if ($node->right == null)
                    {
                        $node->right = new node ($value);
                        break;
                    } else
                    {
                        $node = $node->right;
                    }
                } else
                {
                    if ($node->left == null)
                    {
                        $node->left = new node ($value);
                        break;
                    } else
                    {
                        $node = $node->left;
                    }
                }
            }
        }

    }

    function search ($data)
    {
        $node = $this->root;
        while ($node)
        {
            if ($node->value == $data)
            {
                $temp = clone $node;
                $temp->left = $temp->right = null;
                return $temp;
            }
            if ($node->value > $data)
            {
                $node = $node->left;
            } else
            {
                $node = $node->right;
            }
        }
        return false;

    }

    public function traverse ($method)
    {
        switch ($method)
        {
            case 'inorder':
                $this->_inorder ($this->root);
                break;
            case 'postorder':
                $this->_postorder ($this->root);
                break;

            case 'preorder':
                $this->_preorder ($this->root);
                break;

            default:
                break;
        }

    }

    //(process , vist left , vist right)
    private function _preorder ($node)
    {
        echo $node . " ";
        if ($node->left)
        {
            $this->_preorder ($node->left);
        }
        if ($node->right)
        {
            $this->_preorder ($node->right);
        }

    }

    //(vist left,process value, vist right)
    private function _inorder ($node)
    {
        if ($node->left)
        {
            $this->_inorder ($node->left);
        }
        echo $node . " ";
        if ($node->right)
        {
            $this->_inorder ($node->right);
        }

    }

    //(vist left,vist right, process)
    function _postorder ($node)
    {
        if ($node->left)
        {
            $this->_postorder ($node->left);
        }
        if ($node->right)
        {
            $this->_postorder ($node->right);
        }
        echo $node . " ";

    }

    function delete ()
    {
        
    }

}

class node {

    public $left = null;
    public $right = null;
    public $value = null;

    function __construct ($value, $left = null, $right = null)
    {
        $this->value = $value;
        $this->right = $right;
        $this->left = $left;

    }

    function __toString ()
    {
        return (string) $this->value;

    }

}
