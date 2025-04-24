# 🧠 SkillsHub - Laravel 12 Clean Architecture

A clean and modular Laravel 12 application where users can register, manage their profiles, add skills, and generate a PDF of their information. This project follows **Clean Architecture** principles for scalability and maintainability.

---

## 🚀 Features

-   🔐 **User Registration & Login** (Laravel Passport for API Authentication)
-   👤 **User Profile Management** (update name, contact, address, etc.)
-   🛠️ **Skill Management** (add/edit/delete skills)
-   📄 **Generate PDF** of user details and skills
-   🎯 Built using **Clean Architecture** (Use Cases, DTOs, Services, etc.)
-   🎨 Clean UI using **Blade & Tailwind CSS**

---

## 🏗️ Tech Stack

-   **Framework**: Laravel 12 (PHP 8.2+)
-   **Architecture**: Clean Architecture
-   **API Authentication**: Laravel Passport (Personal Access Tokens)
-   **Database**: MySQL
-   **Templating**: Blade
-   **Styling**: Tailwind CSS
-   **PDF Generation**: DomPDF (`barryvdh/laravel-dompdf`)

---

## 📸 Screenshots

### 🔐 Login Page
![Login Page](public/images/login.png)

### 👤 User Registration Page
![Registration Page](public/images/register.png)

### ✍️ Profile and Skill Management
![Profile Editing Page](public/images/edit.png)

### 📄 PDF Download View
![Generated PDF Preview](public/images/pdf.png)

### 👤 Dashboard Page
![User Dashboard](public/images/dashboard.png)

---

## 🛠️ Installation

1.  **Clone the repository:**
    *(Replace `your-username/skillshub.git` with the actual repository URL)*
    ```bash
    git clone https://github.com/your-username/skillshub.git
    cd skillshub
    ```

2.  **Install PHP Dependencies:**
    ```bash
    composer install
    ```

3.  **Install Node.js Dependencies & Build Assets:**
    ```bash
    npm install
    npm run dev
    ```

4.  **Set up Environment File:**
    Copy the example environment file and generate the application key.
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

5.  **Configure Database:**
    Open the `.env` file and update the database connection details:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=skillshub # Or your preferred database name
    DB_USERNAME=root      # Or your database username
    DB_PASSWORD=          # Or your database password
    ```

6.  **Run Database Migrations:**
    ```bash
    php artisan migrate
    ```

7.  **Install Laravel Passport:**
    Install the package and generate the necessary keys and clients.
    ```bash
    composer require laravel/passport
    php artisan migrate # Passport migrations (if not already run)
    php artisan passport:install --uuids
    # OR if you only need personal access tokens and want to generate manually:
    # php artisan passport:keys
    # php artisan passport:client --personal
    ```
    *Ensure the `User` model uses the `Laravel\Passport\HasApiTokens` trait.*

8.  **Install DomPDF:**
    Install the package for PDF generation. The service provider and facade are usually auto-discovered.
    ```bash
    composer require barryvdh/laravel-dompdf
    ```

9.  **Serve the Application:**
    ```bash
    php artisan serve
    ```

Visit `http://localhost:8000` (or the address provided by `php artisan serve`) to start using the SkillsHub App.

---


## 📁 Project Structure

```
CLEAN_ARCHITECT/
├── app/
│   ├── Application/
│   │   └── Services/
│   │       └── Infrastructure/
│   │           └── Repositories/
│   │               └── UserRepository.php
│   │           ├── registerservice.txt
│   │           └── RegisterUserService.php
│   ├── Domain/
│   │   └── User.php
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Api/
│   │   │   │   └── AuthController.php
│   │   │   ├── Controller.php
│   │   │   ├── LoginController.php
│   │   │   ├── RegisterController.php
│   │   │   └── UserController.php
│   ├── Models/
│   │   └── User.php
│   └── Providers/
│       └── AppServiceProvider.php
├── bootstrap/
├── config/
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
├── public/
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php
│       ├── pdf/
│       │   └── user.blade.php
│       ├── profile/
│       │   ├── edit.blade.php
│       │   └── show.blade.php
│       ├── users/
│       │   ├── edit.blade.php
│       │   ├── dashboard.blade.php
│       │   ├── login.blade.php
│       │   ├── register.blade.php
│       │   ├── test.blade.php
│       │   └── text.txt
│       └── welcome.blade.php
├── routes/
├── storage/
├── tests/
├── vendor/
├── .editorconfig
├── .env
├── .env.example
├── .gitattributes
├── .gitignore
├── artisan
├── composer.json
├── composer.lock
├── package.json
├── phpunit.xml
├── README.md
└── vite.config.js


```

## 📌 Note

- Only authenticated users can manage their profiles.
- Profile is private and user-specific.


## 🤝 Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## 📄 License

This project is open-sourced under the MIT license.
