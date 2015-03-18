<?php

/**
 * Novel Header
 */

$root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';

?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="The online portfolio of Zach Fedor, web developer, writer, and philosopher. See some examples of my work, read a little about me, or find out how to contact me.">
    <meta name="author" content="Zach Fedor">

    <meta property="og:title" content="ZachFedor.com">
    <meta property="og:image" content="<?php echo $root; ?>/images/portfolio2.png">
    <meta property="og:description" content="The online portfolio of Zach Fedor, web developer, writer, and philosopher. See some examples of my work, read a little about me, or find out how to contact me.">


    <link rel="stylesheet" type="text/css" href="<?php echo $root; ?>/styles/novel.css" />
    <!-- <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300italic,700|IM+Fell+English' rel='stylesheet' type='text/css'> -->
    <link href='http://fonts.googleapis.com/css?family=Crimson+Text:400,400italic,700' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $root; ?>/images/favicon.ico">

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/prototype/1.6.0.2/prototype.js"></script>
    <script language="JavaScript" src="<?php echo $root; ?>/scripts/novel.js" type="text/javascript"></script>
</head>

<body onload="init(); return false;">
    <header class="bannerWrap" role="banner">
        <div class="banner row">
            <a href="<?php echo $root; ?>/" >
                <span class="bannerTitle">-Zach Fedor-</span>
            </a>

            <nav class="">
                <a href="<?php echo $root; ?>/projects" id="pNav" >Projects</a>
                <a href="<?php echo $root; ?>/about" id="aNav" >About</a>
                <a href="<?php echo $root; ?>/contact" id="cNav" >Contact</a>
            </nav>
        </div>
    </header>
