<!doctype html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

{{--page design--}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
        /*page design*/
        [class*="col-"] {
            float: left;
            padding: 15px;
        }


        .header {
            background-color: #585858;
            color: #ffffff;
            padding: 15px;
        }

        .menu ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .menu li {
            padding: 8px;
            margin-bottom: 7px;
            background-color: #33b5e5;
            color: #ffffff;
            box-shadow: 0 1px 2px rgba(0,0,0,0.24);
        }

        .menu li:hover {
            background-color: #0099cc;
        }



    </style>
</head>
<body>
<div class="header">
    <h1>GRAND ACADEMY STUDENT PORTAL</h1>
</div>

<div class="row">
    <div class="col-3 col-s-3 menu">
        <ul>
            <li>Timetable</li>
            <li>Attendance</li>
            <li>Email</li>
            <li>Marks</li>
        </ul>
    </div>

    <h1>Student Portal</h1>
    <p>Welcome to your student portal, please make sure you make good use of all materials and recordings provided. EduBot chat system is also available to provide assistance </p>

    <input id="hideChatBot" type="button" value="close chatbot" onclick="hideChatBot()">

    <!-- Grid -->
    <div class="w3-row w3-container">
        <div class="w3-center w3-padding-64">
            <span class="w3-xlarge w3-bottombar w3-border-dark-grey w3-padding-16">My Modules</span>
        </div>
        <div class="w3-light-grey container padding-16">
            <h3>COMP CO370</h3>
            <p>Neurons (2021/2022) <br> Lecturer : Mr Ridgen</p>
        </div>

        <div class="grey container padding-16">
            <h3>COMP CO635</h3>
            <p>Cyber Security(2021/2022) <br> Lecturer : Mr Velos</p>
        </div>

        <div class="w3-dark-grey container padding-16">
            <h3>COMP C0325</h3>
            <p>Databases and the Web (2021/2022) <br> Lecturer : Mr Brooks</p>
        </div>

        <div class="w3-black container padding-16">
            <h3>COMP C0600</h3>
            <p>Group Project (2021/2022) <br> Lecturer : Mrs Jordanous</p>
        </div>
    </div>
    <br><br>
</div>





{{--    <body style="background-color:#e6f9fc;">--}}
{{--<input id="hideChatBot" type="button" value="close chatbot" onclick="hideChatBot()">--}}



<style>
    html,body,h1,h2,h3,h4 {font-family:"Lato", sans-serif}
    .mySlides {display:none}
    .w3-tag, .fa {cursor:pointer}
    .w3-tag {height:15px;width:15px;padding:0;margin-top:6px}
</style>




<CENTER>
    <br>

    <IMG SRC="https://www.sheldonbrown.com/images/scb_eagle_contact.jpeg">


    <H4>By Sheldon Brown</H4>

    <H2>Demonstrating a few HTML features</H2>

</CENTER>

{{--    If you want to put a line break at a particular place, you can use the "<BR>" command, or, for a paragraph break, the "<P>" command, which will insert a blank line. The heading command ("<4></4>") puts a blank line above and below the heading text.--}}




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
{{--</html>--}}
