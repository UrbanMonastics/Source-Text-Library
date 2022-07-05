# Formatting Texts
[Return to Readme](../README.md)

This section should be kept up to date with changes made in the Text Formatting libraries.

We use [Markdown](https://www.markdownguide.org/) formatting for text, and all line breaks and tabs should be correctly encoded. Ideally these will be managed for you by the eventual editor put in place.

*	**Carriage Return** is replaced with \r
*	**Newline** is replaced with \n
*	**Tab** is replaced with \t
*	**Double Quote** is replaced with \"
*	**Backslash** is replaced with \\
*	**Backspace** is not supported
*	**Form Reed** is not supported


As a best practice we use `\r\n` at the end of a line to indicate a single line return. For multiple lines you simply add another set as needed (example for two: `\r\n\r\n`).

When using verses you should - as possible - place line breaks at the end of a verse, and tabs at the beginning of a verse.

## Styling the Text

There are different styling needs of the text which we need to support. The base of it is markdown with some specialized support added. Below are the supported formatting syntaxes with examples. For encased text which spans between different text enclosures you need to close and then re-open the tag with the new text enclosure.

*	\*\*bold text\*\*	Make the encased text **Bold**  
*	\*italic text\*		Make the encased text *Italic*  
*	\*\*\*bold and italic\*\*\*		Make the encased text ***bold and italic***  
*	\~strike through\~		Make the encased text ~struck through~  
*	\_underline\_		Make the encased text underlined (not supported by Github).  
*	‾over line‾		Make the encased text over-lined. Only supported in HTML formatting. (not supported by Github).  
*	\_‾under and over line‾\_		Make the encased text both underlined and over-lined. Only supported in HTML formatting, in other outputs will show as underlined. (not supported by Github).  
*	[red]red text[/red]		Make the encased text red.  
*	\1.		Ordered lists should list every item with `1.` to ensure that the numbering is always correct. It will be transformed into an ordered lists and displayed correctly to users counting from 1.  
*	\*		Unordered lists should list every item with a `*`. 

## Liturgical and Breviary Specific Additions
There are some unique markings to facilitate liturgical texts. These will allow us to parse and style these portions of the 
 
*	SMALLCAPS	When enabled by the version file, this text will be rendered in with small caps, or will be transformed into a simple capitalized string otherwise. Used for rendering of Lord in reference to YHWH, but it may have wider application.
*	[+]		This will insert the symbol to prompt the reader to cross themselves. Rendered as ✛ in non HTML [U+271B or `&#10011;`].
*	[*]		This is the for denoting a mid-point in chanted texts.  
*	[t]		This is the dagger/obelisk that indicates the current line continues below. Helpful with chanted texts with more than two lines. Rendered as † in non HTML [U+2020 or `&#8224;` or `&dagger;`].  
*	[V]		During the *Responsory* it denotes a **Versicle** line with the leader speaking. Rendered as ℣ in non HTML [U+2123 or `&#8483;`].  
*	[R]		During the *Responsory* it denotes **Response** line with all speaking. Rendered as ℟ in non HTML [U+211F or `&#8479;`].  
*	[II]	During the *Intercessions* this indicates the **Introduction** to the intentions. When prayed in a group it should be read only by the leader.  
*	[IR]	During the *Intercessions* this indicated the **Response**. It should only be placed in the source text on the line after the introduction. It will be placed in other locations when formatted. When prayed in a group it should be read only by the leader.  
*	[I1]	During the *Intercessions* this indicates the **first** part of an **intention**. 
*	[I2]	During the *Intercessions* this indicates the **second** part of an **intention**. 
*	`selah`	This term appears in the book of psalms and it is unclear what it means. It is often just placed directly into the text while right aligned. 
*	[VERSE #]	This will insert the verse numbering if/when it is enabled.

### Notes on some liturgical mark down
[V], [R], [II], [IR], [I1], and [I2] must appear at the beginning of a line without any other styling, dashes, or indentations. Those styling elements will be processed when the text is formatted for it's desired output.
