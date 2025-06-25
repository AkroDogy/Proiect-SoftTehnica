<!DOCTYPE html>
<html>
<head>
    <title>Formular</title>
    <style>
        table, th, td { border: 1px solid black; border-collapse: collapse; padding: 8px; }
    </style>
</head>
<body>
    <h1>Formular de completat</h1>
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    <form method="POST" action="/formular">
        @csrf
        <label>First Name:</label><br>
        <input type="text" name="firstname" required><br><br>
        <label>Last Name:</label><br>
        <input type="text" name="lastname" required><br><br>
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>
        <label>Phone:</label><br>
        <input type="text" name="phone"><br><br>
        <label>Description:</label><br>
        <textarea name="description"></textarea><br><br>
        <button type="submit">Trimite</button>
    </form>
    <hr>
    <h2>Înregistrări existente:</h2>
    @if($formulare->isEmpty())
        <p style="color: gray;">Nu există date înregistrate.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Description</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($formulare as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->firstname }}</td>
                        <td>{{ $item->lastname }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    <a href="/" class="back-link">Home page</a>
</body>
</html>
