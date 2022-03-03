<!doctype html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
<br>
    <h1>Student Portal</h1>
    <p>Welcome to your student portal,
        <br> please make sure you make good use of all materials and recordings provided. <br>
        EduBot chat system is also available to provide assistance </p>


    <!-- Grid -->
    <div class="w3-row w3-container">
        <div class="w3-center w3-padding-64">
            <span class="w3-xlarge w3-bottombar w3-border-dark-grey w3-padding-16">My Modules</span>
        </div>
        <div class="w3-light-grey container padding-16">
            <h3>COMP CO370</h3>
            <p>Neurons (2021/2022) <br> Lecturer : Mr Ridgen</p>
        </div>

        <div class="w3-grey container padding-16">
            <h3>COMP CO635</h3>
            <p>Cyber Security(2021/2022) <br> Lecturer : Mr Velos</p>
        </div>

        <div class="w3-light-grey container padding-16">
            <h3>COMP C0325</h3>
            <p>Databases and the Web (2021/2022) <br> Lecturer : Mr Brooks</p>
        </div>

        <div class="w3-grey container padding-16">
            <h3>COMP C0600</h3>
            <p>Group Project (2021/2022) <br> Lecturer : Mrs Jordanous</p>
        </div>
    </div>
    <br><br>
</div>


<CENTER>
    <H1>A Simple Sample Web Page</H1>
    <IMG SRC="https://www.sheldonbrown.com/images/scb_eagle_contact.jpeg">

    <H4>By Sheldon Brown</H4>

    <H2>Demonstrating a few HTML features</H2>

</CENTER>

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

{{--</html>--}}
