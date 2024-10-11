# Alumni Management and Memories Project

## Project Description

This is my first project as a first-year full stack developer! It is a web-based application designed to manage alumni data and share memories. This project includes features such as a laureate dashboard, registration form, profile modification, reviews page, and a memories page.

## Features

- **Laureate Dashboard**: View and manage alumni profiles.
- **Registration Form**: Easy sign-up process for new members.
- **Profile Modification**: Update user details like name, email, and profile picture.
- **Reviews Page**: Share and view alumni feedback.
- **Memories Page**: A section dedicated to sharing memorable moments.

## Technologies Used

- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP, Laravel
- **Database**: MySQL
- **Version Control**: Git and GitHub

## Setup The Project

clone the project to xamp's htdocs directory or apache directory using the following command:

```console
$ git clone https://github.com/rachidbentaleb/alumni-management-memories
```

then run the follwoing commands to setup the database requirements:

```console
$ cd alumni-management-memories
$ mysql -u root -p < setup.sql
```

change root to a specifique user if you have to, then enter passsword.
database should be successfuly as needed by the website !

DON'T FORGET TO config connexionDB.php credentials (user/password & host if needed).
