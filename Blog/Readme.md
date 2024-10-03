# Blog

```php
php -S localhost:8000 -t /home/gizaoui/Phpstorm/Blog/public
```

## SQLITE

```bash
# php -i | grep PDO
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

