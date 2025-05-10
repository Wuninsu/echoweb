<div>
    <div class="mailchimp-form">
        <form class="one-field-form" wire:submit.prevent="subscribe">
            <div class="field-group">
                <label class="email-label" for="email-input">Subscribe to our newsletter</label>
                <input class="email-input @error('email') border-dander is-invalid @enderror" type="email"
                    wire:model.defer="email" id="email-input" placeholder="Email Address" autocomplete="off" />
                <div class="cta-area">
                    <input class="btn-solid subscribe-btn" type="submit" value="Subscribe" />
                </div>
            </div>
            @if (session()->has('success'))
                <small style="color: green;">{{ session('success') }}</small>
                <br>
            @endif
            @error('email')
                <small style="color: red;">{{ $message }}</small>
                <br>
            @enderror
            <span class="email-notice">*we will not share your personal info</span>
        </form>
    </div>

</div>