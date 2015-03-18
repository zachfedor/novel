/***************************************

novel.js

author - zach fedor
date - 06-28-14
version - 1.0

for portfolio site - zachfedor.com

description - a page taken straight
out of a dusty leather bound volume
inspired by my love of the written word

***************************************/

var quoteContentTimeout, quoteAuthorTimeout, typeTimeout;        // global vars to clearTimeout

function init() {       // onload function to set up the page
    var content = document.getElementById("quoteBlock");

    if (content != null) {
        quotes();
    }
}

function quotes() {     // function to request quotes.xml
    new Ajax.Request("quotes.xml",
    {
        method: "GET",
        onSuccess: showQuotes,
        onFailure: ajaxFailed,
        onException: ajaxFailed
    });
}

function showQuotes(ajax) {     // function that displays random quote from quotes.xml
    var quotes = ajax.responseXML.getElementsByTagName("quote");    // get all quotes
    var i = Math.floor(Math.random()*quotes.length);                // pick a random one
    var content = quotes[i].getElementsByTagName("content")[0];     // get content of quote
    var contentValue = content.firstChild.nodeValue;
    var author = quotes[i].getElementsByTagName("author")[0];       // get author of quote
    var authorValue = "-" + author.firstChild.nodeValue + "-";

    document.getElementById("hideContent").innerHTML = contentValue;    // place quote into hidden html element
    document.getElementById("hideAuthor").innerHTML = authorValue;      // place author into hidden html element

    quoteContentTimeout = setTimeout(function(){type("hideContent", "quoteContent", 35)},1000);      // use typewriter syled function to display quote
    var t = ((contentValue.length + 1) * 50) + 2000;       // find length of quote for type delay
    quoteAuthorTimeout = setTimeout(function(){type("hideAuthor", "quoteAuthor", 200)},t);  // use delay to type author after quote
}

function type(hide, display, time) {       // stylized typewriter display of text (starting char, text to type, and output element
    var input = document.getElementById(hide).innerHTML;
    document.getElementById(display).innerHTML += input.charAt(0);       // find output element and place first char
    document.getElementById(hide).innerHTML = input.substring(1);
    typeTimeout = setTimeout(function(){      // then wait to input next char, input next char, and repeat till end
        ((0 < input.length - 1) ? type(hide, display, time) : false);
    }, time);
}

function ajaxFailed(ajax, exception) {      // alert to display reason behind ajax request failure
    var msg = "Error making AJAX request:\n\n";
    if (exception) {
        msg += "Exception: " + exception.message;
    } else {
        msg += "Server status:\n" + ajax.status + " " + ajax.statusText + "\n\nServer response text:\n" + ajax.responseText;
    }

    // remove this line to test AJAX failure
    msg = "I apologize, but there seems to be a problem with my site. Hopefully it didn't cause an issue. Would you mind letting me know via the Contact page? Unless that's broken, too..." 
    alert(msg);
}