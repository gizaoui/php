# PHP

- Lancement des serveurs : `drm && docker-compose up`
- Build du *Dockerfile* : `docker build -t mynginx .`
- Installation & lancement [port 8000](localhost:8000) : `docker run --name mynginx --rm -it -p 8000:80 mynginx:latest`
- Connexion au conteneur (`cd /usr/share/nginx/html`) : `docker exec -it mynginx /bin/bash`
- Test des fichiers de configuration : `nginx -t`

---

- [phppgadmin](http://localhost:8000/phppgadmin/)
- [Singleton](http://localhost:8000/Pattern/Singleton/index.php)
- [Blog](http://localhost:8000/Blog/public/index.php)
- [timestamp](https://www.commandprompt.com/education/how-to-insert-a-timestamp-into-a-postgresql-table/)