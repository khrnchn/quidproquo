<p align="center">
  <a href="" rel="noopener">
 <img width=200px height=200px src="https://i.imgur.com/6wj0hh6.jpg" alt="Project logo"></a>
</p>

<h3 align="center">Quid Pro Quo</h3>

<div align="center">

[![Status](https://img.shields.io/badge/status-active-success.svg)]()
[![GitHub Issues](https://img.shields.io/github/issues/kylelobo/The-Documentation-Compendium.svg)](https://github.com/kylelobo/The-Documentation-Compendium/issues)
[![GitHub Pull Requests](https://img.shields.io/github/issues-pr/kylelobo/The-Documentation-Compendium.svg)](https://github.com/kylelobo/The-Documentation-Compendium/pulls)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](/LICENSE)

</div>

---

<p align="center"> This is a final year project for my Bachelor's Degree - simulation website to educate quid pro quo cyberattacks.
    <br> 
</p>

## 📝 Table of Contents

- [About](#about)
- [Getting Started](#getting_started)
- [Deployment](#deployment)
- [Usage](#usage)
- [Built Using](#built_using)
- [TODO](../TODO.md)
- [Authors](#authors)
- [Acknowledgments](#acknowledgement)

## 🧐 About <a name = "about"></a>

To test and evaluate the effectiveness of the simulation system in increasing users’ awareness and understanding of quid pro quo attacks and their ability to recognize and defend against them.

## 🏁 Getting Started <a name = "getting_started"></a>

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See [deployment](#deployment) for notes on how to deploy the project on a live system.

### Installation

Clone the repo:
```
$ git clone https://github.com/khrnchn/quidproquo.git
```

Install PHP dependencies:
```
Composer install
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
php artisan mdb:seed
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

Create topics, questions, and quizzes using the admin account. 

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
