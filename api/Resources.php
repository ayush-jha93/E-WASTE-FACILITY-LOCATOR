<?php
$page_title = "Resources | EcoRecycle - Educational Hub";
// Initialize state if accessed via filter
$allowed_filters = ['all', 'guides', 'videos', 'articles', 'tools'];
$filter = (isset($_GET['filter']) && in_array($_GET['filter'], $allowed_filters)) ? $_GET['filter'] : 'all';

include __DIR__ . '/includes/header.php'; 
?>

<!-- Hero Section -->
<section class="bg-slate-900 text-white py-20 relative overflow-hidden">
    <div class="absolute inset-0 opacity-20">
        <img src="/assets/img/bg-resources.jpg" alt="Background" class="w-full h-full object-cover">
    </div>
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-4xl md:text-5xl font-extrabold mb-4">E-Waste Resources</h1>
        <p class="text-xl text-slate-300 max-w-2xl mx-auto">Master the art of sustainable disposal with our curated collection of guides, videos, and articles.</p>
    </div>
</section>

<!-- Main Content -->
<section class="py-16 bg-white overflow-visible">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row gap-12">
            <!-- Sidebar -->
            <div class="lg:w-1/4">
                <div class="bg-slate-50 p-6 rounded-[2rem] sticky top-28 border border-slate-100">
                    <h3 class="text-lg font-bold mb-6 text-slate-900 border-b border-slate-200 pb-4">Categories</h3>
                    <ul class="space-y-2">
                        <li>
                            <button onclick="filterResources('all')" id="btn-all"
                                class="category-btn active text-left w-full px-4 py-3 rounded-xl transition-all flex items-center gap-3">
                                <i class="fas fa-th-large"></i> <span>All Resources</span>
                            </button>
                        </li>
                        <li>
                            <button onclick="filterResources('guides')" id="btn-guides"
                                class="category-btn text-left w-full px-4 py-3 rounded-xl transition-all flex items-center gap-3">
                                <i class="fas fa-book"></i> <span>Guides</span>
                            </button>
                        </li>
                        <li>
                            <button onclick="filterResources('videos')" id="btn-videos"
                                class="category-btn text-left w-full px-4 py-3 rounded-xl transition-all flex items-center gap-3">
                                <i class="fas fa-video"></i> <span>Videos</span>
                            </button>
                        </li>
                        <li>
                            <button onclick="filterResources('articles')" id="btn-articles"
                                class="category-btn text-left w-full px-4 py-3 rounded-xl transition-all flex items-center gap-3">
                                <i class="fas fa-newspaper"></i> <span>Articles</span>
                            </button>
                        </li>
                        <li>
                            <button onclick="filterResources('tools')" id="btn-tools"
                                class="category-btn text-left w-full px-4 py-3 rounded-xl transition-all flex items-center gap-3">
                                <i class="fas fa-tools"></i> <span>Tools</span>
                            </button>
                        </li>
                    </ul>

                    <div class="mt-12 bg-emerald-600 rounded-2xl p-6 text-white overflow-hidden relative group">
                        <div class="absolute -right-4 -bottom-4 opacity-10 transition-transform group-hover:scale-125">
                            <i class="fas fa-recycle text-8xl"></i>
                        </div>
                        <h4 class="font-bold text-lg mb-2 relative z-10">Need Assistance?</h4>
                        <p class="text-emerald-100 text-sm mb-6 relative z-10 leading-relaxed">Our team can guide you on bulk disposal and corporate partnerships.</p>
                        <a href="contact.php" class="inline-block bg-white text-emerald-600 px-6 py-2 rounded-xl font-bold text-sm hover:bg-emerald-50 transition-colors relative z-10">Contact Us</a>
                    </div>
                </div>
            </div>

            <!-- Resources List -->
            <div class="lg:w-3/4">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12">
                    <div>
                        <h2 class="text-3xl font-bold text-slate-900 mb-2">Knowledge Base</h2>
                        <p class="text-slate-500">Everything you need to know about responsible electronics disposal.</p>
                    </div>
                    <!-- Search Box -->
                    <div class="relative max-w-sm w-full">
                        <input type="text" id="resourceSearch" placeholder="Search resources..."
                            class="w-full pl-12 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-400 transition-all text-slate-800">
                        <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                    </div>
                </div>

                <!-- Resources Grid -->
                <div id="resourcesContainer" class="grid md:grid-cols-2 gap-8">
                    <!-- Resource Card 1 -->
                    <div class="resource-card bg-white p-8 rounded-[2rem] border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group" data-category="guides">
                        <div class="w-14 h-14 bg-emerald-100 text-emerald-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                            <i class="fas fa-book text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">Beginner's Guide to E-Waste</h3>
                        <p class="text-slate-600 text-sm mb-6 leading-relaxed flex-grow">Learn what constitutes e-waste and how to identify items that should be recycled. Start your journey here.</p>
                        <a href="https://wasteaid.org/wp-content/uploads/2022/06/Handbook-of-E-waste-management.pdf" target="_blank" class="text-emerald-600 font-bold inline-flex items-center gap-2 group-hover:gap-3 transition-all">
                            Read Guide <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>

                    <!-- Resource Card 2 -->
                    <div class="resource-card bg-white p-8 rounded-[2rem] border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group" data-category="videos">
                        <div class="w-14 h-14 bg-teal-100 text-teal-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-teal-600 group-hover:text-white transition-colors">
                            <i class="fas fa-video text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">The E-Waste Process</h3>
                        <p class="text-slate-600 text-sm mb-6 leading-relaxed flex-grow">Watch how electronics are properly dismantled and components are sorted in certified facilities.</p>
                        <a href="videos.php" class="text-teal-600 font-bold inline-flex items-center gap-2 group-hover:gap-3 transition-all">
                            Watch Video <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>

                    <!-- Resource Card 3 -->
                    <div class="resource-card bg-white p-8 rounded-[2rem] border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group" data-category="articles">
                        <div class="w-14 h-14 bg-sky-100 text-sky-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-sky-600 group-hover:text-white transition-colors">
                            <i class="fas fa-newspaper text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">Global E-Waste Statistics</h3>
                        <p class="text-slate-600 text-sm mb-6 leading-relaxed flex-grow">Understand the scale of the growing e-waste problem worldwide and why immediate action is needed.</p>
                        <a href="https://www.statista.com/topics/3409/electronic-waste-worldwide/#topicOverview" target="_blank" class="text-sky-600 font-bold inline-flex items-center gap-2 group-hover:gap-3 transition-all">
                            Read Article <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>

                    <!-- Resource Card 4 -->
                    <div class="resource-card bg-white p-8 rounded-[2rem] border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group" data-category="tools">
                        <div class="w-14 h-14 bg-indigo-100 text-indigo-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-indigo-600 group-hover:text-white transition-colors">
                            <i class="fas fa-tools text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">E-Waste Impact Calculator</h3>
                        <p class="text-slate-600 text-sm mb-6 leading-relaxed flex-grow">Calculate the environmental impact of your discarded devices and see how much carbon you can save.</p>
                        <a href="https://www.resourcerecycling.com" target="_blank" class="text-indigo-600 font-bold inline-flex items-center gap-2 group-hover:gap-3 transition-all">
                            Use Tool <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>

                    <!-- Resource Card 5 -->
                    <div class="resource-card bg-white p-8 rounded-[2rem] border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group" data-category="guides">
                        <div class="w-14 h-14 bg-emerald-100 text-emerald-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                            <i class="fas fa-shield-alt text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">Data Security When Recycling</h3>
                        <p class="text-slate-600 text-sm mb-6 leading-relaxed flex-grow">A professional forensic guide to protecting your information before handing over your electronics.</p>
                        <a href="https://levelblue.com/blogs/security-essentials/securely-disposing-of-old-electronics-and-data-a-forensic-guide-to-protecting-your-information" target="_blank" class="text-emerald-600 font-bold inline-flex items-center gap-2 group-hover:gap-3 transition-all">
                            Read Guide <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>

                    <!-- Resource Card 6 -->
                    <div class="resource-card bg-white p-8 rounded-[2rem] border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group" data-category="articles">
                        <div class="w-14 h-14 bg-sky-100 text-sky-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-sky-600 group-hover:text-white transition-colors">
                            <i class="fas fa-gavel text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">Recycling Laws in India</h3>
                        <p class="text-slate-600 text-sm mb-6 leading-relaxed flex-grow">Stay informed about the E-Waste Management Rules and your legal responsibilities as a producer or consumer.</p>
                        <a href="https://cpcb.nic.in/e-waste/" target="_blank" class="text-sky-600 font-bold inline-flex items-center gap-2 group-hover:gap-3 transition-all">
                            Read Article <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- FAQ Section -->
                <div class="mt-20">
                    <h2 class="text-3xl font-bold text-slate-900 mb-10 text-center">Frequently Asked Questions</h2>
                    <div class="space-y-4 max-w-3xl mx-auto">
                        <div class="bg-slate-50 rounded-2xl overflow-hidden border border-slate-100 transition-all hover:border-emerald-200">
                            <button class="faq-toggle w-full px-8 py-6 text-left flex justify-between items-center group">
                                <span class="font-bold text-slate-900 leading-snug">What items are considered e-waste?</span>
                                <div class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                                    <i class="fas fa-chevron-down text-xs transition-transform duration-300"></i>
                                </div>
                            </button>
                            <div class="faq-content hidden px-8 pb-6 text-slate-600 text-sm">
                                E-waste includes any electronic device that is no longer wanted or functional. Common examples include computers, laptops, monitors, TVs, mobile phones, tablets, printers, scanners, and other electronic equipment.
                            </div>
                        </div>

                        <div class="bg-slate-50 rounded-2xl overflow-hidden border border-slate-100 transition-all hover:border-emerald-200">
                            <button class="faq-toggle w-full px-8 py-6 text-left flex justify-between items-center group">
                                <span class="font-bold text-slate-900 leading-snug">Why is e-waste recycling important?</span>
                                <div class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                                    <i class="fas fa-chevron-down text-xs transition-transform duration-300"></i>
                                </div>
                            </button>
                            <div class="faq-content hidden px-8 pb-6 text-slate-600 text-sm">
                                E-waste contains hazardous materials like lead, mercury, and cadmium that can harm the environment if not disposed of properly. Recycling also recovers valuable materials like gold, silver, and copper.
                            </div>
                        </div>

                        <div class="bg-slate-50 rounded-2xl overflow-hidden border border-slate-100 transition-all hover:border-emerald-200">
                            <button class="faq-toggle w-full px-8 py-6 text-left flex justify-between items-center group">
                                <span class="font-bold text-slate-900 leading-snug">How can I ensure my data is secure when recycling?</span>
                                <div class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                                    <i class="fas fa-chevron-down text-xs transition-transform duration-300"></i>
                                </div>
                            </button>
                            <div class="faq-content hidden px-8 pb-6 text-slate-600 text-sm">
                                Always back up your data, then perform a factory reset or use data wiping software. For added security, physically destroy hard drives or use certified recyclers that provide data destruction services.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .category-btn { color: #64748b; font-weight: 500; transition: all 0.3s ease; }
    .category-btn:hover { background-color: #ecfdf5; color: #059669; }
    .category-btn.active { background-color: #059669; color: white; font-weight: 700; box-shadow: 0 10px 15px -3px rgba(16, 185, 129, 0.2); }
    .faq-toggle i.rotate-180 { transform: rotate(180deg); }
</style>

<script>
    // FAQ toggle functionality
    document.querySelectorAll('.faq-toggle').forEach(button => {
        button.addEventListener('click', () => {
            const content = button.nextElementSibling;
            const icon = button.querySelector('i');
            content.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        });
    });

    // Resource filtering
    function filterResources(category) {
        const resources = document.querySelectorAll('.resource-card');
        const buttons = document.querySelectorAll('.category-btn');

        // Update active button styling
        buttons.forEach(btn => {
            if (btn.id === `btn-${category}`) {
                btn.classList.add('active');
            } else {
                btn.classList.remove('active');
            }
        });

        // Show/hide resources
        resources.forEach(resource => {
            if (category === 'all' || resource.getAttribute('data-category') === category) {
                resource.style.display = 'flex';
                setTimeout(() => { resource.style.opacity = '1'; resource.style.transform = 'scale(1)'; }, 10);
            } else {
                resource.style.opacity = '0';
                resource.style.transform = 'scale(0.95)';
                setTimeout(() => resource.style.display = 'none', 300);
            }
        });
    }

    // Simple search functionality
    const searchInput = document.getElementById('resourceSearch');
    if (searchInput) {
        searchInput.addEventListener('input', () => {
            const searchTerm = searchInput.value.toLowerCase();
            const resources = document.querySelectorAll('.resource-card');

            resources.forEach(resource => {
                const title = resource.querySelector('h3').textContent.toLowerCase();
                const description = resource.querySelector('p').textContent.toLowerCase();

                if (title.includes(searchTerm) || description.includes(searchTerm)) {
                    resource.style.display = 'flex';
                } else {
                    resource.style.display = 'none';
                }
            });
        });
    }

    // Handle URL parameters for filtering
    document.addEventListener('DOMContentLoaded', () => {
        const urlParams = new URLSearchParams(window.location.search);
        const filterParam = urlParams.get('filter');
        if (filterParam) {
            filterResources(filterParam);
        }
    });
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>
