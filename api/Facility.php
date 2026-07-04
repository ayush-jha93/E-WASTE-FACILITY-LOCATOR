<?php
$page_title = "Find Centers | EcoRecycle - Facility Directory";
// Initialize variables to avoid undefined warnings
$ewaste_facilities = [];
$search_results = [];
$search_pincode = "";
$states = [];
$types = [];
$selected_state = "";
$selected_type = "";

// Load facilities from JSON
$json_path = __DIR__ . '/../data/facilities.json';
if (file_exists($json_path)) {
    $json_data = file_get_contents($json_path);
    $ewaste_facilities = json_decode($json_data, true) ?: [];
}

// Get unique states and types for filters
if (!empty($ewaste_facilities)) {
    $states = array_unique(array_column($ewaste_facilities, 'state'));
    sort($states);

    $all_types = [];
    foreach ($ewaste_facilities as $f) {
        if (isset($f['types'])) $all_types = array_merge($all_types, $f['types']);
    }
    $types = array_unique($all_types);
    sort($types);
}

// Process search/filter
$search_results = $ewaste_facilities;
$search_pincode = isset($_GET['pincode']) ? trim($_GET['pincode']) : (isset($_POST['pincode']) ? trim($_POST['pincode']) : "");
if ($search_pincode && !preg_match('/^\d{6}$/', $search_pincode)) {
    $search_pincode = "";
}

$selected_state = (isset($_POST['state']) && in_array($_POST['state'], $states)) ? $_POST['state'] : "";
$selected_type = (isset($_POST['type']) && in_array($_POST['type'], $types)) ? $_POST['type'] : "";

if ($search_pincode) {
    $search_results = array_filter($search_results, fn($f) => $f['pincode'] == $search_pincode);
}
if ($selected_state) {
    $search_results = array_filter($search_results, fn($f) => $f['state'] == $selected_state);
}
if ($selected_type) {
    $search_results = array_filter($search_results, fn($f) => in_array($selected_type, $f['types']));
}

include __DIR__ . '/includes/header.php';
?>

<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>

<style>
    #map { height: 500px; border-radius: 1.5rem; z-index: 10; }
    .facility-card:hover { transform: translateY(-8px); }
</style>

<!-- Page Header -->
<header class="bg-slate-900 text-white py-20 relative overflow-hidden">
    <div class="absolute inset-0 opacity-20">
        <img src="/assets/img/bg-facility.jpg" alt="Background" class="w-full h-full object-cover">
    </div>
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-4xl md:text-5xl font-extrabold mb-4">Find E-Waste Facilities</h1>
        <p class="text-xl text-slate-300 max-w-2xl mx-auto">Locate authorized collection centers across India and track them on our interactive map.</p>
    </div>
</header>

<main class="container mx-auto px-4 py-12 -mt-10 relative z-20">
    <!-- Map Section -->
    <div class="bg-white p-4 rounded-[2rem] shadow-2xl mb-12 border border-slate-100">
        <div id="map" class="shadow-inner"></div>
    </div>

    <!-- Filter Section -->
    <section class="bg-white p-8 rounded-3xl shadow-lg mb-12 border border-slate-100">
        <form method="POST" class="grid grid-cols-1 md:grid-cols-4 gap-6 items-end">
            <div class="space-y-2">
                <label class="text-sm font-bold text-slate-700 ml-1">Pincode</label>
                <div class="relative">
                    <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                    <input type="text" name="pincode" placeholder="6-digit Pincode" 
                        class="w-full pl-12 pr-4 py-3 bg-slate-50 border-none rounded-xl focus:ring-2 focus:ring-emerald-400 text-slate-800"
                        value="<?= htmlspecialchars($search_pincode) ?>">
                </div>
            </div>
            
            <div class="space-y-2">
                <label class="text-sm font-bold text-slate-700 ml-1">State</label>
                <select name="state" class="w-full px-4 py-3 bg-slate-50 border-none rounded-xl focus:ring-2 focus:ring-emerald-400 text-slate-800 appearance-none">
                    <option value="">All States</option>
                    <?php foreach ($states as $state): ?>
                        <option value="<?= htmlspecialchars($state) ?>" <?= ($selected_state == $state) ? 'selected' : '' ?>><?= htmlspecialchars($state) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="space-y-2">
                <label class="text-sm font-bold text-slate-700 ml-1">Facility Type</label>
                <select name="type" class="w-full px-4 py-3 bg-slate-50 border-none rounded-xl focus:ring-2 focus:ring-emerald-400 text-slate-800 appearance-none">
                    <option value="">All Types</option>
                    <?php if (!empty($types)): ?>
                        <?php foreach ($types as $type): ?>
                            <option value="<?= htmlspecialchars($type) ?>" <?= ($selected_type == $type) ? 'selected' : '' ?>><?= ucfirst(htmlspecialchars($type)) ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>

            <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 rounded-xl transition-all shadow-md flex items-center justify-center gap-2">
                <i class="fas fa-filter"></i> Apply Filters
            </button>
        </form>
    </section>

    <!-- Results Section -->
    <div class="flex items-center justify-between mb-8 px-2">
        <h3 class="text-2xl font-bold text-slate-900">
            Showing <span class="text-emerald-600"><?= count($search_results) ?></span> Facilities
        </h3>
        <div class="flex gap-2">
            <button class="p-2 bg-white rounded-lg shadow-sm border border-slate-200 text-slate-400 hover:text-emerald-600">
                <i class="fas fa-th-large"></i>
            </button>
            <button class="p-2 bg-white rounded-lg shadow-sm border border-slate-200 text-slate-400 hover:text-emerald-600">
                <i class="fas fa-list"></i>
            </button>
        </div>
    </div>

    <?php if (!empty($search_results)): ?>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($search_results as $facility): ?>
                <div class="bg-white rounded-[2rem] shadow-sm hover:shadow-2xl transition-all duration-500 overflow-hidden border border-slate-100 flex flex-col group facility-card">
                    <div class="h-48 bg-emerald-50 flex items-center justify-center relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-emerald-600/10 to-teal-600/10"></div>
                        <i class="fas fa-<?= htmlspecialchars($facility['icon'] ?? 'recycle', ENT_QUOTES, 'UTF-8') ?> text-6xl text-emerald-600/30 group-hover:scale-110 group-hover:text-emerald-600 transition-all duration-500"></i>
                        <span class="absolute top-4 right-4 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-xs font-bold text-emerald-700 shadow-sm">
                            <?= htmlspecialchars($facility['pincode']) ?>
                        </span>
                    </div>
                    
                    <div class="p-8 flex-grow flex flex-col">
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="text-xl font-bold text-slate-900 leading-tight"><?= htmlspecialchars($facility['name']) ?></h3>
                            <?php if (isset($facility['rating'])): ?>
                                <div class="flex items-center gap-1 text-amber-500 font-bold">
                                    <i class="fas fa-star text-sm"></i>
                                    <span><?= htmlspecialchars($facility['rating']) ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <p class="text-slate-500 text-sm mb-6 line-clamp-2">
                            <?= htmlspecialchars($facility['description'] ?? 'Certified e-waste collection and recycling facility for electronics.') ?>
                        </p>
                        
                        <div class="space-y-3 mb-8">
                            <div class="flex items-start gap-3 text-sm text-slate-600">
                                <i class="fas fa-map-marker-alt text-emerald-500 mt-1"></i>
                                <span><?= htmlspecialchars($facility['address']) ?></span>
                            </div>
                            <div class="flex items-center gap-3 text-sm text-slate-600">
                                <i class="fas fa-phone text-emerald-500"></i>
                                <span><?= htmlspecialchars($facility['contact']) ?></span>
                            </div>
                        </div>

                        <div class="mt-auto pt-6 border-t border-slate-50 flex flex-wrap gap-2 mb-6">
                            <?php if (isset($facility['types'])): ?>
                                <?php foreach ($facility['types'] as $type): ?>
                                    <span class="bg-slate-100 text-slate-600 text-[10px] uppercase tracking-wider font-extrabold px-3 py-1 rounded-md">
                                        <?= htmlspecialchars($type) ?>
                                    </span>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>

                        <a href="https://www.google.com/maps/dir/?api=1&destination=<?= urlencode($facility['address']) ?>" target="_blank"
                            class="w-full flex items-center justify-center gap-2 py-3 bg-slate-900 text-white rounded-xl font-bold hover:bg-emerald-600 transition-all shadow-lg hover:shadow-emerald-200">
                            Get Directions <i class="fas fa-directions"></i>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="text-center py-20 bg-white rounded-3xl border-2 border-dashed border-slate-200">
            <div class="w-24 h-24 bg-slate-50 text-slate-300 rounded-full flex items-center justify-center mx-auto mb-6 text-4xl">
                <i class="fas fa-search"></i>
            </div>
            <h3 class="text-2xl font-bold text-slate-900 mb-2">No facilities matches your criteria</h3>
            <p class="text-slate-500">Try adjusting your filters or search for a different pincode.</p>
        </div>
    <?php endif; ?>
</main>

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script>
    // Initialize Map
    const map = L.map('map').setView([20.5937, 78.9629], 5); // Center of India

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Custom Icon
    const recycleIcon = L.divIcon({
        html: '<div class="w-8 h-8 bg-emerald-600 rounded-full border-2 border-white flex items-center justify-center shadow-lg transform -translate-x-1/2 -translate-y-1/2"><i class="fas fa-recycle text-white text-xs"></i></div>',
        className: '',
        iconSize: [0, 0]
    });

    const facilities = <?= json_encode(array_values($search_results), JSON_HEX_TAG | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE) ?>;
    const markers = [];

    if (Array.isArray(facilities)) {
        facilities.forEach(f => {
            if (f.lat && f.lng) {
                const marker = L.marker([f.lat, f.lng], { icon: recycleIcon })
                    .bindPopup(`
                        <div class="p-2">
                            <h4 class="font-bold text-emerald-600 mb-1">${f.name}</h4>
                            <p class="text-xs text-slate-600 mb-2">${f.address}</p>
                            <a href="https://www.google.com/maps/dir/?api=1&destination=${encodeURIComponent(f.address)}" target="_blank" class="text-xs font-bold text-slate-900 underline">Directions</a>
                        </div>
                    `)
                    .addTo(map);
                markers.push(marker);
            }
        });
    }

    if (markers.length > 0) {
        const group = new L.featureGroup(markers);
        map.fitBounds(group.getBounds().pad(0.1));
    }
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>
