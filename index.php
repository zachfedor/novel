<?php

/**
 * Novel
 *
 * author: zachfedor
 * url: http://zachfedor.com
 * license: MIT
 * version: 2.0
 */

?>
<!DOCTYPE HTML>
<html>
<!--,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
,,,,,,,,,, welcome to the ,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
,,,,,,,,,, portfolio page of ,,,,,,,,,,,~I7I:,,,,,,,,,,,,,,,,?7777?,,,,,,,,,,,,,,=I7I.,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,=7I:,,,,,,,,,,,,,,~77=.=77~,,,,,,,,,,,,,~I77,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,II:,,,,,,,,,,,,,,+7?,,,,,,,,,,,,,,,,,,,,+7I,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
,,,,,,,,,,,~I77777?,,,,+I7?,,,,,,:=777+,,,?7?77+,,,,,,,,,,,I7?~+,,.,7777=,,,,,,~I777I,,,,~7777?,,,,,,I:=I:,,,,,,,,,,
,,,,,,,,,,~7?,,I77+,,,II:=7I,,,~77+,?7+,,,I7~:+77:,,,,,,,:I77777,,:I+,,+7=,,:I7I,~77I,,,~7I~:777?,~777777=.,,,,,,,,,
,,~===~,,,,.,,777?,,,,+:,,II:,,77I,,,,,,,,?I,,,77:,,,,,,,,,?7I,,,,I7III77I,,?77:,,+7I,,,I7~,,,?77,.,?I,~+:,,,====:,,
.=77777?,,,,,=77~,,,,,:?777I,,,77I~,,,,,,,?I:,,77~,,,,,,,,,?7?,,,~77,,,,,,,,I7I,,,+7I,.:77:,,,+77,,,?I,,,,,~77777I,,
,.,,,,,,,,,,=77:,,:,,,7I,:7?,,,?77I,,+?,,,I7~,,77=,,,,,,,,,?7I,.,,I7?:,,~:,,?77+,,+7I.,,?7?,.,I77,,,?I,,,,,.,,,,,,,,
,,,,,,,,,,,777III7I,,:7777777I,,?77777:,=7777=I777?,,,,,,:I7777I,,,I77777:,,,?77I77777:,:777777I:,:I777I,,,,,,,,,,,,
,,,,,,,,,,,,,,.,:=~,,,,,.,,,,.,,,,,,.,.,,,,,,,,,,.,.,,,,,,,,,,,,,,,,:==~,,,,,,,,,,:=,..,,..,,,,,,,,,,,,.,,,,,,,,,,,,
,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
,,,,,,,,,, If you are seeing this message, it probably means one of two things: ,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
,,,,,,,,,,,,,,, 1) you're in need of a website and you want to know that I can do the job, ,,,,,,,,,,,,,,,,,,,,,,,,,
,,,,,,,,,,,,,,, 2) or I applied to work for you and you want to know that I can do the job. ,,,,,,,,,,,,,,,,,,,,,,,,
,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
,,,,,,,,,, Either way, you are curious about my code, and for that I appreciate it. I like digging ,,,,,,,,,,,,,,,,,
,,,,,,,,,, around and figuring out how things work, too. Feel free to poke around wherever you want. ,,,,,,,,,,,,,,,
,,,,,,,,,, And if you're up for it, I'd love some feedback. I'm always trying to learn more and I'm ,,,,,,,,,,,,,,,,
,,,,,,,,,, always up for improving myself. The one thing I know is that I don't know much. So if ,,,,,,,,,,,,,,,,,,,
,,,,,,,,,, there is a better way to do something, I'd love to hear about it. And if you think ,,,,,,,,,,,,,,,,,,,,,,
,,,,,,,,,, everything looks great, I'd love to hear that, too. ,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
,,,,,,,,,, Thanks for stopping by! ,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,-->
<head>
    <title>-Zach Fedor-</title>

<?php 

$root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';

include 'includes/header.php'; 

?>

    <main role="main">
        <article id="main" class="row clearfix">
            <!-- content will be filled by novel.js -->
            <blockquote id="quoteBlock" class="column full quoteBlock" onload="quotes(); return false;">
                <p class="quoteContent">
                    <span id="quoteContent"></span>
                    <span id="hideContent"></span>
                </p>

                <p class="quoteAuthor">
                    <span id="quoteAuthor"></span>
                    <span id="hideAuthor"></span>
                </p>
            </blockquote>

            <!-- fallback content for no javascript -->
            <noscript>
                <blockquote class="column full quoteBlock">
                    <p class="quoteContent">Perfection is achieved, not when there is nothing more to add, but when there is nothing left to take away.</p>
                    <p class="quoteAuthor">-Antoine De Saint-Exup&eacute;ry-</p>
                </blockquote>
            </noscript>
        </article>
    </main>

<?php include 'includes/footer.php'; ?>
