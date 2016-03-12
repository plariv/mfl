<?php

// Problem
// 
// In some English words, there is a letter that appears more than once. Search
// through a sample of text to find the word with a letter that is repeated 
// more times than any other letter is repeated in any other word. When there 
// is a tie between two words, choose the word that appeared first in the sample.
// 

// Examiner
//
// This class examines text that has been profiled as a SampleText object, and
// returns results of that examination.
//

class Examiner
{
    public $sampletextobj = '';
    public $mostfrequentltr = '';
    public $mostfrequentltrcount = 0;
    public $mostfrequentword = '';
    public $mostfrequentwordindex = 0;

    /*************************************************************
     * Constructor
     *
     * @param object $sample
     *     A SampleText object that has profiled some arbitrary text
     *
     * @return object
     *************************************************************/

    public function __construct($sample)
    {
        $this->sampletextobj = $sample;

        return;
    }


    /*************************************************************
     * findMostFrequent
     *
     * @return object
     *     The Examiner instance with identification of the 
     *     the most frequently occurring letter in the sample text
     *     
     *************************************************************/

    public function findMostFrequent()
    {
        $thetextobj = $this->sampletextobj;

        foreach($thetextobj->ltroccs as $letter => $occurs)
        {
            $this->mostfrequentltr = ($this->mostfrequentltr == '') ? $letter : $this->mostfrequentltr;
            foreach($occurs as $occurrence)
            {
                if($occurrence[1] > $this->mostfrequentltrcount)
                {
                    $this->mostfrequentltr = $letter;
                    $this->mostfrequentltrcount = $occurrence[1];
                    $this->mostfrequentwordindex = $occurrence[0];
                }
            }
        }

        $this->mostfrequentword = $thetextobj->wordset[$this->mostfrequentwordindex];

        return;
    }
}

?>

