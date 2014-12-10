### Alpha Numeric Sequential Incrementor
ANSI is a PHP based library which provides a sequential increment in an alpha numeric string order like this:

```
Old String - ZZZ
New String - 1000

Old String - DASD231DASDA12Z
New String - DASD231DASDA130

Old String - 000000000000000
New String - 000000000000001

Old String - zzzzzzzzzzzzzzzz
New String - 10000000000000000

Old String - edwaeqweq31321eae2131ea19
New String - edwaeqweq31321eae2131ea1a
```
If a string or a part of string contains uppercase, lowercase or both. It will going to increment last character
of string in the same case as it is provided in the input string & it will not effect rest of the string case.
This following string contains both upper & lower cases. String has been increment in the same order,
case(upper & lower case of string remains as it is provided) & last character 'G' has been successfully increment
into the expected character 'H' without losing the character case had been provided in input string like this:

```
Old String - rweQW324eq321CDG
New String - rweQW324eq321CDH
```

If string contains special characters or any other characters then return output will an invalid string:

```
Old String - fdsad3!###
New String - Invalid String
```

### How to use this
Simply add ansi.php file & define ansiLimit into your code:

```
define('ansiLimit', 30);
require_once('ansi.php');
```

Create an object of class ANSI. Then call method __getString() & display sequential incremented string like this:

```
$string = 'asdaW31RG2B3q';
$ansi = new ANSI();
echo $ansi->__getString($string);
```
