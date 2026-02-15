// Translations for FR and EN
const translations = {
    fr: {
        nav: {
            home: "01/Accueil",
            about: "02/À propos",
            projects: "03/Projets",
            contact: "04/Contact"
        },
        hero: {
            banner: "À la recherche d'une alternance",
            subtitle: "Développeur web",
            description: "Développeur fullstack, spécialisé en développement web moderne. Je crée des expériences interactives personnalisées, élégantes, évolutives et accessibles, pour une expérience utilisateur qualité et exceptionnelle.",
            cta: "Découvrez mon travail ↓"
        },
        about: {
            title: "02/ À PROPOS",
            intro: "Étudiant en développement web et passionné par la création d'expériences numériques modernes et intuitives. Mon parcours est guidé par une curiosité constante et un désir d'apprendre, que ce soit à travers mes études, ou mes projets personnels.",
            paragraph1: "Depuis que j'ai découvert le développement web, j'ai été captivé par la possibilité de transformer des idées en interfaces dynamiques et interactives. Chaque ligne de code est pour moi l'occasion de résoudre des problèmes, d'innover et de rendre le Web plus accessible.",
            paragraph2: "Je suis spécialisé dans les technologies front-end et back-end, ce qui me permet de créer des sites complets, fonctionnels et esthétiques. Je possède également de solides bases dans des outils de design, ce qui me permet de concevoir des sites élégants et modernes.",
            paragraph3: "Je suis à la recherche d'une alternance pour continuer à mettre en pratique mes compétences et relever de nouveaux défis, tout en collaborant avec des développeurs expérimentés.",
            skills: {
                webdev: "Développement Web",
                frameworks: "Frameworks & Bibliothèques",
                links: "Liens"
            }
        },
        projects: {
            title: "03/ PROJETS",
            p1: {
                title: "StillMe",
                desc: "Dans le cadre d'un projet étudiant, nous avions pour objectif de concevoir un site web pour la mise en avant d'une chaîne YouTube créé par nous-même, le site devait présenter la chaîne YouTube, la vidéo ainsi que les Shorts."
            },
            p2: {
                title: "BMW M3 CS 2025",
                desc: "Réalisation d'un site vitrine dédié à la BMW M3 CS 2025. Objectif : présenter les caractéristiques techniques, le design, les photos et offrir une expérience immersive centrée autour de ce modèle de voiture."
            },
            p3: {
                title: "Clone X/Twitter",
                desc: "API backend complète reproduisant les fonctionnalités principales de X/Twitter telles que : inscription/connexion, tweets, abonnements, réponses, retweets, likes, messages privés, recherche et tendances."
            },
            p4: {
                badge: "En cours de réalisation",
                title: "Projet en développement",
                desc: "Un nouveau projet passionnant est actuellement en cours de développement. Plus de détails seront bientôt disponibles."
            }
        },
        contact: {
            title: "04/ CONTACT",
            heading: "Travaillons ensemble",
            text: "Je suis à la recherche d'une alternance, des missions en tant que développeur fullstack ou des collaborations sur des projets innovants.",
            email: "Email",
            phone: "Téléphone",
            location: "Localisation",
            form: {
                name: "Nom",
                email: "Email",
                message: "Message",
                submit: "Envoyer le message"
            }
        },
        footer: {
            copyright: "© 2025 Kevin Castanho. Tous droits réservés.",
            legal: "Mentions légales"
        },
        toast: {
            success: {
                title: "Message envoyé !",
                message: "Je vous répondrai dans les plus brefs délais."
            },
            error: {
                title: "Erreur",
                message: "Erreur lors de l'envoi du message. Veuillez réessayer."
            }
        }
    },
    en: {
        nav: {
            home: "01/Home",
            about: "02/About",
            projects: "03/Projects",
            contact: "04/Contact"
        },
        hero: {
            banner: "Looking for an apprenticeship",
            subtitle: "Web Developer",
            description: "Fullstack developer, specialized in modern web development. I create personalized, elegant, scalable and accessible interactive experiences, for a quality and exceptional user experience.",
            cta: "Discover my work ↓"
        },
        about: {
            title: "02/ ABOUT",
            intro: "Web development student and passionate about creating modern and intuitive digital experiences. My journey is guided by constant curiosity and a desire to learn, whether through my studies or my personal projects.",
            paragraph1: "Since I discovered web development, I have been captivated by the possibility of transforming ideas into dynamic and interactive interfaces. Each line of code is for me an opportunity to solve problems, innovate and make the Web more accessible.",
            paragraph2: "I specialize in front-end and back-end technologies, which allows me to create complete, functional and aesthetic websites. I also have solid foundations in design tools, which allows me to design elegant and modern sites.",
            paragraph3: "I am looking for an apprenticeship to continue putting my skills into practice and take on new challenges, while collaborating with experienced developers.",
            skills: {
                webdev: "Web Development",
                frameworks: "Frameworks & Libraries",
                links: "Links"
            }
        },
        projects: {
            title: "03/ PROJECTS",
            p1: {
                title: "StillMe",
                desc: "As part of a student project, we aimed to design a website to showcase a YouTube channel created by ourselves, the site had to present the YouTube channel, the video as well as the Shorts."
            },
            p2: {
                title: "BMW M3 CS 2025",
                desc: "Creation of a showcase website dedicated to the BMW M3 CS 2025. Objective: present the technical characteristics, design, photos and offer an immersive experience centered around this car model."
            },
            p3: {
                title: "Clone X/Twitter",
                desc: "Complete backend API reproducing the main features of X/Twitter such as: registration/login, tweets, subscriptions, replies, retweets, likes, private messages, search and trends."
            },
            p4: {
                badge: "In progress",
                title: "Project in development",
                desc: "An exciting new project is currently under development. More details will be available soon."
            }
        },
        contact: {
            title: "04/ CONTACT",
            heading: "Let's work together",
            text: "I am looking for an apprenticeship, fullstack developer missions or collaborations on innovative projects.",
            email: "Email",
            phone: "Phone",
            location: "Location",
            form: {
                name: "Name",
                email: "Email",
                message: "Message",
                submit: "Send message"
            }
        },
        footer: {
            copyright: "© 2025 Kevin Castanho. All rights reserved.",
            legal: "Legal Notice"
        },
        toast: {
            success: {
                title: "Message sent!",
                message: "I will get back to you as soon as possible."
            },
            error: {
                title: "Error",
                message: "Error sending message. Please try again."
            }
        }
    }
};

// Current language
let currentLang = localStorage.getItem('lang') || 'fr';

// Get nested translation value
function getTranslation(key, lang) {
    const keys = key.split('.');
    let value = translations[lang];
    for (const k of keys) {
        if (value && value[k]) {
            value = value[k];
        } else {
            return null;
        }
    }
    return value;
}

// Update all elements with data-i18n attribute
function updateTranslations() {
    document.querySelectorAll('[data-i18n]').forEach(element => {
        const key = element.getAttribute('data-i18n');
        const translation = getTranslation(key, currentLang);
        if (translation) {
            element.textContent = translation;
        }
    });
    
    // Update HTML lang attribute
    document.documentElement.lang = currentLang;
    
    // Update page title
    document.title = currentLang === 'fr' 
        ? 'Kevin Castanho - Développeur Web' 
        : 'Kevin Castanho - Web Developer';
}

// Switch language
function switchLanguage(lang) {
    currentLang = lang;
    localStorage.setItem('lang', lang);
    window.currentLang = currentLang;
    
    // Update button states
    document.querySelectorAll('.lang-btn').forEach(btn => {
        btn.classList.remove('active');
        if (btn.getAttribute('data-lang') === lang) {
            btn.classList.add('active');
        }
    });
    
    updateTranslations();
    
    // Dispatch event for typing effect
    window.dispatchEvent(new Event('languageChanged'));
}

// Initialize language switcher
document.addEventListener('DOMContentLoaded', () => {
    // Set initial active state
    document.querySelectorAll('.lang-btn').forEach(btn => {
        btn.classList.remove('active');
        if (btn.getAttribute('data-lang') === currentLang) {
            btn.classList.add('active');
        }
        
        btn.addEventListener('click', () => {
            switchLanguage(btn.getAttribute('data-lang'));
        });
    });
    
    // Apply initial translations
    updateTranslations();
});

// Export for use in other scripts
window.translations = translations;
window.currentLang = currentLang;
window.getTranslation = getTranslation;
