# Libraries
[Return to Readme](../README.md).

## Building a Library

The point of a library is to be a self contained collection of texts, collections, dictionaries, and versions. This approach is to allow many different individuals and organizations to build libraries which can be ingested to work side by side in a project. There is a build in formatter, the [Source Parser](https://github.com/UrbanMonastics/SourceParser), that does much of the heavy lifting of adding, and styling the texts for you. 
  
The file structure of a library is pretty straight forward. You have your library directory (for this project it is called **Library**) which is filled with folders using their source abbreviation as their name. Within each of these source folders is that texts `source.json` that explains what that text is, and how we should understand it. Next to the `source.json` are a set of folders named after a version's abbreviation (listed in the `versions.json`). This approach allows a library to include multiple versions of a given text. Inside each of these version directories are the source texts themselves (which might be listed one of three ways.)


    - Collections/
        - sample-subgroup.json
	- Library/
		- SOURCE-ABBREVIATION/
			- source.json
			- VERSION-1/
				- text.json
			- VERSION-B/
				- text.json
			- VERSION-3/
				- text.json
		- ANOTHER-BOOK/
			- source.json
			- ORIGINAL/
				- chapter-0001.json
				- chapter-0002.json
			- MY-VERSION/
				- chapter-0001.json
				- chapter-0002.json
			- YOUR-VERSION/
				- chapter-0001.json
				- chapter-0002.json
    - languages.json
    - library.json
    - versions.json

The `source.json` files give us an understanding of the text in its original form (language, title, date, etc). Each version then has it's own language, date, license, and description.


## Describing your Library

Example `/library.json`

```json
{
	"Title": {
		"default": "Urban Monastic Texts",
		"eng": "Urban Monastic Texts",
		"fra": "Textes Monastique Urbain"
	},
    "description": {
		"default": "This library holds all the various texts that are a part of the various monastic practices and rhythms of Urban Monasticism.",
		"eng": "This library holds all the various texts that are a part of the various monastic practices and rhythms of Urban Monasticism.",
		"fra": "Cette bibliothèque contient tous les différents textes qui font partie des diverses pratiques et rythmes monastiques du monachisme urbain."
	},
    "Notes": "The focus of this library is to include the various texts in there various languages/versions to make up our liturgies and practice guidance."
}
```