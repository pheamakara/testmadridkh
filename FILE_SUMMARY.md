# MadridKH Project File Summary

## Project Structure
```
madridkh/
├── admin/
│   ├── auth.php
│   ├── login.php
│   ├── logout.php
│   ├── index.php
│   ├── articles.php
│   ├── add-article.php
│   └── edit-article.php
├── assets/
│   ├── css/
│   │   └── style.css
│   ├── js/
│   │   └── main.js
│   └── images/
│       ├── favicon.txt (placeholder)
│       ├── hero-bg.txt (placeholder)
│       ├── placeholder.txt (placeholder)
│       └── articles/ (directory for article images)
├── config/
│   └── db.php
├── database/
│   ├── madridkh.sql
│   └── sample_data.sql
├── includes/
│   ├── header.php
│   └── footer.php
├── pages/
├── about.php
├── article.php
├── contact.php
├── index.php
├── news.php
├── INSTALLATION.md
├── README.md
└── FILE_SUMMARY.md
```

## File Descriptions

### Main Pages
- **index.php**: Homepage with latest news preview
- **news.php**: Page displaying all articles
- **article.php**: Individual article page
- **about.php**: About MadridKH information
- **contact.php**: Contact form page

### Admin Panel (admin/)
- **auth.php**: Authentication functions
- **login.php**: Admin login page
- **logout.php**: Admin logout functionality
- **index.php**: Admin dashboard
- **articles.php**: Manage all articles
- **add-article.php**: Add new article form
- **edit-article.php**: Edit existing article

### Assets (assets/)
- **css/style.css**: Main stylesheet with dark/light mode and Khmer font support
- **js/main.js**: JavaScript functionality for theme toggle, language switcher, forms
- **images/**: Directory for all images (placeholders included)

### Configuration (config/)
- **db.php**: Database connection configuration

### Database (database/)
- **madridkh.sql**: Database schema creation script
- **sample_data.sql**: Sample articles in English and Khmer

### Includes (includes/)
- **header.php**: Common header with navigation
- **footer.php**: Common footer

### Documentation
- **README.md**: Project overview and features
- **INSTALLATION.md**: Detailed installation instructions for Linux server
- **FILE_SUMMARY.md**: This file

## Key Features Implemented
1. **Bilingual Support**: English and Khmer language toggle
2. **Dark/Light Mode**: Default dark mode with toggle option
3. **Responsive Design**: Mobile-friendly layout
4. **Admin Panel**: Full CRUD operations for articles
5. **Database Integration**: MySQL database with sample data
6. **Real Madrid Branding**: Colors and design elements
7. **Khmer Font Support**: Noto Sans Khmer integration
8. **Image Management**: Article image upload functionality
9. **Social Sharing**: Article sharing options
10. **Contact Form**: User feedback mechanism

## Technologies Used
- **Frontend**: HTML5, CSS3, Vanilla JavaScript
- **Backend**: PHP 7.4+
- **Database**: MySQL
- **Fonts**: Noto Sans Khmer for Khmer text support
- **Design**: Modern CSS with variables for theming
