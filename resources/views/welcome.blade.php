<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asad Shoaib — Software Engineer</title>
    <meta name="description" content="Software Engineer with 3+ years of experience in full-stack web development using PHP, Laravel, React, JavaScript, and TypeScript.">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="ask-url" content="{{ url('/resume/ask') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Fira+Code:wght@400;500&display=swap" rel="stylesheet">

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg: #0a0a0f;
            --bg2: #111118;
            --bg3: #16161f;
            --card: #1a1a24;
            --border: #2a2a38;
            --accent: #6366f1;
            --accent2: #8b5cf6;
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

        /* ── Scrollbar ── */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: var(--bg); }
        ::-webkit-scrollbar-thumb { background: var(--accent); border-radius: 3px; }

        /* ── Noise texture overlay ── */
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
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
            padding: 1rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(10, 10, 15, 0.8);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
            transition: all 0.3s ease;
        }

        .nav-logo {
            font-family: 'Fira Code', monospace;
            font-size: 1.1rem;
            font-weight: 500;
            color: var(--accent);
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            list-style: none;
        }

        .nav-links a {
            color: var(--muted);
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
            transition: color 0.2s;
            position: relative;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--accent);
            transition: width 0.3s;
        }

        .nav-links a:hover { color: var(--text); }
        .nav-links a:hover::after { width: 100%; }

        .hamburger {
            display: none;
            flex-direction: column;
            gap: 5px;
            cursor: pointer;
            background: none;
            border: none;
            padding: 4px;
        }

        .hamburger span {
            display: block;
            width: 24px;
            height: 2px;
            background: var(--text);
            border-radius: 2px;
            transition: all 0.3s ease;
        }

        .hamburger.open span:nth-child(1) { transform: translateY(7px) rotate(45deg); }
        .hamburger.open span:nth-child(2) { opacity: 0; }
        .hamburger.open span:nth-child(3) { transform: translateY(-7px) rotate(-45deg); }

        .mobile-menu {
            display: none;
            position: fixed;
            top: 64px;
            left: 0;
            right: 0;
            background: rgba(10, 10, 15, 0.98);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
            padding: 1.5rem 2rem;
            z-index: 99;
            flex-direction: column;
            gap: 1.5rem;
        }

        .mobile-menu.open { display: flex; }
        .mobile-menu a { color: var(--text); text-decoration: none; font-size: 1rem; font-weight: 500; }

        /* ── Hero ── */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 8rem 2rem 4rem;
            position: relative;
            overflow: hidden;
        }

        .hero-glow {
            position: absolute;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(99, 102, 241, 0.15) 0%, transparent 70%);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            pointer-events: none;
            animation: pulse-glow 4s ease-in-out infinite;
        }

        .hero-glow2 {
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(6, 182, 212, 0.1) 0%, transparent 70%);
            top: 30%;
            right: 10%;
            pointer-events: none;
            animation: pulse-glow 5s ease-in-out infinite reverse;
        }

        @keyframes pulse-glow {
            0%, 100% { opacity: 1; transform: translate(-50%, -50%) scale(1); }
            50% { opacity: 0.6; transform: translate(-50%, -50%) scale(1.1); }
        }

        .hero-content {
            text-align: center;
            max-width: 800px;
            position: relative;
            z-index: 1;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(99, 102, 241, 0.1);
            border: 1px solid rgba(99, 102, 241, 0.3);
            color: var(--accent);
            padding: 0.4rem 1rem;
            border-radius: 999px;
            font-size: 0.8rem;
            font-weight: 600;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            margin-bottom: 1.5rem;
            opacity: 0;
            animation: fade-up 0.6s ease forwards 0.2s;
        }

        .hero-badge::before {
            content: '';
            width: 8px;
            height: 8px;
            background: var(--accent);
            border-radius: 50%;
            animation: blink 1.5s ease-in-out infinite;
        }

        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.3; }
        }

        .hero h1 {
            font-size: clamp(2.5rem, 7vw, 5rem);
            font-weight: 900;
            line-height: 1.1;
            margin-bottom: 1rem;
            opacity: 0;
            animation: fade-up 0.6s ease forwards 0.4s;
        }

        .gradient-text {
            background: linear-gradient(135deg, #6366f1, #8b5cf6, #06b6d4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-subtitle {
            font-family: 'Fira Code', monospace;
            font-size: clamp(0.9rem, 2.5vw, 1.1rem);
            color: var(--muted);
            margin-bottom: 2rem;
            opacity: 0;
            animation: fade-up 0.6s ease forwards 0.6s;
        }

        .typing-text {
            color: var(--accent3);
        }

        .hero-desc {
            font-size: 1.05rem;
            color: var(--muted);
            max-width: 600px;
            margin: 0 auto 2.5rem;
            opacity: 0;
            animation: fade-up 0.6s ease forwards 0.8s;
        }

        .hero-actions {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
            opacity: 0;
            animation: fade-up 0.6s ease forwards 1s;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.75rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.9rem;
            text-decoration: none;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--accent), var(--accent2));
            color: white;
            border: none;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(99, 102, 241, 0.4);
        }

        .btn-outline {
            background: transparent;
            color: var(--text);
            border: 1px solid var(--border);
        }

        .btn-outline:hover {
            border-color: var(--accent);
            color: var(--accent);
            transform: translateY(-2px);
        }

        .scroll-indicator {
            position: absolute;
            bottom: 2rem;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
            color: var(--dim);
            font-size: 0.75rem;
            opacity: 0;
            animation: fade-up 0.6s ease forwards 1.4s;
        }

        .scroll-indicator .mouse {
            width: 24px;
            height: 38px;
            border: 2px solid var(--dim);
            border-radius: 12px;
            position: relative;
        }

        .scroll-indicator .wheel {
            width: 4px;
            height: 8px;
            background: var(--accent);
            border-radius: 2px;
            position: absolute;
            top: 6px;
            left: 50%;
            transform: translateX(-50%);
            animation: scroll-wheel 1.5s ease-in-out infinite;
        }

        @keyframes scroll-wheel {
            0% { top: 6px; opacity: 1; }
            100% { top: 20px; opacity: 0; }
        }

        /* ── Section ── */
        section {
            padding: 5rem 2rem;
            max-width: 1100px;
            margin: 0 auto;
        }

        .section-label {
            font-family: 'Fira Code', monospace;
            font-size: 0.8rem;
            color: var(--accent);
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .section-label::before {
            content: '';
            width: 32px;
            height: 2px;
            background: var(--accent);
        }

        .section-title {
            font-size: clamp(1.75rem, 4vw, 2.5rem);
            font-weight: 800;
            margin-bottom: 3rem;
            color: var(--text);
        }

        /* ── Skills ── */
        .skills-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.5rem;
        }

        .skill-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 1.5rem;
            transition: all 0.3s ease;
        }

        .skill-card:hover {
            border-color: var(--accent);
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(99, 102, 241, 0.1);
        }

        .skill-card-title {
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--accent);
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .tags {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .tag {
            background: rgba(99, 102, 241, 0.08);
            border: 1px solid rgba(99, 102, 241, 0.2);
            color: var(--muted);
            padding: 0.3rem 0.75rem;
            border-radius: 6px;
            font-size: 0.8rem;
            font-weight: 500;
            transition: all 0.2s;
        }

        .tag:hover {
            background: rgba(99, 102, 241, 0.2);
            color: var(--text);
            border-color: var(--accent);
        }

        /* ── Timeline ── */
        .timeline {
            position: relative;
            padding-left: 2rem;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 2px;
            background: linear-gradient(to bottom, var(--accent), var(--accent2), transparent);
        }

        .timeline-item {
            position: relative;
            padding-bottom: 3rem;
            padding-left: 2rem;
        }

        .timeline-item:last-child { padding-bottom: 0; }

        .timeline-dot {
            position: absolute;
            left: -2.4rem;
            top: 0.4rem;
            width: 12px;
            height: 12px;
            background: var(--accent);
            border-radius: 50%;
            border: 2px solid var(--bg);
            box-shadow: 0 0 12px var(--accent);
        }

        .timeline-header {
            display: flex;
            flex-wrap: wrap;
            align-items: flex-start;
            gap: 0.75rem;
            margin-bottom: 0.5rem;
        }

        .timeline-role {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--text);
        }

        .timeline-company {
            color: var(--accent);
            font-weight: 600;
        }

        .timeline-meta {
            font-size: 0.8rem;
            color: var(--accent3);
            font-family: 'Fira Code', monospace;
            background: rgba(6, 182, 212, 0.08);
            border: 1px solid rgba(6, 182, 212, 0.35);
            padding: 0.3rem 0.8rem;
            border-radius: 6px;
            margin-left: auto;
            font-weight: 600;
            letter-spacing: 0.02em;
        }

        .timeline-list {
            list-style: none;
            margin-top: 0.75rem;
            display: flex;
            flex-direction: column;
            gap: 0.4rem;
        }

        .timeline-list li {
            font-size: 0.9rem;
            color: var(--muted);
            display: flex;
            align-items: flex-start;
            gap: 0.5rem;
        }

        .timeline-list li::before {
            content: '▹';
            color: var(--accent);
            flex-shrink: 0;
            margin-top: 0.05em;
        }

        /* ── Projects ── */
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 1.5rem;
        }

        .project-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 1.75rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .project-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--accent), var(--accent2));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s ease;
        }

        .project-card:hover::before { transform: scaleX(1); }

        .project-card:hover {
            transform: translateY(-4px);
            border-color: rgba(99, 102, 241, 0.4);
            box-shadow: 0 16px 40px rgba(99, 102, 241, 0.1);
        }

        .project-icon {
            font-size: 1.75rem;
            margin-bottom: 1rem;
        }

        .project-name {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 0.4rem;
        }

        .project-industry {
            font-size: 0.75rem;
            color: var(--accent3);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 0.75rem;
        }

        .project-desc {
            font-size: 0.875rem;
            color: var(--muted);
            margin-bottom: 1.25rem;
            line-height: 1.7;
        }

        .project-link {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            margin-top: 1rem;
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--accent3);
            text-decoration: none;
            border: 1px solid rgba(6, 182, 212, 0.3);
            padding: 0.3rem 0.8rem;
            border-radius: 6px;
            transition: all 0.2s;
        }

        .project-link:hover {
            background: rgba(6, 182, 212, 0.1);
            border-color: var(--accent3);
            transform: translateY(-1px);
        }

        /* ── Achievements ── */
        .achievements-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1rem;
        }

        .achievement-card {
            display: flex;
            gap: 1rem;
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 1.25rem;
            transition: all 0.3s ease;
            align-items: flex-start;
        }

        .achievement-card:hover {
            border-color: var(--accent);
            transform: translateX(4px);
        }

        .achievement-icon {
            font-size: 1.5rem;
            flex-shrink: 0;
            margin-top: 0.1rem;
        }

        .achievement-text {
            font-size: 0.875rem;
            color: var(--muted);
            line-height: 1.6;
        }

        /* ── Stats ── */
        .stats-row {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            margin-bottom: 4rem;
        }

        .stat-card {
            flex: 1;
            min-width: 140px;
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 1.5rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .stat-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--accent), var(--accent2));
        }

        .stat-number {
            font-size: 2.25rem;
            font-weight: 900;
            background: linear-gradient(135deg, var(--accent), var(--accent3));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1;
            margin-bottom: 0.25rem;
        }

        .stat-label {
            font-size: 0.8rem;
            color: var(--dim);
            font-weight: 500;
        }

        /* ── Contact ── */
        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 1rem;
        }

        .contact-card {
            display: flex;
            align-items: center;
            gap: 1rem;
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 1.25rem;
            text-decoration: none;
            color: var(--text);
            transition: all 0.3s ease;
        }

        .contact-card:hover {
            border-color: var(--accent);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(99, 102, 241, 0.15);
        }

        .contact-icon {
            width: 44px;
            height: 44px;
            background: rgba(99, 102, 241, 0.1);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            flex-shrink: 0;
        }

        .contact-label { font-size: 0.75rem; color: var(--dim); }
        .contact-value { font-size: 0.9rem; font-weight: 600; color: var(--text); }

        /* ── Resume Q&A ── */
        .qa-suggestions {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 0.6rem;
        }

        .qa-suggestion-label {
            font-size: 0.78rem;
            color: var(--dim);
            font-weight: 500;
            margin-right: 0.25rem;
        }

        .suggestion-chip {
            background: rgba(99, 102, 241, 0.07);
            border: 1px solid rgba(99, 102, 241, 0.25);
            color: var(--muted);
            padding: 0.35rem 0.9rem;
            border-radius: 999px;
            font-size: 0.8rem;
            cursor: pointer;
            transition: all 0.2s;
            font-family: 'Inter', sans-serif;
        }

        .suggestion-chip:hover {
            background: rgba(99, 102, 241, 0.18);
            border-color: var(--accent);
            color: var(--text);
        }

        .qa-box {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 1.75rem;
            max-width: 760px;
            transition: border-color 0.3s;
        }

        .qa-box:focus-within {
            border-color: rgba(99, 102, 241, 0.5);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.08);
        }

        .qa-input-row {
            display: flex;
            gap: 0.75rem;
        }

        .qa-input {
            flex: 1;
            background: var(--bg2);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 0.85rem 1.1rem;
            color: var(--text);
            font-size: 0.95rem;
            font-family: 'Inter', sans-serif;
            outline: none;
            transition: border-color 0.2s;
        }

        .qa-input::placeholder { color: var(--dim); }

        .qa-input:focus {
            border-color: var(--accent);
        }

        .qa-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: linear-gradient(135deg, var(--accent), var(--accent2));
            color: white;
            border: none;
            border-radius: 10px;
            padding: 0.85rem 1.4rem;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            white-space: nowrap;
            font-family: 'Inter', sans-serif;
        }

        .qa-btn:hover:not(:disabled) {
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(99, 102, 241, 0.4);
        }

        .qa-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        .qa-spinner {
            animation: spin-anim 0.8s linear infinite;
        }

        @keyframes spin-anim {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .qa-answer {
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--border);
            animation: fade-up 0.4s ease;
        }

        .qa-answer-header {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 0.85rem;
        }

        .qa-answer-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            background: rgba(99, 102, 241, 0.12);
            border: 1px solid rgba(99, 102, 241, 0.3);
            color: var(--accent);
            padding: 0.25rem 0.7rem;
            border-radius: 999px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .qa-answer-note {
            font-size: 0.75rem;
            color: var(--dim);
        }

        .qa-error {
            margin-top: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #f87171;
            font-size: 0.875rem;
            animation: fade-up 0.3s ease;
        }

        .hidden { display: none !important; }

        /* ── Footer ── */
        footer {
            text-align: center;
            padding: 2rem;
            border-top: 1px solid var(--border);
            color: var(--dim);
            font-size: 0.85rem;
            font-family: 'Fira Code', monospace;
        }

        /* ── Animations ── */
        @keyframes fade-up {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .reveal-delay-1 { transition-delay: 0.1s; }
        .reveal-delay-2 { transition-delay: 0.2s; }
        .reveal-delay-3 { transition-delay: 0.3s; }
        .reveal-delay-4 { transition-delay: 0.4s; }

        /* ── Divider ── */
        .divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--border), transparent);
            margin: 0 2rem;
        }

        /* ── Cursor glow ── */
        .cursor-glow {
            position: fixed;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(99, 102, 241, 0.06) 0%, transparent 70%);
            pointer-events: none;
            z-index: 0;
            transform: translate(-50%, -50%);
            transition: left 0.1s ease, top 0.1s ease;
        }

        /* ── Mobile ── */
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
    <a href="#home" class="nav-logo">asad.dev</a>
    <ul class="nav-links">
        <li><a href="#about">About</a></li>
        <li><a href="#skills">Skills</a></li>
        <li><a href="#experience">Experience</a></li>
        <li><a href="#projects">Projects</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="#ask" style="color:var(--accent); font-weight:600;">✦ Ask AI</a></li>
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
    <a href="#ask" onclick="closeMobile()" style="color:var(--accent); font-weight:700;">✦ Ask AI</a>
</div>

<!-- Hero -->
<section class="hero" id="home">
    <div class="hero-glow"></div>
    <div class="hero-glow2"></div>
    <div class="hero-content">
        <div class="hero-badge">Available for opportunities</div>
        <h1>
            Hi, I'm <span class="gradient-text">Asad Shoaib</span>
        </h1>
        <p class="hero-subtitle">
            <span class="typing-text" id="typingText"></span><span style="color:var(--accent);animation:blink 1s infinite;">|</span>
        </p>
        <p class="hero-desc">
            Software Engineer with 3+ years of experience building scalable full-stack applications across logistics, immigration, real estate, and education industries.
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

<!-- About / Stats -->
<section id="about">
    <div class="section-label">About me</div>
    <h2 class="section-title">Building things that <span class="gradient-text">matter</span></h2>

    <div class="stats-row reveal">
        <div class="stat-card"><div class="stat-number">3+</div><div class="stat-label">Years Experience</div></div>
        <div class="stat-card"><div class="stat-number">10+</div><div class="stat-label">Projects Delivered</div></div>
        <div class="stat-card"><div class="stat-number">5+</div><div class="stat-label">Industries Served</div></div>
        <div class="stat-card"><div class="stat-number">4</div><div class="stat-label">Companies</div></div>
    </div>

    <div class="reveal" style="color: var(--muted); font-size: 1rem; line-height: 1.9; max-width: 720px;">
        I'm a full-stack Software Engineer specializing in <strong style="color:var(--text)">PHP, Laravel, React, and TypeScript</strong>. I've shipped production systems ranging from AI-powered immigration platforms to real-time cargo dispatch systems with live tracking and WebSocket-driven notifications. I care deeply about clean architecture, efficient APIs, and end-to-end ownership — from database schema to UI.
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
                <span class="tag">PHP</span>
                <span class="tag">JavaScript</span>
                <span class="tag">TypeScript</span>
                <span class="tag">HTML5</span>
                <span class="tag">CSS3</span>
            </div>
        </div>

        <div class="skill-card reveal reveal-delay-1">
            <div class="skill-card-title">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>
                Frameworks & Libraries
            </div>
            <div class="tags">
                <span class="tag">Laravel</span>
                <span class="tag">React</span>
                <span class="tag">Next.js</span>
                <span class="tag">Bootstrap</span>
                <span class="tag">Mantine UI</span>
                <span class="tag">jQuery</span>
            </div>
        </div>

        <div class="skill-card reveal reveal-delay-2">
            <div class="skill-card-title">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/></svg>
                Databases & Infra
            </div>
            <div class="tags">
                <span class="tag">MySQL</span>
                <span class="tag">Firebase</span>
                <span class="tag">REST APIs</span>
                <span class="tag">Git / GitHub</span>
            </div>
        </div>

        <div class="skill-card reveal reveal-delay-3">
            <div class="skill-card-title">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"/><polyline points="13 2 13 9 20 9"/></svg>
                Laravel Ecosystem
            </div>
            <div class="tags">
                <span class="tag">Breeze</span>
                <span class="tag">Spatie</span>
                <span class="tag">Sanctum</span>
                <span class="tag">Queues</span>
                <span class="tag">Broadcasting</span>
                <span class="tag">PDF/Excel</span>
            </div>
        </div>

        <div class="skill-card reveal reveal-delay-1">
            <div class="skill-card-title">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                Real-Time / WebSockets
            </div>
            <div class="tags">
                <span class="tag">Pusher</span>
                <span class="tag">Laravel Reverb</span>
                <span class="tag">WebSockets</span>
                <span class="tag">Live Tracking</span>
            </div>
        </div>

        <div class="skill-card reveal reveal-delay-2">
            <div class="skill-card-title">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                Specialized
            </div>
            <div class="tags">
                <span class="tag">CRM / CMS / ERP</span>
                <span class="tag">AI / OCR</span>
                <span class="tag">Job Boards</span>
                <span class="tag">Visa Systems</span>
                <span class="tag">Shopify Liquid</span>
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
                    <div class="timeline-role">Software Engineer</div>
                    <div class="timeline-company">UK Visa Works</div>
                </div>
                <div class="timeline-meta">Jan 2025 – Present · Rawalpindi</div>
            </div>
            <ul class="timeline-list">
                <li>Architected a comprehensive job board with advanced filtering, employer dashboards, and candidate tracking.</li>
                <li>Built a complete UK visa process flow covering application stages, document checklists, and case management.</li>
                <li>Integrated AI-powered OCR for automated document scanning and data extraction from passports and visas.</li>
                <li>Designed scalable REST APIs supporting immigration and recruitment modules.</li>
                <li>Implemented secure role-based access for applicants, employers, case workers, and admins.</li>
            </ul>
        </div>

        <div class="timeline-item reveal">
            <div class="timeline-dot"></div>
            <div class="timeline-header">
                <div>
                    <div class="timeline-role">Software Engineer</div>
                    <div class="timeline-company">Node Agency LLC</div>
                </div>
                <div class="timeline-meta">Apr 2025 – Present · Islamabad</div>
            </div>
            <ul class="timeline-list">
                <li>Built a complete cargo dispatch system with CRUD for customers, drivers, vehicles, and shipments.</li>
                <li>Automated shipment assignment workflows for smooth allocation of vehicles and drivers.</li>
                <li>Developed React portals for drivers and customers with live tracking and real-time status updates.</li>
                <li>Implemented real-time communication via WebSockets, Pusher, Laravel Reverb, and Queues.</li>
            </ul>
        </div>

        <div class="timeline-item reveal">
            <div class="timeline-dot"></div>
            <div class="timeline-header">
                <div>
                    <div class="timeline-role">Software Engineer</div>
                    <div class="timeline-company">IG Tech</div>
                </div>
                <div class="timeline-meta">Jan 2024 – Apr 2025 · Islamabad</div>
            </div>
            <ul class="timeline-list">
                <li>Delivered a Learning Management System (React + Laravel APIs) for students and instructors.</li>
                <li>Built and launched a solar company website with API-driven backend for lead management.</li>
                <li>Enhanced a real estate web application with admin panel and frontend property listing modules.</li>
            </ul>
        </div>

        <div class="timeline-item reveal">
            <div class="timeline-dot"></div>
            <div class="timeline-header">
                <div>
                    <div class="timeline-role">Software Development Intern</div>
                    <div class="timeline-company">DatumSquare</div>
                </div>
                <div class="timeline-meta">Oct 2023 – Dec 2023 · Islamabad</div>
            </div>
            <ul class="timeline-list">
                <li>Developed a Task Management System with CRUD operations and role-based access.</li>
                <li>Strengthened practical knowledge of PHP, Laravel, and MySQL in real-world projects.</li>
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
            <div class="project-icon">🛂</div>
            <div class="project-name">UK Visa Works Platform</div>
            <div class="project-industry">Immigration · Job Board</div>
            <p class="project-desc">Full visa process flow system with AI-powered OCR for document scanning, job board with employer dashboards, candidate tracking, and automated notifications.</p>
            <div class="tags">
                <span class="tag">Laravel</span>
                <span class="tag">React</span>
                <span class="tag">AI/OCR</span>
                <span class="tag">REST API</span>
            </div>
        </div>

        <div class="project-card reveal reveal-delay-1">
            <div class="project-icon">🚛</div>
            <div class="project-name">Cargo Dispatch System</div>
            <div class="project-industry">Logistics · Real-Time · Full-Stack</div>
            <p class="project-desc">Complete dispatch platform with live GPS shipment tracking, toll tax estimation, weather condition monitoring, automated driver assignment, WebSocket notifications, and React portals for drivers and customers.</p>
            <div class="tags">
                <span class="tag">Laravel</span>
                <span class="tag">React</span>
                <span class="tag">Pusher</span>
                <span class="tag">Reverb</span>
                <span class="tag">Toll Estimation</span>
                <span class="tag">Weather API</span>
            </div>
            <a href="https://cargodispatch.co/dispatch/public/admin" target="_blank" rel="noopener" class="project-link">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                Live Site
            </a>
        </div>

        <div class="project-card reveal reveal-delay-2">
            <div class="project-icon">🎓</div>
            <div class="project-name">Learning Management System</div>
            <div class="project-industry">Education · SaaS</div>
            <p class="project-desc">LMS platform for students and instructors across multiple course categories, with role-based access, course management, and progress tracking.</p>
            <div class="tags">
                <span class="tag">React</span>
                <span class="tag">Laravel API</span>
                <span class="tag">MySQL</span>
            </div>
        </div>

        <div class="project-card reveal">
            <div class="project-icon">💰</div>
            <div class="project-name">NewRich.com</div>
            <div class="project-industry">Finance · React · Admin Panel</div>
            <p class="project-desc">Integrated React-based API implementation for the admin panel of NewRich.com — handling data management, analytics, and content operations through a modern, responsive interface.</p>
            <div class="tags">
                <span class="tag">React</span>
                <span class="tag">REST API</span>
                <span class="tag">Admin Panel</span>
                <span class="tag">TypeScript</span>
            </div>
            <a href="https://newrich.com/" target="_blank" rel="noopener" class="project-link">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                Live Site
            </a>
        </div>

        <div class="project-card reveal reveal-delay-1">
            <div class="project-icon">🎬</div>
            <div class="project-name">TheMaxHyped</div>
            <div class="project-industry">Entertainment · Media</div>
            <p class="project-desc">Live entertainment and media platform. Handled Laravel backend maintenance, security patches, performance optimization, and private client dashboard management.</p>
            <div class="tags">
                <span class="tag">Laravel</span>
                <span class="tag">Bootstrap</span>
                <span class="tag">Maintenance</span>
            </div>
            <a href="https://themaxhyped.com/" target="_blank" rel="noopener" class="project-link">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                Live Site
            </a>
        </div>

        <div class="project-card reveal reveal-delay-2">
            <div class="project-icon">🏛️</div>
            <div class="project-name">MDesigns Architects</div>
            <div class="project-industry">Architecture · Design</div>
            <p class="project-desc">Maintained and enhanced the Laravel backend of a professional architecture firm website, developed new frontend sections, and built a private client dashboard for project tracking, document sharing, and milestone visibility.</p>
            <div class="tags">
                <span class="tag">Laravel</span>
                <span class="tag">HTML5</span>
                <span class="tag">Bootstrap</span>
                <span class="tag">Client Dashboard</span>
            </div>
            <a href="https://www.mdesignsarchitects.com/" target="_blank" rel="noopener" class="project-link">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                Live Site
            </a>
        </div>

        <div class="project-card reveal reveal-delay-2">
            <div class="project-icon">☀️</div>
            <div class="project-name">Bridge2Solar</div>
            <div class="project-industry">Solar Energy · USA · Full-Stack</div>
            <p class="project-desc">Built the complete frontend and backend for a US-based solar company bridging roofing and solar industries — contractor lead portal, customer dashboard, and automated workflow integrations.</p>
            <div class="tags">
                <span class="tag">Laravel</span>
                <span class="tag">Bootstrap</span>
                <span class="tag">Full-Stack</span>
                <span class="tag">Lead Mgmt</span>
            </div>
            <a href="https://bridge2solar.com/" target="_blank" rel="noopener" class="project-link">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                Live Site
            </a>
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
            <div class="achievement-icon">🤖</div>
            <div class="achievement-text">Integrated AI-powered OCR to automate passport and visa document scanning, extraction, and validation.</div>
        </div>
        <div class="achievement-card reveal reveal-delay-1">
            <div class="achievement-icon">📡</div>
            <div class="achievement-text">Implemented WebSockets (Pusher, Laravel Reverb) for real-time chat, notifications, and live shipment updates.</div>
        </div>
        <div class="achievement-card reveal reveal-delay-2">
            <div class="achievement-icon">🔌</div>
            <div class="achievement-text">Built scalable REST APIs supporting dispatching, tracking, communication, and immigration workflow modules.</div>
        </div>
        <div class="achievement-card reveal">
            <div class="achievement-icon">🔐</div>
            <div class="achievement-text">Engineered role-based CRM and CMS systems for logistics, real estate, solar, and education industries.</div>
        </div>
        <div class="achievement-card reveal reveal-delay-1">
            <div class="achievement-icon">🌍</div>
            <div class="achievement-text">Developed and maintained live commercial websites for international clients in solar, architecture, and entertainment.</div>
        </div>
        <div class="achievement-card reveal reveal-delay-2">
            <div class="achievement-icon">🚀</div>
            <div class="achievement-text">Handled end-to-end project ownership from planning and architecture to deployment and maintenance.</div>
        </div>
    </div>
</section>

<div class="divider"></div>

<!-- Resume Q&A -->
<section id="ask">
    <div class="section-label">AI-Powered</div>
    <h2 class="section-title">Ask about my Resume <span class="gradient-text">✦ AI</span></h2>

    <p class="reveal" style="color:var(--muted); margin-bottom: 2rem; max-width: 580px; font-size: 1rem; line-height: 1.8;">
        Have a question about my skills, experience, or projects? Ask anything and get an instant AI-powered answer based on my resume.
    </p>

    <div class="qa-suggestions reveal" style="margin-bottom: 1.5rem;">
        <span class="qa-suggestion-label">Try asking:</span>
        <button class="suggestion-chip" onclick="fillQuestion(this)">What Laravel skills does Asad have?</button>
        <button class="suggestion-chip" onclick="fillQuestion(this)">Has he built real-time systems?</button>
        <button class="suggestion-chip" onclick="fillQuestion(this)">What industries has he worked in?</button>
        <button class="suggestion-chip" onclick="fillQuestion(this)">Tell me about the cargo dispatch project</button>
    </div>

    <div class="qa-box reveal">
        <div class="qa-input-row">
            <input
                type="text"
                id="qaInput"
                class="qa-input"
                placeholder="e.g. What is Asad's experience with React?"
                maxlength="500"
                onkeydown="if(event.key==='Enter') askQuestion()"
            />
            <button class="qa-btn" id="qaBtn" onclick="askQuestion()">
                <span id="qaBtnText">Ask AI</span>
                <svg id="qaBtnIcon" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/>
                </svg>
                <svg id="qaBtnSpinner" class="qa-spinner hidden" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M21 12a9 9 0 1 1-6.219-8.56"/>
                </svg>
            </button>
        </div>

        <div id="qaAnswer" class="qa-answer hidden">
            <div class="qa-answer-header">
                <span class="qa-answer-badge">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    AI Answer
                </span>
                <span class="qa-answer-note">Based on Asad's resume</span>
            </div>
            <p id="qaAnswerText" style="color: var(--text); line-height: 1.8; font-size: 0.95rem;"></p>
        </div>

        <div id="qaError" class="qa-error hidden">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
            <span id="qaErrorText"></span>
        </div>
    </div>
</section>

<div class="divider"></div>

<!-- Contact -->
<section id="contact">
    <div class="section-label">Get in touch</div>
    <h2 class="section-title">Let's work together</h2>

    <p class="reveal" style="color:var(--muted); margin-bottom: 2.5rem; max-width: 560px; font-size: 1rem; line-height: 1.8;">
        I'm open to new opportunities, collaborations, and interesting projects. Whether you have a question or just want to say hi, my inbox is always open.
    </p>

    <div class="contact-grid">
        <a href="mailto:asadshoaib93@gmail.com" class="contact-card reveal">
            <div class="contact-icon">✉️</div>
            <div>
                <div class="contact-label">Email</div>
                <div class="contact-value">asadshoaib93@gmail.com</div>
            </div>
        </a>

        <a href="tel:+923335173287" class="contact-card reveal reveal-delay-1">
            <div class="contact-icon">📱</div>
            <div>
                <div class="contact-label">Phone</div>
                <div class="contact-value">+92 333 5173287</div>
            </div>
        </a>

        <a href="https://linkedin.com/in/asadshoaib" target="_blank" rel="noopener" class="contact-card reveal reveal-delay-2">
            <div class="contact-icon">💼</div>
            <div>
                <div class="contact-label">LinkedIn</div>
                <div class="contact-value">linkedin.com/in/asadshoaib</div>
            </div>
        </a>

        <a href="https://github.com/asadshoaib" target="_blank" rel="noopener" class="contact-card reveal reveal-delay-3">
            <div class="contact-icon">🐙</div>
            <div>
                <div class="contact-label">GitHub</div>
                <div class="contact-value">github.com/asadshoaib</div>
            </div>
        </a>

        <div class="contact-card reveal">
            <div class="contact-icon">📍</div>
            <div>
                <div class="contact-label">Location</div>
                <div class="contact-value">Islamabad, Pakistan</div>
            </div>
        </div>

        <div class="contact-card reveal reveal-delay-1">
            <div class="contact-icon">🎓</div>
            <div>
                <div class="contact-label">Education</div>
                <div class="contact-value">BSCS — FUUAST 2023</div>
            </div>
        </div>
    </div>
</section>

<footer>
    <p>Crafted with ❤️ by <strong>Asad Shoaib</strong> · Full-Stack Software Engineer · Islamabad, Pakistan</p>
    <p style="margin-top:0.5rem; font-size:0.75rem;">PHP · Laravel · React · TypeScript</p>
</footer>

<script>
    // Cursor glow
    const glow = document.getElementById('cursorGlow');
    document.addEventListener('mousemove', e => {
        glow.style.left = e.clientX + 'px';
        glow.style.top = e.clientY + 'px';
    });

    // Hamburger menu
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

    // Scroll reveal
    const reveals = document.querySelectorAll('.reveal');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

    reveals.forEach(el => observer.observe(el));

    // Typing effect
    const roles = [
        'Software Engineer',
        'Laravel Developer',
        'Full-Stack Developer',
        'API Architect',
        'React Developer',
    ];
    let roleIndex = 0, charIndex = 0, deleting = false;
    const typingEl = document.getElementById('typingText');

    function type() {
        const current = roles[roleIndex];
        if (!deleting) {
            typingEl.textContent = current.slice(0, charIndex + 1);
            charIndex++;
            if (charIndex === current.length) {
                deleting = true;
                setTimeout(type, 1800);
                return;
            }
        } else {
            typingEl.textContent = current.slice(0, charIndex - 1);
            charIndex--;
            if (charIndex === 0) {
                deleting = false;
                roleIndex = (roleIndex + 1) % roles.length;
            }
        }
        setTimeout(type, deleting ? 60 : 90);
    }

    setTimeout(type, 1200);

    // Resume Q&A
    function fillQuestion(btn) {
        document.getElementById('qaInput').value = btn.textContent;
        document.getElementById('qaInput').focus();
    }

    async function askQuestion() {
        const input = document.getElementById('qaInput');
        const question = input.value.trim();
        if (!question) return;

        const btn = document.getElementById('qaBtn');
        const btnText = document.getElementById('qaBtnText');
        const btnIcon = document.getElementById('qaBtnIcon');
        const spinner = document.getElementById('qaBtnSpinner');
        const answerBox = document.getElementById('qaAnswer');
        const answerText = document.getElementById('qaAnswerText');
        const errorBox = document.getElementById('qaError');
        const errorText = document.getElementById('qaErrorText');

        // Loading state
        btn.disabled = true;
        btnText.textContent = 'Thinking…';
        btnIcon.classList.add('hidden');
        spinner.classList.remove('hidden');
        answerBox.classList.add('hidden');
        errorBox.classList.add('hidden');

        try {
            const res = await fetch('{{ url("/resume/ask") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({ question }),
            });

            const data = await res.json();

            if (!res.ok || data.error) {
                errorText.textContent = data.error || 'Something went wrong. Please try again.';
                errorBox.classList.remove('hidden');
            } else {
                answerText.textContent = data.answer;
                answerBox.classList.remove('hidden');
                answerBox.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            }
        } catch (e) {
            errorText.textContent = 'Network error. Please check your connection.';
            errorBox.classList.remove('hidden');
        } finally {
            btn.disabled = false;
            btnText.textContent = 'Ask AI';
            btnIcon.classList.remove('hidden');
            spinner.classList.add('hidden');
        }
    }

    // Navbar shadow on scroll
    window.addEventListener('scroll', () => {
        const nav = document.getElementById('navbar');
        nav.style.boxShadow = window.scrollY > 50 ? '0 4px 30px rgba(0,0,0,0.4)' : 'none';
    });
</script>

</body>
</html>
