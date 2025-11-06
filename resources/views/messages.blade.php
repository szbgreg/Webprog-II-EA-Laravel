@extends("mainpage")
@section("content")

<h1>Üzenetek</h1>

<table>
    <tr>
        <th>Beküldő neve</th>
        <th>Beküldő email címe</th>
        <th>Üzenet szövege</th>
        <th>Beküldés időpontja</th>
    </tr>
    @foreach ($messages as $message)
    <tr>
        <td>{{ $message->sender_name }}</td>
        <td>{{ $message->sender_email }}</td>
        <td>{{ $message->content }}</td>
        <td>{{ $message->created_at->format('Y.m.d H:i') }}</td>
    </tr>
    @endforeach

</table>

@stop