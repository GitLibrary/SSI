### Alpha Numeric Sequential Incrementor
ANSI is an PHP based library which provides a sequential increment in an alpha numeric string order like this:

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
String Case will not be changed.

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
$ansi = new ANSI();
echo $ansi->__getString($v);
```
