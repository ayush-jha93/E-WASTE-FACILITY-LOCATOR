    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-300 pt-16 pb-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                <div class="space-y-6">
                    <a href="index.php" class="flex items-center gap-3">
                        <div class="bg-emerald-600 p-2 rounded-lg">
                            <i class="fas fa-recycle text-white text-xl"></i>
                        </div>
                        <span class="text-2xl font-bold text-white">EcoRecycle</span>
                    </a>
                    <p class="leading-relaxed">
                        Leading India's transition to a circular economy by providing accessible and responsible e-waste recycling solutions for everyone.
                    </p>
                    <div class="flex gap-4">
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-emerald-600 hover:text-white transition-all">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-emerald-600 hover:text-white transition-all">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-emerald-600 hover:text-white transition-all">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-emerald-600 hover:text-white transition-all">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h4 class="text-white text-lg font-semibold mb-6">Quick Links</h4>
                    <ul class="space-y-4">
                        <li><a href="index.php" class="hover:text-emerald-400 transition-colors">Home</a></li>
                        <li><a href="Facility.php" class="hover:text-emerald-400 transition-colors">Find Centers</a></li>
                        <li><a href="Resources.php" class="hover:text-emerald-400 transition-colors">Resources</a></li>
                        <li><a href="contact.php" class="hover:text-emerald-400 transition-colors">Contact Us</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-white text-lg font-semibold mb-6">Resources</h4>
                    <ul class="space-y-4">
                        <li><a href="Resources.php?filter=guides" class="hover:text-emerald-400 transition-colors">Recycling Guides</a></li>
                        <li><a href="Resources.php?filter=articles" class="hover:text-emerald-400 transition-colors">Latest News</a></li>
                        <li><a href="Resources.php?filter=tools" class="hover:text-emerald-400 transition-colors">Impact Calculator</a></li>
                        <li><a href="Resources.php?filter=videos" class="hover:text-emerald-400 transition-colors">Educational Videos</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-white text-lg font-semibold mb-6">Contact Info</h4>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <i class="fas fa-map-marker-alt text-emerald-500 mt-1"></i>
                            <span>456 Green Towers, Bengaluru, KA 560001</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-phone text-emerald-500"></i>
                            <span>+91 1800-123-4567</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-envelope text-emerald-500"></i>
                            <span>support@ecorecycle.in</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-slate-800 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-sm">
                <p>© <?= date('Y') ?> EcoRecycle India. All rights reserved.</p>
                <div class="flex gap-6">
                    <a href="#" class="hover:text-white">Privacy Policy</a>
                    <a href="#" class="hover:text-white">Terms of Service</a>
                    <a href="#" class="hover:text-white">Cookies Management</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
