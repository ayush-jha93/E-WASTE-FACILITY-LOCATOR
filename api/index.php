<?php
$page_title = "Home | EcoRecycle - India's E-Waste Facility Locator";
// Initialize variables to avoid undefined warnings
$ewaste_facilities = [];
$search_results = [];
$search_pincode = "";

// Load facilities from JSON
$json_path = __DIR__ . '/../data/facilities.json';
if (file_exists($json_path)) {
    $json_data = file_get_contents($json_path);
    $ewaste_facilities = json_decode($json_data, true) ?: [];
}

// Process search if form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["pincode"])) {
    $search_pincode = trim($_POST["pincode"]);
    if (!empty($ewaste_facilities)) {
        $search_results = array_filter($ewaste_facilities, fn($f) => $f["pincode"] == $search_pincode);
    }
}

include __DIR__ . '/includes/header.php';
?>

<!-- Hero Section -->
<section class="relative h-[600px] flex items-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="/assets/img/BG-HOME.jpg" alt="Hero Background" class="w-full h-full object-cover scale-110 animate-slow-zoom">
        <div class="absolute inset-0 bg-gradient-to-r from-slate-900/90 to-slate-900/40"></div>
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-3xl">
            <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-6 leading-tight">
                Dispose of Your E-Waste <span class="text-emerald-400">Responsibly.</span>
            </h1>
            <p class="text-xl text-slate-200 mb-10 leading-relaxed max-w-2xl">
                Join thousands of Indians in protecting our environment. Find certified collection centers near you and turn your old electronics into sustainable resources.
            </p>
            
            <div class="bg-white/10 backdrop-blur-md p-2 rounded-2xl border border-white/20 shadow-2xl max-w-xl">
                <form method="POST" action="" class="flex flex-col sm:flex-row gap-2">
                    <div class="relative flex-grow">
                        <i class="fas fa-map-pin absolute left-4 top-1/2 -translate-y-1/2 text-emerald-500"></i>
                        <input
                            type="text"
                            name="pincode"
                            placeholder="Enter 6-digit Pincode"
                            class="w-full pl-12 pr-4 py-4 rounded-xl text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-400 font-medium"
                            maxlength="6"
                            pattern="\d{6}"
                            required
                            value="<?= htmlspecialchars($search_pincode) ?>">
                    </div>
                    <button
                        type="submit"
                        class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold px-8 py-4 rounded-xl transition-all shadow-lg hover:shadow-emerald-500/30 flex items-center justify-center gap-2">
                        <span>Search</span>
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
            
            <div class="mt-8 flex flex-wrap gap-6 text-slate-300 text-sm">
                <div class="flex items-center gap-2">
                    <i class="fas fa-check-circle text-emerald-500"></i>
                    <span>Certified Recyclers</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="fas fa-check-circle text-emerald-500"></i>
                    <span>Secure Data Destruction</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="fas fa-check-circle text-emerald-500"></i>
                    <span>Zero Landfill Policy</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Search Results -->
<?php if (!empty($search_results)): ?>
    <section class="py-20 bg-emerald-50" id="results">
        <div class="container mx-auto px-4">
            <div class="flex items-end justify-between mb-12">
                <div>
                    <h2 class="text-3xl font-bold text-slate-900 mb-2">Results for Pincode: <span class="text-emerald-600"><?= htmlspecialchars($search_pincode) ?></span></h2>
                    <p class="text-slate-600">We found <?= count($search_results) ?> certified facilities in your area.</p>
                </div>
                <a href="Facility.php" class="text-emerald-600 font-semibold hover:underline flex items-center gap-2">
                    View All Facilities <i class="fas fa-arrow-right text-sm"></i>
                </a>
            </div>
            
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                <?php foreach ($search_results as $facility): ?>
                    <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 group">
                        <div class="flex justify-between items-start mb-6">
                            <div class="bg-emerald-100 p-3 rounded-xl text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                                <i class="fas fa-<?= htmlspecialchars($facility['icon'] ?? 'recycle', ENT_QUOTES, 'UTF-8') ?> text-2xl"></i>
                            </div>
                            <?php if (isset($facility['rating'])): ?>
                                <div class="flex items-center gap-1 text-amber-500 bg-amber-50 px-2 py-1 rounded-lg text-sm font-bold">
                                    <i class="fas fa-star"></i>
                                    <span><?= htmlspecialchars($facility['rating']) ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3"><?= htmlspecialchars($facility["name"]) ?></h3>
                        <p class="text-slate-600 mb-4 flex items-start gap-3">
                            <i class="fas fa-map-marker-alt text-emerald-500 mt-1"></i>
                            <span><?= htmlspecialchars($facility["address"]) ?></span>
                        </p>
                        <p class="text-slate-600 mb-6 flex items-center gap-3">
                            <i class="fas fa-phone text-emerald-500"></i>
                            <span><?= htmlspecialchars($facility["contact"]) ?></span>
                        </p>
                        <a href="Facility.php?pincode=<?= htmlspecialchars($facility['pincode']) ?>" class="w-full inline-block text-center py-3 rounded-xl border-2 border-emerald-600 text-emerald-600 font-bold hover:bg-emerald-600 hover:text-white transition-all">
                            View Details
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php elseif ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
    <section class="py-20 bg-slate-50 text-center">
        <div class="container mx-auto px-4">
            <div class="max-w-lg mx-auto bg-white p-12 rounded-3xl shadow-sm border border-slate-100">
                <div class="w-20 h-20 bg-red-50 text-red-500 rounded-full flex items-center justify-center mx-auto mb-6 text-3xl">
                    <i class="fas fa-search-location"></i>
                </div>
                <h3 class="text-2xl font-bold text-slate-900 mb-4">No Facilities Found</h3>
                <p class="text-slate-600 mb-8">We couldn't find any collection centers for <span class="font-bold text-slate-900"><?= htmlspecialchars($search_pincode) ?></span>. Try a nearby area or check our comprehensive list.</p>
                <a href="Facility.php" class="inline-block bg-slate-900 text-white px-8 py-3 rounded-xl font-bold hover:bg-slate-800 transition-all">
                    Browse All Facilities
                </a>
            </div>
        </div>
    </section>
<?php endif; ?>

<!-- Animation Section -->
<section class="py-20 bg-white overflow-hidden">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center gap-16">
            <div class="w-full md:w-1/2 relative">
                <div class="absolute -top-10 -left-10 w-40 h-40 bg-emerald-100 rounded-full filter blur-3xl opacity-60"></div>
                <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-teal-100 rounded-full filter blur-3xl opacity-60"></div>
                <div id="waste-Ani" class="w-full max-w-[500px] mx-auto relative z-10 transition-transform hover:scale-105 duration-700"></div>
            </div>
            <div class="w-full md:w-1/2">
                <h2 class="text-4xl md:text-5xl font-extrabold text-slate-900 mb-6 leading-tight">
                    <span class="text-emerald-600">"Turning</span> Electronic <span class="text-slate-400">Waste</span> into <span class="text-teal-500">Sustainable Resources."</span>
                </h2>
                <p class="text-lg text-slate-600 mb-10 leading-relaxed">
                    E-waste contains precious metals that can be recovered and hazardous materials that must be handled safely. Our platform connects you with the right professionals to ensure every component is managed with care.
                </p>
                <div class="grid grid-cols-2 gap-8">
                    <div>
                        <div class="text-3xl font-bold text-emerald-600 mb-1" id="ewasteCounter">0</div>
                        <div class="text-slate-500 font-medium">Tons Recycled</div>
                    </div>
                    <div>
                        <div class="text-3xl font-bold text-emerald-600 mb-1" id="facilityCounter">0</div>
                        <div class="text-slate-500 font-medium">Certified Centers</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Resources Grid -->
<section class="py-24 bg-slate-50">
    <div class="container mx-auto px-4">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Empower Yourself with Knowledge</h2>
            <p class="text-slate-600">Everything you need to know about e-waste management in India, from policies to practical guides.</p>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <a href="Resources.php?filter=guides" class="group h-full">
                <div class="bg-white p-8 rounded-3xl h-full border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 flex flex-col items-center text-center">
                    <div class="w-24 h-24 mb-6 rounded-2xl bg-emerald-50 flex items-center justify-center p-4">
                        <div id="guide-Ani" class="w-full h-full"></div>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2 group-hover:text-emerald-600 transition-colors">Recycling Guides</h3>
                    <p class="text-sm text-slate-500 mb-6">Step-by-step instructions for safe disposal.</p>
                    <span class="mt-auto text-emerald-600 font-bold flex items-center gap-2">
                        Explore <i class="fas fa-chevron-right text-[10px]"></i>
                    </span>
                </div>
            </a>

            <a href="Resources.php?filter=videos" class="group h-full">
                <div class="bg-white p-8 rounded-3xl h-full border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 flex flex-col items-center text-center">
                    <div class="w-24 h-24 mb-6 rounded-2xl bg-teal-50 flex items-center justify-center p-4">
                        <div id="video-Ani" class="w-full h-full"></div>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2 group-hover:text-teal-600 transition-colors">Educational Videos</h3>
                    <p class="text-sm text-slate-500 mb-6">Visual journey into the recycling process.</p>
                    <span class="mt-auto text-teal-600 font-bold flex items-center gap-2">
                        Watch <i class="fas fa-chevron-right text-[10px]"></i>
                    </span>
                </div>
            </a>

            <a href="Resources.php?filter=articles" class="group h-full">
                <div class="bg-white p-8 rounded-3xl h-full border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 flex flex-col items-center text-center">
                    <div class="w-24 h-24 mb-6 rounded-2xl bg-sky-50 flex items-center justify-center p-4">
                        <div id="article-Ani" class="w-full h-full"></div>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2 group-hover:text-sky-600 transition-colors">Industry Articles</h3>
                    <p class="text-sm text-slate-500 mb-6">Read about latest trends and policies.</p>
                    <span class="mt-auto text-sky-600 font-bold flex items-center gap-2">
                        Read More <i class="fas fa-chevron-right text-[10px]"></i>
                    </span>
                </div>
            </a>

            <a href="Resources.php?filter=tools" class="group h-full">
                <div class="bg-white p-8 rounded-3xl h-full border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 flex flex-col items-center text-center">
                    <div class="w-24 h-24 mb-6 rounded-2xl bg-indigo-50 flex items-center justify-center p-4">
                        <div id="tools-Ani" class="w-full h-full"></div>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2 group-hover:text-indigo-600 transition-colors">Impact Tools</h3>
                    <p class="text-sm text-slate-500 mb-6">Calculate your environmental footprint.</p>
                    <span class="mt-auto text-indigo-600 font-bold flex items-center gap-2">
                        Try Out <i class="fas fa-chevron-right text-[10px]"></i>
                    </span>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="py-24 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-slate-900 mb-16">Trusted by Thousands</h2>
        <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">
            <div class="bg-slate-50 p-10 rounded-3xl relative overflow-hidden group">
                <div class="absolute top-0 right-0 p-4 text-slate-200 text-8xl transition-transform group-hover:scale-110">
                    <i class="fas fa-quote-right"></i>
                </div>
                <div class="relative z-10">
                    <div class="flex items-center mb-6">
                        <div class="w-14 h-14 bg-emerald-600 rounded-2xl flex items-center justify-center text-white font-bold text-xl mr-5 shadow-lg">PP</div>
                        <div>
                            <h4 class="font-bold text-slate-900 text-lg">Priya Patel</h4>
                            <p class="text-emerald-600 font-medium">Small Business Owner</p>
                        </div>
                    </div>
                    <p class="text-slate-700 italic text-lg leading-relaxed mb-6">"EcoRecycle made it simple to dispose of our old office computers responsibly. The facility was professional and even provided documentation for our records."</p>
                    <div class="text-amber-400">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
            <div class="bg-slate-50 p-10 rounded-3xl relative overflow-hidden group">
                <div class="absolute top-0 right-0 p-4 text-slate-200 text-8xl transition-transform group-hover:scale-110">
                    <i class="fas fa-quote-right"></i>
                </div>
                <div class="relative z-10">
                    <div class="flex items-center mb-6">
                        <div class="w-14 h-14 bg-teal-600 rounded-2xl flex items-center justify-center text-white font-bold text-xl mr-5 shadow-lg">RS</div>
                        <div>
                            <h4 class="font-bold text-slate-900 text-lg">Rahul Sharma</h4>
                            <p class="text-teal-600 font-medium">IT Manager</p>
                        </div>
                    </div>
                    <p class="text-slate-700 italic text-lg leading-relaxed mb-6">"As someone who deals with a lot of electronic waste, I appreciate having a reliable directory of certified recycling centers. This service saves me hours of research."</p>
                    <div class="text-amber-400">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Lottie Animations
    function loadAnimations() {
        const animations = [
            { id: 'waste-Ani', path: '/assets/animations/Waste_Ani.json' },
            { id: 'guide-Ani', path: '/assets/animations/Guide.json' },
            { id: 'video-Ani', path: '/assets/animations/Video.json' },
            { id: 'article-Ani', path: '/assets/animations/Article.json' },
            { id: 'tools-Ani', path: '/assets/animations/Tools.json' }
        ];

        animations.forEach(ani => {
            const container = document.getElementById(ani.id);
            if (container && typeof lottie !== 'undefined') {
                lottie.loadAnimation({
                    container: container,
                    renderer: 'svg',
                    loop: true,
                    autoplay: true,
                    path: ani.path
                });
            }
        });
    }

    // Counters
    function animateCounter(elementId, target, duration = 2000) {
        const element = document.getElementById(elementId);
        if (!element) return;
        let startTimestamp = null;
        const step = (timestamp) => {
            if (!startTimestamp) startTimestamp = timestamp;
            const progress = Math.min((timestamp - startTimestamp) / duration, 1);
            element.innerText = Math.floor(progress * target).toLocaleString() + '+';
            if (progress < 1) {
                window.requestAnimationFrame(step);
            }
        };
        window.requestAnimationFrame(step);
    }

    document.addEventListener('DOMContentLoaded', () => {
        loadAnimations();
        
        const counterSection = document.getElementById('ewasteCounter');
        if (counterSection) {
            const counterObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateCounter('ewasteCounter', 12500);
                        animateCounter('facilityCounter', 850);
                        counterObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });
            counterObserver.observe(counterSection.parentElement.parentElement);
        }
    });
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>
