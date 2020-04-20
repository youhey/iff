4歳児に教わった iff を PHP に移植

https://qiita.com/Yametaro/items/17f5a0434afa9b88c3b1

sample

```
use Youhey\Iff\Iff;

echo Iff::new(fn() => (random_int(1, 10) > 5))
    ->then(fn() => 'happy!')
    ->else(fn() => 'die')
    ->done();
```

ありがたみはない……
