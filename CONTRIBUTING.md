# Contributing to SPLWD

Thank you for your interest in contributing to the Student Profiling for Learners with Disabilities (SPLWD) System! We welcome contributions from the community and appreciate your help in making this project better.

## 📋 Table of Contents

- [Code of Conduct](#code-of-conduct)
- [Getting Started](#getting-started)
- [How to Contribute](#how-to-contribute)
- [Development Setup](#development-setup)
- [Coding Standards](#coding-standards)
- [Testing Guidelines](#testing-guidelines)
- [Pull Request Process](#pull-request-process)
- [Issue Reporting](#issue-reporting)
- [Documentation](#documentation)

## 📜 Code of Conduct

This project and everyone participating in it is governed by our [Code of Conduct](CODE_OF_CONDUCT.md). By participating, you are expected to uphold this code.

## 🚀 Getting Started

### Prerequisites

Before contributing, ensure you have:

- PHP 8.0 or higher
- MySQL 8.0 or higher
- Composer 2.0 or higher
- Git
- A GitHub account

### Fork and Clone

1. Fork the repository on GitHub
2. Clone your fork locally:

```bash
git clone https://github.com/YOUR_USERNAME/SPLWD.git
cd SPLWD
```

3. Add the original repository as upstream:

```bash
git remote add upstream https://github.com/VoxDroid/SPLWD.git
```

## 🤝 How to Contribute

### Types of Contributions

We welcome several types of contributions:

- **Bug fixes**: Help us identify and fix issues
- **Feature enhancements**: Propose and implement new features
- **Documentation improvements**: Help improve our docs
- **Code quality**: Refactoring, optimization, and cleanup
- **Testing**: Add or improve test coverage
- **UI/UX improvements**: Enhance user experience

### Contribution Workflow

1. **Check existing issues**: Look for existing issues or create a new one
2. **Discuss**: Comment on the issue to discuss your approach
3. **Create a branch**: Create a feature branch for your work
4. **Make changes**: Implement your changes following our guidelines
5. **Test**: Ensure all tests pass and add new tests if needed
6. **Submit**: Create a pull request with a clear description

## 🛠️ Development Setup

### Local Environment Setup

1. **Install dependencies**:

```bash
composer install
```

2. **Set up environment**:

```bash
cp .env.example .env
# Edit .env with your local database credentials
```

3. **Set up database**:

```bash
# Create database and import schema
mysql -u root -p &lt; database/sc_district.sql
```

4. **Run tests**:

```bash
composer test
```

5. **Start development server**:

```bash
php -S localhost:8000
```

## 📝 Coding Standards

### PHP Standards

- Follow **PSR-12** coding standards
- Use **PSR-4** autoloading
- Write **self-documenting code** with clear variable and function names
- Add **PHPDoc comments** for all classes and methods

### Code Style

```php
<?php

namespace App\Models;

/**
 * Student model for managing learner data
 */
class Student
{
    /**
     * Get student by ID
     *
     * @param int $id Student ID
     * @return array|null Student data or null if not found
     */
    public function getById(int $id): ?array
    {
        // TODO: Implement method logic
        return null;
    }
}
```

### Frontend Standards

- Use **semantic HTML5** elements
- Follow **BEM methodology** for CSS classes
- Write **modern JavaScript** (ES6+)
- Ensure **responsive design** principles

### Database Standards

- Use **prepared statements** for all queries
- Follow **normalized database design**
- Use **meaningful table and column names**
- Add **proper indexes** for performance

## 🧪 Testing Guidelines

### Writing Tests

- Write tests for all new functionality
- Maintain **minimum 90% code coverage**
- Use **descriptive test names**
- Follow **AAA pattern** (Arrange, Act, Assert)

### Test Structure

```php
<?php

use PHPUnit\\Framework\\TestCase;

class StudentTest extends TestCase
{
    public function testCanCreateStudentWithValidData(): void
    {
        // Arrange
        $studentData = [
            'name' => 'John Doe',
            'grade' => '5',
            'disability_type' => 'Learning Disability'
        ];

        // Act
        $student = new Student($studentData);

        // Assert
        $this->assertEquals('John Doe', $student->getName());
        $this->assertEquals('5', $student->getGrade());
    }
}
```

### Running Tests

```bash
# Run all tests
composer test

# Run specific test file
./vendor/bin/phpunit tests/StudentTest.php

# Run tests with coverage
./vendor/bin/phpunit --coverage-html coverage/
```

## 🔄 Pull Request Process

### Before Submitting

1. **Update your branch**:

```bash
git fetch upstream
git rebase upstream/main
```

2. **Run tests**:

```bash
composer test
```

3. **Check code style**:

```bash
composer cs-check
```

### PR Requirements

- **Clear title**: Use descriptive titles
- **Detailed description**: Explain what and why
- **Link issues**: Reference related issues
- **Screenshots**: Include UI changes screenshots
- **Tests**: Ensure all tests pass
- **Documentation**: Update docs if needed

### PR Template

When creating a PR, use our [Pull Request Template](.github/PULL_REQUEST_TEMPLATE.md).

## 🐛 Issue Reporting

### Bug Reports

When reporting bugs, include:

- **Clear title**: Descriptive summary
- **Steps to reproduce**: Detailed reproduction steps
- **Expected behavior**: What should happen
- **Actual behavior**: What actually happens
- **Environment**: PHP version, OS, browser
- **Screenshots**: If applicable

### Feature Requests

For feature requests, include:

- **Problem description**: What problem does this solve?
- **Proposed solution**: How should it work?
- **Alternatives**: Other solutions considered
- **Additional context**: Any other relevant information

## 📚 Documentation

### Documentation Standards

- Use **clear, concise language**
- Include **code examples** where helpful
- Keep **up-to-date** with code changes
- Follow **Markdown best practices**

### Types of Documentation

- **README**: Project overview and setup
- **API Documentation**: Code documentation
- **User Guides**: End-user instructions
- **Technical Docs**: Architecture and design decisions

## 🏷️ Commit Message Guidelines

Use conventional commit format:

```
type(scope): description

[optional body]

[optional footer]
```

### Types

- **feat**: New feature
- **fix**: Bug fix
- **docs**: Documentation changes
- **style**: Code style changes
- **refactor**: Code refactoring
- **test**: Test additions/changes
- **chore**: Maintenance tasks

### Examples

```
feat(auth): add password reset functionality

fix(database): resolve connection timeout issue

docs(readme): update installation instructions

test(student): add unit tests for student model
```

## 🎯 Development Priorities

### Current Focus Areas

1. **Security enhancements**
2. **Performance optimization**
3. **Mobile responsiveness**
4. **Accessibility improvements**
5. **Test coverage expansion**

### Future Roadmap

- API development for mobile apps
- Advanced reporting features
- Integration with external systems
- Multi-language support

## 💬 Getting Help

### Communication Channels

- **GitHub Issues**: For bugs and feature requests
- **Email**: izeno.contact@gmail.com for direct contact
- **Documentation**: Check `/docs` folder for technical details

### Response Times

- **Bug reports**: Within 48 hours
- **Feature requests**: Within 1 week
- **Pull requests**: Within 72 hours

## 🙏 Recognition

Contributors will be recognized in:

- **README.md**: Contributors section
- **Release notes**: Major contributions
- **GitHub**: Contributor graphs and statistics

Thank you for contributing to SPLWD! Your efforts help improve education technology for learners with disabilities.
