<?php

/**
 * Alpha Numeric Sequential Incrementor 1.0
 * https://github.com/gitlibrary/ansi
 * Copyright 2014, GitLibrary
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */

class ANSI {

  private $ansi = null;

  /**
   * Validate String
   */
  private static function __isValidString($string) {

    // Expected string length has to be less than 30
    if(strlen($string) > ansiLimit) { return FALSE; }

    // String must only contain alphabats & integers
    if(!ctype_alnum($string)) { return FALSE; }

    return TRUE;
  }

  /**
   * Filter String
   */
  private static function __filter($string){return trim(htmlspecialchars(strip_tags($string)));}

  /**
   * Compare Single Charater & return @var character
   */
  private function nextCharacter($character) {
    if ($character == '9') {
        return 'a';
    }
    else if ($character == 'Z' || $character == 'z') {
        return '0';
    }
    else {
        return chr( ord($character) + 1);
    }
  }

  /**
   * Evalute whole string return new sequencially incremented string
   */
  private function nextSequence($string) {
    // reverse, make into array
    $stringArray = str_split(strrev($string));

    foreach($stringArray as &$character) {
        $character = $this->nextCharacter($character);
        // keep going down the line if we're moving from 'Z' to '0'
        if ($character != '0') {
            break;
        }
    }

    // array to string, then reverse again
    $this->ansi = strrev(implode('', $stringArray));

    // check string if contains all 0's then prepend string by 1
    if(preg_match('/^[0]+$/i', $this->ansi)){$this->ansi = '1'.$this->ansi; }

    return $this->ansi;
  }

  /**
   * Get New Sequencially Incremented String
   */
  public function __getString($string){

    // Call Filter
    $string = self::__filter($string);
    
    // Call Validator & if string is not alphanumeric return ELSE condition
    if(self::__isValidString($string)){ return $this->nextSequence($string); } else { return 'Invalid String'; }

  }

}

?>
