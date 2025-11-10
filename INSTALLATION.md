# MadridKH Installation Instructions

## Requirements
- Linux server with PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache or Nginx web server
- SSH access to server

## Installation Steps

### 1. Upload Files
Upload all website files to your web server's document root directory (usually `/var/www/html` or similar).

You can use SCP, SFTP, or any file transfer method to upload the files:

```bash
scp -r madridkh/* user@your-server-ip:/var/www/html/
```

### 2. Set Permissions
Set appropriate permissions for directories that need write access:

```bash
# Navigate to your website directory
cd /var/www/html

# Set permissions for article images directory
chmod -R 755 assets/images/articles/
chown -R www-data:www-data assets/images/articles/

# Set permissions for configuration file
chmod 644 config/db.php
chown www-data:www-data config/db.php
```

### 3. Create Database
1. Log in to your MySQL server:
   ```bash
   mysql -u root -p
   ```

2. Create the database:
   ```sql
   CREATE DATABASE madridkh CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   ```

3. Create a database user (replace 'your_password' with a secure password):
   ```sql
   CREATE USER 'madridkh_user'@'localhost' IDENTIFIED BY 'your_password';
   GRANT ALL PRIVILEGES ON madridkh.* TO 'madridkh_user'@'localhost';
   FLUSH PRIVILEGES;
   EXIT;
   ```

### 4. Import Database Schema
Import the database schema and sample data:

```bash
# Import schema
mysql -u madridkh_user -p madridkh < database/madridkh.sql

# Import sample data
mysql -u madridkh_user -p madridkh < database/sample_data.sql
```

### 5. Configure Database Connection
Edit the `config/db.php` file and update the database connection details:

```php
// Database configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'madridkh_user');
define('DB_PASS', 'your_password');
define('DB_NAME', 'madridkh');
```

### 6. Configure Web Server
#### For Apache:
Ensure mod_rewrite is enabled and your virtual host allows .htaccess overrides:

```apache
<VirtualHost *:80>
    ServerName madridkh.com
    DocumentRoot /var/www/html
    
    <Directory /var/www/html>
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

#### For Nginx:
Add this to your server block:

```nginx
server {
    listen 80;
    server_name madridkh.com;
    root /var/www/html;
    index index.php index.html;
    
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }
    
    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
    }
}
```

### 7. Admin Access
The default admin credentials are:
- Username: admin
- Password: madridkh2025

You can change these after logging in to the admin panel at `http://yourdomain.com/admin/login.php`.

### 8. Test Installation
Visit your website in a browser to ensure everything is working correctly:
- Homepage: `http://yourdomain.com`
- Admin Panel: `http://yourdomain.com/admin/login.php`

## Troubleshooting

### Common Issues:
1. **Database Connection Error**: Check database credentials in `config/db.php`
2. **Permission Denied**: Ensure proper file permissions as described in step 2
3. **404 Errors**: Check web server configuration and ensure mod_rewrite is enabled
4. **Blank Pages**: Check PHP error logs for syntax errors

### Enable Error Reporting (for debugging only):
Add this to the top of `index.php` to see PHP errors:
```php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
```

## Security Recommendations

1. Change the default admin password immediately after installation
2. Use HTTPS with SSL certificate
3. Regularly update PHP and MySQL
4. Set up proper firewall rules
5. Regular database backups
