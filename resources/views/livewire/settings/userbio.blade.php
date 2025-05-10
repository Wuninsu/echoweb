<section class="w-full">
    <x-settings.layout :heading="__('Profile')" :subheading="__('Update your name and email address')">
        @if (session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <form wire:submit.prevent="save">
            <div class="mb-3">
                <label>Bio</label>
                <textarea class="form-control @error('bio') border-dander is-invalid
                @enderror" wire:model.defer="bio" rows="4"></textarea>
                @error('bio')
                    <strong>
                        <small class="text-danger">{{ $message }}</small>
                    </strong>
                @enderror
            </div>
            <div class="mb-3">
                <label>Position</label>
                <input class="form-control @error('position') border-dander is-invalid
                @enderror" wire:model.defer="position" />
                @error('position')
                    <strong>
                        <small class="text-danger">{{ $message }}</small>
                    </strong>
                @enderror
            </div>
            <div class="mb-3">
                <label>LinkedIn</label>
                <input type="text" class="form-control  @error('linkedin_link') border-dander is-invalid
                @enderror" wire:model.defer="linkedin_link">
                @error('linkedin_link')
                    <strong>
                        <small class="text-danger">{{ $message }}</small>
                    </strong>
                @enderror
            </div>

            <div class="mb-3">
                <label>GitHub</label>
                <input type="text" class="form-control  @error('github_link')
                   border-dander is-invalid @enderror" wire:model.defer="github_link">
                @error('github_link')
                    <strong>
                        <small class="text-danger">{{ $message }}</small>
                    </strong>
                @enderror
            </div>

            <div class="mb-3">
                <label>Twitter</label>
                <input type="text" class="form-control  @error('x_link')
                   border-dander is-invalid @enderror" wire:model.defer="x_link">
                @error('x_link')
                    <strong>
                        <small class="text-danger">{{ $message }}</small>
                    </strong>
                @enderror
            </div>

            <div class="mb-3">
                <label>Facebook_link</label>
                <input type="text" class="form-control @error('facebook_link')
                   border-dander is-invalid @enderror" wire:model.defer="facebook_link">
                @error('facebook_link')
                    <strong>
                        <small class="text-danger">{{ $message }}</small>
                    </strong>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary float-right" wire:loading.attr="disabled">
                <span wire:loading.remove>Update Profile</span>
                <span wire:loading wire:target="save">
                    <i class="fas fa-spinner fa-spin"></i>
                    Updating, please wait...
                </span>
            </button>
        </form>
    </x-settings.layout>
</section>