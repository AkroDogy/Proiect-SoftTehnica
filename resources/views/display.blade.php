<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIzualizare date db</title>
</head>
<body>
    <div class="container">
        <h1>Test</h1>
        @if(session('success'))
          <p style="color: green;">{{ session('success') }}</p>
        @endif
        @if($tests->count() > 0)
            <p><strong>Total items:</strong> {{ $tests->count() }}</p>
            @foreach($tests as $test)
                <div class="test-item">
                    <span class="test-id">ID: {{ $test->id }}</span>
                    <span class="test-var">{{ $test->test_var }}</span>
                    <span class="text-muted">Created: {{ $test->created_at->format('Y-m-d H:i:s') }}</span>
                </div>
            @endforeach
        @else
            <div class="no-data">
                No test records found. <a href="/insert-model">Click here to insert some random data</a>
            </div>
        @endif
        
        <a href="/" class="back-link">Home page</a>
        <a href="/insert-model" class="back-link">To insert more:</a>
        <a href="/formular" class="back-link">Add to a formular</a>
    </div>
</body>
</html>
