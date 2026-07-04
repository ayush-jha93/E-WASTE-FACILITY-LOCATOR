<?php
$page_title = "Contact Us | EcoRecycle - Get In Touch";
include __DIR__ . '/includes/header.php';
?>

<!-- Hero Section -->
<section class="bg-slate-900 text-white py-24 relative overflow-hidden">
    <div class="absolute inset-0 opacity-30">
        <img src="/assets/img/bg-contact.jpg" alt="Background" class="w-full h-full object-cover">
    </div>
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-4xl md:text-5xl font-extrabold mb-4">Get In Touch</h1>
        <p class="text-xl text-slate-300 max-w-2xl mx-auto">Have questions about e-waste? Our experts are here to help you make the right choice for the planet.</p>
    </div>
</section>

<main class="container mx-auto px-4 py-16 -mt-12 relative z-20">
    <div class="grid lg:grid-cols-3 gap-12">
        <!-- Contact Info -->
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-white p-8 rounded-[2rem] shadow-lg border border-slate-50">
                <h3 class="text-2xl font-bold text-slate-900 mb-8">Contact Information</h3>
                
                <div class="space-y-8">
                    <div class="flex gap-5">
                        <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0">
                            <i class="fas fa-map-marker-alt text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-900">Our Address</h4>
                            <p class="text-slate-500 text-sm">456 Green Towers, Bengaluru, Karnataka 560001</p>
                        </div>
                    </div>
                    
                    <div class="flex gap-5">
                        <div class="w-12 h-12 rounded-2xl bg-teal-50 text-teal-600 flex items-center justify-center shrink-0">
                            <i class="fas fa-phone-alt text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-900">Phone Number</h4>
                            <p class="text-slate-500 text-sm">1800-123-4567 (Toll Free)</p>
                            <p class="text-[10px] text-slate-400 mt-1 uppercase tracking-wider font-bold">Mon - Sat, 9am - 6pm</p>
                        </div>
                    </div>
                    
                    <div class="flex gap-5">
                        <div class="w-12 h-12 rounded-2xl bg-sky-50 text-sky-600 flex items-center justify-center shrink-0">
                            <i class="fas fa-envelope text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-900">Email Address</h4>
                            <p class="text-slate-500 text-sm">support@ecorecycle.in</p>
                            <p class="text-slate-500 text-sm">info@ecorecycle.in</p>
                        </div>
                    </div>
                </div>
                
                <div class="mt-12 pt-12 border-t border-slate-50">
                    <h4 class="font-bold text-slate-900 mb-6">Follow Our Mission</h4>
                    <div class="flex gap-3">
                        <a href="#" class="w-10 h-10 rounded-xl bg-slate-50 flex items-center justify-center text-slate-400 hover:bg-emerald-600 hover:text-white transition-all">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-xl bg-slate-50 flex items-center justify-center text-slate-400 hover:bg-emerald-600 hover:text-white transition-all">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-xl bg-slate-50 flex items-center justify-center text-slate-400 hover:bg-emerald-600 hover:text-white transition-all">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="lg:col-span-2">
            <div class="bg-white p-10 md:p-12 rounded-[2rem] shadow-xl border border-slate-50 h-full">
                <h3 class="text-3xl font-bold text-slate-900 mb-4">Send a Message</h3>
                <p class="text-slate-500 mb-10 leading-relaxed">Fill out the form below and our team will get back to you within 24 hours.</p>

                <div id="success-message" class="hidden bg-emerald-50 border border-emerald-100 p-8 rounded-2xl text-center">
                    <div class="w-16 h-16 bg-emerald-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-2xl shadow-lg">
                        <i class="fas fa-check"></i>
                    </div>
                    <h4 class="text-xl font-bold text-emerald-900 mb-2">Message Saved!</h4>
                    <p class="text-emerald-700">Thank you for reaching out. Your message has been saved locally.</p>
                    <button type="button" onclick="resetForm()" class="mt-6 text-emerald-600 font-bold hover:underline">Send another message</button>
                </div>

                <form id="contact-form" class="space-y-6">
                    <div id="error-message" class="hidden bg-red-50 text-red-600 p-4 rounded-xl text-sm font-medium border border-red-100">
                        <i class="fas fa-exclamation-circle mr-2"></i> <span id="error-text"></span>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-slate-700 ml-1">Full Name</label>
                            <input type="text" id="name" name="name" required placeholder="John Doe" 
                                class="w-full px-5 py-4 bg-slate-50 border-none rounded-xl focus:ring-2 focus:ring-emerald-400 text-slate-800 transition-all">
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-slate-700 ml-1">Email Address</label>
                            <input type="email" id="email" name="email" required placeholder="john@example.com" 
                                class="w-full px-5 py-4 bg-slate-50 border-none rounded-xl focus:ring-2 focus:ring-emerald-400 text-slate-800 transition-all">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-700 ml-1">Subject</label>
                        <select id="subject" name="subject" class="w-full px-5 py-4 bg-slate-50 border-none rounded-xl focus:ring-2 focus:ring-emerald-400 text-slate-800 appearance-none transition-all">
                            <option value="General Inquiry">General Inquiry</option>
                            <option value="Facility Question">Facility Question</option>
                            <option value="Partnership">Partnership</option>
                            <option value="Feedback">Feedback</option>
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-700 ml-1">Your Message</label>
                        <textarea id="message" name="message" required rows="6" placeholder="How can we help you?" 
                            class="w-full px-5 py-4 bg-slate-50 border-none rounded-xl focus:ring-2 focus:ring-emerald-400 text-slate-800 transition-all resize-none"></textarea>
                    </div>

                    <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-5 rounded-xl transition-all shadow-lg hover:shadow-emerald-200 flex items-center justify-center gap-3 text-lg">
                        <span>Send Message</span>
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </form>

                <script>
                    document.getElementById('contact-form').addEventListener('submit', function(e) {
                        e.preventDefault();
                        
                        const name = document.getElementById('name').value.trim();
                        const email = document.getElementById('email').value.trim();
                        const subject = document.getElementById('subject').value.trim();
                        const message = document.getElementById('message').value.trim();
                        
                        if (!name || !email || !message) {
                            document.getElementById('error-message').classList.remove('hidden');
                            document.getElementById('error-text').textContent = 'All fields are required!';
                            return;
                        }
                        
                        document.getElementById('error-message').classList.add('hidden');
                        
                        const newMessage = {
                            id: Date.now(),
                            name: name,
                            email: email,
                            subject: subject,
                            message: message,
                            date: new Date().toISOString()
                        };
                        
                        let messages = [];
                        try {
                            const stored = localStorage.getItem('contact_messages');
                            if (stored) {
                                messages = JSON.parse(stored);
                            }
                        } catch (err) {
                            console.error('Could not read from localStorage', err);
                        }
                        
                        messages.push(newMessage);
                        localStorage.setItem('contact_messages', JSON.stringify(messages));
                        
                        document.getElementById('contact-form').classList.add('hidden');
                        document.getElementById('success-message').classList.remove('hidden');
                    });

                    function resetForm() {
                        document.getElementById('contact-form').reset();
                        document.getElementById('contact-form').classList.remove('hidden');
                        document.getElementById('success-message').classList.add('hidden');
                    }
                </script>
            </div>
        </div>
    </div>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>
