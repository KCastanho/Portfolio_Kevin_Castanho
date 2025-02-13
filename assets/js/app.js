// script.js

// Gestion du menu burger
const menuToggle = document.querySelector('.menu-toggle');
const liens = document.querySelector('.liens');

menuToggle.addEventListener('click', () => {
    liens.classList.toggle('active');
});

// Fermer le menu burger quand on clique sur un lien
document.querySelectorAll('.liens nav ul li a').forEach(link => {
    link.addEventListener('click', () => {
        liens.classList.remove('active');
    });
});




const modeBtn = document.getElementById("mode");
const modeIcon = document.getElementById("mode-icon");
const logo = document.getElementById("logo");
const currentMode = localStorage.getItem("theme");
const langBtn = document.getElementById("lang");

const emailIcon = document.getElementById('email-icon');
const telephoneIcon = document.getElementById('telephone-icon');
const localisationIcon = document.getElementById('localisation-icon');

if (currentMode) {
    document.documentElement.setAttribute("data-theme", currentMode);
    updateThemeUI(currentMode);
}

modeBtn.addEventListener("click", () => {
    let theme = document.documentElement.getAttribute("data-theme");
    if (theme === "dark") {
        document.documentElement.setAttribute("data-theme", "light");
        localStorage.setItem("theme", "light");
        updateThemeUI("light");
    } else {
        document.documentElement.setAttribute("data-theme", "dark");
        localStorage.setItem("theme", "dark");
        updateThemeUI("dark");
    }
});

function updateThemeUI(theme) {
    if (theme === "dark") {
        logo.src = "assets/images/Logo_blanc.webp";
        modeIcon.src = "assets/images/Soleil.webp";

        if (emailIcon) emailIcon.src = "assets/images/Mail_Blanc.webp";
        if (telephoneIcon) telephoneIcon.src = "assets/images/Appel_Blanc.webp";
        if (localisationIcon) localisationIcon.src = "assets/images/Loc_Blanc.webp";
    } else {
        logo.src = "assets/images/Logo_noir.webp";
        modeIcon.src = "assets/images/Lune.webp";

        if (emailIcon) emailIcon.src = "assets/images/Mail_Noir.webp";
        if (telephoneIcon) telephoneIcon.src = "assets/images/Appel_Noir.webp";
        if (localisationIcon) localisationIcon.src = "assets/images/Loc_Noir.webp";
    }
}



//----------------------------------------------------------------------------------------------------------



const translations = {
    en: {
        //nav bar
        accueil_barre: 'Homepage',
        a_propos_barre: 'About',
        projets_barre: 'Projects',
        contact_barre: 'Contact',

        //index
        title: "Kevin Castanho",
        description: "I'm a web development student.",
        button: "Discover my career",
        projects: '<span class="couleur">Design</span> and <span class="couleur">web </span> projects',
        about_me: 'Learn more about <span class="couleur">me</span>',
        contact: "STAY WITH ME",
        contact2: '<span class="couleur">MY PROFILE</span>',
        cv: 'DOWNLOAD<br>MY <span class="couleur">CV</span>',
        work: "I'm looking for an<br><span class='couleur'>internship</span> that could<br>potentially <span class='couleur'>become</span> a<br><span class='couleur'>work-study program</span>",
        contact3: "Let's work<br><span class='couleur'>together</span>",

        //A propos
        button2: "Contact me",
        introduction: "My name is <span class='couleur'>Kevin Castanho</span>, I'm a <span class='couleur'>web development student</span> with a passion for creating modern, intuitive digital experiences.<br>My path has been guided by a constant curiosity and desire to learn, whether through my studies or my personal projects.<br><br>Ever since I discovered web development, I've been captivated by the possibility of transforming ideas into dynamic, interactive interfaces. For me, every line of code is an opportunity to solve problems, innovate and make the Web more accessible.",
        current: 'Currently studying web development, I specialize in <span class="couleur">front-end</span> and <span class="couleur">back-end</span> technologies, enabling me to create complete, functional and aesthetic websites.<br><br>I also have a solid base in <span class="couleur">design tools</span>, enabling me to create elegant, modern sites.',
        work2: "I'm looking for <span class='couleur'>internship</span> or <span class='couleur'>work-study</span> opportunities to continue applying my skills and take on new challenges, while working with experienced developers.",

        //projets
        title2: 'Explore my web projects',

        //contact
        title3: "Let's work<br><span class='couleur'>together</span>",
        placeholder_name: 'Name *',
        placeholder_email: 'Email *',
        placeholder_message: 'Here your message...',
        button3: "Send",
        social_media: '<span class="couleur">My social media :</span>',

        //mention
        mention: '&copy; 2025 Kevin Castanho - <a href="mentions_legales.php"> Legal information'
    },
    fr: {
        //nav bar
        accueil_barre: 'Accueil',
        a_propos_barre: 'À propos',
        projets_barre: 'Projets',
        contact_barre: 'Contact',

        //index
        title: "Kevin Castanho",
        description: "Je suis étudiant en développement web.",
        button: "Découvrir mon parcours",
        projects: 'Projets <span class="couleur">design</span> et <span class="couleur">web</span>',
        about_me: 'En savoir plus sur <span class="couleur">moi</span>',
        contact: "RESTEZ AVEC MOI",
        contact2: '<span class="couleur">MON PROFIL</span>',
        cv: 'TELECHARGER<br>MON <span class="couleur">CV</span>',
        work: "Je suis a la recherche d'un<br><span class='couleur'>stage</span> qui pourrait<br>potentiellement <span class='couleur'>devenir</span> une<br><span class='couleur'>alternance</span>",
        contact3: 'Travaillons<br><span class="couleur">ensemble</span>',

        //A propos
        button2: "Contactez-moi",
        introduction: "Je m'appelle <span class='couleur'>Kevin Castanho</span>, <span class='couleur'>étudiant en developpement web</span> et passionné par la création d'éxpériences numériques modernes et intuitives.<br>Mon parcours est guidé par une curiosité constante et un désir d’apprendre, que ce soit à travers mes études, ou mes projets personnels.<br><br>Depuis que j’ai découvert le développement web, j’ai été captivé par la possibilité de transformer des idées en interfaces dynamiques et interactives. Chaque ligne de code est pour moi l'occasion de résoudre des problèmes, d'innover et de rendre le Web plus accessible.",
        current: 'Actuellement en formation en développement web, je me spécialise dans les technologies <span class="couleur">front-end</span> et <span class="couleur">back-end</span>, ce qui me permet de créer des sites complets, fonctionnels et esthétiques.<br><br>Je possède également de solides bases dans des <span class="couleur">outils de design</span>, ce qui me permet de concevoir des sites élégants et modernes.',
        work2: "Je suis à la recherche d'opportunités de <span class='couleur'>stage</span> ou <span class='couleur'>d'alternance</span> pour continuer à mettre en pratique mes compétences et relever de nouveaux défis, tout en collaborant avec des développeurs expérimentés.",

        //projets
        title2: 'Explorez mes projets web',

        //contact
        title3: 'Travaillons <span class="couleur">ensemble.',
        placeholder_name: 'Nom *',
        placeholder_email: 'Email *',
        placeholder_message: 'Ici votre message...',
        button3: "Envoyer",
        social_media: '<span class="couleur">Mes réseaux sociaux :</span>',

        //mention
        mention: '&copy; 2025 Kevin Castanho - <a href="mentions_legales.php"> Mentions légales'
    }
};




// Récupérer la langue préférée stockée dans le localStorage (par défaut 'fr')
let currentLang = localStorage.getItem('lang') || 'fr';

// Fonction qui met à jour le contenu traduit en fonction de currentLang
function updateContent() {
    document.querySelectorAll('[traduction]').forEach(el => {
        const key = el.getAttribute('traduction');
        // Mettre à jour le texte en fonction de la clé et de la langue
        el.innerHTML = translations[currentLang][key] || el.innerHTML;
    });
    document.getElementById('lang-icon').src = currentLang === 'fr' ? "assets/images/France.webp" : "assets/images/Ang.webp";

    // Vérifier l'existence des champs de formulaire avant de modifier leurs placeholders
    const nomInput = document.getElementById('Nom');
    const emailInput = document.getElementById('Email');
    const messageInput = document.getElementById('Message');

    if (nomInput) nomInput.placeholder = translations[currentLang].placeholder_name;
    if (emailInput) emailInput.placeholder = translations[currentLang].placeholder_email;
    if (messageInput) messageInput.placeholder = translations[currentLang].placeholder_message;

}


// Gestion du clic sur le bouton de changement de langue
document.getElementById('lang').addEventListener('click', () => {
    // Inverser la langue : si 'fr' alors 'en', sinon 'fr'
    currentLang = (currentLang === 'fr') ? 'en' : 'fr';
    // Sauvegarder le choix de langue pour les visites ultérieures
    localStorage.setItem('lang', currentLang);
    // Mettre à jour le contenu de la page
    updateContent();
});

// Initialiser le contenu dès le chargement de la page
updateContent();

