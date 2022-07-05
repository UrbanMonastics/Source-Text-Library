# Sources
[Return to Readme](../README.md)

Every group of texts is a source. They need to have an information file separate from the text itself. This is a separate file to reduce loading times when simply desiring to skim through available sources.

The source file should include the following fields: 


## Available Fields

*	**Abbreviation**: [String|Required] The title or descriptive title in the original language. Used to reference the text
*	**Title**: [Array|Required] The name of the text. You should always provide a 'default' title for the text which would be in either English, or the original source language of the text. Additional primary titles can be supplied with a language (from `languages.json`) or version abbreviation (from `versions.json`).
*	**AlternativeTitles**: [Array|Optional] A list of alternative tiles organized by language (from `languages.json`).
*	**Description**: [String|Optional] Describe the text, or provide an introduction to the text.
*	**Type**: [Set|Required] What type of text is it? This tells us what primary file to look for, and how that file will be formatted.  
	*	Book, Letter, Dictionary  
*	**SecondaryType**: [String|Optional] A freeform field to allow you to indicate a secondary text type.
*	**Language**: [String|Required] The language being used in a texts most original form. Reference the keys in the languages.json file. These are often broken down by region and period of time. For Dictionaries this is the language of the words being defined. *Note:* One should expect versions of this text to be written in different languages as indicated by their version.  
*	**SecondaryLanguage**: [String|Optional] This is the language of the definitions for dictionaries.
*	**Version**: [Set|Required] Indicate what type of a version of the text we have. Many older texts will have original, translations. Defaults to Original
	*	Original, or Unique Abbreviation from the Versions file
*	**Date**: [Date|Optional] Date for this version of the text
*	**Collection**: [Array|Optional] Use the Abbreviation from the related Collections file.
*	**Segments**: [Set|Required] In what way, if any, is this source broken down into smaller pieces. Most longer works will be broken into *Chapters* of some type. Yet we have some sources which are referenced by their abbreviation (like Antiphons, Canticles, Responses, Prayers, Blessings, and others).
	*	Chapters, Abbreviations, None
*	**SegmentTitles**: [Boolean|Optional] When chapters are involved, do we have unique titles for each chapter that we may should include in the display of the texts.
*	**Verses**: [Boolean|Optional] Books and Letters Only. Allows you to indicate if this source text is broken into verses above the sentence breaks. Defaults to false.
*	**Notes**: [String|Optional] This section is optional, but it allows you to leave any notes or comments about the source that someone looking at it might find useful. One example could be that the book of psalms uses the Hebrew/modern numbering and that latin sources have been adjusted to match.
*	**Extra**: [Array|Optional] If you need to add metadata to an item you can place it into this object. You should use a consistant key across the related items.
*	**Source**:	[Array|Optional] This is required if the text is not one of our creation. This ensures that we keep important license and access data with the texts itself (in addition to the version file). 
	*	**DateAccessed**: [Date|Required] When was the source first accessed
	*	**License**: [String|Optional] What type of license is on this content
	*	**Attribution**: [HTML|Optional] Any requested attribution to include with the source.
	*	**Link**: [URL|Optional] Where did you access the source
	*	**LastUpdated**: [Date|Optional] When was the source most recently updated



## Template `source.json` file
```json
{
	"Abbreviation": "",
	"Title": {
		"default": ""
	},
	"AlternativeTitles":{
		"eng": ["", "", ""],
		"fra-sta": ["", "", ""]
	},
	"Description": "",
	"Type": "",
	"Date": "",
	"Language": "",
	"SecondaryLanguage": "",
	"Version": "",
	"Collection": [""],
	"Chapters": false,
	"SegmentTitles": false,
	"Segments": false,
	"Verses": false,
	"Notes": "",
	"Extra": {}
}
```

## Example Source file

A sample source file: `/Library/sample-text/source.json`

```json
```