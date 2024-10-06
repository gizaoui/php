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
CREATE TABLE "Article" (
    "id" INTEGER,
    "title"	TEXT,
    "content" TEXT,
    "createAt" DATE
);
```
```sql
DELETE FROM Article;
```

```sql
INSERT INTO  Article( id, title, content, createAt)
VALUES((SELECT IFNULL(Max(id)+1, 1) FROM Article), 'Mon titre', 'Un contenu', '2007-01-01 10:00:00');
```

```sql
SELECT id, title, content, createAt FROM Article;
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

