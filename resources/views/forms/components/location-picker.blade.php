<x-dynamic-component :component="$getFieldWrapperView()" :field="$field">
    <div x-data="{
        state: $wire.$entangle('{{ $getStatePath() }}'),
        init() {
            const map = L.map('map').setView([41.0082, 28.9784], 17);
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
            }).addTo(map);
    
            const marker = L.marker(['{{ $getRecord()->lat ?? 41.0082 }}', '{{ $getRecord()->lng ?? 28.9784 }}'], {
                draggable: true
            }).addTo(map);
    
            map.on('click', function(e) {
                const {
                    lat,
                    lng
                } = e.latlng;
                marker.setLatLng([lat, lng]);
                $wire.data.location = `${lat},${lng}`
            });
        }
    
    }">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
            integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

        <div id="map" wire:ignore></div>
        <input type="hidden" name="location" id="location" wire:model='data.location'>

        <style>
            #map {
                height: 280px;
                width: 100%;
                z-index: -1;
            }
        </style>
    </div>
</x-dynamic-component>
