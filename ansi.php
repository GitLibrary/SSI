// increments a string(converted to it's numeric representation) and outputs the incremented string
// StringSequence::increment('asdaW31RG2B3q'); => 'asdaW31RG2B3r'
class StringSequence {
     static $ANSI_LIMIT = 30;
     private static function validate($string) {
         if(strlen($string) > self::$ANSI_LIMIT) {
            $msg = sprintf('Expected string length should not exceed  %s ', self::$ANSI_LIMIT );
            throw new Exception($msg);
         }
         if(!ctype_alnum($string)) {
            $msg = sprintf('String must only contain alphabats or integers');
            throw new Exception($msg);
         }
         return true;
     }
     private static function filterStr($string){
         return trim(htmlspecialchars(strip_tags($string)));
     }
     // increment $character by 1
     private static function nextCharacter($character) {
         if ($character == '9') {
             return 'a';
         } elseif ($character == 'Z' || $character == 'z') {
             return '0';
         } else {
             return chr( ord($character) + 1);
         }
     }
     // return new sequencially incremented string
     private static function nextSequence($string) {
         // reverse, make into array
         // array to string,
         // then reverse again
         $stringArray = str_split(strrev($string));
         foreach($stringArray as $character) {
             $character = self::nextCharacter($character);
             // keep going down the line if we're moving from 'Z' to '0'
             if ($character != '0') {
                 break;
             }
         }
         $str = strrev(implode('', $stringArray));
         // check string if contains all 0's then prepend string by 1
         $is_all_zero = preg_match('/^[0]+$/i', $str);
         if($is_all_zero){
            $str = '1'.$str;
         }
         return $str;
     }
     // Get New Sequencially Incremented String
     public static function increment($string, $offset=1) {
         $string = self::filterStr($string);
         self::validate($string);
         $res = $string;
         for( $i=0; $i<$offset; $i++) {
             $res = self::nextSequence($res);
         }
         return $res;
     }
}
