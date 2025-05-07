@include('partials.head', ['title' => '501'])

<body>
    <div class="container mt-5">
        <div class="text-center">
            <h1 class="display-1 text-danger">501</h1>
            <h2>Not Implemented</h2>
            <p>The requested feature is not yet implemented on this server.</p>
            <a href="javascript:history.back()" class="btn btn-primary">Previous Page</a>
            <a href="{{ url('home') }}" class="btn btn-success">Back to Home</a>
        </div>
    </div>
</body>

</html>
