<!doctype html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        .iframe-hidden{
            position: fixed;
            bottom: 0;
            right: 0;
            display: none;
            height: 300px;
        }

        .show{
            display: grid;
            grid-template-rows: repeat(2, 1fr 1fr);
            position: fixed;
            bottom: 0;
            right: 0;
            background-color: #5f6368;
            border-radius: 12px 12px 12px 12px;
            width:450px;
            height: 600px;
            margin-right: 10px;
            margin-bottom:10px;
        }

        .btn-show{
            position: fixed;
            bottom: 0;
            right: 0;
            margin-right: 20px;
            margin-bottom: 30px;
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }

        .btn-show:hover{
            cursor: pointer;
            box-shadow: rgba(0, 0, 0, 0.56) 0px 22px 70px 4px;
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



    If you want to put a line break at a particular place, you can use the "<BR>" command, or, for a paragraph break, the "<P>" command, which will insert a blank line. The heading command puts a blank line above and below the heading text.



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



    If you want to put a line break at a particular place, you can use the "<BR>" command, or, for a paragraph break, the "<P>" command, which will insert a blank line. The heading command  puts a blank line above and below the heading text.



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




If you would like to make a link or bookmark to this page, the URL is:<BR> https://www.sheldonbrown.com/web_sample1.html
<img id="showChatBot" class="btn-hidden" src="{{ url('/img/chatbot.png') }}" onclick="showChatBot()" alt="">
<iframe id="iframe" class="iframe-hidden" src="http://127.0.0.1:8000/"></iframe>

<script>

    /**
     * function to call the iframe and display the chatbot environment
     *
     * Hide the button so it will not be visible any more
     */
    function showChatBot(){
        document.getElementById('showChatBot').className = "btn-hidden";
        document.getElementById('iframe').className = "show";
    }

    function hide_chat_bot(){
        document.getElementById('iframe').className = "iframe-hidden";
        // document.getElementById('showChatBot').className = "btn-show";
        // document.getElementById('showChatBot').contentWindow.location.reload();
        // document.getElementById('showChatBot').src = loadIframe()

    }

    // SET A DELAY FOR THE CHATBOT WHEN THE PAGE IS LOADED
    window.setTimeout(function () {
        var btn = document.getElementById('showChatBot');
        btn.setAttribute('class', 'btn-show');

    }, 3000);

</script>
</body>
</html>
