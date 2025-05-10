<div class="card">
    <div class="card-body">
        <div class="d-flex flex-md-row flex-column align-items-start">
            <div class="me-4 w-100 pb-4" style="max-width: 220px;">
              <ul class="nav flex-column nav-pills" x-data="{ activeTab: '{{ request()->route()->getName() }}' }">
    <li class="nav-item">
        <a href="{{ route('settings.profile') }}"
           @click="activeTab = 'settings.profile'"
           class="nav-link"
           :class="{ 'active': activeTab === 'settings.profile' }">
           {{ __('Profile') }}
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('settings.password') }}"
           @click="activeTab = 'settings.password'"
           class="nav-link"
           :class="{ 'active': activeTab === 'settings.password' }">
           {{ __('Password') }}
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('settings.appearance') }}"
           @click="activeTab = 'settings.appearance'"
           class="nav-link"
           :class="{ 'active': activeTab === 'settings.appearance' }">
           {{ __('Appearance') }}
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('settings.bio') }}"
           @click="activeTab = 'settings.bio'"
           class="nav-link"
           :class="{ 'active': activeTab === 'settings.bio' }">
           {{ __('Bio') }}
        </a>
    </li>
</ul>

            </div>

            <hr class="d-md-none w-100" />

            <div class="flex-grow-1 align-self-stretch pt-md-0 pt-3">
                <h2 class="h4">{{ $heading ?? '' }}</h2>
                <p class="text-muted">{{ $subheading ?? '' }}</p>

                <div class="mt-3 w-100" style="max-width: 40rem;">

                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</div>