<?php

// Problem
// 
// In some English words, there is a letter that appears more than once. Search
// through a sample of text to find the word with a letter that is repeated 
// more times than any other letter is repeated in any other word. When there 
// is a tie between two words, choose the word that appeared first in the sample.
// 
// The text sample will contain only alphabetic characters (“a” through “z” 
// and “A” through “Z”), whitespace, and punctuation marks. The words will be 
// separated by whitespace. A letter is considered to be the same letter 
// regardless of whether it appears in uppercase or lowercase. Any punctuation 
// marks should be ignored—so, in particular, contractions, possessives, and 
// hyphenated words count as a single word.
// 
// Each sample is stored in a text file: Write a function that accepts a file 
// path as its argument, and returns the chosen word as its output.
// 
// Example 1:
// 
// Input: “O Romeo, Romeo, wherefore art thou Romeo?”
// Output: “wherefore”
// Explanation: The letter “e” is repeated three times in the word 
// “wherefore”—and this is more than any other letter is repeated in any 
// other word
// 
// Example 2:
// 
// Input: “Some people feel the rain, while others just get wet.”
// Output: “people”
// Explanation: Both “people” and “feel” have a letter that is repeated 
// twice within the word. This is a tie, and the first word wins.
//
// Approach
//
// 1. Input entire text and parse into constituent letter set
// 2. Get a frequency count of each letter in entire string
// 3. Sort frequency descending
// 4. Calculate frequency/containing-word-count for each letter
// 5. Sort by ratio descending
// 6. Find first word with highest ratio letter
// 7. Print word index

require_once ('SampleText.php');

// Tests

class DattcoCaseTest extends PHPUnit_Framework_TestCase
{
    protected function setUp()
    {

    }


    public function testSampleText()
    {
        $sample = new SampleText('data/case01_text.txt');
        $this->assertEquals("O Romeo, Romeo, wherefore art thou Romeo\n", $sample->textStringOrig);
    }


    public function testTextProfile()
    {
        $sample = new SampleText('data/case01_text.txt');
        $sample->profile();
        $textWordSet = array(0=>"o",
                             1=>"romeo",
                             2=>"romeo",
                             3=>"wherefore",
                             4=>"art",
                             5=>"thou",
                             6=>"romeo");
        $textLetterFreq = array('o' => 9,
                                'r' => 6,
                                'm' => 3,
                                'e' => 6,
                                'w' => 1,
                                'h' => 2,
                                'a' => 1,
                                't' => 2,
                                'f' => 1,
                                'u' => 1);
        $textLetterOccs = array('o' => [[0,1], [1,2], [2,2], [3,1], [4,0], [5,1], [6,2]],
                                'r' => [[0,0], [1,1], [2,1], [3,2], [4,1], [5,0], [6,1]],
                                'm' => [[0,0], [1,1], [2,1], [3,0], [4,0], [5,0], [6,1]],
                                'e' => [[0,0], [1,1], [2,1], [3,3], [4,0], [5,0], [6,1]],
                                'w' => [[0,0], [1,0], [2,0], [3,1], [4,0], [5,0], [6,0]],
                                'h' => [[0,0], [1,0], [2,0], [3,1], [4,0], [5,1], [6,0]],
                                'a' => [[0,0], [1,0], [2,0], [3,0], [4,1], [5,0], [6,0]],
                                't' => [[0,0], [1,0], [2,0], [3,0], [4,1], [5,1], [6,0]],
                                'f' => [[0,0], [1,0], [2,0], [3,1], [4,0], [5,0], [6,0]],
                                'u' => [[0,0], [1,0], [2,0], [3,0], [4,0], [5,1], [6,0]]);
        $this->assertEquals($textWordSet, $sample->wordset);
        $this->assertEquals(count($textWordSet), count($sample->wordset));
        $this->assertEquals($textLetterFreq, $sample->ltrfreq);
        $this->assertEquals($textLetterOccs, $sample->ltroccs);

    }

}


?>
