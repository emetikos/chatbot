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
        .header-div-hide {
            display: none;
        }
        .header-div-show {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            position: fixed;
            width: 453px;
            height: 50px;
            bottom: 0;
            right: 0;
            border-radius: 12px 12px 0 0 ;
            margin-right: 11px;
            margin-bottom:564px;
            background-color: #37424e;
        }

        #header-icon {
            grid-column: 1/2;
            margin: 0 auto;
            line-height: 50px;

        }
        #header-title {
            line-height: 50px;
            grid-column: 2/6;
            font-size: 20px;
            font-weight: bold;
            color: white;
        }
        #header-close-btn {
            grid-column: 6/7;
            line-height: 50px;

            margin:0 auto;
        }
        #hideChatBot {
            width: 30px;
            height: 30px;
            color: white;
            background-color: #37424e;

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
            /*box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;*/
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

<input id="showChatBot" class="btn-hidden" type="button" value="Chatbot icon" onclick="showChatBot()">

{{--<div id="header-div" class="header-div-hide">--}}
{{--    <div id="header-icon"> <img src="{{ url('/img/chatbot.png') }}" style="width: 45px; margin-right: 5px;"> </div>--}}
{{--    <div id="header-title">Chatbot</div>--}}
{{--    <div id="header-close-btn"><input id="hideChatBot" type="button" value="X" onclick="hideChatBot()"></div>--}}
{{--</div>--}}

    <iframe id="div-frame" class="hidden"  src="http://127.0.0.1:8000/"></iframe>



<script>

    function showChatBot(){
        document.getElementById('showChatBot').className = "btn-hidden";
        document.getElementById('div-frame').className = "show";
        // document.getElementById('frame').className = "show";
        // document.getElementById('header-div').className = "header-div-show";

    }

    function hideChatBot(){
        document.getElementById('div-frame').className = "hidden";
        // document.getElementById('frame').className = "hidden";
        document.getElementById('showChatBot').className = "btn-show";
        // document.getElementById('header-div').className = "header-div-hide";
        // document.getElementById('frame').contentWindow.location.reload();
    }

    window.setTimeout(function () {
        var btn = document.getElementById('showChatBot');
        btn.setAttribute('class', 'btn-show');

    }, 1000);
</script>
</body>
</html>
