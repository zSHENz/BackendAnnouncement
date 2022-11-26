Before the setup, make sure you had php 8.1 or higher and Laravel installed in your environment.

## Local setup

To set it up, start by cloning the repository on your system.

```sh
git clone https://github.com/zSHENz/BackendAnnouncement.git BackendAnnouncement
cd BackendAnnouncement
```

Next, install the dependencies.

```sh
composer install
```

Then, copy the .env.example and rename it to .env.

```sh
copy .env.example .env
```

Make sure to config the DATABASE in .env file, example:

```sh
DB_CONNECTION=YOUR_DB_CONNECTION
DB_HOST=YOUR_HOST
DB_PORT=YOUR_PORT
DB_DATABASE=YOUR_DB_NAME
DB_USERNAME=YOUR_DB_USERNAME
DB_PASSWORD=YOUR_DB_PASSWORD
```

Lastly, run the migration file.

```sh
php artisan migrate
```

## Endpoints

The Announcement Model has 5 endpoints:

| **No.** | **HTTP Request** | **Endpoint**            | **Request Body**                                               |
| ------- | ---------------- | ----------------------- | -------------------------------------------------------------- |
| 1       | GET              | /api/announcements      | -                                                              |
| 2       | GET              | /api/announcements/{id} | -                                                              |
| 3       | POST             | /api/announcements      | { "title": string, max 255 characters, "description": string } |
| 4       | PUT              | /api/announcements/{id} | { "title": string, max 255 characters, "description": string } |
| 5       | DELETE           | /api/announcements/{id} | -                                                              |
