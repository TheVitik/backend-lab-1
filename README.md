<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## REST API ENDPOINTS

- **POST** [/users](http://laratest.online/api/v1/users)
- **POST** [/categories](http://laratest.online/api/v1/categories)
- **POST** [/records](http://laratest.online/api/v1/records)
- **GET** [/records](http://laratest.online/api/v1/records)

Site is deployed on VPS Server Ubuntu 18.04. Has default technology stack LEMP (Linux, Nginx, MySQL, PHP)

Domain name: **laratest.online**. Nameservers and DNS records was configured, so domain direct to the server IP address. NGINX config process request to host and opens needed website by domain, so its our lab.

There is no way to store data in variable. Session doesn't work with API. I had an idea to store data in json file, but decided to connect to the mysql database to avoid unnecessary work.
