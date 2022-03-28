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

{{--    log in/profile footer--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

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
            visibility: visible;
            animation: fade-in 0.5s;
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
            visibility: hidden;
            transform: scale(0);
            opacity: 0;
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

        @keyframes fade-in {
            from {
                opacity: 0;
                transform: scale(0);
                -webkit-transform: scale(0);
                -moz-transform: scale(0);
                -o-transform: scale(0);
                -ms-transform: scale(0);
            }
            to {
                opacity: 1;
                -webkit-transform: scale(1);
                -moz-transform: scale(1);
                -o-transform: scale(1);
                -ms-transform: scale(1);
                transform: scale(1);
                -webkit-transition: 1s ease-in-out;
                -moz-transition: 1s ease-in-out;
                -o-transition: 1s ease-in-out;
                -ms-transition: 1s ease-in-out;
                transition: 1s ease-in-out;
            }
        }
    </style>
</head>


<body>
<div class="header">
    <h1>GRAND ACADEMY STUDENT PORTAL</h1>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Your Account</a></li>
    </ul>
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
    <p>Welcome to your student portal,
        <br> please make sure you make good use of all materials and recordings provided. <br>
        EduBot chat system is also available to provide assistance </p>
</div>


    <div class="col-sm-9">
    <div class="well">
        <h4>Upcoming Deadlines</h4>
        <h5>Marek:</h5>
        <p>Please remember to submit your posters by *Wednesday 15th 11:55pm* for the upcoming poster fair!!<p>
      </div>

        <br>
    <!-- Module Grid -->
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

        <div class="col-sm-2 well" centre>
                <h6>Upcoming Events:</h6>
                <p><strong>Quiz</strong></p>
                <p>Fri 27 April 2022</p>
                <button class="btn btn-primary">Info</button>
            <br>

            <br>

            <p><strong>CO652 Lecture Recording</strong></p>
            <p>Fri 27 April 2022</p>
            <button class="btn btn-primary">Watch</button>

</div>
    </div>


    <CENTER>
</CENTER>

<img id="showChatBot" class="btn-hidden" src="{{ url('/img/chatbot.png') }}" onclick="showChatBot()" alt="">
<iframe id="iframe" class="iframe-hidden" src="https://chat-bot-educ.herokuapp.com/"></iframe>


<script>

    /**
     * function to call the iframe and display the chatbot environment
     * Hide the button so it will not be visible any more
     * It gets the button from the iframe so it can be used to close the iframe window
     */
    function showChatBot(){
        document.getElementById('showChatBot').className = "btn-hidden";
        document.getElementById('iframe').className = "show";

        let close_btn
        let iframe = document.getElementById('iframe');
        close_btn = iframe.contentWindow.document.getElementById('hideChatBot')
        closeIframe(close_btn)
    }

    /**
     * Function to hide the iframe
     * @param btn - has the value of the button in the iframe
     */
    function closeIframe(btn) {
        btn.onclick = () => {
            document.getElementById('iframe').className = "hide";
            document.getElementById('showChatBot').className = "btn-show";
        }
    }

    // SET A DELAY FOR THE CHATBOT WHEN THE PAGE IS LOADED
    window.setTimeout( () => {
        var btn = document.getElementById('showChatBot');
        btn.setAttribute('class', 'btn-show');
    }, 3000);




</script>
</body>
{{--</html>--}}
