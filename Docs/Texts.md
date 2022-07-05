# Texts, Chapters, and other Segments
[Return to Readme](../README.md)

 `text.json`  
These can have multiple sources. This could be because of various languages. When an original version is available it should be next to the `source.json` in the folder for the book. Additional versions of the book should be included in a folder named with the version abbreviation. For the rare instances when more than one version of a text is provided (like with First Chronicles in the Codex Sinaiticus) in the same version you should suffix the abbreviation with `-v#.json`.

The type of segments a source is broken into determines its filename. When there are chapters or sections you need to separate out these into their own files. Filenames should follow:  
  
*	**None**: `text.json`  
*	**Chapters**: `chapter-####.json`	ex: `chapter-0001.json`  
	*	Multiple versions: `chapter-0001.json` and `chapter-0001-v2.json`  
*	**Abbreviations**: `SEGEMENT-ABREVIATION.json` ex: `gloria.json`  
  
  
The source file should include the following fields:  
  
*	**TextAbbreviation**: [String|Required] This should match the filename without the file extension.
*	**SourceAbbreviation**: [String|Required] The Source for which this file belongs.
*	**Title**: [String|Optional] If there is a title for this given segment of the text. This can be helpful for chapters or segments of a larger text.
*	**Chapter**: [String|Optional] If this source is broken into chapters you should include the chapter number here.
*	**Description**: [String|Optional] Describe this portion of the text, or provide an introduction to the text.
*	**Source**: [String|Optional] Certain documents may benefit from having the ability to indicate the source of a given portion of text (ex: Antiphons, Canticles, etc).
*	**FormatAs**: [Set|Required] What type of text is it? This tells us what primary file to look for, and how that file will be formatted.  
	*	Book, Letter, Poetry  
*	**Version**: [Set|Required] Indicate what type of a version of the text we have. Many older texts will have original, translations. Defaults to Original  
	*	Original, or Unique Abbreviation from the Versions file
*	**License**: [String MD|Optional] The License or Copyright that should accompany the display of this text. This ensures we keep the license with the texts, but we should use the license from the version to display.
*	**Translation**: [Array|Optional] Include this element when the text/verses are a translation. This should allow us to identify what the source version is, and who was involved in the translation process.
	*	**Versions**: [Set|Required] The list of the versions which are being use to generate the translation. 
	*	**People**: [Set|Required] The list of individuals involved in the translation. Ideally ordered by scope of their contribution to the work included in this file.  
*	**Text**: [String|Optional] If there are not verses for this text, then the text itself should go here. Verses are defined in the source document.  
*	**Verses**: [Array|Optional] If this text is broken down into verses those verses should be individual lines inside of this key. When using verses you must include all formatting (line breaks, indentations, etc). Indentations should lead verses, and line breaks end verses.
*	**Extras**:	[Array|Optional] This is a Key-Pair list of additional related content.  
*	**InlineTitles**:	[Array|Optional] A list of inline titles to include in the text. The array key should be the location of the title. For Text files it should be the word position as a number For verses it can be either a whole or decimal number with whole numbers representing the verses, and the number after the decimal representing the word in that verse. The Title would be placed immediately before the referenced word. For this case counting starts at 1.
*	**Notes**: [String|Optional] This section is optional, but it allows you to leave any notes or comments about the source that someone looking at it might find useful. This could be a simple as the date a text was imported.  
*	**Changes**: [Array|Optional] A list of what changes were made, when, and by whom. Each line should be formatted as `YYYY-DD-MM - NAME OF PERSON: Note about what changed`.  
*	**Footnotes**: [Array|Optional] This allows us to place notes inline if we choose to render them. They should be keyed in a way that allows us to position them correctly. This should be by the word position in the `Text` or within a specific `Verse`. These may be displayed as footnotes or - when digitally allowed - with visual indicators to hover over the word/s to reveal the note/s. Footnotes are placed *after* the positioned word.  
  
  
## Template `text.json` file


## Template `chapter-0001.json` file


## Template abbreviation file


## Example Chapter file

Each file should follow the following structure.  
  
`chapter-0119.json` with verses

	{
		"SourceAbbreviation": "bible-ot-psalms",
		"Title": "",
		"Chapter": "119",
		"FormatAs": "poetry",
		"Version": "UMT-EN",
		"Translation":{
			"Versions": ["CODEX-SINAITICUS", "LH"],
			"People": ["Paul Prins"]
		},
		"Verses": {
			"1": "Blessed are they whose ways are blameless,\r\n\twho walk according to the law of the LORD.\r\n",
			"2": "Blessed are they who keep his statutes\r\n\tand seek him with all their heart.\r\n",
			"3": "They do nothing wrong;\r\n\tthey walk in his ways.\r\n",
			"4": "You have laid down precepts that are to be fully obeyed.\r\n"
		},
		"InlineTitles": {
			"3": "Nothing Done Wrong"
		},
		"Changes": [
			"2021-03-04 - Paul Prins: Added support in the documentation for changes.",
			"2021-02-25 - Paul Prins: Thought about adding changes, but decided future Paul gets to do that."
		],
		"FootNotes": {
			"1": ["This is a note which would appear at the end of the verse."],
			"1.1": ["This will appear after the first word of the first verse."]
			"1.6": [
				"This is a note which appears with the word Blameless",
				"Along with a second note when it makes sense to do so"
			],
			"3.5-9": ["This would be a note for the last 5 words of verse three"],
			"3-4": ["They can also span multiple verses within the scope of the same file. So not across chapters where it would need to be added to both files."]
		},
		"License": "© YYYY by [Organization](http://website.org/)."
	}