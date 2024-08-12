# PHP

- Lancement des serveurs : `drm && docker-compose up`
- Build du *Dockerfile* : `docker build -t mynginx .`
- Installation & lancement [port 8000](localhost:8000) : `docker run --name mynginx --rm -it -p 8000:80 mynginx:latest`
- Connexion au conteneur (`cd /usr/share/nginx/html`) : `docker exec -it mynginx /bin/bash`
- Test des fichiers de configuration : `nginx -t`


Mettre à jour le fichier *phppgadmin/conf/config.inc.php* :

```php
	$conf['servers'][0]['host'] = 'mypostgres';
	$conf['servers'][0]['port'] = 5432;
	$conf['extra_login_security'] = false;
```

---

Liens :

- [phppgadmin](http://localhost:8000/phppgadmin/)
- [Singleton](http://localhost:8000/Pattern/Singleton/index.php)
- [Blog](http://localhost:8000/Blog/public/index.php)
- [timestamp](https://www.commandprompt.com/education/how-to-insert-a-timestamp-into-a-postgresql-table/)