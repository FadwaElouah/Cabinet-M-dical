<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <style>
        :root {
            --primary: #2b6cb0;
            --primary-dark: #2c5282;
            --secondary: #4299e1;
            --accent: #ebf8ff;
            --gray: #718096;
            --light: #f7fafc;
            --success: #48bb78;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: var(--light);
        }

        header {
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--primary);
            text-decoration: none;
        }

        .logo-icon {
            font-size: 1.5rem;
        }

        h1 {
            color: var(--primary);
            font-size: 1.5rem;
            font-weight: 600;
        }

        nav {
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        nav ul {
            display: flex;
            gap: 2rem;
            list-style: none;
        }

        nav a {
            color: var(--gray);
            text-decoration: none;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            transition: all 0.2s;
        }

        nav a:hover {
            color: var(--primary);
            background-color: var(--accent);
        }

        .auth-buttons {
            display: flex;
            gap: 1rem;
        }

        .btn {
            padding: 0.5rem 1rem;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s;
        }

        .btn-outline {
            color: var(--primary);
            border: 1px solid var(--primary);
        }

        .btn-outline:hover {
            background-color: var(--primary);
            color: white;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
        }

        main {
            flex: 1;
        }

        .hero {
            background: linear-gradient(rgba(43, 108, 176, 0.9), rgba(43, 108, 176, 0.9)), url('/api/placeholder/1200/400');
            background-size: cover;
            color: white;
            padding: 4rem 1rem;
            text-align: center;
        }

        .hero-content {
            max-width: 800px;
            margin: 0 auto;
        }

        .hero h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: white;
        }

        .hero p {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .features {
            max-width: 1200px;
            margin: -3rem auto 3rem;
            padding: 0 1rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            position: relative;
        }

        .feature-card {
            background: white;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }

        .feature-icon {
            background-color: var(--accent);
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            color: var(--primary);
            font-size: 1.5rem;
        }

        .services {
            padding: 4rem 1rem;
            background-color: white;
        }

        .services-content {
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-title {
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-title h2 {
            color: var(--primary-dark);
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .section-title p {
            color: var(--gray);
            max-width: 600px;
            margin: 0 auto;
        }

        .service-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .service-card {
            padding: 2rem;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            text-align: center;
            transition: all 0.2s;
        }

        .service-card:hover {
            border-color: var(--primary);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .stats {
            background-color: var(--accent);
            padding: 4rem 1rem;
        }

        .stats-grid {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            text-align: center;
        }

        .stat-card h3 {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        .contact {
            padding: 4rem 1rem;
            background-color: white;
        }

        .contact-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 3rem;
        }

        .contact-info {
            display: grid;
            gap: 1.5rem;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .contact-icon {
            width: 40px;
            height: 40px;
            background-color: var(--accent);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
        }

        footer {
            background-color: var(--primary-dark);
            color: white;
            padding: 4rem 1rem 1rem;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .footer-section h3 {
            margin-bottom: 1rem;
            font-size: 1.2rem;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.5rem;
        }

        .footer-links a {
            color: white;
            opacity: 0.8;
            text-decoration: none;
            transition: opacity 0.2s;
        }

        .footer-links a:hover {
            opacity: 1;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 1rem;
            }

            nav {
                flex-direction: column;
                gap: 1rem;
            }

            nav ul {
                flex-wrap: wrap;
                justify-content: center;
            }

            .hero h2 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="header-content">
            <a href="/" class="logo">
                <span class="logo-icon">⚕️</span>
                <h1>Cabinet Médical</h1>
            </a>
            <nav>
                <ul>
                    <li><a href="/">Accueil</a></li>
                    <li><a href="/patients">Patients</a></li>
                    <li><a href="/medecins">Médecins</a></li>
                    <li><a href="/rendez-vous">Rendez-vous</a></li>
                </ul>
                <div class="auth-buttons">
                    <a href="/login" class="btn btn-outline">Se connecter</a>
                    <a href="/register" class="btn btn-primary">S'inscrire</a>
                </div>
            </nav>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="hero-content">
                <h2>Votre santé, notre priorité</h2>
                <p>Une équipe médicale dévouée pour des soins de qualité</p>
                <a href="/rendez-vous" class="btn btn-primary">Prendre rendez-vous</a>
            </div>
        </section>

        <div class="features">
            <div class="feature-card">
                <div class="feature-icon">👥</div>
                <h3>Gestion des patients</h3>
                <p>Accédez à votre dossier médical et gérez vos rendez-vous en toute simplicité.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">👨‍⚕️</div>
                <h3>Équipe médicale</h3>
                <p>Des professionnels de santé qualifiés à votre écoute.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">📅</div>
                <h3>Rendez-vous en ligne</h3>
                <p>Prenez rendez-vous 24h/24 et 7j/7 selon vos disponibilités.</p>
            </div>
        </div>

        <section class="services">
            <div class="services-content">
                <div class="section-title">
                    <h2>Nos services médicaux</h2>
                    <p>Une gamme complète de services pour votre santé</p>
                </div>
                <div class="service-grid">
                    <div class="service-card">
                        <h3>Consultations</h3>
                        <p>Consultations généralistes et spécialisées</p>
                    </div>
                    <div class="service-card">
                        <h3>Urgences</h3>
                        <p>Service d'urgence disponible</p>
                    </div>
                    <div class="service-card">
                        <h3>Suivis</h3>
                        <p>Suivi personnalisé des patients</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="stats">
            <div class="stats-grid">
                <div class="stat-card">
                    <h3>5000+</h3>
                    <p>Patients satisfaits</p>
                </div>
                <div class="stat-card">
                    <h3>15+</h3>
                    <p>Médecins spécialistes</p>
                </div>
                <div class="stat-card">
                    <h3>24/7</h3>
                    <p>Service disponible</p>
                </div>
                <div class="stat-card">
                    <h3>98%</h3>
                    <p>Taux de satisfaction</p>
                </div>
            </div>
        </section>

        <section class="contact">
            <div class="contact-content">
                <div class="contact-info">
                    <h2>Contactez-nous</h2>
                    <div class="contact-item">
                        <div class="contact-icon">📍</div>
                        <p>123 Rue de la Santé, 75000 Paris</p>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">📞</div>
                        <p>+33 1 23 45 67 89</p>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">📧</div>
                        <p>contact@cabinet-medical.fr</p>
                    </div>
                </div>
                <div class="contact-hours">
                    <h2>Horaires d'ouverture</h2>
                    <p>Lundi - Vendredi : 8h00 - 20h00</p>
                    <p>Samedi : 9h00 - 18h00</p>
                    <p>Dimanche : Fermé</p>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="footer-content">
            <div class="footer-grid">
                <div class="footer-section">
                    <h3>À propos</h3>
                    <ul class="footer-links">
                        <li><a href="/about">Notre cabinet</a></li>
                        <li><a href="/team">Notre équipe</a></li>
                        <li><a href="/careers">Carrières</a></li>
                        <li><a href="/news">Actualités</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Services</h3>
                    <ul class="footer-links">
                        <li><a href="/services/consultations">Consultations</a></li>
                        <li><a href="/services/urgences">Urgences</a></li>
                        <li><a href="/services/specialites">Spécialités</a></li>
                        <li><a href="/services/examens">Examens</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Patients</h3>
                    <ul class="footer-links">
                        <li><a href="/rendez-vous">Prendre rendez-vous</a></li>
                        <li><a href="/dossier-medical">Dossier médical</a></li>
                        <li><a href="/resultats">Résultats d'examens</a></li>
                        <li><a href="/faq">FAQ</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Informations légales</h3>
                    <ul class="footer-links">
                        <li><a href="/mentions-legales">Mentions légales</a></li>
                        <li><a href="/confidentialite">Politique de confidentialité</a></li>
                        <li><a href="/cgv">CGV</a></li>
                        <li><a href="/cookies">Cookies</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Contact</h3>
                    <ul class="footer-links">
                        <li><a href="/contact">Nous contacter</a></li>
                        <li><a href="/urgence">Numéros d'urgence</a></li>
                        <li><a href="/acces">Plan d'accès</a></li>
                        <li><a href="/newsletter">Newsletter</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 Cabinet Médical. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <script>
        // Script pour rendre le header sticky
        window.addEventListener('scroll', function() {
            const header = document.querySelector('header');
            header.classList.toggle('sticky', window.scrollY > 0);
        });

        // Animation smooth scroll pour les ancres
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>