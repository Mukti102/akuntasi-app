<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - AKUNTANSI-APP</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary-dark': '#1a1b2e',
                        'secondary-dark': '#2d3748',
                        'accent-blue': '#4299e1',
                        'accent-purple': '#9f7aea',
                        'success-green': '#48bb78',
                    }
                }
            }
        }
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-primary-dark via-secondary-dark to-slate-800 min-h-screen flex items-center justify-center p-4">
    
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 25% 25%, #4299e1 0%, transparent 50%), radial-gradient(circle at 75% 75%, #9f7aea 0%, transparent 50%);"></div>
    </div>

    @yield('content')

    <script>
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const passwordIcon = document.getElementById('password-icon');
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                passwordIcon.classList.remove('fa-eye');
                passwordIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                passwordIcon.classList.remove('fa-eye-slash');
                passwordIcon.classList.add('fa-eye');
            }
        }


        function demoLogin() {
            document.getElementById('email').value = 'demo@akuntansi-app.com';
            document.getElementById('password').value = 'demo123';
            
            // Auto submit after filling demo credentials
            setTimeout(() => {
                document.querySelector('form').dispatchEvent(new Event('submit'));
            }, 500);
        }

        // Add subtle animations on load
        window.addEventListener('load', () => {
            const card = document.querySelector('.bg-slate-800\\/90');
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                card.style.transition = 'all 0.6s ease-out';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, 100);
        });
    </script>
</body>
</html>