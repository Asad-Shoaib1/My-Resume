<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ResumeQaController extends Controller
{
    private string $resumeContext = <<<'CV'
ASAD SHOAIB — SOFTWARE ENGINEER | LARAVEL DEVELOPER | FULL-STACK DEVELOPER
Location: GhouriTown, Islamabad, Pakistan
Phone: 0333-5173287
Email: asadshoaib93@gmail.com

PROFESSIONAL SUMMARY:
Software Engineer with 3+ years of experience in full-stack web development using PHP, Laravel, React, JavaScript, and TypeScript. Experienced in building scalable applications across logistics, real estate, solar energy, immigration, and entertainment industries. Skilled in designing efficient systems with features like live tracking, real-time notifications, AI-powered OCR integrations, and automated workflows. Strong focus on delivering secure, optimized, and user-friendly solutions.

TECHNICAL SKILLS:
- Languages: PHP, JavaScript, TypeScript, HTML, CSS
- Databases: MySQL, SQLite, Firebase
- Version Control: Git / GitHub
- Frameworks: Laravel
- Libraries & Tools: React, Bootstrap, jQuery, AJAX, REST APIs, Mantine UI, Firebase (with React & TypeScript)
- Laravel Packages: Breeze, Spatie, Sanctum, PDF/Excel Generator
- WebSockets: Pusher, Laravel Reverb
- Core Laravel Expertise: Broadcasting, Queues, Debugging, API Integration
- Specialized Skills: Enterprise Solutions (CRM, CMS, ERP), Job Boards, Visa Process Systems, AI/OCR Integration
- Additional Skills: Next.js, Shopify Liquid Coding (Medium)
- AI Tools: Claude Code, Cursor

PROFESSIONAL EXPERIENCE:

1. Software Engineer — UK Visa Works (January 2025 – Present | Saddar, Rawalpindi, On-site)
- Architected and developed a comprehensive job board platform with advanced filtering, employer dashboards, and candidate application tracking.
- Built a complete UK visa process flow system covering application stages, document checklists, status tracking, and case management.
- Integrated AI-powered OCR technology to automate document scanning, data extraction, and validation from passports, visas, and supporting documents.
- Developed automated notification systems and workflow triggers for visa application milestones and job application updates.
- Implemented secure role-based access for applicants, employers, case workers, and administrators.
- Designed and deployed scalable REST APIs to support the immigration and recruitment modules.

2. Software Engineer — Node Agency LLC (April 2025 – Present | Islamabad)
- Developed a complete cargo dispatch system with CRUD functionality for customers, drivers, vehicles, and shipments.
- Automated shipment assignment workflows, enabling smooth allocation of vehicles and drivers.
- Built a driver portal (React) for shipment management, allowing drivers to track and update their assigned deliveries.
- Developed a customer portal (React) with live shipment tracking and driver status updates.
- Implemented real-time communication using WebSockets, Pusher, Laravel Reverb, Broadcasting, and Queues for notifications, chat, and live updates.
- Designed and deployed scalable REST APIs to support dispatching, tracking, and communication modules.
- Added toll tax estimation and weather condition tracking features to the dispatch system.
- Live site: https://cargodispatch.co/dispatch/public/admin

3. Software Engineer — IG Tech (January 2024 – April 2025 | Islamabad)
- Delivered a Learning Management System (React + Laravel APIs) used by students and instructors for course management.
- Built and launched a solar company website with API-driven backend for lead management.
- Enhanced a real estate web application with admin panel and frontend modules for property listings.
- Improved multiple existing projects by adding new features, fixing bugs, and optimizing performance.

4. Software Development Intern — DatumSquare (October 2023 – December 2023 | Islamabad)
- Developed a Task Management System with CRUD operations and role-based access for admins and employees.
- Improved task tracking and reporting with secure role-based workflows.
- Strengthened practical knowledge of PHP, Laravel, and MySQL in real-world projects.

KEY ACHIEVEMENTS:
- Built a full-featured job board and UK visa process flow platform with AI-powered OCR document scanning at UK Visa Works.
- Developed a complete cargo dispatch system with real-time tracking, live notifications, toll estimation, weather tracking, and automated driver assignment workflows.
- Delivered a Learning Management System (React + Laravel) for students and instructors across multiple course categories.
- Built scalable REST APIs supporting dispatching, tracking, communication, and immigration workflow modules.
- Integrated WebSockets (Pusher, Laravel Reverb) for real-time chat, notifications, and live shipment status updates.
- Engineered role-based CRM and CMS systems for logistics, real estate, solar, and education industries.
- Developed and maintained live commercial websites for international clients in solar energy, architecture, and entertainment sectors.

PROJECTS:
1. UK Visa Works Platform — Immigration & Job Board system (Laravel, React, AI/OCR, REST API)
2. Cargo Dispatch System — Real-time logistics platform (Laravel, React, Pusher, Reverb, Toll/Weather APIs) — https://cargodispatch.co
3. Learning Management System — Education platform (React, Laravel API, MySQL)
4. NewRich.com — React API implementation for admin panel — https://newrich.com
5. Bridge2Solar — Complete frontend & backend for US solar contractor portal (Laravel, Bootstrap) — https://bridge2solar.com
6. TheMaxHyped — Entertainment/media platform maintenance (Laravel, Bootstrap) — https://themaxhyped.com
7. MDesigns Architects — Architecture firm website with client dashboard (Laravel, Bootstrap) — https://www.mdesignsarchitects.com

EDUCATION:
- Bachelor of Science in Computer Science (BSCS) — Federal Urdu University of Arts, Science & Technology, 2019–2023, Islamabad
- Intermediate in Computer Science (ICS) — Jinnah College, 2017–2019, Islamabad

LANGUAGES: English, Urdu
CV;

    public function ask(Request $request)
    {
        $request->validate(['question' => 'required|string|max:500']);

        $apiKey = config('services.groq.key');
        $model  = config('services.groq.model', 'llama-3.3-70b-versatile');

        if (empty($apiKey)) {
            return response()->json(['error' => 'AI service not configured.'], 503);
        }

        $response = Http::withToken($apiKey)
            ->acceptJson()
            ->post('https://api.groq.com/openai/v1/chat/completions', [
                'model'       => $model,
                'temperature' => 0.3,
                'max_tokens'  => 400,
                'messages'    => [
                    [
                        'role'    => 'system',
                        'content' => "You are a helpful assistant answering questions about Asad Shoaib's professional profile based strictly on his resume below. Be concise, friendly, and specific. If something is not mentioned in the resume, say so honestly. Never invent information.\n\nRESUME:\n{$this->resumeContext}",
                    ],
                    [
                        'role'    => 'user',
                        'content' => $request->question,
                    ],
                ],
            ]);

        if ($response->failed()) {
            Log::error('Groq resume Q&A failed', ['status' => $response->status(), 'body' => $response->body()]);
            return response()->json(['error' => 'Failed to get a response. Please try again.'], 500);
        }

        $answer = $response->json('choices.0.message.content', 'Sorry, I could not generate a response.');

        return response()->json(['answer' => $answer]);
    }
}
