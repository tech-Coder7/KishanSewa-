@extends('layouts.app')
@section('content')
<style>
    /* Contact Page Specific Custom Styling */
    .contact-info-wrapper {
        background-color: #ffffff;
        border-radius: 16px;
        padding: 40px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
        border: 1px solid #e5e7eb;
        height: 100%;
    }
    
    .contact-info-title {
        color: #0b4d16;
        font-weight: 700;
        font-size: 24px;
        margin-bottom: 25px;
    }

    .contact-method-item {
        display: flex;
        gap: 15px;
        margin-bottom: 25px;
        align-items: flex-start;
    }

    .contact-icon-box {
        width: 50px;
        height: 50px;
        background-color: #e8f5e9;
        color: #2e7d32;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        flex-shrink: 0;
    }

    .contact-text-box h5 {
        margin: 0 0 5px 0;
        font-size: 16px;
        font-weight: 600;
        color: #1f2937;
    }

    .contact-text-box p {
        margin: 0;
        font-size: 14px;
        color: #4b5563;
        line-height: 1.5;
    }

    .contact-form-wrapper {
        background-color: #ffffff;
        border-radius: 16px;
        padding: 40px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
        border: 1px solid #e5e7eb;
    }

    .form-control:focus, .form-select:focus {
        border-color: #2e7d32;
        box-shadow: 0 0 0 0.25rem rgba(46, 125, 50, 0.25);
    }

    .map-container {
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
        border: 1px solid #e5e7eb;
    }
</style>

<!-- Main Contact Body Section -->
<main class="container py-5">
    <!-- Top Row: Info & Form Blocks -->
    <div class="row g-4 mb-5">
        
        <!-- Left Side: Office Contact Details -->
        <div class="col-lg-5">
            <div class="contact-info-wrapper">
                <h3 class="contact-info-title">Sumpark Karein (Get in Touch)</h3>
                <p class="text-muted mb-4">Kheti-badi se judi kisi bhi pareshani ya sujhav ke liye aap humse neeche diye gaye tareeqon se sampark kar sakte hain.</p>
                
                <!-- Item 1: Address -->
                <div class="contact-method-item">
                    <div class="contact-icon-box">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="contact-text-box">
                        <h5>Mukhya Karyalaya (Head Office)</h5>
                        <p>raj Bhawan, Sector 4, Main Market Road,<br>Jhumri Telaiya, Jharkhand - 825409</p>
                    </div>
                </div>

                <!-- Item 2: Helplines -->
                <div class="contact-method-item">
                    <div class="contact-icon-box">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div class="contact-text-box">
                        <h5>Kisan Toll-Free Helpline</h5>
                        <p class="fw-bold text-success">1800-180-1551</p>
                        <p>Office Support: +91 9135125154<br>(Somaar se Shanivaar, 9:00 AM - 6:00 PM)</p>
                    </div>
                </div>

                <!-- Item 3: Email Support -->
                <div class="contact-method-item">
                    <div class="contact-icon-box">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="contact-text-box">
                        <h5>Email Support</h5>
                        <p>help@kishansewa.gov.in<br>info@kishansewa.org</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side: Message Submission Form -->
        <div class="col-lg-7">
            <div class="contact-form-wrapper">
                <h3 class="contact-info-title">Sujhav ya Shikayat Darz Karein</h3>
                <form id="contactForm" onsubmit="handleContactSubmit(event)">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label font-weight-bold">Aapka Naam (Full Name) *</label>
                            <input type="text" class="form-control" required placeholder="Naam likhein">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Mobile Number *</label>
                            <input type="tel" class="form-control" required placeholder="10-digit number">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Email ID (Optional)</label>
                            <input type="email" class="form-control" placeholder="Email address dalein">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Pareshani ka Prakar (Query Category)</label>
                            <select class="form-select">
                                <option selected>General Sujhav / Inquiry</option>
                                <option>Crop Scanner Issue</option>
                                <option>Mandi Bhav Updates</option>
                                <option>Government Schemes Eligibility</option>
                                <option>Technical Website Issue</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Aapka Sandesh (Message) *</label>
                            <textarea class="form-control" rows="4" required placeholder="Apni pareshani ya baat vistar se yahan likhein..."></textarea>
                        </div>
                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-success px-5 py-2 w-100 w-sm-auto">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <!-- Bottom Row: Map Embed Container -->
    <div class="row">
        <div class="col-12">
            <h4 class="mb-3 text-dark fw-bold"><i class="fas fa-map-marked-alt text-success me-2"></i> Find Us on Map</h4>
            <div class="map-container">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14529.986618588824!2d85.51478229437149!3d24.433544254823158!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f375059db5a1cf%3A0xc6cbfffc403d1ee0!2sJhumri%20Telaiya%2C%20Jharkhand!5e0!3m2!1sen!2sin!4v1710000000000!5m2!1sen!2sin" 
                    width="100%" 
                    height="380" 
                    style="border:0; display:block;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</main>

<!-- Basic Script Handler for Form Processing -->
<script>
    function handleContactSubmit(event) {
        event.preventDefault();
        alert("Aapka sandesh safaltapurvak bhej diya gaya hai! Hamari team aapse jald hi sampark karegi.");
        document.getElementById('contactForm').reset();
    }
</script>
@endsection