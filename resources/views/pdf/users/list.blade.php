<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>User List</title>
</head>
<body>
    <div>
        @if(isset($users))
        <table>
            <thead>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at != null ? $user->created_at->diffForHumans(): 'Auto Generated' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</body>
</html>