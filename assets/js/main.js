// MadridKH - Main JavaScript Functions

// Theme Toggle Functionality
document.addEventListener('DOMContentLoaded', function() {
    const themeToggle = document.getElementById('theme-toggle');
    const body = document.body;
    
    // Check for saved theme preference or respect OS preference
    const savedTheme = localStorage.getItem('theme');
    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
    
    if (savedTheme === 'light' || (!savedTheme && !prefersDark)) {
        body.classList.add('light-mode');
    }
    
    // Theme toggle event listener
    if (themeToggle) {
        themeToggle.addEventListener('click', function() {
            body.classList.toggle('light-mode');
            
            // Save preference to localStorage
            if (body.classList.contains('light-mode')) {
                localStorage.setItem('theme', 'light');
            } else {
                localStorage.setItem('theme', 'dark');
            }
        });
    }
    
    // Language Toggle Functionality
    const langButtons = document.querySelectorAll('.lang-toggle');
    
    langButtons.forEach(button => {
        button.addEventListener('click', function() {
            const lang = this.dataset.lang;
            
            // Update active button
            langButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Save preference to localStorage
            localStorage.setItem('language', lang);
            
            // Update page content based on language
            updatePageLanguage(lang);
        });
    });
    
    // Set initial language based on saved preference or default to English
    const savedLang = localStorage.getItem('language') || 'en';
    const activeButton = document.querySelector(`.lang-toggle[data-lang="${savedLang}"]`);
    if (activeButton) {
        activeButton.classList.add('active');
    }
    
    // Initialize page with saved language
    updatePageLanguage(savedLang);
});

// Function to update page content based on language
function updatePageLanguage(lang) {
    // This would typically make AJAX requests to get content in the selected language
    // For now, we'll just update some basic elements
    
    const elements = document.querySelectorAll(`[data-${lang}]`);
    elements.forEach(element => {
        const content = element.getAttribute(`data-${lang}`);
        if (content) {
            element.textContent = content;
        }
    });
    
    // Update navigation links
    const navLinks = {
        'en': {
            'home': 'Home',
            'news': 'News',
            'about': 'About',
            'contact': 'Contact',
            'admin': 'Admin'
        },
        'km': {
            'home': 'ទំព័រដើម',
            'news': 'ព័ត៌មាន',
            'about': 'អំពីយើង',
            'contact': 'ទំនក់ទំនង',
            'admin': 'អ្នកគ្រប់គ្រង'
        }
    };
    
    const links = document.querySelectorAll('nav a[data-key]');
    links.forEach(link => {
        const key = link.getAttribute('data-key');
        if (navLinks[lang] && navLinks[lang][key]) {
            link.textContent = navLinks[lang][key];
        }
    });
}

// Form Validation for Contact Page
function validateContactForm() {
    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const message = document.getElementById('message').value.trim();
    
    if (name === '') {
        alert('Please enter your name');
        return false;
    }
    
    if (email === '' || !isValidEmail(email)) {
        alert('Please enter a valid email address');
        return false;
    }
    
    if (message === '') {
        alert('Please enter your message');
        return false;
    }
    
    return true;
}

// Email validation helper function
function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// Form Validation for Article Form (Admin)
function validateArticleForm() {
    const title = document.getElementById('title').value.trim();
    const content = document.getElementById('content').value.trim();
    const category = document.getElementById('category').value;
    const language = document.getElementById('language').value;
    
    if (title === '') {
        alert('Please enter a title');
        return false;
    }
    
    if (content === '') {
        alert('Please enter article content');
        return false;
    }
    
    if (category === '') {
        alert('Please select a category');
        return false;
    }
    
    if (language === '') {
        alert('Please select a language');
        return false;
    }
    
    return true;
}

// Confirmation for Delete Actions
function confirmDelete(message) {
    return confirm(message || 'Are you sure you want to delete this item? This action cannot be undone.');
}

// Initialize tooltips (if any)
function initTooltips() {
    const tooltips = document.querySelectorAll('[data-tooltip]');
    tooltips.forEach(tooltip => {
        tooltip.addEventListener('mouseenter', function() {
            const tooltipText = this.getAttribute('data-tooltip');
            // Create tooltip element
            const tooltipEl = document.createElement('div');
            tooltipEl.className = 'tooltip';
            tooltipEl.textContent = tooltipText;
            document.body.appendChild(tooltipEl);
            
            // Position tooltip
            const rect = this.getBoundingClientRect();
            tooltipEl.style.position = 'absolute';
            tooltipEl.style.left = rect.left + 'px';
            tooltipEl.style.top = (rect.top - tooltipEl.offsetHeight - 5) + 'px';
        });
        
        tooltip.addEventListener('mouseleave', function() {
            const tooltipEl = document.querySelector('.tooltip');
            if (tooltipEl) {
                tooltipEl.remove();
            }
        });
    });
}

// Social Sharing Functions
function shareOnFacebook(url) {
    window.open(`https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`, '_blank');
}

function shareOnTwitter(url, text) {
    window.open(`https://twitter.com/intent/tweet?url=${encodeURIComponent(url)}&text=${encodeURIComponent(text)}`, '_blank');
}

function shareOnWhatsApp(text, url) {
    window.open(`https://wa.me/?text=${encodeURIComponent(text + ' ' + url)}`, '_blank');
}

// Mobile Menu Toggle (for smaller screens)
function toggleMobileMenu() {
    const nav = document.querySelector('nav ul');
    nav.classList.toggle('show');
}

// Initialize mobile menu event listener
document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.getElementById('menu-toggle');
    if (menuToggle) {
        menuToggle.addEventListener('click', toggleMobileMenu);
    }
});
