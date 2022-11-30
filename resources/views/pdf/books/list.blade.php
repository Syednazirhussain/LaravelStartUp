<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Books List</title>
</head>
<body>
    <div>
        @if(isset($books))
        <table>
            <thead>
                <th>Title</th>
                <th>Author</th>
                <th>Price</th>
                <th>Type</th>
                <th>Created At</th>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author->name }}</td>
                        <td>{{ $book->price }}</td>
                        <td>{{ $book->book_type }}</td>
                        <td>{{ $book->created_at != null ? $book->created_at->diffForHumans(): 'Auto Generated' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</body>
</html>