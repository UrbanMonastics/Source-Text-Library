# Source Texts Library in PHP
[![Build Status](https://api.travis-ci.com/UrbanMonastics/Source-Text-Library.svg)](https://app.travis-ci.com/github/UrbanMonastics/Source-Text-Library)
[![Total Downloads](https://poser.pugx.org/urbanmonastics/sourcetextlibrary/d/total.svg)](https://packagist.org/packages/urbanmonastics/sourcetextlibrary)
[![Version](https://poser.pugx.org/urbanmonastics/sourcetextlibrary/v/stable.svg)](https://packagist.org/packages/urbanmonastics/sourcetextlibrary)
[![License](https://poser.pugx.org/urbanmonastics/sourcetextlibrary/license.svg)](https://packagist.org/packages/urbanmonastics/sourcetextlibrary)

A simple way to load, read, and present texts from various Source Text libraries.

This is a companion library to the [Source Text Parser](https://github.com/UrbanMonastics/Source-Text-Parser) library.


## Features

*   Quickly load one or many source text libraries  
*   Navigate to desired texts or segments and render them for display.  
*   




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
