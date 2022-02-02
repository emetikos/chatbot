<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
{{--    <link--}}
{{--            rel="stylesheet"--}}
{{--            href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"--}}
{{--    />--}}
    <link href="https://fonts.cdnfonts.com/css/progbot" rel="stylesheet">

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
        .btn::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(51, 51, 51, 0.9) url("/img/loading.gif") center / 50px no-repeat;
            opacity: 0;
            visibility: hidden;
            transition: all 0.5s ease 0s;
        }
        .btn._sending::after {
            opacity: 1;
            visibility: visible;
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
        <img src="{{ URL('img/chatbot.png') }}" alt="burger-logo">
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
    <div class="output"></div>
{{--    @if ($errors->any())--}}
{{--        <div class="feedback-form__error error">--}}
{{--            @foreach($errors->all() as $error)--}}
{{--                <li class="error__item">--}}
{{--                    {{$error}}--}}
{{--                </li>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    @endif--}}

{{--    @if (session('success'))--}}
{{--            <div class="output animate__animated animate__bounce">{{session('success')}}</div>--}}
{{--    @endif--}}


</article>
<script>
document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('form');
  const output = document.querySelector('.output');
  const btn = document.querySelector('.btn');
  const input = document.querySelector('.form__input');
  form.addEventListener('submit', formSend);

  async function formSend (e) {
    e.preventDefault();
    let formData = new FormData(form);
    btn.classList.add('_sending');
    btn.disabled = true;
    input.disabled = true;
    let response = await fetch('/query', {
      method: 'POST',
      body: formData
    });
    if (response.ok) {
      let result = await response.json();
      output.innerHTML = result.response;
      form.reset();
      btn.classList.remove('_sending');
      btn.disabled = false;
      input.disabled = false;
    }
    else {
      alert("Error");
      btn.classList.remove('_sending');
      btn.disabled = false;
      input.disabled = false;
    }
  }
});
</script>
</body>
</html>
