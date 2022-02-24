<!DOCTYPE html>
<html>
<head>
    <title>Chat to ChatBot</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.laravel = {csrfToken: '{{ csrf_token() }}'}</script>
    //
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    //


    <style>
        body {font-family: Arial, Helvetica, sans-serif;}
        * {box-sizing: border-box;}




        /* Set a style for the submit/send button */
        .send button {
            background-color: #04AA6D;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
            margin-bottom:10px;
            opacity: 0.8;
        }

        /* Add a red background color to the cancel button */
        .close button  {
            background-color: red;
        }

        /* Add some hover effects to buttons */
        .form-container :hover, .close button:hover {
            opacity: 1;
        }
    </style>
</head>
<div id="app">
    <div class="container">
        <TextInputField></TextInputField>
    </div>
</div>


    <script src="{{ asset('js/app.js') }}">
        import TextInputField from "../js/components/TextInputField";
        export default {
            components: {TextInputField}
        }
    </script>
