<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usman Khalid — Shopify Developer</title>
    <meta name="description" content="Shopify Developer with 3+ years of experience building custom themes, storefronts, and payment integrations.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Fira+Code:wght@400;500&display=swap" rel="stylesheet">

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg: #0a0f0a;
            --bg2: #111811;
            --bg3: #161f16;
            --card: #1a241a;
            --border: #2a382a;
            --accent: #22c55e;
            --accent2: #16a34a;
            --accent3: #06b6d4;
            --text: #e2e8f0;
            --muted: #94a3b8;
            --dim: #64748b;
        }

        html { scroll-behavior: smooth; }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            overflow-x: hidden;
        }

        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: var(--bg); }
        ::-webkit-scrollbar-thumb { background: var(--accent); border-radius: 3px; }

        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 0;
        }

        /* ── Navbar ── */
        nav {
            position: fixed; top: 0; left: 0; right: 0; z-index: 100;
            padding: 1rem 2rem;
            display: flex; align-items: center; justify-content: space-between;
            background: rgba(10, 15, 10, 0.85);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
            transition: all 0.3s ease;
        }

        .nav-logo {
            font-family: 'Fira Code', monospace;
            font-size: 1.1rem; font-weight: 500;
            color: var(--accent); text-decoration: none;
        }

        .nav-links { display: flex; gap: 2rem; list-style: none; }

        .nav-links a {
            color: var(--muted); text-decoration: none;
            font-size: 0.875rem; font-weight: 500;
            transition: color 0.2s; position: relative;
        }

        .nav-links a::after {
            content: ''; position: absolute; bottom: -2px; left: 0;
            width: 0; height: 2px; background: var(--accent); transition: width 0.3s;
        }

        .nav-links a:hover { color: var(--text); }
        .nav-links a:hover::after { width: 100%; }

        .hamburger {
            display: none; flex-direction: column; gap: 5px;
            cursor: pointer; background: none; border: none; padding: 4px;
        }

        .hamburger span {
            display: block; width: 24px; height: 2px;
            background: var(--text); border-radius: 2px; transition: all 0.3s ease;
        }

        .hamburger.open span:nth-child(1) { transform: translateY(7px) rotate(45deg); }
        .hamburger.open span:nth-child(2) { opacity: 0; }
        .hamburger.open span:nth-child(3) { transform: translateY(-7px) rotate(-45deg); }

        .mobile-menu {
            display: none; position: fixed; top: 64px; left: 0; right: 0;
            background: rgba(10, 15, 10, 0.98); backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
            padding: 1.5rem 2rem; z-index: 99;
            flex-direction: column; gap: 1.5rem;
        }

        .mobile-menu.open { display: flex; }
        .mobile-menu a { color: var(--text); text-decoration: none; font-size: 1rem; font-weight: 500; }

        /* ── Hero ── */
        .hero {
            min-height: 100vh; display: flex; align-items: center; justify-content: center;
            padding: 8rem 2rem 4rem; position: relative; overflow: hidden;
        }

        .hero-glow {
            position: absolute; width: 600px; height: 600px;
            background: radial-gradient(circle, rgba(34, 197, 94, 0.12) 0%, transparent 70%);
            top: 50%; left: 50%; transform: translate(-50%, -50%);
            pointer-events: none; animation: pulse-glow 4s ease-in-out infinite;
        }

        .hero-glow2 {
            position: absolute; width: 400px; height: 400px;
            background: radial-gradient(circle, rgba(6, 182, 212, 0.08) 0%, transparent 70%);
            top: 30%; right: 10%; pointer-events: none;
            animation: pulse-glow 5s ease-in-out infinite reverse;
        }

        @keyframes pulse-glow {
            0%, 100% { opacity: 1; transform: translate(-50%, -50%) scale(1); }
            50% { opacity: 0.6; transform: translate(-50%, -50%) scale(1.1); }
        }

        .hero-content { text-align: center; max-width: 800px; position: relative; z-index: 1; }

        .hero-badge {
            display: inline-flex; align-items: center; gap: 0.5rem;
            background: rgba(34, 197, 94, 0.1); border: 1px solid rgba(34, 197, 94, 0.3);
            color: var(--accent); padding: 0.4rem 1rem; border-radius: 999px;
            font-size: 0.8rem; font-weight: 600; letter-spacing: 0.05em;
            text-transform: uppercase; margin-bottom: 1.5rem;
            opacity: 0; animation: fade-up 0.6s ease forwards 0.2s;
        }

        .hero-badge::before {
            content: ''; width: 8px; height: 8px; background: var(--accent);
            border-radius: 50%; animation: blink 1.5s ease-in-out infinite;
        }

        @keyframes blink { 0%, 100% { opacity: 1; } 50% { opacity: 0.3; } }

        .hero h1 {
            font-size: clamp(2.5rem, 7vw, 5rem); font-weight: 900;
            line-height: 1.1; margin-bottom: 1rem;
            opacity: 0; animation: fade-up 0.6s ease forwards 0.4s;
        }

        .gradient-text {
            background: linear-gradient(135deg, #22c55e, #16a34a, #06b6d4);
            -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
        }

        .hero-subtitle {
            font-family: 'Fira Code', monospace;
            font-size: clamp(0.9rem, 2.5vw, 1.1rem); color: var(--muted);
            margin-bottom: 2rem; opacity: 0; animation: fade-up 0.6s ease forwards 0.6s;
        }

        .typing-text { color: var(--accent3); }

        .hero-desc {
            font-size: 1.05rem; color: var(--muted); max-width: 600px;
            margin: 0 auto 2.5rem;
            opacity: 0; animation: fade-up 0.6s ease forwards 0.8s;
        }

        .hero-actions {
            display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;
            opacity: 0; animation: fade-up 0.6s ease forwards 1s;
        }

        .btn {
            display: inline-flex; align-items: center; gap: 0.5rem;
            padding: 0.75rem 1.75rem; border-radius: 8px;
            font-weight: 600; font-size: 0.9rem; text-decoration: none;
            transition: all 0.3s ease; cursor: pointer;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--accent), var(--accent2));
            color: white; border: none;
        }

        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 8px 25px rgba(34, 197, 94, 0.4); }

        .btn-outline { background: transparent; color: var(--text); border: 1px solid var(--border); }
        .btn-outline:hover { border-color: var(--accent); color: var(--accent); transform: translateY(-2px); }

        .scroll-indicator {
            position: absolute; bottom: 2rem; left: 50%; transform: translateX(-50%);
            display: flex; flex-direction: column; align-items: center; gap: 0.5rem;
            color: var(--dim); font-size: 0.75rem;
            opacity: 0; animation: fade-up 0.6s ease forwards 1.4s;
        }

        .scroll-indicator .mouse { width: 24px; height: 38px; border: 2px solid var(--dim); border-radius: 12px; position: relative; }
        .scroll-indicator .wheel {
            width: 4px; height: 8px; background: var(--accent); border-radius: 2px;
            position: absolute; top: 6px; left: 50%; transform: translateX(-50%);
            animation: scroll-wheel 1.5s ease-in-out infinite;
        }

        @keyframes scroll-wheel { 0% { top: 6px; opacity: 1; } 100% { top: 20px; opacity: 0; } }

        /* ── Sections ── */
        section { padding: 5rem 2rem; max-width: 1100px; margin: 0 auto; }

        .section-label {
            font-family: 'Fira Code', monospace; font-size: 0.8rem; color: var(--accent);
            text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 0.75rem;
            display: flex; align-items: center; gap: 0.75rem;
        }

        .section-label::before { content: ''; width: 32px; height: 2px; background: var(--accent); }

        .section-title { font-size: clamp(1.75rem, 4vw, 2.5rem); font-weight: 800; margin-bottom: 3rem; }

        /* ── Stats ── */
        .stats-row { display: flex; flex-wrap: wrap; gap: 1.5rem; margin-bottom: 4rem; }

        .stat-card {
            flex: 1; min-width: 140px; background: var(--card);
            border: 1px solid var(--border); border-radius: 12px;
            padding: 1.5rem; text-align: center; position: relative; overflow: hidden;
        }

        .stat-card::after {
            content: ''; position: absolute; bottom: 0; left: 0; right: 0;
            height: 2px; background: linear-gradient(90deg, var(--accent), var(--accent3));
        }

        .stat-number {
            font-size: 2.25rem; font-weight: 900;
            background: linear-gradient(135deg, var(--accent), var(--accent3));
            -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
            line-height: 1; margin-bottom: 0.25rem;
        }

        .stat-label { font-size: 0.8rem; color: var(--dim); font-weight: 500; }

        /* ── Skills ── */
        .skills-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 1.5rem; }

        .skill-card {
            background: var(--card); border: 1px solid var(--border);
            border-radius: 12px; padding: 1.5rem; transition: all 0.3s ease;
        }

        .skill-card:hover {
            border-color: var(--accent); transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(34, 197, 94, 0.1);
        }

        .skill-card-title {
            font-size: 0.75rem; font-weight: 700; text-transform: uppercase;
            letter-spacing: 0.08em; color: var(--accent); margin-bottom: 1rem;
            display: flex; align-items: center; gap: 0.5rem;
        }

        .tags { display: flex; flex-wrap: wrap; gap: 0.5rem; }

        .tag {
            background: rgba(34, 197, 94, 0.08); border: 1px solid rgba(34, 197, 94, 0.2);
            color: var(--muted); padding: 0.3rem 0.75rem; border-radius: 6px;
            font-size: 0.8rem; font-weight: 500; transition: all 0.2s;
        }

        .tag:hover { background: rgba(34, 197, 94, 0.2); color: var(--text); border-color: var(--accent); }

        /* ── Timeline ── */
        .timeline { position: relative; padding-left: 2rem; }

        .timeline::before {
            content: ''; position: absolute; left: 0; top: 0; bottom: 0;
            width: 2px; background: linear-gradient(to bottom, var(--accent), var(--accent3), transparent);
        }

        .timeline-item { position: relative; padding-bottom: 3rem; padding-left: 2rem; }
        .timeline-item:last-child { padding-bottom: 0; }

        .timeline-dot {
            position: absolute; left: -2.4rem; top: 0.4rem;
            width: 12px; height: 12px; background: var(--accent);
            border-radius: 50%; border: 2px solid var(--bg);
            box-shadow: 0 0 12px var(--accent);
        }

        .timeline-header { display: flex; flex-wrap: wrap; align-items: flex-start; gap: 0.75rem; margin-bottom: 0.5rem; }
        .timeline-role { font-size: 1.1rem; font-weight: 700; color: var(--text); }
        .timeline-company { color: var(--accent); font-weight: 600; }

        .timeline-meta {
            font-size: 0.8rem; color: var(--accent3);
            font-family: 'Fira Code', monospace;
            background: rgba(6, 182, 212, 0.08); border: 1px solid rgba(6, 182, 212, 0.35);
            padding: 0.3rem 0.8rem; border-radius: 6px; margin-left: auto; font-weight: 600;
        }

        .timeline-list { list-style: none; margin-top: 0.75rem; display: flex; flex-direction: column; gap: 0.4rem; }

        .timeline-list li { font-size: 0.9rem; color: var(--muted); display: flex; align-items: flex-start; gap: 0.5rem; }
        .timeline-list li::before { content: '▹'; color: var(--accent); flex-shrink: 0; margin-top: 0.05em; }

        /* ── Projects ── */
        .projects-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 1.5rem; }

        .project-card {
            background: var(--card); border: 1px solid var(--border);
            border-radius: 12px; padding: 1.75rem; transition: all 0.3s ease;
            position: relative; overflow: hidden;
        }

        .project-card::before {
            content: ''; position: absolute; top: 0; left: 0; right: 0; height: 3px;
            background: linear-gradient(90deg, var(--accent), var(--accent3));
            transform: scaleX(0); transform-origin: left; transition: transform 0.3s ease;
        }

        .project-card:hover::before { transform: scaleX(1); }
        .project-card:hover { transform: translateY(-4px); border-color: rgba(34, 197, 94, 0.4); box-shadow: 0 16px 40px rgba(34, 197, 94, 0.1); }

        .project-icon { font-size: 1.75rem; margin-bottom: 1rem; }
        .project-name { font-size: 1.1rem; font-weight: 700; color: var(--text); margin-bottom: 0.4rem; }
        .project-industry { font-size: 0.75rem; color: var(--accent3); font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.75rem; }
        .project-desc { font-size: 0.875rem; color: var(--muted); margin-bottom: 1.25rem; line-height: 1.7; }

        .project-link {
            display: inline-flex; align-items: center; gap: 0.4rem; margin-top: 1rem;
            font-size: 0.8rem; font-weight: 600; color: var(--accent3);
            text-decoration: none; border: 1px solid rgba(6, 182, 212, 0.3);
            padding: 0.3rem 0.8rem; border-radius: 6px; transition: all 0.2s;
        }

        .project-link:hover { background: rgba(6, 182, 212, 0.1); border-color: var(--accent3); transform: translateY(-1px); }

        /* ── Achievements ── */
        .achievements-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 1rem; }

        .achievement-card {
            display: flex; gap: 1rem; background: var(--card);
            border: 1px solid var(--border); border-radius: 10px;
            padding: 1.25rem; transition: all 0.3s ease; align-items: flex-start;
        }

        .achievement-card:hover { border-color: var(--accent); transform: translateX(4px); }
        .achievement-icon { font-size: 1.5rem; flex-shrink: 0; margin-top: 0.1rem; }
        .achievement-text { font-size: 0.875rem; color: var(--muted); line-height: 1.6; }

        /* ── Contact ── */
        .contact-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 1rem; }

        .contact-card {
            display: flex; align-items: center; gap: 1rem;
            background: var(--card); border: 1px solid var(--border);
            border-radius: 10px; padding: 1.25rem;
            text-decoration: none; color: var(--text); transition: all 0.3s ease;
        }

        .contact-card:hover { border-color: var(--accent); transform: translateY(-3px); box-shadow: 0 8px 20px rgba(34, 197, 94, 0.15); }

        .contact-icon {
            width: 44px; height: 44px; background: rgba(34, 197, 94, 0.1);
            border-radius: 10px; display: flex; align-items: center;
            justify-content: center; font-size: 1.25rem; flex-shrink: 0;
        }

        .contact-label { font-size: 0.75rem; color: var(--dim); }
        .contact-value { font-size: 0.9rem; font-weight: 600; color: var(--text); }

        /* ── Footer ── */
        footer {
            text-align: center; padding: 2rem;
            border-top: 1px solid var(--border);
            color: var(--dim); font-size: 0.85rem;
            font-family: 'Fira Code', monospace;
        }

        /* ── Animations ── */
        @keyframes fade-up { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }

        .reveal { opacity: 0; transform: translateY(30px); transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1); }
        .reveal.visible { opacity: 1; transform: translateY(0); }
        .reveal-delay-1 { transition-delay: 0.1s; }
        .reveal-delay-2 { transition-delay: 0.2s; }
        .reveal-delay-3 { transition-delay: 0.3s; }
        .reveal-delay-4 { transition-delay: 0.4s; }

        .divider { height: 1px; background: linear-gradient(90deg, transparent, var(--border), transparent); margin: 0 2rem; }

        .cursor-glow {
            position: fixed; width: 300px; height: 300px; border-radius: 50%;
            background: radial-gradient(circle, rgba(34, 197, 94, 0.05) 0%, transparent 70%);
            pointer-events: none; z-index: 0;
            transform: translate(-50%, -50%);
            transition: left 0.1s ease, top 0.1s ease;
        }

        @media (max-width: 768px) {
            nav { padding: 1rem 1.25rem; }
            .nav-links { display: none; }
            .hamburger { display: flex; }
            section { padding: 3.5rem 1.25rem; }
            .hero { padding: 7rem 1.25rem 3rem; }
            .timeline { padding-left: 1.25rem; }
            .timeline-item { padding-left: 1.25rem; }
            .timeline-dot { left: -1.65rem; }
            .timeline-meta { margin-left: 0; }
            .stats-row { gap: 1rem; }
            .stat-card { min-width: 120px; }
            .stat-number { font-size: 1.75rem; }
        }
    </style>
</head>
<body>

<div class="cursor-glow" id="cursorGlow"></div>

<!-- Navbar -->
<nav id="navbar">
    <a href="#home" class="nav-logo">usman.dev</a>
    <ul class="nav-links">
        <li><a href="#about">About</a></li>
        <li><a href="#skills">Skills</a></li>
        <li><a href="#experience">Experience</a></li>
        <li><a href="#projects">Projects</a></li>
        <li><a href="#contact">Contact</a></li>
    </ul>
    <button class="hamburger" id="hamburger" aria-label="Toggle menu">
        <span></span><span></span><span></span>
    </button>
</nav>

<div class="mobile-menu" id="mobileMenu">
    <a href="#about" onclick="closeMobile()">About</a>
    <a href="#skills" onclick="closeMobile()">Skills</a>
    <a href="#experience" onclick="closeMobile()">Experience</a>
    <a href="#projects" onclick="closeMobile()">Projects</a>
    <a href="#contact" onclick="closeMobile()">Contact</a>
</div>

<!-- Hero -->
<section class="hero" id="home">
    <div class="hero-glow"></div>
    <div class="hero-glow2"></div>
    <div class="hero-content">
        <div class="hero-badge">Open to new opportunities</div>
        <h1>Hi, I'm <span class="gradient-text">Usman Khalid</span></h1>
        <p class="hero-subtitle">
            <span class="typing-text" id="typingText"></span><span style="color:var(--accent);animation:blink 1s infinite;">|</span>
        </p>
        <p class="hero-desc">
            Shopify Developer with 3+ years of experience building custom themes, apps, and integrations. Passionate about creating seamless ecommerce experiences that drive growth — worked with startups to established brands across various industries.
        </p>
        <div class="hero-actions">
            <a href="#projects" class="btn btn-primary">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"/><polyline points="13 2 13 9 20 9"/></svg>
                View Projects
            </a>
            <a href="#contact" class="btn btn-outline">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                Get in Touch
            </a>
        </div>
    </div>
    <div class="scroll-indicator">
        <div class="mouse"><div class="wheel"></div></div>
        <span>scroll</span>
    </div>
</section>

<div class="divider"></div>

<!-- About -->
<section id="about">
    <div class="section-label">About me</div>
    <h2 class="section-title">Turning ideas into <span class="gradient-text">stores that sell</span></h2>

    <div class="stats-row reveal">
        <div class="stat-card"><div class="stat-number">3+</div><div class="stat-label">Years Experience</div></div>
        <div class="stat-card"><div class="stat-number">20+</div><div class="stat-label">Stores Built</div></div>
        <div class="stat-card"><div class="stat-number">15+</div><div class="stat-label">Happy Clients</div></div>
        <div class="stat-card"><div class="stat-number">2</div><div class="stat-label">Workplaces</div></div>
    </div>

    <div class="reveal" style="color: var(--muted); font-size: 1rem; line-height: 1.9; max-width: 720px;">
        I'm a Shopify Developer with 3+ years of experience specializing in <strong style="color:var(--text)">custom theme development, Liquid templating, front-end development, and third-party API integrations</strong>. I've worked with a diverse range of clients — from startups to established brands — across various industries, building seamless ecommerce experiences that drive growth and customer loyalty. Always eager to take on new challenges and collaborate on innovative projects that make a real impact.
    </div>
</section>

<div class="divider"></div>

<!-- Skills -->
<section id="skills">
    <div class="section-label">Technical skills</div>
    <h2 class="section-title">What I work with</h2>

    <div class="skills-grid">
        <div class="skill-card reveal">
            <div class="skill-card-title">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
                Languages
            </div>
            <div class="tags">
                <span class="tag">JavaScript</span>
                <span class="tag">HTML5</span>
                <span class="tag">CSS3</span>
                <span class="tag">Liquid</span>
            </div>
        </div>

        <div class="skill-card reveal reveal-delay-1">
            <div class="skill-card-title">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>
                Shopify
            </div>
            <div class="tags">
                <span class="tag">Shopify CLI</span>
                <span class="tag">Liquid Templating</span>
                <span class="tag">Custom Themes</span>
                <span class="tag">Dawn Theme</span>
                <span class="tag">Sections & Blocks</span>
                <span class="tag">Metafields</span>
            </div>
        </div>

        <div class="skill-card reveal reveal-delay-2">
            <div class="skill-card-title">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                Frontend
            </div>
            <div class="tags">
                <span class="tag">React</span>
                <span class="tag">Tailwind CSS</span>
                <span class="tag">Bootstrap</span>
                <span class="tag">Responsive Design</span>
                <span class="tag">AJAX</span>
            </div>
        </div>

        <div class="skill-card reveal reveal-delay-3">
            <div class="skill-card-title">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
                Payments & Integrations
            </div>
            <div class="tags">
                <span class="tag">Shopify Payments</span>
                <span class="tag">Stripe</span>
                <span class="tag">PayPal</span>
                <span class="tag">Checkout Extensions</span>
                <span class="tag">3rd Party Apps</span>
            </div>
        </div>

        <div class="skill-card reveal reveal-delay-1">
            <div class="skill-card-title">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"/></svg>
                Shopify APIs
            </div>
            <div class="tags">
                <span class="tag">Storefront API</span>
                <span class="tag">Admin API</span>
                <span class="tag">REST & GraphQL</span>
                <span class="tag">Webhooks</span>
            </div>
        </div>

        <div class="skill-card reveal reveal-delay-2">
            <div class="skill-card-title">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14"/><path d="M4.93 4.93a10 10 0 0 0 0 14.14"/></svg>
                Tools & Version Control
            </div>
            <div class="tags">
                <span class="tag">Git / GitHub</span>
                <span class="tag">Shopify Partner Dashboard</span>
                <span class="tag">Figma</span>
                <span class="tag">VS Code</span>
            </div>
        </div>
    </div>
</section>

<div class="divider"></div>

<!-- Experience -->
<section id="experience">
    <div class="section-label">Work history</div>
    <h2 class="section-title">Professional Experience</h2>

    <div class="timeline">
        <div class="timeline-item reveal">
            <div class="timeline-dot"></div>
            <div class="timeline-header">
                <div>
                    <div class="timeline-role">Shopify Developer</div>
                    <div class="timeline-company">Node Agency LLC</div>
                </div>
                <div class="timeline-meta">2023 – Present · Islamabad</div>
            </div>
            <ul class="timeline-list">
                <li>Built and customized Shopify stores from scratch for international clients.</li>
                <li>Developed custom Liquid themes with dynamic sections, blocks, and metafield-driven content.</li>
                <li>Integrated Shopify Payments, Stripe, and PayPal for seamless checkout experiences.</li>
                <li>Connected third-party apps and tools including reviews, loyalty programs, and email platforms.</li>
                <li>Collaborated with designers to convert Figma mockups into pixel-perfect Shopify storefronts.</li>
                <li>Optimized stores for performance, Core Web Vitals, and mobile responsiveness.</li>
            </ul>
        </div>

        <div class="timeline-item reveal">
            <div class="timeline-dot"></div>
            <div class="timeline-header">
                <div>
                    <div class="timeline-role">Freelance Shopify Developer</div>
                    <div class="timeline-company">Self-Employed</div>
                </div>
                <div class="timeline-meta">2022 – Present · Remote</div>
            </div>
            <ul class="timeline-list">
                <li>Delivered 20+ Shopify stores for clients across fashion, electronics, and lifestyle niches.</li>
                <li>Built custom Shopify themes using Liquid, HTML, CSS, and JavaScript.</li>
                <li>Implemented React-based Shopify Hydrogen storefronts for headless commerce projects.</li>
                <li>Set up and configured payment gateways, shipping rules, and checkout customizations.</li>
                <li>Provided ongoing maintenance, feature additions, and performance improvements.</li>
                <li>Handled client communication, requirements gathering, and project delivery end-to-end.</li>
            </ul>
        </div>
    </div>
</section>

<div class="divider"></div>

<!-- Projects -->
<section id="projects">
    <div class="section-label">Portfolio</div>
    <h2 class="section-title">Key Projects</h2>

    <div class="projects-grid">
        <div class="project-card reveal">
            <div class="project-icon">🛍️</div>
            <div class="project-name">Custom Shopify Theme Development</div>
            <div class="project-industry">E-Commerce · Shopify</div>
            <p class="project-desc">Built fully custom Shopify themes from scratch using Liquid templating, with dynamic sections, custom blocks, and metafield-driven content for multiple international clients.</p>
            <div class="tags">
                <span class="tag">Liquid</span>
                <span class="tag">HTML/CSS</span>
                <span class="tag">JavaScript</span>
                <span class="tag">Shopify CLI</span>
            </div>
        </div>

        <div class="project-card reveal reveal-delay-1">
            <div class="project-icon">💳</div>
            <div class="project-name">Payment Gateway Integrations</div>
            <div class="project-industry">Fintech · Checkout</div>
            <p class="project-desc">Integrated Shopify Payments, Stripe, and PayPal across multiple stores with custom checkout extensions, abandoned cart recovery flows, and order confirmation automations.</p>
            <div class="tags">
                <span class="tag">Shopify Payments</span>
                <span class="tag">Stripe</span>
                <span class="tag">PayPal</span>
                <span class="tag">Checkout API</span>
            </div>
        </div>

        <div class="project-card reveal reveal-delay-2">
            <div class="project-icon">⚛️</div>
            <div class="project-name">Headless Shopify Storefront</div>
            <div class="project-industry">Headless Commerce · React</div>
            <p class="project-desc">Developed a headless Shopify storefront using React and the Storefront API, delivering a blazing-fast, fully custom shopping experience decoupled from the Shopify theme engine.</p>
            <div class="tags">
                <span class="tag">React</span>
                <span class="tag">Storefront API</span>
                <span class="tag">GraphQL</span>
                <span class="tag">Tailwind CSS</span>
            </div>
        </div>

        <div class="project-card reveal">
            <div class="project-icon">🎨</div>
            <div class="project-name">Figma to Shopify Conversions</div>
            <div class="project-industry">UI/UX · Theme Dev</div>
            <p class="project-desc">Converted multiple Figma design files into fully functional, responsive Shopify themes with pixel-perfect accuracy across desktop, tablet, and mobile breakpoints.</p>
            <div class="tags">
                <span class="tag">Figma</span>
                <span class="tag">Liquid</span>
                <span class="tag">Responsive</span>
                <span class="tag">CSS3</span>
            </div>
        </div>

        <div class="project-card reveal reveal-delay-1">
            <div class="project-icon">🔌</div>
            <div class="project-name">Third-Party App Integrations</div>
            <div class="project-industry">Shopify Apps · Automation</div>
            <p class="project-desc">Integrated review platforms (Judge.me, Yotpo), loyalty programs (Smile.io), email marketing (Klaviyo), and live chat tools into existing Shopify stores.</p>
            <div class="tags">
                <span class="tag">Klaviyo</span>
                <span class="tag">Yotpo</span>
                <span class="tag">Smile.io</span>
                <span class="tag">Webhooks</span>
            </div>
        </div>

        <div class="project-card reveal reveal-delay-2">
            <div class="project-icon">📱</div>
            <div class="project-name">Store Performance Optimization</div>
            <div class="project-industry">Performance · SEO</div>
            <p class="project-desc">Audited and optimized multiple Shopify stores for Core Web Vitals, image loading, script deferral, and mobile responsiveness — improving Lighthouse scores significantly.</p>
            <div class="tags">
                <span class="tag">Core Web Vitals</span>
                <span class="tag">Lighthouse</span>
                <span class="tag">SEO</span>
                <span class="tag">Mobile</span>
            </div>
        </div>
    </div>
</section>

<div class="divider"></div>

<!-- Achievements -->
<section>
    <div class="section-label">Impact</div>
    <h2 class="section-title">Key Achievements</h2>

    <div class="achievements-grid">
        <div class="achievement-card reveal">
            <div class="achievement-icon">🏪</div>
            <div class="achievement-text">Built 20+ Shopify stores from scratch for clients across fashion, electronics, and lifestyle niches globally.</div>
        </div>
        <div class="achievement-card reveal reveal-delay-1">
            <div class="achievement-icon">💳</div>
            <div class="achievement-text">Integrated Shopify Payments, Stripe, and PayPal with custom checkout flows across multiple production stores.</div>
        </div>
        <div class="achievement-card reveal reveal-delay-2">
            <div class="achievement-icon">⚛️</div>
            <div class="achievement-text">Delivered headless Shopify storefronts using React and the Storefront GraphQL API for high-performance commerce.</div>
        </div>
        <div class="achievement-card reveal">
            <div class="achievement-icon">🎨</div>
            <div class="achievement-text">Converted complex Figma designs into pixel-perfect, fully responsive Shopify themes with custom Liquid code.</div>
        </div>
        <div class="achievement-card reveal reveal-delay-1">
            <div class="achievement-icon">🚀</div>
            <div class="achievement-text">Optimized stores for Core Web Vitals and mobile performance, improving Lighthouse scores and conversion rates.</div>
        </div>
        <div class="achievement-card reveal reveal-delay-2">
            <div class="achievement-icon">🤝</div>
            <div class="achievement-text">Managed 15+ client relationships end-to-end as a freelancer — from requirements to delivery and ongoing support.</div>
        </div>
    </div>
</section>

<div class="divider"></div>

<!-- Contact -->
<section id="contact">
    <div class="section-label">Get in touch</div>
    <h2 class="section-title">Let's build something great</h2>

    <p class="reveal" style="color:var(--muted); margin-bottom: 2.5rem; max-width: 560px; font-size: 1rem; line-height: 1.8;">
        Looking for a Shopify developer to build or improve your store? Let's talk. I'm available for freelance projects and full-time opportunities.
    </p>

    <div class="contact-grid">
        <div class="contact-card reveal">
            <div class="contact-icon">✉️</div>
            <div>
                <div class="contact-label">Email</div>
                <div class="contact-value">usmankhalid@email.com</div>
            </div>
        </div>

        <div class="contact-card reveal reveal-delay-1">
            <div class="contact-icon">📍</div>
            <div>
                <div class="contact-label">Location</div>
                <div class="contact-value">Islamabad, Pakistan</div>
            </div>
        </div>

        <div class="contact-card reveal reveal-delay-2">
            <div class="contact-icon">💼</div>
            <div>
                <div class="contact-label">LinkedIn</div>
                <div class="contact-value">linkedin.com/in/usmankhalid</div>
            </div>
        </div>

        <div class="contact-card reveal reveal-delay-3">
            <div class="contact-icon">🐙</div>
            <div>
                <div class="contact-label">GitHub</div>
                <div class="contact-value">github.com/usmankhalid</div>
            </div>
        </div>

        <div class="contact-card reveal">
            <div class="contact-icon">🛒</div>
            <div>
                <div class="contact-label">Shopify Partner</div>
                <div class="contact-value">Certified Developer</div>
            </div>
        </div>

        <div class="contact-card reveal reveal-delay-1">
            <div class="contact-icon">🎓</div>
            <div>
                <div class="contact-label">Experience</div>
                <div class="contact-value">3+ Years · Shopify</div>
            </div>
        </div>
    </div>
</section>

<footer>
    <p>Crafted with ❤️ by <strong>Usman Khalid</strong> · Shopify Developer · Islamabad, Pakistan</p>
    <p style="margin-top:0.5rem; font-size:0.75rem;">Shopify · Liquid · React · JavaScript</p>
</footer>

<script>
    const glow = document.getElementById('cursorGlow');
    document.addEventListener('mousemove', e => {
        glow.style.left = e.clientX + 'px';
        glow.style.top = e.clientY + 'px';
    });

    const hamburger = document.getElementById('hamburger');
    const mobileMenu = document.getElementById('mobileMenu');
    hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('open');
        mobileMenu.classList.toggle('open');
    });

    function closeMobile() {
        hamburger.classList.remove('open');
        mobileMenu.classList.remove('open');
    }

    const reveals = document.querySelectorAll('.reveal');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) entry.target.classList.add('visible');
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });
    reveals.forEach(el => observer.observe(el));

    const roles = [
        'Shopify Developer',
        'Custom Theme Builder',
        'Frontend Developer',
        'E-Commerce Specialist',
        'Liquid Template Expert',
    ];
    let roleIndex = 0, charIndex = 0, deleting = false;
    const typingEl = document.getElementById('typingText');

    function type() {
        const current = roles[roleIndex];
        if (!deleting) {
            typingEl.textContent = current.slice(0, charIndex + 1);
            charIndex++;
            if (charIndex === current.length) { deleting = true; setTimeout(type, 1800); return; }
        } else {
            typingEl.textContent = current.slice(0, charIndex - 1);
            charIndex--;
            if (charIndex === 0) { deleting = false; roleIndex = (roleIndex + 1) % roles.length; }
        }
        setTimeout(type, deleting ? 60 : 90);
    }
    setTimeout(type, 1200);

    window.addEventListener('scroll', () => {
        document.getElementById('navbar').style.boxShadow = window.scrollY > 50 ? '0 4px 30px rgba(0,0,0,0.4)' : 'none';
    });
</script>

</body>
</html>
