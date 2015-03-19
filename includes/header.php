<?php

/**
 * Novel Header
 */

$root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';

?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
            <a href="<?php echo $root; ?>" >
                <span class="bannerTitle">Zach Fedor</span>
            </a>

            <nav class="">
                <a href="<?php echo $root; ?>projects" id="pNav" >Projects</a>
                <a href="<?php echo $root; ?>about" id="aNav" >About</a>
                <a href="<?php echo $root; ?>contact" id="cNav" >Contact</a>
            </nav>
        </div>
    </header>
