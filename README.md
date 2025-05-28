# SPLWD: Student Profiling for Learners with Disabilities System Upgrade (THIS BRANCH IS THE ORIGINAL SYSTEM)

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
[![PHP Version](https://img.shields.io/badge/PHP-8.0%2B-blue.svg)](https://php.net)
[![MySQL Version](https://img.shields.io/badge/MySQL-8.0%2B-orange.svg)](https://mysql.com)
[![Tests](https://img.shields.io/badge/Tests-220%20passed-green.svg)](./tests)

## 📋 Project Description

The **SPLWD (Student Profiling for Learners with Disabilities) System Upgrade** is a comprehensive modernization of an existing web-based student profiling system. This upgraded system serves the Sta. Cruz District of Laguna, specifically designed to digitize and centralize the management of LWD (Learners with Disabilities) student records, replacing traditional paper-based filing systems that are vulnerable to natural disasters.

The system provides a secure, role-based platform for managing student profiles, educational documents, progress tracking, and parent engagement across multiple elementary schools in the district.

## ✨ Features Added / Enhanced

### 🔧 Code Quality Improvements
- **Codebase Cleaning**: Removed redundant and unused code segments
- **Refactoring**: Implemented modern design patterns (MVC, Repository, Factory)
- **Code Standards**: Consistent naming conventions and formatting
- **Uncluttered Files**: Improved the source code readability by removing unnecessary files and cluttered code structure
- **Improved System Scalability**: Enabled compatibility for the system to support future upgrades and newer technologies

### 🔒 Security Enhancements
- **Environment Configuration**: Moved hardcoded credentials to .env files

### 🎨 UI/UX Improvements
- **Modern Interface**: Updated typography, padding, and element positioning
- **User Experience**: Streamlined workflows and improved navigation

### 📊 Core System Features (Non-upgrades)
- **Student Profile Management**: Digital storage and retrieval of LWD student information
- **Document Management**: Upload and organization of IEP, ILP, ILMP, and BIR documents
- **Progress Tracking**: Quarterly assessment and monitoring with chart visualizations
- **Multi-user Support**: Role-based access for Administrators, Principals, Teachers, and Parents
- **Reporting**: Comprehensive enrollment reports and progress summaries

## 🛠️ Technologies Used

### Backend Technologies
- **PHP 8.x** - Modern language features and performance improvements
- **MySQL 8.x** - Primary data storage with InnoDB engine
- **Composer** - Dependency management and PSR-4 autoloading
- **PDO** - Database abstraction layer for security

### Frontend Technologies
- **HTML5** - Semantic markup structure
- **CSS3** - Modern styling with responsive design
- **Bootstrap 5.x** - Responsive CSS framework
- **JavaScript (ES6+)** - Dynamic interactions and functionality
- **jQuery 3.x** - DOM manipulation and AJAX operations
- **Chart.js** - Data visualization and progress charts
- **Font Awesome** - Consistent icon library

### Development & Testing Tools
- **PHPUnit** - Automated testing framework (220 test cases, 962 assertions)
- **Git** - Version control system
- **Environment Variables** - Configuration management via .env files

## 📦 Installation Instructions

### System Requirements

**Minimum Server Specifications:**
- **CPU**: 2 cores, 2.4 GHz
- **RAM**: 4 GB minimum, 8 GB recommended
- **Storage**: 10 GB available space
- **Network**: Stable internet connection

**Software Dependencies:**
```bash
PHP >= 8.0
MySQL >= 8.0
Apache >= 2.4 or Nginx >= 1.18
Composer >= 2.0
```

### Installation Steps

**Step 1: Clone Repository**

```bash
git clone https://github.com/VoxDroid/SPLWD.git
cd SPLWD
```

**Step 2: Install Dependencies**

```bash
composer install
```

**Step 3: Environment Configuration**

```bash
cp .env.example .env
# Edit .env file with your database credentials
```

**Step 4: Database Setup**

```sql
CREATE DATABASE sc_district;
CREATE USER 'splwd_user'@'localhost' IDENTIFIED BY 'your_secure_password';
GRANT ALL PRIVILEGES ON sc_district.* TO 'splwd_user'@'localhost';
FLUSH PRIVILEGES;
```

**Step 5: Configure Environment Variables**

```bash
# Edit .env file
DB_PASSWORD=Your_Database_Password
DB_SERVERNAME=localhost
DB_USERNAME=root
DB_NAME=sc_district
```

**Step 6: Run Database Migrations**

```bash
# Import database schema
mysql -u splwd_user -p sc_district < database/schema.sql
```

## 🚀 How to Use / Run the Project

### Development Environment

```bash
# Install development dependencies
composer install --dev

# Run tests to verify setup
./vendor/bin/phpunit

# Start local development server
php -S localhost:8000
```

### Production Deployment

```bash
# Install production dependencies
composer install --no-dev --optimize-autoloader

# Set proper file permissions
sudo chown -R www-data:www-data /path/to/SPLWD
sudo chmod -R 755 /path/to/SPLWD
```

### User Access Levels

1. **System Administrator**: Full system access and user management
2. **School Principals**: School-level oversight and reporting
3. **Principal's Secretary**: User account management and administrative support
4. **Teachers**: Student data entry, document upload, and progress tracking
5. **Parents/Guardians**: Limited access to view child's progress and add observations

### Running Tests

```bash
# Run full test suite
composer test

# Run specific test file
composer test test/specific_test_file.php
```

## 🎥 Demo Video Link

[**Demo Video Placeholder**] - Coming soon, ginagawa na

## 📁 Folder Structure Description

```plaintext
SPLWD/
├── docs/                         # Project documentation
│   ├── SRS.pdf                        # Software Requirements Specification
│   └── TechnicalDocumentation.pdf     # Technical documentation
├── src/
│    ├── database/                     # Database-related files
│    │   └── sc_district.sql           # Database file
│    ├── tests/                        # PHPUnit test files
│    │   └── sub/                      # Sub unit tests
│    ├── vendor/                       # Composer dependencies
│    ├── .env.example                  # Environment configuration template
│    ├── .env                          # Environment configuration (not in repo)
│    ├── composer.json                 # PHP dependencies
│    ├── composer.lock                 # Locked dependency versions
│    ├── phpunit.xml                   # PHPUnit configuration
│    ├── .gitignore                    # Git ignore rules
│    ├── index.php                     # Main application entry point
│    ├── principal/                    # Principal user interface
│    ├── secretary/                    # Secretary user interface
│    └── teacher/                      # Teacher user interface
├── .github/                      # GitHub templates and workflows
│   └── PULL_REQUEST_TEMPLATE.md  # PR template
├── LICENSE                       # MIT License file
├── CONTRIBUTING.md               # Contribution guidelines
├── CODE_OF_CONDUCT.md            # Code of conduct
├── SECURITY.md                   # Security policy
└── SUPPORT.md                    # Support information
```

## 🤝 Contributing

We welcome contributions to the SPLWD project! Please read our [Contributing Guidelines](CONTRIBUTING.md) for details on how to submit pull requests, report issues, and contribute to the codebase.

## 📋 Code of Conduct

This project adheres to a [Code of Conduct](CODE_OF_CONDUCT.md). By participating, you are expected to uphold this code.

## 🔒 Security

For security concerns, please review our [Security Policy](SECURITY.md) and report vulnerabilities responsibly.

## 💬 Support

Need help? Check out our [Support Guide](SUPPORT.md) for various ways to get assistance.

## 👥 Contributors

### Project Lead & Development Team

- **Mhar Andrei C. Macapallag** - Project Lead, Full-Stack Developer, Documentation Owner
- **[Lagay nyo name nyo dito]** - Contributors

### Acknowledgments

- **Sta. Cruz District of Laguna** - Project stakeholders and end users
- **Educational Institutions**: Sta. Cruz Central Elementary School, Bagumbayan Elementary School, Gatid Elementary School
- **Testing Team** - Quality assurance and user acceptance testing

## 📊 Project Statistics

- **Total Test Cases**: 220
- **Total Assertions**: 962
- **Test Success Rate**: 100%
- **Code Coverage**: >98% for critical components

## 📄 License

This project is licensed under the [MIT License](LICENSE). Use, modify, and distribute it freely per the license terms.

## 📞 Contact

For technical support, bug reports, or feature requests:

- **Email**: izeno.contact@gmail.com
- **Project Repository**: [github.com/VoxDroid/SPLWD](https://github.com/VoxDroid/SPLWD)
- **Documentation**: See `/docs` folder for detailed technical documentation

---

> **Last Updated**: May 28, 2025  
> **Version**: 1.1  
> **Status**: Production Ready
