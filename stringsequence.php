<?php

/**
 * String Sequence Incrementor v1.0
 * https://github.com/gitlibrary/ssi
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */

class StringSequence {

  private static $ansiLimit = 30;

  /**
   * Validate String
   */
  private static function isValidString($string) {

    // Expected string length should not exceed as defined in a named constant 'ansiLimit'
    // ansiLimit is defined in code file before including of ansi.php file
    if(strlen($string) > self::$ansiLimit) { return FALSE; }

    // String must only contain alphabats & integers
    if(!ctype_alnum($string)) { return FALSE; }

    return TRUE;
  }

  /**
   * Filter String
   */
  private static function filterStr($string){return trim(htmlspecialchars(strip_tags($string)));}

  /**
   * Compare Single Charater & return @var character
   */
  private static function nextCharacter($character) {
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
  private static function nextSequence($string) {
    // reverse, make into array
    $stringArray = str_split(strrev($string));

    foreach($stringArray as &$character) {
        $character = self::nextCharacter($character);
        // keep going down the line if we're moving from 'Z' to '0'
        if ($character != '0') {
            break;
        }
    }

    // array to string, then reverse again
    $string = strrev(implode('', $stringArray));

    // check string if contains all 0's then prepend string by 1
    if(preg_match('/^[0]+$/i', $string)){$string = '1'.$string; }

    return $string;
  }

  /**
   * Get New Sequencially Incremented String
   */
  public static function Incrementor($string){

    // Call Filter
    $string = self::filterStr($string);
    
    // Call Validator & if string is not alphanumeric return ELSE condition
    if(self::isValidString($string)){
      return self::nextSequence($string);
    }
    else {
      throw new Exception(sprintf('String must only contain alphabats or integers'));
    }

  }

}

?>
