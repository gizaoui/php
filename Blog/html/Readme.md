# Blog

```php
php -S localhost:8000 -t /home/gizaoui/Phpstorm/Blog/public
```

## SQLITE

```bash
# décommenter dans php.ini 'extension=pdo_sqlite'
# Linux : php -i | grep PDO

# Windows : php.exe -i | findstr PDO  # (doit être positionné sous C:\php\php.ini)
PDO support => enabled
PDO drivers => mysql, pgsql, sqlite
PDO Driver for MySQL => enabled
PDO Driver for PostgreSQL => enabled
PDO Driver for SQLite 3.x => enabled
```

```sql
DROP TABLE Article;

-- Les champs doivent être déclarés en minuscule.
CREATE TABLE "Article" (
    "id" INTEGER,
    "title"	TEXT,
    "content" TEXT,
    "createdat" DATE
);
```

```sql
DELETE FROM Article;
INSERT INTO Article( id, title, content, createdat) VALUES
((SELECT IFNULL(Max(id)+1, 1) FROM Article), 'Premier article', 'Contenu du premier article', '2024-08-20 12:15:32');
INSERT INTO Article( id, title, content, createdat) VALUES
((SELECT IFNULL(Max(id)+1, 1) FROM Article), 'Second article', 'Contenu du second article', '2024-08-21 12:15:32');
INSERT INTO Article( id, title, content, createdat) VALUES
((SELECT IFNULL(Max(id)+1, 1) FROM Article), 'Troisième article', 'Contenu du troisième article', '2024-08-20 12:15:32');
```

```sql
SELECT id, title, content, createdat FROM Article;
```

## Unit tests

```bash
composer require phpunit/phpunit
composer init

# A exécuter après màj
# "autoload": {
#         "psr-4": {
#             "Gizaoui\\PhpUnit\\": "src/"
#         }
#     },
composer dump-autoload
```

```php
use PHPUnit\Framework\TestCase;
use Gizaoui\PhpUnit\Math;

class MathTest extends TestCase
{
    public function testDouble() {
        echo ">>>>>>>>>>>>>>>".Math::double(2);
        $this->assertEquals(4, Math::double(2));
    }
}
```

