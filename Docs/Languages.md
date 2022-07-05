# Languages
[Return to Readme](../README.md)

When possible we should be using the abbreviations/codes from the Linguists List. You can look up languages here from the [Multitree page](http://multitree.org/codes/). There is only one language file structured on the high level by language, then nested arrays with keyed by their code from Linguists List.

The array has 2 values and ***no keys***: 

*	*title*: This is the name of the language in english
*	*Date Range*: As a second array with 2 objects the start and end dates. A null value should be supplied to indicate an open ended nature of a date set [null, 200] for leading up to the year 200, or [1900, null] for since 1900.  


## Sample Languages file

`/languages.json`
```json
{
	"english": {
		"eng": [
			"English American",
			[1980, null]
		]
	},
	"français":{
		"fra-sta": [
			"Standard French",
			[1900, null]
		],
		"frm": [
			"Middle French",
			[1300, 1650]
		]
	},
    "greek": {
        "grc-koi": [
            "Koine Greek",
            [-300, 300]
        ]
    }
}
```
