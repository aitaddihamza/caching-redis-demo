# Redis Caching Demo in Laravel
**Redis:** est une base de données en mémoire, qui stock les données en paires clé-valeur.

## Description 

* Ce repos un TP sur Redis, j'ai utilisé Laravel Cache Facade pour stocker la clé products sous redis.
* L'app liste des produits en affichant le temps de chargement des produits, le TTL des produits est 5 seconds.


# Installation et Configuration

1. Installer l'extension php8.ton_version-redis.
2. Redémarer le service php8.ton_version-fpm.service.
3. Installer le package **predis** via `composer require predis/predis`.
4. Modifier la variable d'env:  `CACHE_STORE=redis` 
5. Editer `.env` pour utiliser votre **redis configuration** par défaut c'est:<br>
`REDIS_CLIENT=phpredis`<br>
`REDIS_HOST=127.0.0.1`<br>
`REDIS_PASSWORD=null`<br>
`REDIS_PORT=6379`<br>

## Utilisation du Cache en Laravel

* via le Facade **Cache**

```

    public function index()
    {
        $result = Benchmark::measure(function () use (&$products) {
            $products = Cache::remember('products', 5, function () {
                return Product::all();
            });
        });
        return view('products', compact('products', 'result'));
    }
```
```
```


**Note**:
* **Benchmark** est la façon recommandé pour mesure le temps d'exécution d'un bloc de code.
* On utilse la méthode **remember** pour cacher le résulter de la closure, et 5 => le TTL en seconds.


*Again i am really bad at documenting stuff sorry !*


