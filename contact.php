<?php 
$pageTitle = "Contact Us - Certification & Jobs Portal";
include 'includes/header.php'; 
?>

<!-- Contact Us Hero Section -->
<div class="contact-hero" style="background: url('assets/images/contact.jpg') no-repeat center center/cover; height: 60vh;">
    <div class="text-white text-center d-flex align-items-center justify-content-center h-100">
        <div>
            <h1>Get in Touch</h1>
            <p class="lead">We’re here to answer your questions and help you on your journey.</p>
        </div>
    </div>
</div>

<!-- Contact Information Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Contact Details -->
            <div class="col-md-6">
                <h2>Contact Information</h2>
                <p class="lead">Reach out to us through any of the channels below:</p>
                <ul class="list-unstyled mt-3">
                    <li>
                        <strong>Email:</strong> <a href="mailto:support@certifyjobs.com">support@certifyjobs.com</a>
                    </li>
                    <li>
                        <strong>Phone:</strong> <a href="tel:+1234567890">+1 234 567 890</a>
                    </li>
                    <li>
                        <strong>Address:</strong> 123 Certification Lane, Suite 100, New York, NY, USA
                    </li>
                </ul>
                <h4 class="mt-4">Follow Us</h4>
                <div class="social-links">
                    <a href="#" class="btn btn-outline-primary btn-sm me-2"><i class="bi bi-facebook"></i> Facebook</a>
                    <a href="#" class="btn btn-outline-primary btn-sm me-2"><i class="bi bi-twitter"></i> Twitter</a>
                    <a href="#" class="btn btn-outline-primary btn-sm"><i class="bi bi-linkedin"></i> LinkedIn</a>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-md-6">
                <h2>Send Us a Message</h2>
                <p class="lead">Fill out the form below, and we’ll get back to you within 24 hours.</p>
                <form action="#" method="POST" class="mt-4">
                    <div class="form-group mb-3">
                        <label for="name">Your Name</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Your Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" class="form-control" placeholder="Enter the subject">
                    </div>
                    <div class="form-group mb-3">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" class="form-control" rows="5" placeholder="Write your message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg w-100">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center">Find Us</h2>
        <p class="text-center">Visit us at our office or contact us via email or phone.</p>
        <div class="map-container mt-4">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509374!2d144.9537353154796!3d-37.81627937975161!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf4c04d6e616c3669!2s123%20Certification%20Lane%2C%20Suite%20100%2C%20New%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sus!4v1619831234567!5m2!1sen!2sus" 
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
