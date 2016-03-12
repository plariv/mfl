<?php

    require_once ('SampleText.php');
    require_once ('Examiner.php');

    /*************************************************************
     * mostfrequentletter
     *

     *     This wrapper function invokes a couple of classes that
     *     parse the input text into several properties, then analyze
     *     that object for the most frequently used letter. 
     *
     *     The SampleText object provides:
     *      ->wordset - an indexed list of each word in the text
     *      ->ltrfreq - an array keyed by each unique letter in the
     *                  text and its frequency
     *      ->ltroccs - an array keyed by each unique letter, of
     *                  tuples that identify the word index, and the 
     *                  number of occurrences of that letter in that
     *                  word
     *
     *      The Examiner object provides:
     *       ->mostfrequentword - the single word from the text with
     *                            the most occurrences of a letter
     *                            across the entire submitted text
     *       ->mostfrequentltr - the most frequently occurring letter
     *                           across the entire submitted text
     *     
     * @return string     
     *     the word that contains the most frequently used letter 
     *     in the sample text
     **************************************************************/

    function mostfrequentletter ($datafile)
    {
        $sampleTextObject = new SampleText($datafile);
        $sampleTextObject->profile();
        $textExaminer = new Examiner($sampleTextObject);
        $textExaminer->findMostFrequent();

        return $textExaminer->mostfrequentword;
    
    }


?>
