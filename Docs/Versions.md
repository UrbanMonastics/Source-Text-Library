# Versions
[Return to Readme](../README.md)

Define versions here.

The versions file should include the following fields for each entry. The entry should be referenced by its version abbreviation.

*	**Abbreviation**: [String|Required] The title or descriptive title in the original language. Used to reference and group the version together. If this is a follow on version you should include the year of this current version. This must match the top level key for the version
*	**Title**: [String|Required] The name of the text. 
*	**Description**: [String|Optional] Describe the text, or provide an introduction to the text.
*	**License**: [String MD|Optional] The License or Copyright that should accompany the display of this text.
*	**PublicDomain**: [Bool|Optional] If the version in question is known to be in the public domain you can indicate that here.
*	**Permission**: [String|Optional] Explain the current state of permission for this version in this library.
*	**Language**: [String|Required] The language being used. Reference the keys in the languages.json file. These are often broken down by region and period of time. For Dictionaries this is the language of the words being defined.
*	**Date**: [Date|Optional] Date for this version of the text
*	**Formatting**: [Object|Optional] This allows us to store if certain rendering should be preformed on the text of this version  
	*	**Selah**: [Bool|Optional] Does this text include the term Selah, and should it be formatted in a specific way.  
	*	**SmallCaps**: [Bool|Optional] Does the text have words included in all caps which should be transformed into small caps. 
*	**Notes**: [String MD|Optional] This section is optional, but it allows you to leave any notes or comments about the source that someone looking at it might find useful. One example could be that the book of psalms uses the Hebrew/modern numbering and that latin sources have been adjusted to match.


`versions.json`
```json
{
    "UMT-EN":{
        "Abbreviation":"UMT-EN",
        "Title":"Urban Monastic English Translation",
        "Description":"The english translation used by Urban Monasticism",
        "Language": "eng",
        "Date": "2020"
    },
    "TMU-FR":{
        "Abbreviation":"TMU-FR",
        "Title":"Traduction Monastique Urbain Français",
        "Description":"La traduction française utilisée par Urban Monasticism..",
        "Language": "fra-sta",
        "Date": "2020"
    },
    "OTHER VERSIONS KEEP GOING":{}...	
}
```


#### Adding a Version of a Text
