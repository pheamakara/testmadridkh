# MadridKH - Real Madrid News Website

A bilingual (English/Khmer) news website for Real Madrid with admin panel, dark mode, and responsive design.

## Features
- Bilingual support (English + Khmer)
- Dark mode default with light mode toggle
- Responsive design
- News management system (add/edit/delete)
- Contact form
- Modern UI with Real Madrid colors
- No local installation required

## Requirements
- Standard Linux server with PHP and MySQL
- Web browser

## Installation
1. Upload all files to your web server
2. Import the database schema from `database/madridkh.sql`
3. Configure database connection in `config/db.php`
4. Set up admin credentials in the database
5. Access the website through your domain

## File Structure
```
├── admin/
├── assets/
│   ├── css/
│   ├── js/
│   ├── images/
│   └── fonts/
├── config/
├── database/
├── includes/
├── pages/
└── index.php
