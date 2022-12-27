# Output
## Installation
You can download the source from github and use it directly in your project, or you can install it using composer with:
```
composer require ogbitblt-output
```
## Usage
Output text to a terminal console
``` PHP
use OGBitBlt\Output\Console;
use OGBitBlt\Output\OutputFactory;

// alternatively, you can also
// $console = new Console();
$console = OutputFactory::Create(Console::class);

// clear the terminal
$console->Clear();

// draw a line 80 characters wide using the % character
$console->DrawLn('%',80);

/* 
 * You can output text in different colors using the following macros
 * %RED()       -- red
 * %GREEN()     -- green
 * %YELLOW()    -- yellow
 * %BLUE()      -- blue
 * %MAGENTA()   -- magenta
 * %CYAN()      -- cyan
 * %LGRAY()     -- light gray
 * %DGRAY()     -- dark gray
 * %LRED()      -- light red
 * %LGREEN()    -- light green
 * %LYELLOW()   -- light yellow
 * %LBLUE()     -- light blue
 * %LMAGENTA()  -- light magenta
 * %LCYAN()     -- light cyan
 * %WHITE()     -- white
 */

// write a text without a newline character
$console->Write("Hello,");

// write with a newline character
$console->WriteLn("World!");

// change text colors
$console->WriteLn("The american flag is %RED(red), %WHITE(white), and %BLUE(blue)");
```
Output to a file:
```PHP
use OGBitBlt\Output\OutputCompressionType;
use OGBitBlt\Output\OutputEncodingType;
use OGBitBlt\Output\OutputFactory;
use OGBitBlt\Output\TextFile;

// alternatively you can also:
// $outfile = new TextFile("somefile.txt");
$outfile = OutputFactory::Create(TextFile::class,['file' => "somefile.txt"]);
$outfile->Write("string without a newline character");
$outfile->WriteLn("string with a newline character");

// change encoding to base64
$outfile->Write("this is base64 encoded",['encoding' => OutputEncodingType::Base64]);

// gzip output 
$outfile->Write("this is gzipped",['compression' => OutputCompressionType::Gzip]);
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first
to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)
