<!doctype html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        .hidden{
            position: fixed;
            bottom: 0;
            right: 0;
            display: none;
            height: 300px;
        }

        .show{
            position: fixed;
            bottom: 0;
            right: 0;
            background-color: #5f6368;
            border-radius: 4px;
            height: 300px;
            margin-right: 10px;
            margin-bottom:10px;
        }

        .btn-show{
            position: fixed;
            bottom: 0;
            right: 0;
            margin-right: 20px;
            margin-bottom: 30px;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            font-size: 25px;
            font-weight: bold;
            transition-delay: 4s;
        }

        .btn-hidden{
            display: none;
            position: fixed;
            bottom: 0;
            right: 0;
            margin-right: 20px;
            margin-bottom: 30px;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            font-size: 25px;
            font-weight: bold;
        }
    </style>
</head>
<body>
<input id="hideChatBot" type="button" value="close chatbot" onclick="hideChatBot()">



<CENTER>
    <H1>A Simple Sample Web Page</H1>



    <IMG SRC="https://www.sheldonbrown.com/images/scb_eagle_contact.jpeg">





    <H4>By Sheldon Brown</H4>

    <H2>Demonstrating a few HTML features</H2>

</CENTER>

HTML is really a very simple language. It consists of ordinary text, with commands that are enclosed by "<" and ">" characters, or bewteen an "&" and a ";". <P>


    You don't really need to know much HTML to create a page, because you can copy bits of HTML from other pages that do what you want, then change the text!<P>


    This page shows on the left as it appears in your browser, and the corresponding HTML code appears on the right. The HTML commands are linked to explanations of what they do.




<H3>Line Breaks</H3>

HTML doesn't normally use line breaks for ordinary text. A white space of any size is treated as a single space. This is because the author of the page has no way of knowing the size of the reader's screen, or what size type they will have their browser set for.<P>



    If you want to put a line break at a particular place, you can use the "<BR>" command, or, for a paragraph break, the "<P>" command, which will insert a blank line. The heading command ("<4></4>") puts a blank line above and below the heading text.



<H4>Starting and Stopping Commands</H4>

Most HTML commands come in pairs: for example, "<H4>" marks the beginning of a size 4 heading, and "</H4>" marks the end of it. The closing command is always the same as the opening command, except for the addition of the "/".<P>



    Modifiers are sometimes included along with the basic command, inside the opening command's < >. The modifier does not need to be repeated in the closing command.





<H1>This is a size "1" heading</H1>

<H2>This is a size "2" heading</H2>

<H3>This is a size "3" heading</H3>

<H4>This is a size "4" heading</H4>

<H5>This is a size "5" heading</H5>

<H6>This is a size "6" heading</H6>



HTML is really a very simple language. It consists of ordinary text, with commands that are enclosed by "<" and ">" characters, or bewteen an "&" and a ";". <P>


    You don't really need to know much HTML to create a page, because you can copy bits of HTML from other pages that do what you want, then change the text!<P>


    This page shows on the left as it appears in your browser, and the corresponding HTML code appears on the right. The HTML commands are linked to explanations of what they do.




<H3>Line Breaks</H3>

HTML doesn't normally use line breaks for ordinary text. A white space of any size is treated as a single space. This is because the author of the page has no way of knowing the size of the reader's screen, or what size type they will have their browser set for.<P>



    If you want to put a line break at a particular place, you can use the "<BR>" command, or, for a paragraph break, the "<P>" command, which will insert a blank line. The heading command ("<4></4>") puts a blank line above and below the heading text.



<H4>Starting and Stopping Commands</H4>

Most HTML commands come in pairs: for example, "<H4>" marks the beginning of a size 4 heading, and "</H4>" marks the end of it. The closing command is always the same as the opening command, except for the addition of the "/".<P>



    Modifiers are sometimes included along with the basic command, inside the opening command's < >. The modifier does not need to be repeated in the closing command.





<H1>This is a size "1" heading</H1>

<H2>This is a size "2" heading</H2>

<H3>This is a size "3" heading</H3>

<H4>This is a size "4" heading</H4>

<H5>This is a size "5" heading</H5>

<H6>This is a size "6" heading</H6>
][oiu



    <H4>Copyright © 1997, by
        <A HREF="https://www.sheldonbrown.com/index.html">Sheldon Brown</A>
    </H4>

If you would like to make a link or bookmark to this page, the URL is:<BR> https://www.sheldonbrown.com/web_sample1.html

<input id="showChatBot" class="btn-hidden" type="button" value="Load chatbot" onclick="showChatBot()">


<div id="div-frame">
    <iframe id="frame" class="hidden"  src="http://127.0.0.1:8000/"></iframe>
</div>


<script>

    function showChatBot(){
        document.getElementById('showChatBot').className = "btn-hidden";
        document.getElementById('div-frame').className = "show";
        document.getElementById('frame').className = "show";

    }

    function hideChatBot(){
        document.getElementById('div-frame').className = "hidden";
        document.getElementById('frame').className = "hidden";
        document.getElementById('showChatBot').className = "btn-show";
        document.getElementById('frame').contentWindow.location.reload();
    }

    window.setTimeout(function () {
        var btn = document.getElementById('showChatBot');
        btn.setAttribute('class', 'btn-show');

    }, 5000);
</script>
</body>
</html>
