/**
 * Novel JavaScript 
 *
 * author: zachfedor
 * url: http://zachfedor.com
 * license: MIT
 * version: 2.0
 */

// set global variables
var quoteContentTimeout, quoteAuthorTimeout, typeTimeout;

// initialize the page
function init() {
    var content = document.getElementById("quoteBlock");

    if (content != null) {
        quotes();
    }
}

// ajax call to request quote contents
function quotes() {
    new Ajax.Request("quotes.xml",
    {
        method: "GET",
        onSuccess: showQuotes,
        onFailure: ajaxFailed,
        onException: ajaxFailed
    });
}

// display randomly chosen quote
function showQuotes(ajax) {
    // load all quote nodes into array
    var quotes = ajax.responseXML.getElementsByTagName("quote");

    var i = Math.floor(Math.random()*quotes.length);

    // use random number to grab one array element
    // and grab it's content and author
    var content = quotes[i].getElementsByTagName("content")[0];
    var contentValue = content.firstChild.nodeValue;
    var author = quotes[i].getElementsByTagName("author")[0];
    var authorValue = "-" + author.firstChild.nodeValue + "-";

    // place strings into hidden html elements for now
    document.getElementById("hideContent").innerHTML = contentValue;
    document.getElementById("hideAuthor").innerHTML = authorValue;

    // depending on the length of the quote
    // set an appropriate time to type it out
    var charCount = contentValue.length;
    var typeTime = 0;
    if (charCount < 50) {
        typeTime = 3500;
    } else if (charCount < 100) {
        typeTime = 4500;
    } else if (charCount < 150) {
        typeTime = 5500;
    } else if (charCount < 200) {
        typeTime = 6500;
    } else if (charCount < 250) {
        typeTime = 7500;
    } else if (charCount < 300) {
        typeTime = 8500;
    } else {
        typeTime = 9500;
    }

    // total typing time / number of characters = typing speed
    var letterTime = typeTime / charCount;

    // unhide the element letter by letter with a small delay
    // to ensure page load. type() defined below
    quoteContentTimeout = setTimeout(function(){type("hideContent", "quoteContent", letterTime)}, 1000);

    // account for time to complete quote before beginning author
    // and type the author at a slower speed
    var authorTime = typeTime + 2000;
    var newLetterTime = letterTime * 3;
    quoteAuthorTimeout = setTimeout(function(){type("hideAuthor", "quoteAuthor", newLetterTime)}, authorTime);
}

// typewriter-esque display of string letter by letter
//      hide = id of hidden element containing string to type
//      display = id of visible element containing type output
//      time = delay between characters typed
function type(hide, display, time) {
    // grab the string
    var input = document.getElementById(hide).innerHTML;

    // add character to visible element
    document.getElementById(display).innerHTML += input.charAt(0);
    // and remove it from the hidden one
    document.getElementById(hide).innerHTML = input.substring(1);

    // wait for next character and repeat
    typeTimeout = setTimeout(function(){
        ((0 < input.length - 1) ? type(hide, display, time) : false);
    }, time);
}

// error message if necessary
function ajaxFailed(ajax, exception) {
    var msg = "Error making AJAX request:\n\n";
    if (exception) {
        msg += "Exception: " + exception.message;
    } else {
        msg += "Server status:\n" + ajax.status + " " + ajax.statusText + "\n\nServer response text:\n" + ajax.responseText;
    }

    // remove this line to test AJAX failure
    // keep it for client friendly error message
    msg = "I apologize, but there seems to be a problem with my site. Hopefully it didn't cause an issue. Would you mind letting me know via the Contact page? Unless that's broken, too..." 
    alert(msg);
}
