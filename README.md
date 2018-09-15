Development PHP Docker stack.
---
Example of PHP development Docker stack on images from [https://github.com/webdevops/Dockerfile](https://github.com/webdevops/Dockerfile).

How to start Docker stack.
---
You need have installed Docker and docker-compose utility. (Google can help for that.)
```bash
cd docker/
docker-compose up -d
```

How to start Symfony project, for example.
---
In `phpfpm` container run:
```bash
su -l application
cd ~
composer create-project symfony/website-skeleton app
mv /home/application/app/* /app/
mv /home/application/app/.[!.]* /app/
```

