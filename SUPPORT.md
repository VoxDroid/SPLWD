# Support Guide

Welcome to the SPLWD (Student Profiling for Learners with Disabilities) support resources! This guide will help you find the assistance you need, whether you're a developer, educator, or system administrator.

## 📞 Getting Help

### 🚀 Quick Start

Before reaching out for support, please:

1. **Check the documentation** in the `/docs` folder
2. **Search existing issues** on GitHub
3. **Review the FAQ** section below
4. **Try the troubleshooting steps** for common issues

### 📧 Contact Information

**Primary Support Contact:**
- **Email**: izeno.contact@gmail.com
- **Response Time**: Within 24-48 hours
- **Best For**: Technical issues, bug reports, feature requests

**Project Repository:**
- **GitHub**: [github.com/VoxDroid/SPLWD](https://github.com/VoxDroid/SPLWD)
- **Best For**: Code issues, pull requests, detailed bug reports

## 🎯 Types of Support

### 🔧 Technical Support

**For developers and system administrators:**

- Installation and setup issues
- Configuration problems
- Database connectivity issues
- Performance optimization
- Security concerns
- Integration questions

**What to include in your request:**
- System specifications (PHP version, MySQL version, OS)
- Error messages (full text)
- Steps you've already tried
- Screenshots (if applicable)

### 👩‍🏫 User Support

**For educators and school staff:**

- User interface questions
- Feature explanations
- Best practices for data entry
- Report generation help
- Account management issues

**What to include in your request:**
- Your role (teacher, principal, secretary, etc.)
- Specific feature or page you need help with
- What you're trying to accomplish
- Screenshots of any issues

### 🏫 Institutional Support

**For school districts and administrators:**

- System deployment planning
- User training coordination
- Data migration assistance
- Compliance questions (FERPA, etc.)
- Custom feature requests

## 📋 Support Request Template

When contacting support, please use this template for faster resolution:

```
Subject: [SPLWD Support] Brief description of issue

**Issue Type:** [Technical/User/Institutional]

**Priority:** [Low/Medium/High/Critical]

**Environment:**
- PHP Version: 
- MySQL Version: 
- Operating System: 
- Browser (if applicable): 

**Description:**
[Detailed description of the issue]

**Steps to Reproduce:**
1. 
2. 
3. 

**Expected Behavior:**
[What should happen]

**Actual Behavior:**
[What actually happens]

**Error Messages:**
[Any error messages you see]

**Screenshots:**
[Attach relevant screenshots]

**Additional Context:**
[Any other relevant information]
```

## ❓ Frequently Asked Questions (FAQ)

### Installation & Setup

**Q: What are the minimum system requirements?**
A: PHP 8.0+, MySQL 8.0+, 4GB RAM, and 10GB storage. See the full requirements in README.md.

**Q: I'm getting a database connection error. What should I check?**
A: 
1. Verify your .env file has correct database credentials
2. Ensure MySQL service is running
3. Check if the database exists and user has proper permissions
4. Test connection manually: `mysql -u username -p database_name`

**Q: The application shows a blank page. How do I debug this?**
A:
1. Check PHP error logs
2. Enable error reporting in PHP
3. Verify file permissions (755 for directories, 644 for files)
4. Ensure all dependencies are installed: `composer install`

### User Management

**Q: How do I reset a user's password?**
A: Administrators can reset passwords through the user management interface. For forgotten admin passwords, contact support.

**Q: What are the different user roles and their permissions?**
A:
- **Administrator**: Full system access
- **Principal**: School-level oversight and reporting
- **Secretary**: User management and administrative support
- **Teacher**: Student data entry and progress tracking
- **Parent**: View child's progress and add observations

**Q: Can parents access multiple children's profiles?**
A: Yes, parents can be linked to multiple student profiles through the user management system.

### Data Management

**Q: How do I backup the system data?**
A: Use the built-in backup feature in the admin panel, or manually backup the MySQL database:
```bash
mysqldump -u username -p sc_district > backup_$(date +%Y%m%d).sql
```

**Q: What file types are supported for document uploads?**
A: PDF, DOC, DOCX, JPG, PNG files up to 10MB each.

**Q: How do I generate reports?**
A: Navigate to the Reports section in your user dashboard. Select the report type, date range, and filters needed.

### Security & Privacy

**Q: Is the system FERPA compliant?**
A: Yes, the system is designed with FERPA compliance in mind, including role-based access controls and audit logging.

**Q: How is student data protected?**
A: Data is encrypted at rest and in transit, with role-based access controls and comprehensive audit logging.

**Q: Can I export student data?**
A: Yes, authorized users can export data in various formats through the reporting interface.

## 🛠️ Troubleshooting Guide

### Common Issues and Solutions

#### 1. Installation Problems

**Issue**: Composer install fails
**Solution**:
```bash
# Update composer
composer self-update

# Clear cache and reinstall
composer clear-cache
composer install --no-cache
```

**Issue**: Database migration errors
**Solution**:
1. Check database user permissions
2. Verify database exists
3. Ensure MySQL version compatibility
4. Check for existing tables that might conflict

#### 2. Performance Issues

**Issue**: Slow page loading
**Solutions**:
- Enable PHP OPcache
- Optimize MySQL queries
- Check server resources (CPU, RAM)
- Review error logs for bottlenecks

**Issue**: Database timeouts
**Solutions**:
- Increase MySQL timeout settings
- Optimize database indexes
- Check for long-running queries
- Consider database server resources

#### 3. User Interface Issues

**Issue**: Charts not displaying
**Solutions**:
- Check JavaScript console for errors
- Verify Chart.js library is loaded
- Ensure data is properly formatted
- Clear browser cache

**Issue**: File upload failures
**Solutions**:
- Check file size limits in PHP configuration
- Verify upload directory permissions
- Ensure file type is allowed
- Check available disk space

### 🔍 Debugging Steps

1. **Enable Debug Mode**:
   - Set `DEBUG=true` in .env file
   - Check error logs in `/logs` directory

2. **Check System Status**:
   ```bash
   # Check PHP version
   php -v
   
   # Check MySQL status
   systemctl status mysql
   
   # Check disk space
   df -h
   
   # Check memory usage
   free -m
   ```

3. **Review Logs**:
   - Application logs: `/logs/app.log`
   - PHP error logs: Check php.ini for log location
   - MySQL logs: `/var/log/mysql/error.log`
   - Web server logs: Apache/Nginx access and error logs

## 📚 Documentation Resources

### 📖 Available Documentation

- **README.md**: Project overview and quick start
- **CONTRIBUTING.md**: How to contribute to the project
- **docs/SRS.pdf**: Software Requirements Specification
- **docs/TechnicalDocumentation.pdf**: Detailed technical documentation
- **CODE_OF_CONDUCT.md**: Community guidelines
- **SECURITY.md**: Security policies and reporting

### 🎓 Training Materials

**For Educators:**
- User interface walkthrough
- Data entry best practices
- Report generation guide
- Privacy and security awareness

**For Administrators:**
- System setup and configuration
- User management procedures
- Backup and recovery processes
- Security maintenance

**For Developers:**
- Code architecture overview
- API documentation
- Testing procedures
- Deployment guidelines

## 🚨 Emergency Support

### Critical Issues

For issues that affect system availability or data security:

**Contact**: izeno.contact@gmail.com  
**Subject**: "URGENT: SPLWD Critical Issue"  
**Response Time**: Within 2 hours during business hours

### What Constitutes a Critical Issue:

- System completely unavailable
- Data corruption or loss
- Security breaches
- Privacy violations
- Complete loss of functionality for all users

### Emergency Response Process:

1. **Immediate Assessment**: We'll evaluate the issue severity
2. **Rapid Response**: Critical fixes deployed within hours
3. **Communication**: Regular updates on resolution progress
4. **Post-Incident Review**: Analysis and prevention measures

## 🤝 Community Support

### Getting Involved

- **GitHub Discussions**: Share ideas and ask questions
- **Issue Tracking**: Report bugs and request features
- **Pull Requests**: Contribute code improvements
- **Documentation**: Help improve guides and tutorials

### Community Guidelines

- Be respectful and professional
- Search before posting duplicate questions
- Provide detailed information when reporting issues
- Help others when you can
- Follow our Code of Conduct

## 📊 Support Statistics

We track our support performance:

- **Average Response Time**: 24-48 hours
- **Resolution Rate**: 95% of issues resolved
- **User Satisfaction**: Based on feedback surveys
- **Common Issues**: Tracked for documentation improvements

## 🔄 Support Process Improvement

We continuously improve our support based on:

- **User Feedback**: Regular surveys and feedback collection
- **Issue Analysis**: Identifying common problems for better documentation
- **Response Time Monitoring**: Ensuring timely support delivery
- **Knowledge Base Updates**: Regular documentation improvements

## 📞 Alternative Support Channels

### Self-Service Options

1. **Documentation Search**: Use Ctrl+F to search documentation
2. **GitHub Issues**: Search existing issues for solutions
3. **Code Comments**: Review inline code documentation
4. **Test Cases**: Check test files for usage examples

### Community Resources

- **Educational Technology Forums**: General EdTech discussions
- **PHP Communities**: For technical PHP questions
- **MySQL Communities**: For database-related questions
- **Accessibility Communities**: For inclusive design questions

## 🎯 Support Scope

### What We Support

✅ **Installation and setup assistance**  
✅ **Bug fixes and troubleshooting**  
✅ **Feature explanations and usage help**  
✅ **Security guidance and best practices**  
✅ **Performance optimization advice**  
✅ **Documentation clarifications**

### What We Don't Support

❌ **Custom development for specific institutions**  
❌ **Third-party software integration (beyond documented)**  
❌ **Server administration and hosting**  
❌ **Training beyond documentation provided**  
❌ **Legal advice regarding compliance**

## 📝 Feedback and Suggestions

We value your feedback! Help us improve by:

- **Reporting Issues**: Use GitHub issues for bugs
- **Suggesting Features**: Submit feature requests with detailed descriptions
- **Documentation Feedback**: Let us know what's unclear or missing
- **User Experience**: Share your experience using the system

**Feedback Email**: izeno.contact@gmail.com  
**Subject**: "SPLWD Feedback: [Your Topic]"

---

**Last Updated**: May 28, 2025  
**Version**: 1.0 

Thank you for using SPLWD! We're here to help you succeed in supporting learners with disabilities through technology.
