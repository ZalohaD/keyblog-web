<div class="modal-overlay fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="modal-content bg-gray-700 rounded-lg shadow-xl max-w-md w-full mx-4 transform scale-95 opacity-0 transition-all duration-300">

        <!-- Modal Header -->
        <div class="flex items-center justify-between p-6 border-b border-gray-600">
            <h2 class="text-xl text-center font-bold text-white">Login Required</h2>
            <button class="modal-close text-gray-100 hover:text-gray-300 text-2xl font-bold leading-none" style="cursor: pointer">
                &times;
            </button>
        </div>

        <!-- Modal Body -->
        <div class="p-6 text-center">
            <div class="mb-4">
                <svg class="mx-auto h-12 w-12 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.5 0L4.268 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                </svg>
            </div>

            <h3 class="text-lg font-semibold text-white mb-2">
                Sorry you cannot save post right now
            </h3>

            <p class="text-gray-100 mb-6">
                You must be logged in to save post
            </p>
        </div>

        <!-- Modal Footer -->
        <div class="flex gap-3 p-6 border-t border-gray-200">
            <button class="modal-close flex-1 px-4 py-2 text-white-700 bg-gray-800 rounded-md hover:bg-gray-400 transition-colors font-medium">
                Cancel
            </button>
            <a href="{{ route('login') }}" class="flex-1 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors font-medium text-center">
                Go to Login
            </a>
        </div>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        class LoginModal {
            constructor() {
                this.overlay = document.querySelector('.modal-overlay');
                this.content = document.querySelector('.modal-content');
                this.bindEvents();
            }

            bindEvents() {
                // Open modal for save post buttons
                document.querySelectorAll('.save-post-btn').forEach(btn => {
                    btn.addEventListener('click', (e) => {
                        e.preventDefault();
                        this.open();
                    });
                });

                // Close modal events
                document.querySelectorAll('.modal-close').forEach(btn => {
                    btn.addEventListener('click', () => this.close());
                });

                // Close on overlay click
                this.overlay?.addEventListener('click', (e) => {
                    if (e.target === this.overlay) {
                        this.close();
                    }
                });

                // Close on ESC key
                document.addEventListener('keydown', (e) => {
                    if (e.key === 'Escape' && this.overlay && !this.overlay.classList.contains('hidden')) {
                        this.close();
                    }
                });
            }

            open() {
                if (!this.overlay) return;

                this.overlay.classList.remove('hidden');
                this.overlay.classList.add('flex');

                setTimeout(() => {
                    this.content?.classList.remove('scale-95', 'opacity-0');
                    this.content?.classList.add('scale-100', 'opacity-100');
                }, 10);

                document.body.style.overflow = 'hidden';
            }

            close() {
                if (!this.overlay) return;

                this.content?.classList.remove('scale-100', 'opacity-100');
                this.content?.classList.add('scale-95', 'opacity-0');

                setTimeout(() => {
                    this.overlay.classList.add('hidden');
                    this.overlay.classList.remove('flex');
                }, 300);

                document.body.style.overflow = '';
            }
        }

        new LoginModal();
    });
</script>
