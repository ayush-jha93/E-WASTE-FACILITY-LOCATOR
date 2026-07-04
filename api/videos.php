<?php 
$page_title = "Educational Videos | EcoRecycle";
include __DIR__ . '/includes/header.php'; ?>

<!-- Hero Section -->
<section class="bg-slate-900 text-white py-20 relative overflow-hidden">
    <div class="absolute inset-0 opacity-20">
        <img src="/assets/img/bg-resources.jpg" alt="Background" class="w-full h-full object-cover">
    </div>
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-4xl md:text-5xl font-extrabold mb-4">Educational Gallery</h1>
        <p class="text-xl text-slate-300 max-w-2xl mx-auto">See the impact of your actions through our curated collection of facility tours and documentaries.</p>
    </div>
</section>

<!-- Video Gallery Section -->
<section class="py-24 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
            <div class="max-w-2xl">
                <h2 class="text-3xl font-bold text-slate-900 mb-4">E-Waste Facility Operations</h2>
                <p class="text-slate-600 leading-relaxed">
                    Learn how India responsibly processes electronic waste through state-of-the-art facilities and innovative recycling technologies.
                </p>
            </div>
            <div class="flex gap-4">
                <span class="inline-flex items-center gap-2 px-4 py-2 bg-emerald-50 text-emerald-600 rounded-full text-sm font-bold">
                    <i class="fas fa-play-circle"></i> High Quality
                </span>
                <span class="inline-flex items-center gap-2 px-4 py-2 bg-teal-50 text-teal-600 rounded-full text-sm font-bold">
                    <i class="fas fa-clock"></i> Updated 2024
                </span>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            <!-- Video 1 -->
            <div class="video-card group cursor-pointer" onclick="openModal('https://www.youtube.com/embed/fS3_v0F6B_g', 'What is E-WASTE Pollution?')">
                <div class="relative rounded-[2rem] overflow-hidden bg-slate-100 shadow-lg aspect-video">
                    <img src="/assets/img/th1.png" alt="Video Thumbnail" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-slate-900/40 group-hover:bg-slate-900/20 transition-all flex items-center justify-center">
                        <div class="w-20 h-20 bg-emerald-600 text-white rounded-full flex items-center justify-center shadow-2xl transform group-hover:scale-110 transition-all">
                            <i class="fas fa-play text-2xl ml-1"></i>
                        </div>
                    </div>
                </div>
                <div class="mt-8 px-2">
                    <div class="flex items-center gap-3 mb-3 text-emerald-600 font-bold text-xs uppercase tracking-widest">
                        <span>Educational</span>
                        <span class="w-1 h-1 rounded-full bg-slate-300"></span>
                        <span>5:02 min</span>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 group-hover:text-emerald-600 transition-colors">What is E-WASTE Pollution? | Causes & Impact</h3>
                </div>
            </div>

            <!-- Video 2 -->
            <div class="video-card group cursor-pointer" onclick="openModal('https://www.youtube.com/embed/mK99SBe6zL8', 'India\'s Waste Problem')">
                <div class="relative rounded-[2rem] overflow-hidden bg-slate-100 shadow-lg aspect-video">
                    <img src="/assets/img/th2.png" alt="Video Thumbnail" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-slate-900/40 group-hover:bg-slate-900/20 transition-all flex items-center justify-center">
                        <div class="w-20 h-20 bg-emerald-600 text-white rounded-full flex items-center justify-center shadow-2xl transform group-hover:scale-110 transition-all">
                            <i class="fas fa-play text-2xl ml-1"></i>
                        </div>
                    </div>
                </div>
                <div class="mt-8 px-2">
                    <div class="flex items-center gap-3 mb-3 text-emerald-600 font-bold text-xs uppercase tracking-widest">
                        <span>Documentary</span>
                        <span class="w-1 h-1 rounded-full bg-slate-300"></span>
                        <span>8:45 min</span>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 group-hover:text-emerald-600 transition-colors">Inside the solution to India's waste problem</h3>
                </div>
            </div>

            <!-- Video 3 -->
            <div class="video-card group cursor-pointer" onclick="openModal('https://www.youtube.com/embed/irO6_6t_2pM', 'Business of Recycling')">
                <div class="relative rounded-[2rem] overflow-hidden bg-slate-100 shadow-lg aspect-video">
                    <img src="/assets/img/th3.png" alt="Video Thumbnail" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-slate-900/40 group-hover:bg-slate-900/20 transition-all flex items-center justify-center">
                        <div class="w-20 h-20 bg-emerald-600 text-white rounded-full flex items-center justify-center shadow-2xl transform group-hover:scale-110 transition-all">
                            <i class="fas fa-play text-2xl ml-1"></i>
                        </div>
                    </div>
                </div>
                <div class="mt-8 px-2">
                    <div class="flex items-center gap-3 mb-3 text-emerald-600 font-bold text-xs uppercase tracking-widest">
                        <span>Industry Insight</span>
                        <span class="w-1 h-1 rounded-full bg-slate-300"></span>
                        <span>12:20 min</span>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 group-hover:text-emerald-600 transition-colors">Recycling e-waste - Good for business and environment</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Video Modal -->
<div id="videoModal" class="fixed inset-0 z-[100] flex items-center justify-center bg-slate-900/90 backdrop-blur-sm opacity-0 invisible transition-all duration-300 p-4">
    <div class="relative w-full max-w-5xl bg-black rounded-[2rem] overflow-hidden shadow-2xl transform scale-95 transition-transform duration-300" id="modalContainer">
        <div class="absolute top-0 left-0 right-0 p-6 flex justify-between items-center bg-gradient-to-b from-black/80 to-transparent z-10">
            <h4 id="modalTitle" class="text-white font-bold text-xl">Video Player</h4>
            <button onclick="closeModal()" class="w-10 h-10 rounded-full bg-white/20 hover:bg-white/40 text-white flex items-center justify-center backdrop-blur transition-all">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="aspect-video w-full bg-black">
            <iframe id="videoPlayer" class="w-full h-full" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
</div>

<script>
    function openModal(videoUrl, title) {
        const modal = document.getElementById('videoModal');
        const container = document.getElementById('modalContainer');
        const player = document.getElementById('videoPlayer');
        const titleEl = document.getElementById('modalTitle');
        
        titleEl.innerText = title;
        player.src = videoUrl;
        
        modal.classList.remove('invisible');
        modal.classList.add('opacity-100');
        container.classList.remove('scale-95');
        container.classList.add('scale-100');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        const modal = document.getElementById('videoModal');
        const container = document.getElementById('modalContainer');
        const player = document.getElementById('videoPlayer');
        
        modal.classList.add('invisible');
        modal.classList.remove('opacity-100');
        container.classList.add('scale-95');
        container.classList.remove('scale-100');
        player.src = '';
        document.body.style.overflow = 'auto';
    }

    // Close on click outside
    document.getElementById('videoModal').addEventListener('click', (e) => {
        if (e.target === document.getElementById('videoModal')) {
            closeModal();
        }
    });

    // Close on escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeModal();
    });
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>
