<section class="w-full"> 
    <x-settings.layout :heading="__('Appearance')" :subheading="__('Update the appearance settings for your account')">
        <div class="mb-4">
            <h2 class="h4">{{ __('Appearance') }}</h2>
            <p class="text-muted">{{ __('Update the appearance settings for your account') }}</p>

            <div class="btn-group mt-3" role="group" aria-label="Appearance options">
                <input type="radio" class="btn-check" name="appearance" id="appearance-light" autocomplete="off"
                    wire:click="$set('theme', 'light')">
                <label class="btn btn-outline-primary" for="appearance-light">
                    <i class="bi bi-sun me-1"></i> {{ __('Light') }}
                </label>

                <input type="radio" class="btn-check" name="appearance" id="appearance-dark" autocomplete="off"
                    wire:click="$set('theme', 'dark')">
                <label class="btn btn-outline-primary" for="appearance-dark">
                    <i class="bi bi-moon me-1"></i> {{ __('Dark') }}
                </label>

                <input type="radio" class="btn-check" name="appearance" id="appearance-system" autocomplete="off"
                    wire:click="$set('theme', 'system')">
                <label class="btn btn-outline-primary" for="appearance-system">
                    <i class="bi bi-laptop me-1"></i> {{ __('System') }}
                </label>
            </div>

        </div>
    </x-settings.layout>
    @script
        {{-- <script>
            const html = document.documentElement;

            $wire.on('theme-changed', event => {
                const theme = event.data.theme;
                console.log(event.data.theme);

                let newTheme;
                if (theme === 'system') {
                    newTheme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
                } else {
                    newTheme = theme;
                }

                html.setAttribute('data-bs-theme', newTheme);
                localStorage.setItem('bsTheme', newTheme);
            });

            // Apply stored theme on load
            document.addEventListener('DOMContentLoaded', () => {
                const storedTheme = localStorage.getItem('bsTheme');
                if (storedTheme) {
                    html.setAttribute('data-bs-theme', storedTheme);
                }
            });
        </script> --}}
        <script>
            const html = document.documentElement;

            // Listen to theme change event from Livewire
            $wire.on('theme-changed', event => {
                const theme = event.data.theme;
                console.log(event.data.theme);

                let newTheme;
                if (theme === 'system') {
                    newTheme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
                } else {
                    newTheme = theme;
                }

                html.setAttribute('data-bs-theme', newTheme);
                localStorage.setItem('bsTheme', newTheme);

                // Update the radio buttons based on the selected theme
                updateRadioSelection(newTheme);
            });

            // Apply stored theme on load and update the radio selection
            document.addEventListener('DOMContentLoaded', () => {
                const storedTheme = localStorage.getItem('bsTheme');
                if (storedTheme) {
                    html.setAttribute('data-bs-theme', storedTheme);
                    updateRadioSelection(storedTheme);
                }
            });

            // Update the radio selection based on theme
            function updateRadioSelection(theme) {
                const radioButtons = document.querySelectorAll('input[name="appearance"]');
                radioButtons.forEach(radio => {
                    if (radio.value === theme) {
                        radio.checked = true;
                    }
                });
            }
        </script>
    @endscript




</section>
