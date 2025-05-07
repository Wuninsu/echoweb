@include('partials.head', ['title' => '404'])

<body>
    <div class="container mt-5">
        <div class="text-center">
            <h1 class="display-1 text-danger">404</h1>
            <h2>Page Not Found</h2>
            <p>Sorry, the page you're looking for doesn't exist or has been moved.</p>
            <a href="javascript:history.back()" class="btn btn-primary">Previous Page</a>
            <a href="{{ url('home') }}" class="btn btn-success">Back to Home</a>
        </div>
    </div>
</body>

</html>
