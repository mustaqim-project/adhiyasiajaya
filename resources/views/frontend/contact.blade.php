@extends('frontend.layouts.master')

@section('content')
@php $socialLinks = \App\Models\SocialLink::where('status', 1)->get(); @endphp
    <style>
        /* ===== FORM STYLES ===== */
        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            margin-bottom: 80px;
        }

        .contact-form {
            background: var(--white);
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            padding: 40px;
            border: 1px solid var(--border-gray);
        }

        .contact-form h2 {
            font-family: 'Montserrat', sans-serif;
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-blue);
            margin-bottom: 10px;
        }

        .contact-form .subtitle {
            color: var(--medium-gray);
            margin-bottom: 30px;
            font-size: 1.1rem;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: var(--dark-gray);
            margin-bottom: 8px;
            font-size: 0.95rem;
        }

        .required {
            color: #e74c3c;
        }

        .form-input,
        .input-field {
            width: 100%;
            padding: 15px;
            border: 2px solid var(--border-gray);
            border-radius: 8px;
            font-size: 1rem;
            font-family: 'Open Sans', sans-serif;
            transition: all 0.3s ease;
            background: var(--white);
        }

        .form-input:focus,
        .input-field:focus {
            outline: none;
            border-color: var(--accent-orange);
            box-shadow: 0 0 0 3px rgba(255, 107, 0, 0.1);
        }

        .form-textarea {
            min-height: 120px;
            resize: vertical;
        }

        .submit-btn {
            background: var(--primary-blue);
            color: var(--white);
            padding: 15px 30px;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
        }

        .submit-btn:hover {
            background: #002347;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 51, 102, 0.3);
        }

        .search-box {
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            padding: 12px 16px;
            font-size: 16px;
            transition: border-color 0.3s ease;
            width: 100%;
            background: white;
        }

        .search-box:focus {
            outline: none;
            border-color: var(--primary-blue);
        }

        /* ===== FILTER & BUTTON STYLES ===== */
        .filter-btn {
            padding: 8px 16px;
            border: 2px solid var(--primary-blue);
            background: white;
            color: var(--primary-blue);
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .filter-btn.active,
        .filter-btn:hover {
            background: var(--primary-blue);
            color: white;
        }

        .category-filter {
            background: var(--light-gray);
            color: var(--dark-gray);
            padding: 8px 16px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .category-filter:hover,
        .category-filter.active {
            background: var(--accent-orange);
            color: white;
        }

        /* ===== TIMELINE STYLES ===== */
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
            width: 4px;
            background: linear-gradient(to bottom, var(--accent-orange), var(--primary-blue));
            transform: translateX(-50%);
        }

        .timeline-item {
            position: relative;
            margin: 40px 0;
            width: 45%;
        }

        .timeline-item:nth-child(odd) {
            left: 0;
            text-align: right;
            padding-right: 50px;
        }

        .timeline-item:nth-child(even) {
            left: 55%;
            text-align: left;
            padding-left: 50px;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            top: 20px;
            width: 20px;
            height: 20px;
            background: var(--accent-orange);
            border: 4px solid white;
            border-radius: 50%;
            box-shadow: 0 0 0 4px var(--accent-orange);
        }

        .timeline-item:nth-child(odd)::before {
            right: -10px;
        }

        .timeline-item:nth-child(even)::before {
            left: -10px;
        }

        /* ===== STATS & COUNTERS ===== */
        .stats-counter,
        .stats-number,
        .stat-number {
            font-size: 3rem;
            font-weight: 800;
            color: var(--accent-orange);
            font-family: 'Montserrat', sans-serif;
            line-height: 1;
            margin-bottom: 10px;
        }

        .stats-section {
            background: var(--neutral-gray);
            padding: 60px 0;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
        }

        .stat-item {
            text-align: center;
        }

        .stat-label {
            font-size: 1.1rem;
            color: var(--text-dark);
            font-weight: 600;
        }

        .stats-box {
            background: linear-gradient(135deg, var(--primary-blue) 0%, #004080 100%);
            color: white;
            padding: 2rem;
            border-radius: 10px;
            text-align: center;
            margin: 2rem 0;
        }

        /* ===== CLIENTS & PROJECTS ===== */
        .clients-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
            margin-bottom: 60px;
        }

        .client-logo {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .client-logo:hover {
            transform: translateY(-5px);
            border-color: var(--accent-orange);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .client-logo img {
            max-width: 100%;
            height: 60px;
            object-fit: contain;
        }

        .client-name {
            font-weight: 600;
            color: var(--primary-blue);
            margin-top: 15px;
            font-size: 18px;
        }

        .client-industry {
            color: var(--text-light);
            font-size: 14px;
            margin-top: 5px;
        }

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            margin-bottom: 60px;
        }

        .project-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .project-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .project-image {
            width: 100%;
            height: 200px;
            background: linear-gradient(45deg, var(--primary-blue), #004080);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
        }

        .project-content {
            padding: 30px;
        }

        .project-title {
            font-size: 1.4rem;
            color: var(--primary-blue);
            margin-bottom: 15px;
        }

        .project-client {
            color: var(--accent-orange);
            font-weight: 600;
            margin-bottom: 10px;
        }

        .project-description {
            color: var(--text-light);
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .project-details {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .project-detail {
            background: var(--neutral-gray);
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            color: var(--text-dark);
        }

        /* ===== TESTIMONIALS ===== */
        .testimonials-section {
            background: var(--primary-blue);
            color: white;
        }

        .testimonial-slider {
            position: relative;
            max-width: 800px;
            margin: 0 auto;
        }

        .testimonial {
            text-align: center;
            padding: 40px;
            display: none;
        }

        .testimonial.active {
            display: block;
        }

        .testimonial-text {
            font-size: 1.3rem;
            line-height: 1.8;
            margin-bottom: 30px;
            font-style: italic;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
        }

        .author-info {
            text-align: left;
        }

        .author-name {
            font-weight: 600;
            font-size: 1.1rem;
        }

        .author-position {
            color: var(--accent-orange);
            font-size: 14px;
        }

        .author-company {
            opacity: 0.8;
            font-size: 14px;
        }

        .slider-controls {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }

        .slider-btn {
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .slider-btn:hover {
            background: var(--accent-orange);
        }

        /* ===== CONTACT INFO ===== */
        .contact-info {
            padding: 40px;
        }

        .contact-info h2 {
            font-family: 'Montserrat', sans-serif;
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-blue);
            margin-bottom: 30px;
        }

        .info-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 30px;
            padding: 20px;
            background: var(--light-gray);
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .info-item:hover {
            background: #f0f0f0;
            transform: translateY(-2px);
        }

        .info-icon {
            background: var(--accent-orange);
            color: var(--white);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
            flex-shrink: 0;
            font-size: 1.2rem;
        }

        .info-content h3 {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--primary-blue);
            margin-bottom: 5px;
        }

        .info-content p {
            color: var(--medium-gray);
            line-height: 1.6;
        }

        .info-content a {
            color: var(--accent-orange);
            text-decoration: none;
            font-weight: 500;
        }

        .info-content a:hover {
            text-decoration: underline;
        }

        /* ===== SOCIAL MEDIA ===== */
        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-link,
        .social-icon,
        .social-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            background: var(--primary-blue);
            color: var(--white);
            border-radius: 50%;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 1.2rem;
        }

        .social-link:hover,
        .social-icon:hover,
        .social-btn:hover {
            background: var(--accent-orange);
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(255, 107, 0, 0.3);
        }

        .social-facebook {
            background-color: #3b5998;
            color: white;
        }

        .social-twitter {
            background-color: #1da1f2;
            color: white;
        }

        .social-linkedin {
            background-color: #0077b5;
            color: white;
        }

        .social-whatsapp {
            background-color: #25d366;
            color: white;
        }

        .social-share {
            display: flex;
            gap: 0.5rem;
            margin-top: 1rem;
        }

        /* ===== COVERAGE & MAP ===== */
        .coverage-map {
            background: linear-gradient(135deg, var(--neutral-gray), #e8f4fd);
            border-radius: 15px;
            padding: 40px;
            text-align: center;
            margin: 40px 0;
        }

        .map-section {
            background: var(--light-gray);
            padding: 80px 0;
        }

        .map-section h2 {
            font-family: 'Montserrat', sans-serif;
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-blue);
            text-align: center;
            margin-bottom: 50px;
        }

        .map-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            height: 450px;
            background: var(--white);
        }

        .map-visual {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .indonesia-map {
            width: 100%;
            max-width: 400px;
            height: 250px;
            background: linear-gradient(135deg, var(--primary-blue), #004080);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .coverage-details h3 {
            color: var(--primary-blue);
            margin-bottom: 20px;
        }

        .coverage-list {
            list-style: none;
        }

        .coverage-item {
            padding: 10px 0;
            border-bottom: 1px solid #e0e0e0;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .coverage-item:last-child {
            border-bottom: none;
        }

        .coverage-icon {
            color: var(--accent-orange);
            width: 20px;
        }

        .map-frame {
            width: 100%;
            height: 100%;
            border: none;
        }

        /* ===== ORGANIZATION CHART ===== */
        .org-chart {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 30px;
        }

        .org-level {
            display: flex;
            justify-content: center;
            gap: 40px;
            flex-wrap: wrap;
        }

        .org-position {
            background: white;
            border: 3px solid var(--primary-blue);
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            min-width: 200px;
            position: relative;
        }

        .org-position::before {
            content: '';
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 0;
            border-left: 15px solid transparent;
            border-right: 15px solid transparent;
            border-bottom: 15px solid var(--primary-blue);
        }

        .org-position:first-child::before {
            display: none;
        }

        /* ===== PARTNERSHIP GRID ===== */
        .partnership-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin: 50px 0;
        }

        /* ===== PRODUCT GALLERY ===== */
        .product-gallery img {
            border-radius: 10px;
            transition: transform 0.3s ease;
        }

        .product-gallery img:hover {
            transform: scale(1.05);
        }

        /* ===== SPEC TABLE ===== */
        .spec-table {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .spec-table th {
            background-color: var(--primary-blue);
            color: white;
            padding: 15px;
            font-weight: 600;
        }

        .spec-table td {
            padding: 15px;
            border-bottom: 1px solid #eee;
        }

        /* ===== CERTIFICATION BADGES ===== */
        .cert-badge {
            background: white;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .cert-badge:hover {
            transform: translateY(-5px);
        }

        /* ===== DOWNLOAD ITEMS ===== */
        .download-item {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .download-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15);
        }

        /* ===== TAB SYSTEM ===== */
        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
            animation: fadeIn 0.5s ease;
        }

        .tab-button {
            padding: 15px 30px;
            border: none;
            background: var(--light-gray);
            color: var(--dark-gray);
            cursor: pointer;
            transition: all 0.3s ease;
            border-radius: 5px 5px 0 0;
            margin-right: 5px;
        }

        .tab-button.active {
            background: var(--primary-blue);
            color: white;
        }

        /* ===== TAGS & MISC ===== */
        .tag {
            display: inline-block;
            background-color: var(--light-gray);
            color: var(--primary-blue);
            padding: 0.3rem 0.8rem;
            border-radius: 15px;
            font-size: 0.8rem;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .tag:hover {
            background-color: var(--accent-orange);
            color: white;
        }

        .language-switcher {
            background: var(--light-gray);
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
        }

        .image-zoom {
            cursor: zoom-in;
        }

        /* ===== ARTICLE CONTENT ===== */
        .custom-primary {
            background-color: var(--primary-blue);
        }

        .custom-accent {
            background-color: var(--accent-orange);
        }

        .custom-light {
            background-color: var(--light-gray);
        }

        .text-primary {
            color: var(--primary-blue);
        }

        .text-accent {
            color: var(--accent-orange);
        }

        .hover-accent:hover {
            color: var(--accent-orange);
            transition: color 0.3s ease;
        }

        .article-content p {
            margin-bottom: 1.5rem;
        }

        .article-content h2 {
            margin-top: 2rem;
            margin-bottom: 1rem;
        }

        .article-content h3 {
            margin-top: 1.5rem;
            margin-bottom: 0.75rem;
        }

        .article-content ul,
        .article-content ol {
            margin-bottom: 1.5rem;
            padding-left: 2rem;
        }

        .article-content li {
            margin-bottom: 0.5rem;
        }

        .share-button {
            transition: all 0.3s ease;
        }

        .share-button:hover {
            transform: translateY(-2px);
        }

        .related-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .comment-avatar {
            width: 40px;
            height: 40px;
            background: linear-gradient(45deg, var(--primary-blue), var(--accent-orange));
        }


        .highlight-box {
            background: linear-gradient(135deg, var(--light-gray) 0%, #ffffff 100%);
            border-left: 5px solid var(--accent-orange);
            padding: 1.5rem;
            margin: 2rem 0;
            border-radius: 0 8px 8px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .image-placeholder {
            width: 100%;
            height: 300px;
            background: linear-gradient(135deg, #e8f4f8 0%, #d1e7dd 100%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-blue);
            font-size: 1.1rem;
            font-weight: 500;
            margin: 2rem 0;
            border: 2px dashed var(--border-gray);
        }

        .sidebar-card {
            background: white;
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            border: 1px solid var(--border-gray);
        }

        .sidebar-card h3 {
            color: var(--primary-blue);
            font-size: 1.2rem;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--accent-orange);
        }

        .related-article {
            display: flex;
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--border-gray);
        }

        .related-article:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }

        .related-thumbnail {
            width: 80px;
            height: 60px;
            background: linear-gradient(135deg, var(--light-gray) 0%, #ffffff 100%);
            border-radius: 5px;
            margin-right: 1rem;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-blue);
            font-size: 0.8rem;
        }

        .related-content h4 {
            font-size: 0.9rem;
            margin-bottom: 0.3rem;
            line-height: 1.3;
        }

        .related-content h4 a {
            color: var(--primary-blue);
            text-decoration: none;
        }

        .related-content h4 a:hover {
            color: var(--accent-orange);
        }

        .related-date {
            font-size: 0.8rem;
            color: #666;
        }

        .author-bio {
            background: var(--light-gray);
            border-radius: 10px;
            padding: 2rem;
            margin: 3rem 0;
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .author-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-blue) 0%, #004080 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            font-weight: 600;
            flex-shrink: 0;
        }

        /* ===== CTA SECTIONS ===== */
        .cta-section {
            background: linear-gradient(135deg, var(--primary-blue) 0%, #004080 100%);
            color: white;
            padding: 3rem 2rem;
            border-radius: 15px;
            text-align: center;
            margin: 3rem 0;
        }

        .quick-contact {
            background: linear-gradient(135deg, var(--primary-blue) 0%, #004080 100%);
            color: var(--white);
            padding: 60px 0;
            text-align: center;
        }

        .quick-contact h2 {
            font-family: 'Montserrat', sans-serif;
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .quick-contact p {
            font-size: 1.1rem;
            margin-bottom: 30px;
            opacity: 0.9;
        }

        .quick-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .quick-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: var(--accent-orange);
            color: var(--white);
            padding: 15px 30px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }

        .quick-btn:hover {
            background: #e55a00;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(255, 107, 0, 0.4);
        }

        /* ===== FOOTER ===== */
        .footer-section {
            background-color: var(--primary-blue);
            color: white;
            padding: 3rem 0 1rem 0;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-section h4 {
            color: white;
            font-size: 1.1rem;
            margin-bottom: 1rem;
            border-bottom: 2px solid var(--accent-orange);
            padding-bottom: 0.5rem;
            display: inline-block;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 0.5rem;
        }

        .footer-section ul li a {
            color: #cccccc;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-section ul li a:hover {
            color: var(--accent-orange);
        }

        .footer-bottom {
            border-top: 1px solid #444;
            padding-top: 1rem;
            text-align: center;
            color: #cccccc;
        }

        /* ===== ANIMATIONS ===== */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .floating-animation {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ===== RESPONSIVE DESIGN ===== */
        @media (max-width: 768px) {
            .mobile-menu-btn {
                display: block;
            }

            .desktop-menu,
            .nav-menu {
                display: none;
            }

            .hero-title {
                font-size: 2.5rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .stats-counter,
            .stats-number,
            .stat-number {
                font-size: 2rem;
            }

            .timeline::before {
                left: 30px;
            }

            .timeline-item {
                width: 100%;
                left: 0 !important;
                text-align: left !important;
                padding-left: 70px !important;
                padding-right: 0 !important;
            }

            .timeline-item::before {
                left: 20px !important;
                right: auto !important;
            }

            .btn-primary,
            .btn-accent {
                padding: 10px 20px;
                font-size: 14px;
            }

            .spec-table th,
            .spec-table td {
                padding: 10px;
                font-size: 14px;
            }

            .grid-2,
            .grid-3,
            .grid-4 {
                grid-template-columns: 1fr;
            }

            .navbar {
                padding: 10px 0;
            }

            .hero-content p {
                font-size: 1.1rem;
            }

            .article-content h2 {
                font-size: 1.5rem;
            }

            .author-bio {
                flex-direction: column;
                text-align: center;
            }

            .social-share {
                justify-content: center;
            }

            .contact-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .map-container {
                grid-template-columns: 1fr;
                height: auto;
            }

            .quick-buttons {
                flex-direction: column;
                align-items: center;
            }
        }

        /* ===== PRINT STYLES ===== */
        @media print {
            .no-print {
                display: none !important;
            }

            body {
                font-size: 12pt;
                line-height: 1.5;
                print-color-adjust: exact;
                -webkit-print-color-adjust: exact;
            }

            h1 {
                font-size: 18pt;
            }

            h2 {
                font-size: 16pt;
            }

            h3 {
                font-size: 14pt;
            }

            .product-card,
            .card,
            .article-card {
                break-inside: avoid;
                page-break-inside: avoid;
                margin-bottom: 20px;
            }

            .navbar {
                position: relative;
            }
        }
    </style>


    <!-- Contact Header -->
    <section class="quick-contact">
        <div class="container">
            <h2 class="accent-orange">Contact Us</h2>
            <p>Let's discuss your industrial equipment needs and how we can serve you better</p>
        </div>
    </section>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <div class="contact-grid">
                <!-- Contact Form -->
                <div class="contact-form fade-in">
                    <h2>Send Us a Message</h2>
                    <p class="subtitle">Fill out the form below and we'll get back to you within 24 hours</p>
                    <form id="contactForm" action="{{ route('contact.submit') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="fullName" class="form-label">Full Name <span class="required">*</span></label>
                            <input type="text" id="fullName" name="fullName" class="form-input"
                                value="{{ old('fullName') }}" required>
                            @error('fullName')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Email Address <span class="required">*</span></label>
                            <input type="email" id="email" name="email" class="form-input"
                                value="{{ old('email') }}" required>
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="message" class="form-label">Message <span class="required">*</span></label>
                            <textarea id="message" name="message" class="form-input form-textarea" rows="5"
                                placeholder="Please describe your inquiry in detail..." required>{{ old('message') }}</textarea>
                            @error('message')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="submit-btn">
                            <i class="fas fa-paper-plane"></i> Send Message
                        </button>
                    </form>
                </div>

                <!-- Contact Info -->
                <div class="contact-info fade-in">
                    <h2>Get in Touch</h2>

                    <div class="info-item">
                        <div class="info-icon"><i class="fas fa-map-marker-alt"></i></div>
                        <div class="info-content">
                            <h3>Head Office</h3>
                            <p>{{ @$contact->address ?? 'Jl. Industri Raya No. 123, Bekasi Industrial Area, Bekasi 17530, Indonesia' }}
                            </p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon"><i class="fas fa-phone"></i></div>
                        <div class="info-content">
                            <h3>Phone</h3>
                            <p>Phone: <a
                                    href="tel:{{ @$contact->phone ?? '+62218901234' }}">{{ @$contact->phone ?? '+62 21 8901 234' }}</a><br>
                            </p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon"><i class="fas fa-envelope"></i></div>
                        <div class="info-content">
                            <h3>Email</h3>
                            <p>
                                <a
                                    href="mailto:{{ @$contact->email ?? 'info@example.com' }}">{{ @$contact->email ?? 'info@example.com' }}</a>
                            </p>
                        </div>
                    </div>

                    <div class="social-links">

                        @foreach ($socialLinks as $link)
                            <a href="{{ $link->url }}" class="social-link {{ $link->class ?? '' }}"
                                aria-label="Go to
PT ADHYA ASIA JAYA" alt="
PT ADHYA ASIA JAYA Media Social">
                                <i class="{{ $link->icon }}"></i>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>



    <!-- Quick Contact -->
    <section class="quick-contact">
        <div class="container">
            <h2 class="accent-orange">Need Immediate Assistance?</h2>
            <p>Our team is ready to help you with your industrial equipment needs</p>
            <div class="quick-buttons">
                <a href="https://wa.me/{{ @$contact->phone }}" class="quick-btn" target="_blank">
                    <i class="fab fa-whatsapp"></i> WhatsApp Us
                </a>
                <a href="mailto:{{ @$contact->email }}" class="quick-btn">
                    <i class="fas fa-envelope"></i> Email Us
                </a>
            </div>
        </div>
    </section>

    <script>
        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const closeMobileMenu = document.getElementById('close-mobile-menu');

        // Toggle mobile menu
        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.add('active');
            document.body.style.overflow = 'hidden'; // Prevent scrolling when menu is open
        });

        closeMobileMenu.addEventListener('click', () => {
            mobileMenu.classList.remove('active');
            document.body.style.overflow = ''; // Re-enable scrolling
        });

        // Close menu when clicking on a link
        document.querySelectorAll('#mobile-menu a').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.remove('active');
                document.body.style.overflow = '';
            });
        });

        // Fade in animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.fade-in').forEach(el => {
            observer.observe(el);
        });


        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const headerHeight = document.querySelector('header').offsetHeight;
                    const targetPosition = target.offsetTop - headerHeight;

                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Contact form submission
        document.getElementById('contact-form').addEventListener('submit', function(e) {
            e.preventDefault();

            // Get form data
            const formData = {
                name: document.getElementById('name').value,
                company: document.getElementById('company').value,
                email: document.getElementById('email').value,
                message: document.getElementById('message').value
            };

            // Simple validation
            if (!formData.name || !formData.company || !formData.email || !formData.message) {
                alert('Please fill in all required fields.');
                return;
            }

            // Simulate form submission
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Submitting...';
            submitBtn.disabled = true;

            setTimeout(() => {
                alert('Thank you for your inquiry! We will get back to you within 24 hours.');
                this.reset();
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }, 2000);
        });

        // Add scroll effect to header
        window.addEventListener('scroll', () => {
            const header = document.querySelector('header');
            if (window.scrollY > 100) {
                header.classList.add('shadow-2xl');
            } else {
                header.classList.remove('shadow-2xl');
            }
        });

        // Initialize animations
        document.addEventListener('DOMContentLoaded', () => {
            // Trigger initial fade-in for elements in viewport
            const initialElements = document.querySelectorAll('.fade-in');
            initialElements.forEach(el => {
                const rect = el.getBoundingClientRect();
                if (rect.top < window.innerHeight) {
                    el.classList.add('visible');
                }
            });
        });
    </script>
@endsection
