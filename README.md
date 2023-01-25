# DIGITAL TALENT BACKEND DEVELOPER ASSESSMENT
This is a backend CRUD service for a demo admin

## Requirements
- PHP 7 or higher
- Composer
- MySQL Database

## How to install
- Clone the repository
- `git clone https://github.com/OjerIsaac/digital_talent.git`
- `cd digital_talent`
- Install dependencies
- `composer install`
- Setup environment variable
- `cp .env.sample .env`
- Fill in data for db (MySQL or Postgres)
- Run Migration
- `php artisan migrate`
- Run the server in dev env
- `php artisan serve`
- Your server would be started on
- `http://127.0.0.1:8000`

## Endpoints.
### Create User

POST
```shell
http://127.0.0.1:8000/user/api/user/create
```
PAYLOAD DATA

```shell
{
    "firstname": "isaac",
    "lastname": "ojerumu",
    "email": "isaac_001@gmail.com"
}
```

### Update User by user ID

PUT
```shell
http://127.0.0.1:8000/user/api/user/{user_id}/update
```
PAYLOAD DATA

```shell
{
    "firstname": "ejiro",
    "lastname": "ojerumu",
    "email": "isaac_001@gmail.com"
}
```

### Delete User by user ID

DELETE
```shell
http://127.0.0.1:8000/user/api/user/{user_id}/delete
```
### List all added user.

GET
```shell
http://127.0.0.1:8000/user/api/user/fetch-all 
```
