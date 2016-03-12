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
require_once ('Examiner.php');

// Tests

class ExaminerTest extends PHPUnit_Framework_TestCase
{
    public function testExaminer()
    {
        $samptextobj = new SampleText('data/case01_text.txt');
        $samptextobj->profile();
        $textexaminer = new Examiner($samptextobj);
        $textexaminer->findMostFrequent();
        $this->assertInstanceOf('Examiner', $textexaminer);
        $this->assertEquals('e', $textexaminer->mostfrequentltr);
        $this->assertEquals('wherefore', $textexaminer->mostfrequentword);
    }
}

?>