<?php

require_once 'autoLoad.php';

class wordsCount extends hash_Tables {

    public $fileName = null;
    public $words = [];

    function __construct ($filePath)
    {
        $this->fileName = $filePath;

    }

    function getWordsCount ()
    {
        $handle = fopen ($this->fileName, "r");
        if ($handle)
        {
            while (($line = fgets ($handle)) !== false)
            {
                $words = preg_split ('/\s+/', $line, -1, PREG_SPLIT_NO_EMPTY);
                foreach ($words as $word)
                {
                    $this->insert ($word);
                }
            }
            //here
            foreach ($this->table as $words)
            {
                $this->words[$words->head->value] = $words->count;
            }
            fclose ($handle);
            return $this->words;
        } else
        {
            throw new Exception ('Error opening a file');
        }

    }

}

$w = new wordsCount ('C:/Users/Gowthaman/Desktop/reffiles/Latin-Lipsum.txt');
$g = $w->getWordsCount ();
print_r($g);
echo '';
