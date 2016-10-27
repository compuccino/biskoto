# Biskoto

Slim [Krumo](http://krumo.kaloyan.info/) alternative with live search

![Demo GIF](doc/biskoto-search.gif)

## Purpose

Having a more performant tool to handle searching through PHP `var_dump()`-trees than Krumo. 

This is done by using the `<details>` HTML5 element which allows for nesting drop-down-infos natively, eg. without Javascript helpers.

[More Information about `<details>` and current browser support](file:///Users/Florian/Library/Application%20Support/Dash/DocSets/HTML/HTML.docset/Contents/Resources/Documents/developer.mozilla.org/en-US/docs/Web/HTML/Element/details.html).

## Live Search

Sadly, browser search doesn't work on hidden `<details>` elements, so we implemented a very simple script.

## Why that name?

[Biskoto](https://io.wikipedia.org/wiki/Biskoto) means “rusk” in [Ido](https://en.wikipedia.org/wiki/Ido_language). [Krumo](https://io.wikipedia.org/wiki/Krumo) translates to “inside of bread” (as opposed to [crust](https://en.wikipedia.org/wiki/Bread#Crust)) in that language. 
