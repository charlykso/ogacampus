<div id="sidebar">
    <ul class="NKJod9HBENk3gvdhekSbdl">
        <li class="vBdi38dndKDkpS"><a class="NmdoiHSo3hDbS" href="{{ route('landing-page') }}">Home</a></li>
        <li class="vBdi38dndKDkpS"><a class="NmdoiHSo3hDbS" href="{{ route('events.index') }}">Events</a></li>
        <li class="vBdi38dndKDkpS"><a class="NmdoiHSo3hDbS" href="{{ route('services.index') }}">Services</a></li>
        <li class="vBdi38dndKDkpS"><a class="NmdoiHSo3hDbS" href="{{ route('items.index') }}">Items</a></li>
        <li class="vBdi38dndKDkpS"><a class="NmdoiHSo3hDbS" href="">Store</a></li>

        @guest
            <li class="vBdi38dndKDkpS"><a class="NmdoiHSo3hDbS" href="{{ route('login') }}">Login</a></li>
            <li class="vBdi38dndKDkpS"><a class="NmdoiHSo3hDbS" href="{{ route('register') }}">Register</a></li>
        @endguest
        @auth
            <li class="vBdi38dndKDkpS"><a class="NmdoiHSo3hDbS" href="{{ route('account.dashboard') }}">My Account</a></li>
            <li class="vBdi38dndKDkpS">
                <a class="NmdoiHSo3hDbS" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        @endauth
    </ul>
</div>
