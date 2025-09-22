@extends('layouts.app')

@section('content')
<section class="contact-header">
    <h2 class="text-3xl font-bold mb-8 text-center">Contact Us</h2>
    <p>We’re here to help you with bookings, inquiries, and more.</p>
</section>

<section class="contact-info container">
    <div class="contact-grid">
        <div class="contact-details">
            <h2 class="text-3xl font-bold mb-8 text-left">About MSUITES</h2>
            <p><strong>Address:</strong> 1015 Metropolitan Ave. Makati City, 1205 Metro Manila</p>
            <p><strong>Email:</strong> info@msuiteshotel.com</p>
            <p><strong>Phone:</strong> +63 922 654 0528</p>

            <h3>Location Map</h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.591155691062!2d121.01189907457241!3d14.56535717793964!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c9a091188a13%3A0x57df7637c76a9c3f!2sM%20Suites%20Hotel!5e0!3m2!1sen!2sph!4v1755567220774!5m2!1sen!2sph"
                    width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>

        <div class="contact-form">
            <h3>Send Us a Message</h3>
                <form id="contactForm" action="{{ route('contact.store') }}" method="POST">
    @csrf
    <input type="text" id="name" name="name" placeholder="Your Name"
        class="w-full p-3 border rounded mb-4 focus:outline-none focus:ring focus:ring-indigo-300" required>

    <input type="email" id="email" name="email" placeholder="Your Email"
        class="w-full p-3 border rounded mb-4 focus:outline-none focus:ring focus:ring-indigo-300" required>

    <textarea id="message" name="message" placeholder="Your Message" rows="5"
        class="w-full p-3 border rounded mb-4 focus:outline-none focus:ring focus:ring-indigo-300" required></textarea>

    <button type="submit"
        class="w-full bg-indigo-600 text-white font-semibold py-3 rounded hover:bg-indigo-700 transition">
        Send Message
    </button>
</form>


        </div>
    </div>
</section>
@endsection

@if(session('success'))
    <div id="success-message" 
        class="mt-4 p-3 rounded bg-green-100 text-green-700 font-semibold shadow">
        {{ session('success') }}
    </div>
@endif

<script>
    document.addEventListener("DOMContentLoaded", () => {
    const nameInput = document.getElementById("name");
    const messageInput = document.getElementById("message");

    // ✅ Prevent numbers in name field
    if (nameInput) {
        nameInput.addEventListener("input", function () {
            this.value = this.value.replace(/[0-9]/g, "");
        });
    }

    // ✅ Block cut, copy, paste in message field
    if (messageInput) {
        ["cut", "copy", "paste"].forEach(evt => {
            messageInput.addEventListener(evt, e => {
                e.preventDefault();
                alert("Cut, copy and paste are disabled in the message field.");
            });
        });

        // ✅ Block URLs in message field
        messageInput.addEventListener("input", function () {
            const urlPattern = /(https?:\/\/|www\.)\S+/gi;
            if (urlPattern.test(this.value)) {
                this.value = this.value.replace(urlPattern, "");
                alert("URLs and web links are not allowed in the message.");
            }
        });
    }

    // ✅ Auto-hide success message after 5 seconds
    const successMessage = document.getElementById("success-message");
    if (successMessage) {
        setTimeout(() => {
            successMessage.style.transition = "opacity 1s ease";
            successMessage.style.opacity = "0";
            setTimeout(() => successMessage.remove(), 1000);
        }, 5000);
    }
});


</script>