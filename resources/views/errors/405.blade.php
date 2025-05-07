@include('partials.head',['title'=>'405'])

<body>
    <div class="container mt-5">
        <div class="text-center">
            <h1 class="display-1 text-danger">405</h1>
            <h2>Method Not Allowed</h2>
            <p>The method used for the request is not allowed for this resource.</p>
         <a href="javascript:history.back()" class="btn btn-primary">Previous Page</a>
            <a href="{{ url('home') }}" class="btn btn-success">Back to Home</a>
        </div>
    </div>
</body>

</html>
