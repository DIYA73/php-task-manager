# 📝 PHP Task Manager

A lightweight, full-featured task management application built with pure PHP and MySQL. Features user authentication, CRUD operations, and a clean interface for managing daily tasks.

## ✨ Features

- **🔐 User Authentication**
  - Secure registration and login system
  - Session management
  - Password hashing
  - Protected routes

- **📋 Task Management**
  - Create, Read, Update, Delete (CRUD) operations
  - Task categorization
  - Status tracking (pending, completed)
  - User-specific task lists

- **🎨 Clean Interface**
  - Responsive design
  - Intuitive user experience
  - Easy task organization

- **🔒 Security**
  - SQL injection protection
  - XSS prevention
  - Secure password storage
  - Session-based authentication

## 🛠️ Tech Stack

- **Backend**: PHP (vanilla)
- **Database**: MySQL
- **Frontend**: HTML, CSS, JavaScript
- **Architecture**: MVC-inspired structure

## 📋 Prerequisites

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache/Nginx web server
- phpMyAdmin (optional, for database management)

## 🚀 Installation

### 1. Clone the Repository
```bash
git clone https://github.com/DIYA73/php-task-manager.git
cd php-task-manager
```

### 2. Database Setup

**Option A: Using phpMyAdmin**
1. Open phpMyAdmin
2. Create a new database named `task_manager`
3. Import the SQL file (if provided) or run the schema below

**Option B: Using MySQL CLI**
```bash
mysql -u root -p
```

```sql
CREATE DATABASE task_manager;
USE task_manager;

-- Users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tasks table
CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    status ENUM('pending', 'completed') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
```

### 3. Configure Database Connection

Edit the database configuration file (usually `includes/config.php` or `includes/db.php`):

```php
<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'your_password');
define('DB_NAME', 'task_manager');
?>
```

### 4. Start the Server

**Using PHP Built-in Server** (Development):
```bash
php -S localhost:8000
```

**Using XAMPP/WAMP**:
1. Move the project to `htdocs` (XAMPP) or `www` (WAMP)
2. Start Apache and MySQL
3. Access via `http://localhost/php-task-manager`

**Using MAMP** (Mac):
1. Move to `/Applications/MAMP/htdocs/`
2. Start servers
3. Access via `http://localhost:8888/php-task-manager`

### 5. Access the Application

Open your browser and navigate to:
```
http://localhost:8000
```
or
```
http://localhost/php-task-manager
```

## 📁 Project Structure

```
php-task-manager/
├── api/                # API endpoints for AJAX operations
├── auth/               # Authentication logic (login, register, logout)
├── includes/           # Reusable components (header, footer, db connection)
├── tasks/              # Task management functionality
├── image/              # Static images and assets
├── coverage/           # Test coverage reports
├── .vscode/            # VS Code configuration
├── index.php           # Main entry point
├── README.md           # Project documentation
└── .gitignore          # Git ignore rules
```

## 🎯 Usage

### Register a New Account
1. Navigate to the registration page
2. Fill in username, email, and password
3. Submit the form

### Login
1. Enter your credentials
2. Access your personal task dashboard

### Manage Tasks
- **Add Task**: Click "New Task" and fill in details
- **View Tasks**: See all your tasks in the dashboard
- **Update Task**: Click edit icon, modify details, save
- **Delete Task**: Click delete icon to remove
- **Toggle Status**: Mark tasks as completed/pending

## 🔒 Security Features

- **Password Hashing**: Uses PHP's `password_hash()` and `password_verify()`
- **Prepared Statements**: Prevents SQL injection attacks
- **Session Management**: Secure session handling
- **Input Validation**: Server-side validation for all inputs
- **XSS Protection**: Output escaping with `htmlspecialchars()`

## 🧪 Testing

If unit tests are included:
```bash
# Run tests
phpunit tests/

# Generate coverage report
phpunit --coverage-html coverage/
```

## 🚀 Deployment

### Deploy to InfinityFree (Free)
1. Sign up at infinityfree.net
2. Upload files via FTP
3. Import database via phpMyAdmin
4. Update config with provided credentials

### Deploy to Heroku (with ClearDB MySQL)
```bash
heroku create
heroku addons:create cleardb:ignite
# Update config with CLEARDB_DATABASE_URL
git push heroku main
```

## 🔄 Future Enhancements

- [ ] Task categories/tags
- [ ] Due date reminders
- [ ] Email notifications
- [ ] Task sharing/collaboration
- [ ] Priority levels
- [ ] Search and filter functionality
- [ ] Dark mode
- [ ] API documentation
- [ ] Export tasks (CSV/PDF)

## 🤝 Contributing

Contributions are welcome! Here's how you can help:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 🐛 Bug Reports

If you find a bug, please open an issue with:
- Description of the bug
- Steps to reproduce
- Expected behavior
- Screenshots (if applicable)

## 📄 License

This project is licensed under the terms specified in the LICENSE file.

## 👩‍💻 Author

**Diya**
- GitHub: [@DIYA73](https://github.com/DIYA73)

## 🙏 Acknowledgments

- PHP documentation and community
- MySQL documentation
- Open-source contributors

## 📞 Support

For questions or support, please open an issue in the GitHub repository.

---

**⭐ Star this repo if you find it helpful!**

Made with ❤️ using PHP and MySQL
