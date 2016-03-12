#!/usr/bin/php
<?php
// The Problem Statement
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
// 1. Input entire text
// 2. Profile the text by parsing it into constituent words and making
//    an array of each unique letter in the word set
// 3. Scan the word set and characterize each letter's occurrence word by word
// 4. Examine the array of letter occurrences and filter for the most frequently occurring letter
// 5. Print the result

// Source
// 
// MostFrequentLetter.php
//
// This runner identifies the most frequently occurring letter in an arbitrary
// text string by analyzing the string using a couple of classes: 
//    SampleText - profiles the string's constituent words and letters
//    Examiner - examines a SampleText object for the most frequent letter

    require_once ('SampleText.php');
    require_once ('Examiner.php');

    if ($argc != 2 || in_array($argv[1], array('--help', '-help', '-h', '-?'))) {
?>
    This is a PHP script that takes one argument.

    Usage:
    <?php echo $argv[0]; ?> <file path>

    Where:
    <file path> is the path name to a file of arbitrary text.
    The script will identify the most frequently occurring letter
    in the text, as well as word in which it occurs.

<?php
    } else {

        $sampleTextObject = new SampleText($argv[1]);
        $sampleTextObject->profile();
        $textExaminer = new Examiner($sampleTextObject);
        $textExaminer->findMostFrequent();
    
        print "The most frequently occurring letter is... " . $textExaminer->mostfrequentltr . "\n";
        print "It occurs " . $textExaminer->mostfrequentltrcount . " times in the word... " . $textExaminer->mostfrequentword . "\n";

    }

?>
