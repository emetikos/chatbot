<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	
	<meta id="__token" name="csrf-token" content="{{ csrf_token() }}">
	
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>chatbot</title>
</head>
<body>
<div id="app">

</div>

<script src="{{ asset('/js/app.js') }}"></script>
</body>
</html>




{{-- //delete button in table --}}
{{-- <tr>
<td> 
    <form method="post" class="delete data" action="{{action
    ('TableController@destroy',$row['$query'])}}">
      {{csrf_field()}}
      <input type="hidden" name="_method" value="DELETE" />
      <button type="submit" class="btn btn-danger">Delete</button>
      <td><a href={{"delete/"$item['query']}}>Delete</a></td>
    </form>
</td>
</tr>


<script>
    $(document).ready(function(){
        $('.delete_form').on('submit', function(){
            if(confirm("Are you sure you want to delete this data?"))
            {
                return true;
            }
            else
            {
                return false;
            }
        });
    });
</script> --}}