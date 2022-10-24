<section id="HdBS__SNksuYDHn">
    <div class="SnhBsvwkSU2oudSO">
        <div id="GDJh93gjSk2vjj" class="flex justify-center">
            <a class="HSosjhs2SHdpshw {{ $activeTab == 'about' ? 'active' : '' }}" href="{{ route('services.slug', $slug) }}">About</a>
            <a class="HSosjhs2SHdpshw {{ $activeTab == 'projects' ? 'active' : '' }}" href="{{ route('services.slug.projects', $slug) }}">Past Projects</a>
            <a class="HSosjhs2SHdpshw {{ $activeTab == 'reviews' ? 'active' : '' }}" href="{{ route('services.slug.reviews', $slug) }}">Reviews</a>
        </div>
    </div>
</section>