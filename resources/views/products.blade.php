<html>
<head>
        <title>Redis caching</title>
</head>
<body>
    <div>
        <p style="background-color: green; color: white; font-size:2rem; text-align: center; padding: 2rem;">Loaded products in: {{ $result }}ms</p>
        <p style="background-color: red; color: white; font-size:2rem; text-align: center; padding: 2rem;">TTL of products in redis: <small id="counter">5</small> seconds</p>
        <ul>
            @foreach($products as $product)
                <li>{{ $product->name  }} {{ $product->price }}</li>
            @endforeach
        </ul>
    </div>
    <script>
        let count = 5;
        function decrementCounter() {
            count--;
            counter.innerHTML = count;
        }
        let myInterval = setInterval(decrementCounter, 1000);

        setTimeout(() => {
            clearInterval(myInterval);
        }, 5000);
    </script>
</body>
</html>
