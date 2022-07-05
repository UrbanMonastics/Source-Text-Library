# Collections
[Return to Readme](../README.md)

Collections are important as they allow us to group together similar content in a desired order. The bible is an example of two collections of texts. These collections simply layout the order of books to make them easier to navigate.

The collections file should include the following fields:  


*	**Abbreviation**: [String|Required] A descriptive short hand for this particular collection. This must match the filename and not have any spaces or capital letters.
*	**Title**: [Array|Required] The name of the text. This should follow the same pattern as the title on the Sources supporting: default, version abbreviations, and languages. 
*	**Description**: [String|Optional] Describe the text, or provide an introduction to the text.
*	**Collection**: [Array|Optional] Use the Abbreviation from the related Collections file. Only define if this collection is a smaller part of another collection
*	**Order**: [Array|Required] List the texts included in the collection by their abbreviations in the order that they should appear.

## Template Collections file

Template of a Collection file.

```json
{
    "Abbreviation": "",
    "Title": {
        "default": ""
    },
    "Description": "",
    "Collection": [""],
    "Order": []
}
```

## Example Collections file

A Sample Collections file: `/Collections/sample-collection.json`

```json
{
    "Abbreviation": "sample-collection",
    "Title": {
        "default": "",
        "UMB-EN": "",
        "fra-sta": ""
    },
    "Description": "",
    "Collection": [""],
    "Order": [
        "BOOK-1",
        "BOOK-B",
        "BOOK-the-THIRD"...
    ]
}
```