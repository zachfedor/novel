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
<head>
    <title>Zach Fedor</title>

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
