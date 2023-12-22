# SocialNumber

Simplifique a maneira como você apresenta dados numéricos em  plataformas de mídia sociais com o pacote SocialNumber PHP. Melhore a legibilidade de suas postagens e envolva seu público com notação numérica clara e concisa.

## Instalação
```
composer require monteirofutila/social-number
```

## Exemplo

```php
<?php

require_once 'vendor\autoload.php';

use MonteiroFutila\SocialNumber\SocialNumber;

echo SocialNumber::format(1560000, 2, false);     //1.56k
```

## Licença

The MIT License (MIT). Please see [License File](https://github.com/monteirofutila/social-number/blob/master/LICENSE) for more information.