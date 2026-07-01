@extends('layouts.app')
@section('content')

    <style>
        /* ================================================================
       About Us Page Styles
       ================================================================ */

        /* ----- About Hero Section ----- */
        .about-hero-section {
            width: 100%;
            min-height: 580px;
            background: linear-gradient(135deg, #f0f7f0 0%, #e8f5e9 50%, #ffffff 100%);
            padding: 80px 0;
            position: relative;
            overflow: hidden;
        }

        .about-hero-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 600px;
            height: 600px;
            background: rgba(46, 125, 50, 0.05);
            border-radius: 50%;
        }
 



        .about-hero-content {
            position: relative;
            z-index: 2;
        }

        .about-badge {
            display: inline-block;
            background: #2e7d32;
            color: #fff;
            padding: 6px 20px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 600;
            letter-spacing: 0.5px;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        .about-hero-content h1 {
            font-size: 3.5rem;
            font-weight: 800;
            color: #1b5e20;
            line-height: 1.2;
            margin-bottom: 20px;
        }

        .about-hero-content h1 .highlight-text {
            color: #2e7d32;
            position: relative;
        }

        .about-hero-content h1 .highlight-text::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: #2e7d32;
            border-radius: 2px;
        }

        .about-hero-content p {
            font-size: 1.2rem;
            color: #455a64;
            line-height: 1.8;
            max-width: 500px;
            margin-bottom: 30px;
        }

        .about-hero-buttons {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .about-primary-btn {
            background: #2e7d32;
            color: #fff;
            padding: 12px 35px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: 2px solid #2e7d32;
        }

        .about-primary-btn:hover {
            background: #1b5e20;
            border-color: #1b5e20;
            color: #fff;
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(46, 125, 50, 0.3);
        }

        .about-outline-btn {
            background: transparent;
            color: #2e7d32;
            padding: 12px 35px;
            border-radius: 50px;
            font-weight: 600;
            border: 2px solid #2e7d32;
            transition: all 0.3s ease;
        }

        .about-outline-btn:hover {
            background: #2e7d32;
            color: #fff;
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(46, 125, 50, 0.2);
        }

        .about-hero-image-wrapper {
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .about-hero-img {
            width: 100%;
            max-width: 450px;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.12);
            border: 5px solid #fff;
        }

        .floating-badge {
            position: absolute;
            bottom: -20px;
            right: -10px;
            background: #fff;
            padding: 15px 25px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
            display: flex;
            align-items: center;
            gap: 12px;
            animation: floatBadge 3s ease-in-out infinite;
        }

        .floating-badge i {
            color: #2e7d32;
            font-size: 24px;
        }

        .floating-badge span {
            font-weight: 600;
            color: #1b5e20;
            font-size: 14px;
        }

        @keyframes floatBadge {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        /* ----- Section Headers ----- */
        .section-header {
            margin-bottom: 50px;
        }

        .section-subtitle {
            display: inline-block;
            background: #e8f5e9;
            color: #2e7d32;
            padding: 4px 16px;
            border-radius: 50px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .section-header h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #1b5e20;
            margin-bottom: 10px;
        }

        .section-desc {
            font-size: 1.1rem;
            color: #6b7280;
            max-width: 550px;
            margin: 0 auto;
        }

        /* ----- Mission Section ----- */
        .mission-section {
            padding: 80px 0;
            background: #f9fafb;
        }

        .mission-card {
            background: #fff;
            padding: 40px 30px;
            border-radius: 20px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            height: 100%;
            transition: all 0.3s ease;
            border: 1px solid #f3f4f6;
        }

        .mission-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
        }

        .mission-icon {
            width: 70px;
            height: 70px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            margin-bottom: 20px;
        }

        .bg-green-light {
            background: #e8f5e9;
        }

        .bg-blue-light {
            background: #e3f2fd;
        }

        .text-green-dark {
            color: #2e7d32;
        }

        .text-blue-dark {
            color: #1565c0;
        }

        .mission-card h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 15px;
        }

        .mission-card p {
            color: #6b7280;
            line-height: 1.7;
            margin-bottom: 20px;
        }

        .mission-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .mission-list li {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 6px 0;
            color: #374151;
            font-size: 15px;
        }

        .mission-list li .text-green {
            color: #2e7d32;
        }

        /* ----- Values Section ----- */
        .values-section {
            padding: 80px 0;
            background: #fff;
        }

        .value-card {
            text-align: center;
            padding: 30px 20px;
            border-radius: 16px;
            background: #f9fafb;
            transition: all 0.3s ease;
            height: 100%;
            border: 1px solid transparent;
        }

        .value-card:hover {
            background: #fff;
            border-color: #2e7d32;
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
        }

        .value-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: #e8f5e9;
            color: #2e7d32;
            font-size: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            transition: all 0.3s ease;
        }

        .value-card:hover .value-icon {
            background: #2e7d32;
            color: #fff;
        }

        .value-card h4 {
            font-size: 1.2rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 10px;
        }

        .value-card p {
            color: #6b7280;
            font-size: 14px;
            line-height: 1.6;
            margin: 0;
        }

        /* ----- Team Section ----- */
        .team-section {
            padding: 80px 0;
            background: #f9fafb;
        }

        .team-card {
            background: #fff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            height: 100%;
        }

        .team-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        }

        .team-image-wrapper {
            position: relative;
            overflow: hidden;
        }

        .team-img {
            width: 100%;
            height: 280px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .team-card:hover .team-img {
            transform: scale(1.05);
        }

        .team-social {
            position: absolute;
            bottom: -50px;
            left: 0;
            right: 0;
            display: flex;
            justify-content: center;
            gap: 12px;
            padding: 15px;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);
            transition: bottom 0.4s ease;
        }

        .team-card:hover .team-social {
            bottom: 0;
        }

        .team-social a {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #fff;
            color: #1f2937;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .team-social a:hover {
            background: #2e7d32;
            color: #fff;
            transform: translateY(-3px);
        }

        .team-info {
            padding: 20px 25px 25px;
            text-align: center;
        }

        .team-info h4 {
            font-size: 1.2rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 5px;
        }

        .team-role {
            display: inline-block;
            color: #2e7d32;
            font-size: 13px;
            font-weight: 600;
            background: #e8f5e9;
            padding: 2px 14px;
            border-radius: 50px;
            margin-bottom: 10px;
        }

        .team-bio {
            font-size: 14px;
            color: #6b7280;
            line-height: 1.6;
            margin: 0;
        }

        /* ----- About Counter Section ----- */
        .about-counter-section {
            padding: 70px 0;
            background: linear-gradient(135deg, #1b5e20, #2e7d32);
            color: #fff;
        }

        .about-counter-box {
            padding: 20px;
        }

        .about-counter-icon {
            font-size: 40px;
            color: rgba(255, 255, 255, 0.3);
            margin-bottom: 10px;
        }

        .about-counter-box h2 {
            font-size: 3.2rem;
            font-weight: 800;
            margin-bottom: 5px;
        }

        .about-counter-box p {
            font-size: 1.1rem;
            opacity: 0.9;
            margin: 0;
        }

        /* ----- Journey Timeline Section ----- */
        .journey-section {
            padding: 80px 0;
            background: #fff;
        }

        .timeline {
            position: relative;
            padding: 20px 0;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 50%;
            top: 0;
            bottom: 0;
            width: 3px;
            background: #e8f5e9;
            transform: translateX(-50%);
        }

        .timeline-item {
            position: relative;
            margin-bottom: 50px;
            display: flex;
            justify-content: flex-end;
            padding-right: 55%;
        }

        .timeline-item:nth-child(even) {
            justify-content: flex-start;
            padding-right: 0;
            padding-left: 55%;
        }

        .timeline-dot {
            position: absolute;
            left: 50%;
            top: 5px;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: #2e7d32;
            border: 4px solid #fff;
            box-shadow: 0 0 0 4px #2e7d32;
            transform: translateX(-50%);
            z-index: 2;
        }

        .timeline-content {
            background: #f9fafb;
            padding: 25px 30px;
            border-radius: 16px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            width: 100%;
            max-width: 420px;
            transition: all 0.3s ease;
            border-left: 4px solid #2e7d32;
        }

        .timeline-item:nth-child(even) .timeline-content {
            border-left: none;
            border-right: 4px solid #2e7d32;
        }

        .timeline-content:hover {
            transform: scale(1.02);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        .timeline-year {
            display: inline-block;
            background: #2e7d32;
            color: #fff;
            padding: 2px 14px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .timeline-content h4 {
            font-size: 1.2rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 8px;
        }

        .timeline-content p {
            color: #6b7280;
            font-size: 14px;
            line-height: 1.7;
            margin: 0;
        }

        /* ----- CTA Section ----- */
        .about-cta-section {
            padding: 80px 0;
            background: #f9fafb;
        }

        .about-cta-content {
            text-align: center;
            max-width: 700px;
            margin: 0 auto;
        }

        .about-cta-content h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #1b5e20;
            margin-bottom: 15px;
        }

        .about-cta-content p {
            font-size: 1.1rem;
            color: #6b7280;
            line-height: 1.8;
            margin-bottom: 30px;
        }

        .about-cta-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .about-cta-primary {
            background: #2e7d32;
            color: #fff;
            padding: 14px 40px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: 2px solid #2e7d32;
        }

        .about-cta-primary:hover {
            background: #1b5e20;
            border-color: #1b5e20;
            color: #fff;
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(46, 125, 50, 0.3);
        }

        .about-cta-outline {
            background: transparent;
            color: #2e7d32;
            padding: 14px 40px;
            border-radius: 50px;
            font-weight: 600;
            border: 2px solid #2e7d32;
            transition: all 0.3s ease;
        }

        .about-cta-outline:hover {
            background: #2e7d32;
            color: #fff;
            transform: translateY(-3px);
        }

        /* ----- Responsive Styles ----- */
        @media (max-width: 992px) {
            .about-hero-section {
                min-height: auto;
                padding: 60px 0;
            }

            .about-hero-content h1 {
                font-size: 2.5rem;
            }

            .timeline::before {
                left: 30px;
            }

            .timeline-item {
                padding-right: 0;
                padding-left: 70px;
                justify-content: flex-start;
            }

            .timeline-item:nth-child(even) {
                padding-left: 70px;
                padding-right: 0;
            }

            .timeline-dot {
                left: 30px;
            }

            .timeline-item:nth-child(even) .timeline-content {
                border-left: 4px solid #2e7d32;
                border-right: none;
            }
        }

        @media (max-width: 768px) {
            .about-hero-content h1 {
                font-size: 2rem;
            }

            .about-hero-content p {
                font-size: 1rem;
            }

            .about-hero-buttons {
                flex-direction: column;
                align-items: flex-start;
            }

            .about-primary-btn,
            .about-outline-btn {
                width: 100%;
                text-align: center;
            }

            .section-header h2 {
                font-size: 2rem;
            }

            .about-counter-box h2 {
                font-size: 2.5rem;
            }

            .about-cta-content h2 {
                font-size: 2rem;
            }

            .about-cta-buttons {
                flex-direction: column;
                align-items: center;
            }

            .about-cta-primary,
            .about-cta-outline {
                width: 100%;
                text-align: center;
            }

            .floating-badge {
                display: none;
            }

            .about-hero-img {
                margin-top: 30px;
            }
        }

        @media (max-width: 480px) {
            .about-hero-content h1 {
                font-size: 1.7rem;
            }

            .timeline-content {
                padding: 20px;
            }

            .timeline-content h4 {
                font-size: 1rem;
            }
        }
    </style>

    <!-- ============================================================
         About Hero Section
         ============================================================ -->
    <section class="about-hero-section d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="about-hero-content">
                        <span class="about-badge">Know About Us</span>
                        <h1>Empowering Indian Farmers <br>with <span class="highlight-text">Smart Agriculture</span></h1>
                        <p>
                            KishanSewa is a revolutionary digital platform dedicated to transforming
                            Indian agriculture through technology, knowledge, and innovation.
                        </p>
                        <div class="about-hero-buttons">
                            <a href="#mission" class="btn about-primary-btn">Our Mission</a>
                            <a href="#team" class="btn about-outline-btn">Meet Our Team</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 d-none d-lg-block">
                    <div class="about-hero-image-wrapper">
                        <img src="/image/farmer-team.jpg" alt="KishanSewa Team" class="about-hero-img">
                        <div class="floating-badge experience-badge">
                            <i class="fas fa-calendar-check"></i>
                            <span>5+ Years of Service</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
         Our Mission & Vision Section
         ============================================================ -->
    <section class="mission-section" id="mission">
        <div class="container">
            <div class="section-header text-center">
                <span class="section-subtitle">Our Core Purpose</span>
                <h2>Mission &amp; Vision</h2>
                <p class="section-desc">What drives us every day to serve the farming community.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="mission-card">
                        <div class="mission-icon bg-green-light">
                            <i class="fas fa-bullseye text-green-dark"></i>
                        </div>
                        <h3>Our Mission</h3>
                        <p>
                            To empower every Indian farmer with real-time agricultural insights,
                            expert advisory, and access to government schemes through an easy-to-use
                            digital platform.
                        </p>
                        <ul class="mission-list">
                            <li><i class="fas fa-check-circle text-green"></i> Provide accurate crop information</li>
                            <li><i class="fas fa-check-circle text-green"></i> Offer AI-based disease detection</li>
                            <li><i class="fas fa-check-circle text-green"></i> Connect farmers with experts</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mission-card">
                        <div class="mission-icon bg-blue-light">
                            <i class="fas fa-eye text-blue-dark"></i>
                        </div>
                        <h3>Our Vision</h3>
                        <p>
                            To create a sustainable and prosperous agricultural ecosystem in India
                            where every farmer, regardless of their land size, has access to modern
                            farming technologies and resources.
                        </p>
                        <ul class="mission-list">
                            <li><i class="fas fa-check-circle text-green"></i> Digital inclusion for all farmers</li>
                            <li><i class="fas fa-check-circle text-green"></i> Sustainable farming practices</li>
                            <li><i class="fas fa-check-circle text-green"></i> Doubling farmer income by 2030</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
         Our Values Section
         ============================================================ -->
    <section class="values-section">
        <div class="container">
            <div class="section-header text-center">
                <span class="section-subtitle">What We Believe In</span>
                <h2>Our Core Values</h2>
                <p class="section-desc">The principles that guide everything we do at KishanSewa.</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-hand-holding-heart"></i>
                        </div>
                        <h4>Farmer First</h4>
                        <p>Every decision we make prioritizes the well-being and success of farmers.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <h4>Innovation</h4>
                        <p>We embrace cutting-edge technology to solve real-world agricultural challenges.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h4>Community</h4>
                        <p>We believe in the power of collective knowledge and farmer-to-farmer learning.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-leaf"></i>
                        </div>
                        <h4>Sustainability</h4>
                        <p>We promote eco-friendly and sustainable agricultural practices.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
         Team Section
         ============================================================ -->
    <section class="team-section" id="team">
        <div class="container">
            <div class="section-header text-center">
                <span class="section-subtitle">Meet Our Team</span>
                <h2>Our Leadership</h2>
                <p class="section-desc">Passionate professionals dedicated to serving the farming community.</p>
            </div>
            <div class="row g-4 justify-content-center">

                <!-- Team Member 1 -->
                <div class="col-lg-3 col-md-6">
                    <div class="team-card">
                        <div class="team-image-wrapper">
                            <img src="/image/team1.jpg" alt="Team Member" class="team-img">
                            <div class="team-social">
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                        <div class="team-info">
                            <h4>Dr. Rajesh Kumar</h4>
                            <span class="team-role">Founder &amp; CEO</span>
                            <p class="team-bio">Agricultural scientist with 15+ years of experience in crop research.</p>
                        </div>
                    </div>
                </div>

                <!-- Team Member 2 -->
                <div class="col-lg-3 col-md-6">
                    <div class="team-card">
                        <div class="team-image-wrapper">
                            <img src="/image/team2.jpg" alt="Team Member" class="team-img">
                            <div class="team-social">
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                        <div class="team-info">
                            <h4>Priya Sharma</h4>
                            <span class="team-role">Head of Agri-Tech</span>
                            <p class="team-bio">AI specialist and agri-tech innovator with a passion for rural development.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Team Member 3 -->
                <div class="col-lg-3 col-md-6">
                    <div class="team-card">
                        <div class="team-image-wrapper">
                            <img src="/image/team3.jpg" alt="Team Member" class="team-img">
                            <div class="team-social">
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                        <div class="team-info">
                            <h4>Vikram Singh</h4>
                            <span class="team-role">Head of Farmer Relations</span>
                            <p class="team-bio">Former farmer with deep understanding of grassroots agricultural challenges.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Team Member 4 -->
                <div class="col-lg-3 col-md-6">
                    <div class="team-card">
                        <div class="team-image-wrapper">
                            <img src="/image/team4.jpg" alt="Team Member" class="team-img">
                            <div class="team-social">
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                        <div class="team-info">
                            <h4>Dr. Anjali Patel</h4>
                            <span class="team-role">Senior Agricultural Advisor</span>
                            <p class="team-bio">Plant pathologist and soil expert helping farmers with scientific solutions.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ============================================================
         Achievements / Stats Section
         ============================================================ -->
    <section class="about-counter-section">
        <div class="container">
            <div class="row g-4 text-center">
                <div class="col-lg-3 col-md-6">
                    <div class="about-counter-box">
                        <div class="about-counter-icon">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <h2 class="counter-number" data-target="500">0</h2>
                        <p>Farmers Served</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="about-counter-box">
                        <div class="about-counter-icon">
                            <i class="fas fa-school"></i>
                        </div>
                        <h2 class="counter-number" data-target="150">0</h2>
                        <p>Training Programs</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="about-counter-box">
                        <div class="about-counter-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <h2 class="counter-number" data-target="50">0</h2>
                        <p>Partner Organizations</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="about-counter-box">
                        <div class="about-counter-icon">
                            <i class="fas fa-award"></i>
                        </div>
                        <h2 class="counter-number" data-target="20">0</h2>
                        <p>Awards &amp; Recognitions</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
         Journey / Timeline Section
         ============================================================ -->
    <section class="journey-section">
        <div class="container">
            <div class="section-header text-center">
                <span class="section-subtitle">Our Journey</span>
                <h2>How We Started</h2>
                <p class="section-desc">The story behind KishanSewa and our path to empowering farmers.</p>
            </div>
            <div class="timeline">
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">2020</span>
                        <h4>The Beginning</h4>
                        <p>KishanSewa was founded with a vision to bridge the digital divide in Indian agriculture and
                            provide farmers with modern farming knowledge.</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">2021</span>
                        <h4>AI Crop Advisory Launch</h4>
                        <p>Launched our AI-powered crop advisory system, helping thousands of farmers make better sowing and
                            fertilizer decisions.</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">2022</span>
                        <h4>Government Schemes Integration</h4>
                        <p>Integrated with major government schemes like PM-KISAN, Fasal Bima, and PM-KUSUM to help farmers
                            easily access subsidies.</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">2023</span>
                        <h4>Mobile App Launch</h4>
                        <p>Launched the KishanSewa mobile app, bringing real-time mandi prices, weather updates, and expert
                            advice to farmers' phones.</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">2024</span>
                        <h4>AI Disease Scanner</h4>
                        <p>Introduced the AI Plant Disease Scanner feature, enabling farmers to detect crop diseases
                            instantly using just a photo.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
         Call to Action Section
         ============================================================ -->
    <section class="about-cta-section">
        <div class="container">
            <div class="about-cta-content">
                <h2>Join Our Mission to Empower Farmers</h2>
                <p>
                    Whether you're a farmer, an agricultural expert, or someone passionate about
                    rural development, we invite you to be part of the KishanSewa community.
                </p>
                <div class="about-cta-buttons">
                    <a href="/register" class="btn about-cta-primary">Join KishanSewa</a>
                    <a href="/contact" class="btn about-cta-outline">Get in Touch</a>
                </div>
            </div>
        </div>
     </section>

    <!-- ============================================================
         JavaScript for Counter Animation
         ============================================================ -->
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Animated counter functionality
                const counters = document.querySelectorAll('.counter-number');

                const animateCounter = (counter) => {
                    const target = parseInt(counter.getAttribute('data-target'));
                    let current = 0;
                    const increment = Math.ceil(target / 100);
                    const duration = 2000;
                    const stepTime = Math.floor(duration / 100);

                    const updateCounter = () => {
                        current += increment;
                        if (current >= target) {
                            counter.textContent = target + '+';
                            return;
                        }
                        counter.textContent = current + '+';
                        setTimeout(updateCounter, stepTime);
                    };
                    updateCounter();
                };

                // Intersection Observer for counter animation
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const counter = entry.target;
                            animateCounter(counter);
                            observer.unobserve(counter);
                        }
                    });
                }, { threshold: 0.5 });

                counters.forEach(counter => observer.observe(counter));
            });
        </script>
    @endpush

@endsection