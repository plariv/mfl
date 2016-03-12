<?php

// Problem
// 
// In some English words, there is a letter that appears more than once. Search
// through a sample of text to find the word with a letter that is repeated 
// more times than any other letter is repeated in any other word. When there 
// is a tie between two words, choose the word that appeared first in the sample.
// 

// SampleText
//
// This class imports an arbitrary file of text-only data, and provides
// a profile of words and letters that occur in that text.

class SampleText
{
    public $fhandle = '';
    public $textStringOrig = '';
    public $wordset = [];
    public $ltrfreq = [];
    public $ltroccs = [];

    /*************************************************************
     * Constructor
     *
     * @param object $filename
     *     A file path to a file of arbitrary text-only data
     *
     * @return object
     *     The initial object state contains a handle to the opened file
     *************************************************************/


    public function __construct($filename)
    {
        $this->fhandle = fopen($filename, "r");
        $this->textStringOrig = fread($this->fhandle, filesize($filename));

        return;
    }

    /*************************************************************
     * profile
     *
     * @return object
     *     The profile function parses the input text into several 
     *     properties:
     *      ->wordset - an indexed list of each word in the text
     *      ->ltrfreq - an array keyed by each unique letter in the
     *                  text and its frequency
     *      ->ltroccs - an array keyed by each unique letter, of
     *                  tuples that identify the word index, and the 
     *                  number of occurrences of that letter in that
     *                  word
     *     
     *************************************************************/


    public function profile()
    {
        $this->textStringOrig = strtolower($this->textStringOrig);
        $noPuncs = str_replace(array(',', '.', '\n'), array('', '', ''), rtrim($this->textStringOrig));
        $this->wordset = explode(' ', $noPuncs);

        foreach($this->wordset as $oneword)
        {
            foreach(preg_split('//', $oneword, -1, 1) as $char)
            {
                (array_key_exists($char, $this->ltrfreq)) ? $this->ltrfreq[$char]++ : $this->ltrfreq[$char] = 1;
            }    
        }

        foreach($this->ltrfreq as $key_ltr => $value)
        {
            $inword = [];
            foreach($this->wordset as $key_wrd => $singleword)
            {
                $lf = 0;
                $lf = substr_count($singleword, $key_ltr);
                array_push($inword, [$key_wrd, $lf]);
            }
            $this->ltroccs[$key_ltr] = $inword;
        }

        return;
    }
}

?>
