<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <link href="http://fonts.cdnfonts.com/css/progbot" rel="stylesheet">

    <style>

        body {
            text-align: center;
        }
        article {
            display: inline-block;
            padding: 50px 100px 100px 100px;
            background-color: lightblue;
            margin-top: 100px;
        }

        .form h1 {
            font-size: 30px;
            margin-bottom: 40px;
        }
        input {
            padding: 10px 30px;
            text-align: center !Important;
            margin-bottom: 10px;

        }
        button{
            padding: 10px 60px;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 40px;
        }
        .output {
            font-family: 'OPTIC.BOT', sans-serif;

            font-weight: 600;
            font-size: 20px;

        }




    </style>
</head>
<body>
<article class="form">
    <form action="{{url('query')}}"
          method="post"
          enctype="multipart/form-data"
          id="form"
          class="feedback-form__body">
        @csrf
        <image></image>
        <img
                src="{{ URL('img/chatbot.png') }}" alt="burger-logo">
        <h1 class="form__title"> Educational ChatBot </h1>

        <div class="form__item">
        <input id="query"
               name="query"
               type="text"
               placeholder="Ask me something..."
               class="form__input">
        </div>
        <button type="submit" class="feedback-form__btn btn">Send message</button>

    </form>
    @if ($errors->any())
        <div class="feedback-form__error error">
            @foreach($errors->all() as $error)
                <li class="error__item">
                    {{$error}}
                </li>
            @endforeach
        </div>
    @endif

    @if (session('success'))
            <div class="output animate__animated animate__bounce">{{session('success')}}</div>
    @endif


</article>

</body>
</html>