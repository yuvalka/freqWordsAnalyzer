<?php

class Analyzer
{
    private $strToAnalyze;
    private $arrWords;
    private $freqResults;

    public function __construct($strToAnalyze = '') {
       $this->strToAnalyze = $strToAnalyze;
    }

    /**
    *  initialize text
    */
    public function init() {
      // remove all punctuation in string
      $str = trim( preg_replace( "/[^0-9a-z]+/i", " ", $this->strToAnalyze ));
      // uppercalse all string
      $srtToAnalyze = strtoupper($str);
      // convert string to array for analysis
      $this->arrWords = explode(' ', $srtToAnalyze);
    }

    /**
    *  analyze array of words
    */
    public function analyze() {
        $counter = array_count_values($this->arrWords);
        // sort by counter
        arsort($counter);
        $this->freqResults = $this->groupByFreq($counter);
    }

    public function getResults() {
       return $this->freqResults;
    }

    /**
    * group results by frequency
    */
    private function groupByFreq($counter) {
       $tmp =  array();

       // group counter array by frequency
       foreach ($counter as $word => $freq) {
           $tmp[$freq][] = $word;
       }

       // sorting inner words alphabetically
       foreach ($tmp as $key => &$values) {
         sort($values);
       }

       return $tmp;
    }






}
