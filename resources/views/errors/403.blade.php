@include('partials.head', ['title' => '403'])

<body>
    <div class="container mt-5">
        <div class="text-center">
            <h1 class="display-1 text-warning">403</h1>
            <h2>Forbidden</h2>
            <p>You do not have permission to access this page.</p>
            <a href="javascript:history.back()" class="btn btn-primary">Previous Page</a>
            <a href="{{ url('home') }}" class="btn btn-success">Back to Home</a>
        </div>
    </div>
</body>

</html>
