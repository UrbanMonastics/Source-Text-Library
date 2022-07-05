# Source Texts Library in PHP
[![Build Status](https://api.travis-ci.com/UrbanMonastics/Source-Text-Library.svg)](https://app.travis-ci.com/github/UrbanMonastics/Source-Text-Library)
[![Total Downloads](https://poser.pugx.org/urbanmonastics/sourcetextlibrary/d/total.svg)](https://packagist.org/packages/urbanmonastics/sourcetextlibrary)
[![Version](https://poser.pugx.org/urbanmonastics/sourcetextlibrary/v/stable.svg)](https://packagist.org/packages/urbanmonastics/sourcetextlibrary)
[![License](https://poser.pugx.org/urbanmonastics/sourcetextlibrary/license.svg)](https://packagist.org/packages/urbanmonastics/sourcetextlibrary)

Easily create robust libraries of versioned texts. The Source Texts Library creates a simple programatic interface layer for indexing, accessing, and formatting texts (using markdown extended by the [Source Text Parser](https://github.com/UrbanMonastics/Source-Text-Parser) library).

## Project Goals

*	Provide a common format for large libraries of texts.
*	Use JSON instead of XML for easier parsing and structuring.
*	Easily support multiple versions of the same texts.
*	Include helpful metadata alongside texts.
*	Allow for easy use of multiple libraries in projects to encourage collaboration.


## Documentation

*  [Getting Started]()
*  [Libraries: How they Work](Docs/Libraries.md)
    *  [Collections](Docs/Collections.md)
*  [Versions](Docs/Versions.md)
*  [Source Files](Docs/Sources.md)
*  [Texts, Chapters, and other Segments](Docs/Texts.md)
*  [Dictionaries]()
*  [Languages](Docs/Languages.md)



## Adding to your Project  
  
Install the composer package:  

```php
composer require UrbanMonastics/SourceTextLibrary
```

  
## Example Usage  
In the most simple approach you can pass text to be parsed.  

```php
$SourceTextLibrary = new /UrbanMonastics/SourceTextLibrary();

echo $SourceTextLibrary->text("Hello *Source Parser*!");  # prints: <p>Hello <em>Source Parser</em>!</p>
```

You can also take advantage of the structure of the source texts.

```php
$SourceTextLibrary = new SourceTextLibrary();

// Load the source data into the parser
$Source = json_decode( file_get_contents('path/to/source.json'), true );
$SourceTextLibrary->loadSource( $Source );

$SourceTextLibrary->loadText();

echo $SourceTextLibrary->text("Hello *Source Parser*!");  # prints: <p>Hello <em>Source Parser</em>!</p>

// Clear the loaded Source and Texts - without altering other options
$SourceTextLibrary->clearSource();
```
