// SISMAS Main JavaScript File

class SISMAS {
    constructor() {
        this.init();
    }

    init() {
        this.initDarkMode();
        this.initAnimations();
        this.initNotifications();
        this.initForms();
        this.initCharts();
    }

    // Dark Mode Toggle
    initDarkMode() {
        const darkModeToggle = document.getElementById('darkModeToggle');
        const prefersDarkScheme = window.matchMedia('(prefers-color-scheme: dark)');
        
        // Check for saved theme or prefered scheme
        const currentTheme = localStorage.getItem('theme') || 
                           (prefersDarkScheme.matches ? 'dark' : 'light');
        
        if (currentTheme === 'dark') {
            document.documentElement.classList.add('dark');
            if (darkModeToggle) darkModeToggle.checked = true;
        }

        // Toggle dark mode
        if (darkModeToggle) {
            darkModeToggle.addEventListener('change', () => {
                if (darkModeToggle.checked) {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('theme', 'light');
                }
            });
        }
    }

    // Initialize animations
    initAnimations() {
        // Intersection Observer for scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in-up');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observe elements with animation classes
        document.querySelectorAll('.animate-on-scroll').forEach(element => {
            observer.observe(element);
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    }

    // Notification system
    initNotifications() {
        // Show notification
        this.showNotification = (message, type = 'info') => {
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 p-4 rounded-lg shadow-lg transform transition-transform duration-300 translate-x-full z-50 ${
                type === 'success' ? 'bg-green-500 text-white' :
                type === 'error' ? 'bg-red-500 text-white' :
                type === 'warning' ? 'bg-yellow-500 text-black' :
                'bg-blue-500 text-white'
            }`;
            
            notification.innerHTML = `
                <div class="flex items-center space-x-2">
                    <i class="fas ${
                        type === 'success' ? 'fa-check-circle' :
                        type === 'error' ? 'fa-exclamation-circle' :
                        type === 'warning' ? 'fa-exclamation-triangle' :
                        'fa-info-circle'
                    }"></i>
                    <span>${message}</span>
                    <button class="ml-4" onclick="this.parentElement.parentElement.remove()">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            `;

            document.body.appendChild(notification);

            // Animate in
            setTimeout(() => {
                notification.classList.remove('translate-x-full');
            }, 100);

            // Auto remove after 5 seconds
            setTimeout(() => {
                if (notification.parentElement) {
                    notification.classList.add('translate-x-full');
                    setTimeout(() => {
                        if (notification.parentElement) {
                            notification.remove();
                        }
                    }, 300);
                }
            }, 5000);
        };

        // Initialize notification buttons
        document.querySelectorAll('[data-notification]').forEach(button => {
            button.addEventListener('click', () => {
                const message = button.getAttribute('data-message');
                const type = button.getAttribute('data-type') || 'info';
                this.showNotification(message, type);
            });
        });
    }

    // Form handling
    initForms() {
        // Add floating label effect
        document.querySelectorAll('.floating-input').forEach(input => {
            const label = input.nextElementSibling;
            
            input.addEventListener('focus', () => {
                label.classList.add('transform', '-translate-y-6', 'scale-75', 'text-blue-600');
            });

            input.addEventListener('blur', () => {
                if (!input.value) {
                    label.classList.remove('transform', '-translate-y-6', 'scale-75', 'text-blue-600');
                }
            });

            // Check initial value
            if (input.value) {
                label.classList.add('transform', '-translate-y-6', 'scale-75', 'text-blue-600');
            }
        });

        // Form validation
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', (e) => {
                const requiredFields = form.querySelectorAll('[required]');
                let isValid = true;

                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        isValid = false;
                        field.classList.add('border-red-500');
                        
                        // Add error message
                        let errorMsg = field.nextElementSibling;
                        if (!errorMsg || !errorMsg.classList.contains('error-message')) {
                            errorMsg = document.createElement('p');
                            errorMsg.className = 'error-message text-red-500 text-sm mt-1';
                            errorMsg.textContent = 'Field ini wajib diisi';
                            field.parentNode.appendChild(errorMsg);
                        }
                    } else {
                        field.classList.remove('border-red-500');
                        const errorMsg = field.nextElementSibling;
                        if (errorMsg && errorMsg.classList.contains('error-message')) {
                            errorMsg.remove();
                        }
                    }
                });

                if (!isValid) {
                    e.preventDefault();
                    this.showNotification('Harap isi semua field yang wajib diisi', 'error');
                }
            });
        });
    }

    // Chart initialization
    initCharts() {
        // This would be extended based on specific chart needs
        console.log('Charts initialized');
    }

    // Utility functions
    formatDate(date) {
        return new Date(date).toLocaleDateString('id-ID', {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
    }

    debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    // Export data
    exportToExcel(data, filename = 'data') {
        // Implementation for Excel export
        console.log('Exporting to Excel:', data);
    }

    exportToPDF(data, filename = 'data') {
        // Implementation for PDF export
        console.log('Exporting to PDF:', data);
    }
}

// Initialize SISMAS when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    window.sismas = new SISMAS();
});

// Alpine.js components
document.addEventListener('alpine:init', () => {
    Alpine.data('aspirationForm', () => ({
        anonymous: false,
        category: '',
        title: '',
        content: '',

        submit() {
            // Form submission logic
            const formData = {
                anonymous: this.anonymous,
                category: this.category,
                title: this.title,
                content: this.content,
                date: new Date().toISOString()
            };

            console.log('Submitting aspiration:', formData);
            
            // Simulate API call
            setTimeout(() => {
                window.sismas.showNotification('Aspirasi berhasil dikirim!', 'success');
                this.resetForm();
            }, 1000);
        },

        resetForm() {
            this.anonymous = false;
            this.category = '';
            this.title = '';
            this.content = '';
        }
    }));

    Alpine.data('searchFilter', () => ({
        searchQuery: '',
        statusFilter: 'all',
        categoryFilter: 'all',
        dateFilter: 'all',

        get filteredItems() {
            // This would filter actual data in a real implementation
            return [];
        }
    }));
});