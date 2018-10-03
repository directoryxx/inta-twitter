<!DOCTYPE html>
<html>
<head>
	<title>Laravel 5 - Twitter API</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>


<div class="container">
    <h2>Tweet berdasarkan "ojek online"</h2>


    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="50px">No</th>
                <th>Twitter Id</th>
                <th>Twitter User</th>
                <th>Message</th>
                <th>Images</th>
                <th>Favorite</th>
                <th>Retweet</th>
                <th>Sentiment</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($data))
                @foreach($data as $key => $value)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $value['id'] }}</td>
                        <td>{{ $value["user"]["name"] }}</td>
                        <td>{{ $value['full_text'] }}</td>
                        <td>
                            @if(!empty($value['extended_entities']['media']))
                                @foreach($value['extended_entities']['media'] as $v)
                                    <img src="{{ $v['media_url_https'] }}" style="width:100px;">
                                @endforeach
                            @endif
                        </td>
                        <td>{{ $value['favorite_count'] }}</td>
                        <td>{{ $value['retweet_count'] }}</td>
                        <td>-</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6">There are no data.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>


</body>
</html>