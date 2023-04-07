<h3 align="center">Quid Pro Quo</h3>

<div align="center">

[![Status](https://img.shields.io/badge/status-active-success.svg)]()
[![GitHub Issues]
[![GitHub Pull Requests]
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](/LICENSE)

</div>

---

<p align="center"> Social Engineering Quiz System using Filament.
    <br> 
</p>

<p align="center"> Note: User quiz features is still under development.
    <br> 
</p>

## 📝 Table of Contents

- [About](#about)
- [Getting Started](#getting_started)
- [Installation](#installation)
- [Usage](#usage)
- [Built Using](#built_using)
- [Authors](#authors)
- [Acknowledgments](#acknowledgement)

## 🧐 About <a name = "about"></a>

To test and evaluate the effectiveness of the simulation system in increasing users’ awareness and understanding of cyberattacks and their ability to recognize and defend against them.

## 🏁 Getting Started <a name = "getting_started"></a>

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Installation

Clone the repo:
```
$ git clone https://github.com/khrnchn/quidproquo.git
```

Install PHP dependencies:
```
composer install
```

Setup .env file:
```
cp .env.example .env
```

Generate application key:
```
php artisan key:generate
```

Run database migrations:
```
php artisan migrate
```

Run database seeder:
```
php artisan db:seed
```

Create a symlink to the storage:
```
php artisan storage:link
```

Run the development server:
```
php artisan serve
```

## 🎈 Usage <a name="usage"></a>

Create topics, questions, and quizzes using the admin account. Answer the quizzes using the user account.

## ⛏️ Built Using <a name = "built_using"></a>

- [Laravel](https://laravel.com/) - Web application framework
- [FilamentPHP](https://filamentphp.com/) - A collection of tools for rapidly building beautiful TALL stack apps
- [XAMPP](https://www.apachefriends.org/) - Web server/ database
- [Laravel Quiz](https://github.com/harishdurga/laravel-quiz) - Quiz functionalities, model relationships

## ✍️ Authors <a name = "authors"></a>

- [Dr Firdaus bin Zainal Abidin](https://apps.ump.edu.my/expertDirectory/profile.jsp?email=firdausza@ump.edu.my) - Initial idea
- [@khrnchn](https://github.com/khrnchn) - Development

## 🎉 Acknowledgements <a name = "acknowledgement"></a>

- Thanks to Mr. Harish Durga for his laravel-quiz package. 
- Shoutout to filamentPHP for the awesome admin panel TALLkit.
- Thanks to Dr. Firdaus for his project ideas.
