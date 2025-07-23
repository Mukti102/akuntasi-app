<script src="//unpkg.com/alpinejs" defer></script>
<script>
    // Enhanced Sidebar toggle with smooth animations
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');
    const sidebarOverlay = document.getElementById('sidebarOverlay');

    sidebarToggle.addEventListener('click', () => {
        sidebar.classList.toggle('-translate-x-full');
        sidebarOverlay.classList.toggle('hidden');

        // Add rotation animation to hamburger
        if (sidebar.classList.contains('-translate-x-full')) {
            sidebarToggle.style.transform = 'rotate(180deg)';
        } else {
            sidebarToggle.style.transform = 'rotate(0deg)';
        }
    });

    sidebarOverlay.addEventListener('click', () => {
        sidebar.classList.add('-translate-x-full');
        sidebarOverlay.classList.add('hidden');
        sidebarToggle.style.transform = 'rotate(0deg)';
    });

    // Enhanced Profile dropdown with animations
    const profileBtn = document.getElementById('profileBtn');
    const profileDropdown = document.getElementById('profileDropdown');

    profileBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        profileDropdown.classList.toggle('hidden');

        // Add scale animation
        if (!profileDropdown.classList.contains('hidden')) {
            profileDropdown.style.transform = 'scale(0.95)';
            profileDropdown.style.opacity = '0';
            setTimeout(() => {
                profileDropdown.style.transform = 'scale(1)';
                profileDropdown.style.opacity = '1';
            }, 10);
        }
    });

    document.addEventListener('click', () => {
        profileDropdown.classList.add('hidden');
    });

    profileDropdown.addEventListener('click', (e) => {
        e.stopPropagation();
    });


    // Enhanced Table interactions
    document.querySelectorAll('.table-row').forEach((row, index) => {
        row.addEventListener('click', () => {
            // Add ripple effect
            const ripple = document.createElement('div');
            ripple.style.cssText = `
                    position: absolute;
                    border-radius: 50%;
                    background: rgba(59, 130, 246, 0.3);
                    transform: scale(0);
                    animation: ripple 0.6s linear;
                    pointer-events: none;
                `;

            const rect = row.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = (rect.width / 2 - size / 2) + 'px';
            ripple.style.top = (rect.height / 2 - size / 2) + 'px';

            row.style.position = 'relative';
            row.appendChild(ripple);

            setTimeout(() => ripple.remove(), 600);

            // Highlight selected row
            document.querySelectorAll('.table-row').forEach(r => r.classList.remove('bg-blue-500/10'));
            row.classList.add('bg-blue-500/10');
        });
    });

    // Dynamic typing animation for search placeholder
    const searchInput = document.querySelector('input[placeholder="Search..."]');
    if (searchInput) {
        const placeholders = ['Search users...', 'Find data...', 'Type to search...', 'Quick search...'];
        let currentIndex = 0;

        setInterval(() => {
            searchInput.placeholder = placeholders[currentIndex];
            currentIndex = (currentIndex + 1) % placeholders.length;
        }, 3000);
    }

    // Add CSS for ripple animation
    const style = document.createElement('style');
    style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `;
    document.head.appendChild(style);

    // Real-time clock
    function updateTime() {
        const now = new Date();
        const timeString = now.toLocaleTimeString('en-US', {
            hour12: false,
            hour: '2-digit',
            minute: '2-digit'
        });

        // You can add this to navbar if needed
        // document.getElementById('clock').textContent = timeString;
    }

    setInterval(updateTime, 1000);

    // Smooth scrolling for internal links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Initialize tooltips (basic implementation)
    document.querySelectorAll('[title]').forEach(element => {
        element.addEventListener('mouseenter', function() {
            this.setAttribute('data-original-title', this.getAttribute('title'));
            this.removeAttribute('title');
        });

        element.addEventListener('mouseleave', function() {
            this.setAttribute('title', this.getAttribute('data-original-title'));
            this.removeAttribute('data-original-title');
        });
    });



    // sweetalert confrim

    function confirmDelete(id) {
        Swal.fire({
            title: 'Apakah kamu yakin?',
            text: "Data akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(`delete-form-${id}`).submit();
            }
        });
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

