<div>
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="save">
                <div class="row">
                    <div class="col-md-9">
                        <div class="mb-3">
                            <label class="mb-0">Title</label>
                            <input type="text" wire:model.blur="title"
                                class="form-control @error('title') border-danger is-invalid @enderror">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="mb-0">Slug</label>
                            <input type="text" wire:model="slug" @readonly(true)
                                class="form-control @error('slug') border-danger is-invalid @enderror" readonly>
                            @error('slug')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="mb-0">Content</label>
                            {{-- <p>{{ $content }}</p> --}}
                            <div wire:ignore>
                                <textarea id="content" class="form-control @error('content') border-danger is-invalid @enderror" wire:model="content"></textarea>
                            </div>
                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="mb-0">Image</label>
                            <input type="file" wire:model="image"
                                class="form-control @error('image') border-danger is-invalid @enderror">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="mt-2">
                                <span wire:loading wire:target="image" class="text-success">uploading...</span>
                                <img width="100"
                                    src="{{ $image ? $image->temporaryUrl() : asset('storage/' . ($showImg ?? NO_IMAGE)) }}"
                                    alt="" srcset="">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="mb-0">Status</label>
                            <select wire:model="status"
                                class="form-control @error('status') border-danger is-invalid @enderror">
                                <option value="draft">Draft</option>
                                <option value="published">Published</option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button class="btn btn-primary w-100">
                            {{ $post_id ? 'Edit ' : 'Create ' }} Post
                        </button>
                    </div>
                </div>
            </form>

            @if (session()->has('success'))
                <div class="alert alert-success mt-3">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>

    @script
        <script>
            // document.addEventListener('livewire:load', function() {
            // $('#summernote').summernote({
            //     placeholder: 'Write your blog content here...',
            //     height: 200,
            //     callbacks: {
            //         onChange: function(contents) {
            //             @this.set('content', contents);
            //         }
            //     }
            // });

            // Livewire.on('resetSummernote', () => {
            //     $('#summernote').summernote('reset');
            // });
            // });

            $(function() {
                $('#content').summernote({
                    placeholder: 'Enter post content',
                    tabsize: 2,
                    height: 300,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link']],
                        ['view', ['fullscreen', 'codeview', 'help']]
                    ],
                    callbacks: {
                        onChange: function(contents, $editable) {
                            @this.set('content', contents)
                        }
                    }
                });
            })
        </script>
    @endscript

</div>
