# Basement Mentorships

Basement Mentorships is a web application that allows users to find mentors and mentees in the tech industry. Users can create a profile, search for mentors and mentees, and request mentorships.


## About the project

Since I decided to mentor many people as possible and asyncronously, came the need of a simple platform to handle that.
FYI this code doesn't follow the best practices and I would not tell you to use this code to study until this message vanishes lol.

At the user side, we're running:

- Laravel Blade
- Bootstrap
- jQuery

and on the Admin side, we're running:

- FilamentPHP

and this will be the stack until I decided to do something better (on user side).

### Authenticatin

The application uses GitHub OAuth for authentication since it's a tech platform and most of the users will have a GitHub account.

### Models

Just a quick explanation of the Models used in the project so far.

| Model    | Description                                             |
|----------|---------------------------------------------------------|
| User     | Meentored person.                                       |
| Token    | OAuth Credentials for requesting further details.       |
| Details  | Onboarding information for mentoring approval purposes. |
| Progress | User task progress with status enumeration.             |
| Module   | Mentoring module that the user will apply.              |
| Task     | Task of a specific module                               |
| Todo     | Items of a task that would be cool to deliver.          |

### Handling Module Acceptance

The most important table for this project is the `users_modules` which handles the acceptance of a mentee in a specific mentoring. 

The pivot is managed by the `ModuleAttendanceEnum` with the flags: 
```php
namespace App\Enums\Module;

enum ModuleAttendanceEnum: string
{
    case ON_HOLD = 'onhold';
    case ACCEPTED = 'accepted';
    case FINISHED = 'finished';
}
```

and also the Todo Tasks

## Prerequisites

- PHP 8.2 or higher
- Composer
- Node.js and npm

## Installation

1. Clone the repository:
    ```
    git clone https://github.com/DanielHe4rt/your-repo.git
    ```

2. Navigate to the project directory:
    ```
    cd your-repo
    ```

3. Install PHP dependencies:
    ```
    composer install
    ```

4. Install JavaScript dependencies:
    ```
    npm install
    ```

5. Copy the example environment file and make the required configuration changes in the `.env` file:
    ```
    cp .env.example .env
    ```

6. Generate a new application key:
    ```
    php artisan key:generate
    ```

7. Run the database migrations:
    ```
    php artisan migrate
    ```
   
## Registration with GitHub OAuth

### 1. Create a new GitHub Application

Create a new [GitHub Application](https://github.com/settings/apps) on GitHub with the callback URL below:

```
http://localhost:8000/oauth/github/callback
```

> ![TIP]
> Don't forget to change to your domain instead `localhost` when deploying to production.

### 2. Updating the `.env` file

Add the `GITHUB_CLIENT_ID` and `GITHUB_CLIENT_SECRET` to the `.env` file:

```
GITHUB_CLIENT_ID="your-client-id"
GITHUB_CLIENT_SECRET="your-client-secret"
GITHUB_CLIENT_REDIRECT="http://localhost:8000/oauth/github/callback"
```

## Usage

To start the development server, run the following commands:

```bash
# terminal 1
php artisan serve
```

```bash
# terminal 2
npm run dev
```

and this will bring the application up at [http://localhost:8000](http://localhost:8000).

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are greatly appreciated.
