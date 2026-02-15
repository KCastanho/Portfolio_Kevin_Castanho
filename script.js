// Animated Canvas Background
const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');

canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

let resizeTimeout;
let lastWidth = window.innerWidth;
let lastHeight = window.innerHeight;

window.addEventListener('resize', () => {
    clearTimeout(resizeTimeout);
    resizeTimeout = setTimeout(() => {
        const newWidth = window.innerWidth;
        const newHeight = window.innerHeight;
        
        // Only resize if dimensions actually changed significantly
        if (Math.abs(newWidth - lastWidth) > 50 || Math.abs(newHeight - lastHeight) > 50) {
            canvas.width = newWidth;
            canvas.height = newHeight;
            lastWidth = newWidth;
            lastHeight = newHeight;
            numberOfParticles = newWidth < 768 ? 80 : 200;
            initParticles();
        }
    }, 150);
});

class Particle {
    constructor() {
        this.x = Math.random() * canvas.width;
        this.y = Math.random() * canvas.height;
        this.z = Math.random() * 2.5 + 0.5;
        this.size = (Math.random() * 2 + 0.5) * this.z;
        this.speedX = (Math.random() * 0.5 - 0.25) * (this.z / 2);
        this.speedY = (Math.random() * 0.5 - 0.25) * (this.z / 2);
        const baseOpacity = (Math.random() * 0.4 + 0.2) * (this.z / 3);
        this.opacity = window.innerWidth < 768 ? baseOpacity * 0.4 : baseOpacity;
    }

    update() {
        this.x += this.speedX;
        this.y += this.speedY;

        // Smooth wrapping instead of teleporting
        if (this.x > canvas.width + 50) this.x = -50;
        if (this.x < -50) this.x = canvas.width + 50;
        if (this.y > canvas.height + 50) this.y = -50;
        if (this.y < -50) this.y = canvas.height + 50;
    }

    draw() {
        ctx.fillStyle = `rgba(255, 255, 255, ${this.opacity})`;
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
        ctx.fill();
    }

    getDepth() {
        return this.z;
    }
}

let particlesArray = [];
let numberOfParticles = window.innerWidth < 768 ? 80 : 200;

function initParticles() {
    particlesArray = [];
    for (let i = 0; i < numberOfParticles; i++) {
        particlesArray.push(new Particle());
    }
}

function connectParticles() {
    const maxConnections = 3;
    const isMobile = window.innerWidth < 768;
    for (let a = 0; a < particlesArray.length; a++) {
        let connections = 0;
        for (let b = a + 1; b < particlesArray.length && connections < maxConnections; b++) {
            const dx = particlesArray[a].x - particlesArray[b].x;
            const dy = particlesArray[a].y - particlesArray[b].y;
            const distance = Math.sqrt(dx * dx + dy * dy);
            const avgZ = (particlesArray[a].z + particlesArray[b].z) / 2;
            const maxDistance = 120 * avgZ;

            if (distance < maxDistance) {
                const baseOpacity = (1 - distance / maxDistance) * 0.15 * avgZ;
                const opacity = isMobile ? baseOpacity * 0.3 : baseOpacity;
                ctx.strokeStyle = `rgba(255, 255, 255, ${opacity})`;
                ctx.lineWidth = 0.5 * avgZ;
                ctx.beginPath();
                ctx.moveTo(particlesArray[a].x, particlesArray[a].y);
                ctx.lineTo(particlesArray[b].x, particlesArray[b].y);
                ctx.stroke();
                connections++;
            }
        }
    }
}

function animateParticles() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    
    particlesArray.sort((a, b) => a.z - b.z);
    
    for (let i = 0; i < particlesArray.length; i++) {
        particlesArray[i].update();
        particlesArray[i].draw();
    }
    
    connectParticles();
    requestAnimationFrame(animateParticles);
}

initParticles();
animateParticles();

// Burger Menu Toggle
const burgerMenu = document.getElementById('burgerMenu');
const navLinks = document.getElementById('navLinks');

burgerMenu.addEventListener('click', () => {
    burgerMenu.classList.toggle('active');
    navLinks.classList.toggle('active');
});

// Close menu when clicking on a link
document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', () => {
        burgerMenu.classList.remove('active');
        navLinks.classList.remove('active');
    });
});

// Close menu when clicking outside
document.addEventListener('click', (e) => {
    if (!burgerMenu.contains(e.target) && !navLinks.contains(e.target)) {
        burgerMenu.classList.remove('active');
        navLinks.classList.remove('active');
    }
});

// Smooth scroll for navigation links
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

// Active navigation link on scroll
const sections = document.querySelectorAll('section[id]');
const navLinksElements = document.querySelectorAll('.nav-link');

function updateActiveNav() {
    const scrollY = window.pageYOffset;

    sections.forEach(section => {
        const sectionHeight = section.offsetHeight;
        const sectionTop = section.offsetTop - 200;
        const sectionId = section.getAttribute('id');
        
        if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
            navLinksElements.forEach(link => {
                link.style.color = 'var(--text-gray)';
                if (link.getAttribute('href') === `#${sectionId}`) {
                    link.style.color = 'var(--text-white)';
                }
            });
        }
    });
}

window.addEventListener('scroll', updateActiveNav);

// Scroll to top functionality
const scrollTopBtn = document.getElementById('scrollTop');

if (scrollTopBtn) {
    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            scrollTopBtn.style.opacity = '1';
            scrollTopBtn.style.pointerEvents = 'auto';
        } else {
            scrollTopBtn.style.opacity = '0';
            scrollTopBtn.style.pointerEvents = 'none';
        }
    });

    scrollTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
}

// Legal notice toggle functionality
const legalToggle = document.getElementById('legalToggle');
const legalContent = document.getElementById('legalContent');

if (legalToggle && legalContent) {
    legalToggle.addEventListener('click', () => {
        legalContent.classList.toggle('active');
    });
}

// Toast Notification System
function showToast(title, message, type = 'success', duration = 5000) {
    const container = document.getElementById('toast-container');
    
    const toast = document.createElement('div');
    toast.className = `toast ${type}`;
    
    const icons = {
        success: '✓',
        error: '✕',
        info: 'ℹ'
    };
    
    toast.innerHTML = `
        <div class="toast-icon">${icons[type] || icons.info}</div>
        <div class="toast-content">
            <div class="toast-title">${title}</div>
            <div class="toast-message">${message}</div>
        </div>
        <button class="toast-close" onclick="this.parentElement.remove()">×</button>
    `;
    
    container.appendChild(toast);
    
    setTimeout(() => toast.classList.add('show'), 10);
    
    setTimeout(() => {
        toast.classList.add('hide');
        setTimeout(() => toast.remove(), 300);
    }, duration);
}

// Form submission
const contactForm = document.getElementById('contactForm');

contactForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    
    const submitBtn = contactForm.querySelector('.form-submit');
    const originalText = submitBtn.textContent;
    const lang = window.currentLang || 'fr';
    submitBtn.textContent = lang === 'fr' ? 'Envoi en cours...' : 'Sending...';
    submitBtn.disabled = true;
    
    const formData = new FormData();
    formData.append('name', document.getElementById('name').value);
    formData.append('email', document.getElementById('email').value);
    formData.append('message', document.getElementById('message').value);
    
    try {
        const response = await fetch('api/contact.php', {
            method: 'POST',
            body: formData
        });
        
        const result = await response.json();
        
        if (result.success) {
            const t = window.getTranslation ? window.getTranslation('toast.success', lang) : null;
            showToast(
                t ? t.title : 'Message envoyé !',
                t ? t.message : 'Je vous répondrai dans les plus brefs délais.',
                'success'
            );
            contactForm.reset();
        } else {
            showToast(
                lang === 'fr' ? 'Erreur' : 'Error',
                result.message,
                'error'
            );
        }
    } catch (error) {
        const t = window.getTranslation ? window.getTranslation('toast.error', lang) : null;
        showToast(
            t ? t.title : 'Erreur',
            t ? t.message : 'Erreur lors de l\'envoi du message. Veuillez réessayer.',
            'error'
        );
        console.error('Error:', error);
    } finally {
        submitBtn.textContent = originalText;
        submitBtn.disabled = false;
    }
});

// Intersection Observer for fade-in animations
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const fadeInElements = document.querySelectorAll('.project-card, .about-content, .contact-content');

const fadeInObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

fadeInElements.forEach(element => {
    element.style.opacity = '0';
    element.style.transform = 'translateY(30px)';
    element.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
    fadeInObserver.observe(element);
});

// Parallax effect for hero section
const heroTitle = document.querySelector('.hero-title');
const heroDescription = document.querySelector('.hero-description');
const heroSubtitle = document.querySelector('.hero-subtitle');
const heroCta = document.querySelector('.hero-cta');

window.addEventListener('scroll', () => {
    const scrolled = window.pageYOffset;
    const rate = scrolled * 0.5;
    
    if (heroTitle && scrolled < window.innerHeight) {
        heroTitle.style.transform = `translateY(${rate}px)`;
    }
    
    if (heroDescription && scrolled < window.innerHeight) {
        heroDescription.style.transform = `translateY(${rate * 0.3}px)`;
        heroDescription.style.opacity = 1 - (scrolled / 500);
    }
    
    if (heroSubtitle && scrolled < window.innerHeight) {
        heroSubtitle.style.transform = `translateY(${rate * 0.3}px)`;
        heroSubtitle.style.opacity = 1 - (scrolled / 500);
    }
    
    if (heroCta && scrolled < window.innerHeight) {
        heroCta.style.transform = `translateY(${rate * 0.3}px)`;
        heroCta.style.opacity = 1 - (scrolled / 500);
    }
});

// Project cards hover effect
const projectCards = document.querySelectorAll('.project-card');

projectCards.forEach(card => {
    card.addEventListener('mouseenter', function() {
        this.style.borderColor = 'var(--text-white)';
    });
    
    card.addEventListener('mouseleave', function() {
        this.style.borderColor = 'var(--border-gray)';
    });
});

// Custom cursor
const cursor = document.createElement('div');
cursor.style.cssText = `
    position: fixed;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    border: 2px solid var(--text-white);
    pointer-events: none;
    z-index: 9999;
    transition: transform 0.2s ease, opacity 0.2s ease;
    opacity: 0;
`;

// Create cursor dot in the center
const cursorDot = document.createElement('div');
cursorDot.style.cssText = `
    position: absolute;
    width: 4px;
    height: 4px;
    border-radius: 50%;
    background-color: var(--text-white);
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    transition: background-color 0.2s ease;
`;

cursor.appendChild(cursorDot);
document.body.appendChild(cursor);

document.addEventListener('mousemove', (e) => {
    cursor.style.left = e.clientX - 10 + 'px';
    cursor.style.top = e.clientY - 10 + 'px';
    cursor.style.opacity = '1';
});

document.addEventListener('mouseout', () => {
    cursor.style.opacity = '0';
});

// Interactive elements cursor effect
const interactiveElements = document.querySelectorAll('a, button, .project-card');

interactiveElements.forEach(element => {
    element.addEventListener('mouseenter', () => {
        cursor.style.transform = 'scale(1.5)';
        cursor.style.borderColor = 'var(--text-gray)';
        cursorDot.style.backgroundColor = 'var(--text-gray)';
    });
    
    element.addEventListener('mouseleave', () => {
        cursor.style.transform = 'scale(1)';
        cursor.style.borderColor = 'var(--text-white)';
        cursorDot.style.backgroundColor = 'var(--text-white)';
    });
});

// Loading animation
window.addEventListener('load', () => {
    document.body.style.opacity = '0';
    setTimeout(() => {
        document.body.style.transition = 'opacity 0.5s ease';
        document.body.style.opacity = '1';
    }, 100);
});

// Typing effect for hero subtitle
function startTypingEffect() {
    const subtitle = document.querySelector('.hero-subtitle');
    if (subtitle) {
        // Get text from translations based on current language
        const lang = window.currentLang || 'fr';
        const subtitleText = translations[lang].hero.subtitle;
        subtitle.textContent = '';

        let charIndex = 0;
        function typeWriter() {
            if (charIndex < subtitleText.length) {
                subtitle.textContent += subtitleText.charAt(charIndex);
                charIndex++;
                setTimeout(typeWriter, 100);
            }
        }

        // Start typing effect
        setTimeout(typeWriter, 100);
    }
}

// Start typing effect after page load
document.addEventListener('DOMContentLoaded', () => {
    setTimeout(startTypingEffect, 500);
});

// Restart typing effect when language changes
window.addEventListener('languageChanged', startTypingEffect);
