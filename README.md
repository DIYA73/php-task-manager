# 📝 PHP Task Manager

**A lightweight, full-featured task management application built with pure PHP and MySQL. Demonstrates fundamental web development concepts including user authentication, CRUD operations, and secure database interactions.**

![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat-square&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=flat-square&logo=mysql&logoColor=white)
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=flat-square&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=flat-square&logo=css3&logoColor=white)
![License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)

---

## 📖 Overview

A beginner-friendly task manager built with vanilla PHP (no frameworks) to demonstrate core web development principles. Perfect for learning authentication flows, database operations, and secure coding practices.

### 🎯 Key Features

- **🔐 User Authentication**
  - Secure registration system
  - Login/logout functionality
  - Session management
  - Password hashing with bcrypt

- **📋 Task Management (CRUD)**
  - ✅ Create new tasks
  - 📖 Read/view all tasks
  - ✏️ Update existing tasks
  - 🗑️ Delete tasks
  - 🎯 Mark tasks as complete/pending

- **🎨 User Interface**
  - Clean, responsive design
  - User-friendly navigation
  - Intuitive task organization
  - Mobile-compatible layout

- **🔒 Security Features**
  - SQL injection protection (prepared statements)
  - XSS prevention (output escaping)
  - Secure password storage
  - Session-based authentication
  - Input validation

---

## 🛠️ Tech Stack

**Backend:**
- PHP 7.4+ (Vanilla - no frameworks)
- MySQL 5.7+

**Frontend:**
- HTML5
- CSS3
- JavaScript (ES6)

**Architecture:**
- MVC-inspired structure
- Procedural PHP approach
- Session-based auth

---

## 📋 Prerequisites

Before you begin, ensure you have:

- **PHP** 7.4 or higher
- **MySQL** 5.7 or higher
- **Web Server** (Apache/Nginx)
  - OR PHP built-in server
  - OR XAMPP/WAMP/MAMP

**Optional:**
- phpMyAdmin (for easier database management)
- Composer (if adding dependencies later)

---

## 🚀 Installation

### Method 1: Quick Start (PHP Built-in Server)

**1. Clone Repository**
```bash
git clone https://github.com/DIYA73/php-task-manager.git
cd php-task-manager
```

**2. Create Database**

Using MySQL CLI:
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

**3. Configure Database Connection**

Edit `includes/config.php` (or `includes/db.php`):

```php
<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');  // Your MySQL password
define('DB_NAME', 'task_manager');

// Create connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
```

**4. Start Server**

```bash
php -S localhost:8000
```

**5. Access Application**

Open browser and go to:
```
http://localhost:8000
```

---

### Method 2: Using XAMPP

**1. Clone to htdocs**
```bash
cd C:\xampp\htdocs  # Windows
cd /Applications/XAMPP/htdocs  # Mac
cd /opt/lampp/htdocs  # Linux

git clone https://github.com/DIYA73/php-task-manager.git
```

**2. Start XAMPP**
- Start Apache
- Start MySQL

**3. Create Database**
- Open phpMyAdmin: `http://localhost/phpmyadmin`
- Create database: `task_manager`
- Import SQL or run schema manually

**4. Configure Database**
- Edit `includes/config.php` with your credentials

**5. Access**
```
http://localhost/php-task-manager
```

---

### Method 3: Using WAMP (Windows)

**1. Clone to www directory**
```bash
cd C:\wamp64\www
git clone https://github.com/DIYA73/php-task-manager.git
```

**2. Start WAMP**
- Click WAMP icon → "Start All Services"

**3. Setup Database**
- Access phpMyAdmin via WAMP menu
- Create database and tables

**4. Access**
```
http://localhost/php-task-manager
```

---

## 📁 Project Structure

```
php-task-manager/
├── api/                    # API endpoints (AJAX requests)
│   ├── get_tasks.php
│   ├── create_task.php
│   ├── update_task.php
│   └── delete_task.php
├── auth/                   # Authentication logic
│   ├── login.php
│   ├── register.php
│   └── logout.php
├── includes/               # Reusable components
│   ├── config.php          # Database configuration
│   ├── db.php              # Database connection
│   ├── header.php          # Common header
│   └── footer.php          # Common footer
├── tasks/                  # Task management pages
│   ├── index.php           # Task dashboard
│   ├── create.php          # Create task form
│   ├── edit.php            # Edit task form
│   └── delete.php          # Delete task handler
├── image/                  # Static images/assets
│   └── logo.png
├── coverage/               # Test coverage (if using tests)
├── .vscode/                # VS Code settings
├── index.php               # Main landing page
├── README.md               # This file
└── .gitignore              # Git ignore rules
```

---

## 🎯 Usage Guide

### 1. Register a New Account

1. Click **"Register"** or **"Sign Up"**
2. Fill in the form:
   - Username (unique)
   - Email address
   - Password (minimum 8 characters)
3. Submit
4. You'll be automatically logged in

### 2. Login

1. Click **"Login"**
2. Enter credentials:
   - Email or Username
   - Password
3. Submit
4. Access your task dashboard

### 3. Create a Task

1. Click **"New Task"** or **"Add Task"**
2. Fill in:
   - Task title (required)
   - Description (optional)
3. Click **"Save"**
4. Task appears in your list

### 4. Manage Tasks

**View Tasks:**
- See all your tasks on the dashboard
- Tasks are organized by status (pending/completed)

**Edit Task:**
- Click **"Edit"** icon/button
- Modify title or description
- Click **"Update"**

**Complete Task:**
- Click checkbox or **"Mark Complete"** button
- Task status changes to completed

**Delete Task:**
- Click **"Delete"** icon/button
- Confirm deletion
- Task is permanently removed

### 5. Logout

- Click **"Logout"** in navigation
- Session is destroyed
- Redirected to login page

---

## 🔒 Security Features Explained

### 1. Password Security

**Hashing with bcrypt:**
```php
// Registration
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// Login verification
if (password_verify($input_password, $stored_hash)) {
    // Login successful
}
```

### 2. SQL Injection Prevention

**Using Prepared Statements:**
```php
// BAD - Vulnerable to SQL injection
$query = "SELECT * FROM users WHERE email = '$email'";

// GOOD - Safe with prepared statements
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
```

### 3. XSS Prevention

**Output Escaping:**
```php
// Display user-generated content safely
echo htmlspecialchars($task_title, ENT_QUOTES, 'UTF-8');
```

### 4. Session Management

**Secure Sessions:**
```php
// Start session with secure settings
session_start([
    'cookie_httponly' => true,
    'cookie_secure' => true,  // If using HTTPS
]);

// Regenerate session ID after login
session_regenerate_id(true);
```

---

## 🧪 Database Schema

### Users Table

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

**Columns:**
- `id`: Auto-incrementing primary key
- `username`: Unique username
- `email`: Unique email address
- `password`: Hashed password (bcrypt)
- `created_at`: Registration timestamp

### Tasks Table

```sql
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

**Columns:**
- `id`: Auto-incrementing primary key
- `user_id`: Foreign key to users table
- `title`: Task title
- `description`: Task details (optional)
- `status`: 'pending' or 'completed'
- `created_at`: Creation timestamp
- `updated_at`: Last update timestamp

**Relationships:**
- One user can have many tasks (1:N)
- Tasks are deleted when user is deleted (CASCADE)

---

## 🎨 Customization

### Change Color Scheme

Edit CSS file (usually in `image/` or `styles/`):

```css
/* Primary color */
:root {
    --primary-color: #3498db;
    --secondary-color: #2ecc71;
    --danger-color: #e74c3c;
}
```

### Add New Fields to Tasks

**1. Update Database:**
```sql
ALTER TABLE tasks 
ADD COLUMN priority ENUM('low', 'medium', 'high') DEFAULT 'medium',
ADD COLUMN due_date DATE;
```

**2. Update Forms:**
```html
<select name="priority">
    <option value="low">Low</option>
    <option value="medium">Medium</option>
    <option value="high">High</option>
</select>

<input type="date" name="due_date">
```

**3. Update PHP Logic:**
```php
$priority = $_POST['priority'];
$due_date = $_POST['due_date'];
// Include in INSERT/UPDATE queries
```

---

## 🚀 Deployment

### Deploy to InfinityFree (Free Hosting)

**1. Sign Up**
- Visit [infinityfree.net](https://infinityfree.net)
- Create free account

**2. Upload Files**
- Use FTP client (FileZilla)
- Upload all files to `htdocs` folder

**3. Create Database**
- Access hosting control panel
- Create MySQL database
- Note credentials

**4. Import Database**
- Access phpMyAdmin from control panel
- Import SQL schema

**5. Update Config**
- Edit `includes/config.php` with hosting credentials

### Deploy to 000webhost (Free)

**1. Sign Up**
- Visit [000webhost.com](https://000webhost.com)

**2. Upload via File Manager**
- Use built-in file manager
- Upload all files

**3. Database Setup**
- Create database in control panel
- Import schema

**4. Configure**
- Update database credentials

---

## 🔄 Roadmap

### ✅ Completed Features
- [x] User registration and login
- [x] Session management
- [x] CRUD operations for tasks
- [x] Password hashing
- [x] Prepared statements
- [x] Basic UI

### 🚧 Planned Enhancements
- [ ] Task categories/tags
- [ ] Priority levels (low, medium, high)
- [ ] Due dates and reminders
- [ ] Task sharing between users
- [ ] Email notifications
- [ ] Search and filter functionality
- [ ] Dark mode theme
- [ ] Export tasks (CSV/PDF)
- [ ] Rich text editor for descriptions
- [ ] File attachments

### 📋 Future Ideas
- [ ] RESTful API
- [ ] Mobile app (React Native)
- [ ] Calendar view
- [ ] Task statistics/analytics
- [ ] Recurring tasks
- [ ] Subtasks/checklists

---

## 🐛 Troubleshooting

### Database Connection Fails

**Error:** "Connection failed: Access denied for user..."

**Solution:**
```php
// Check credentials in includes/config.php
define('DB_USER', 'root');        // Correct username?
define('DB_PASS', 'your_password'); // Correct password?
```

### Session Not Working

**Error:** "Session not starting" or "Not staying logged in"

**Solution:**
```php
// Ensure session_start() is at the top of every protected page
<?php
session_start();
// Rest of your code
```

### SQL Errors

**Error:** "Table doesn't exist"

**Solution:**
- Verify database name in config
- Ensure tables are created
- Check table names in queries (case-sensitive on Linux)

### Can't Create Tasks

**Error:** Tasks not saving

**Solution:**
- Check form `action` attribute points to correct file
- Verify POST data is being received: `var_dump($_POST);`
- Check database connection
- Look for SQL errors: `echo mysqli_error($conn);`

---

## 🤝 Contributing

Contributions are welcome! Here's how:

1. **Fork** the repository
2. **Create** a feature branch:
   ```bash
   git checkout -b feature/AmazingFeature
   ```
3. **Commit** your changes:
   ```bash
   git commit -m 'Add some AmazingFeature'
   ```
4. **Push** to the branch:
   ```bash
   git push origin feature/AmazingFeature
   ```
5. **Open** a Pull Request

### Contribution Guidelines

- Follow PSR-2 coding standards
- Comment your code
- Test thoroughly before submitting
- Update README if adding features

---

## 📝 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

## 👨‍💻 Author

**DIYA73**
- GitHub: [@DIYA73](https://github.com/DIYA73)
- LinkedIn: [linkedin.com/in/didi-86b00329a](https://www.linkedin.com/in/didi-86b00329a/)

---

## 🙏 Acknowledgments

- PHP documentation and community
- MySQL documentation
- W3Schools tutorials
- Stack Overflow community
- Open-source contributors

---

## 📞 Support

Having issues? Here's how to get help:

1. **Check Troubleshooting Section** above
2. **Search existing issues** on GitHub
3. **Open a new issue** with:
   - Description of the problem
   - Steps to reproduce
   - Expected vs actual behavior
   - Screenshots (if applicable)
   - PHP/MySQL version

---

## 🔗 Related Projects

Check out my other projects:

- **[CoreStack SaaS](https://github.com/DIYA73/corestack-saas)** - AI-powered SaaS platform (LIVE)
- **[Laravel Task Manager](https://github.com/DIYA73/laravel-task-manager-2)** - Advanced version with Laravel (LIVE)
- **[API Auth Service](https://github.com/DIYA73/api-auth-service)** - Authentication microservice

---

**⭐ Star this repository if you find it helpful!**

**📚 Perfect for learning PHP fundamentals and secure coding practices.**

---

<p align="center">
  <i>Built with ❤️ using vanilla PHP and MySQL</i>
</p>

<p align="center">
  <b>Learning by building real projects</b>
</p>
