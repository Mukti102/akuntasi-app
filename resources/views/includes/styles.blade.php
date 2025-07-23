<script src="https://cdn.tailwindcss.com"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<link rel="shortcut icon" href="{{ asset('storage/' . setting('site_favicon')) }}" type="image/x-icon">
<style>
    * {
        font-family: 'Inter', sans-serif;
    }

    .neon-glow {
        box-shadow: 0 0 20px rgba(59, 130, 246, 0.4), 0 0 40px rgba(59, 130, 246, 0.2);
    }

    .glass-card {
        background: rgba(255, 255, 255, 0.1);
    }

    .active {
        background: #667eea;
        color: white;
    }

    .active:hover {
        background: #5a67d8;
        color: white;
    }

    



    .gradient-text {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .aurora-bg {
        background: linear-gradient(45deg, #667eea 0%, #764ba2 25%, #f093fb 50%, #f5576c 75%, #4facfe 100%);
        background-size: 400% 400%;
        animation: aurora 10s ease infinite;
    }

    @keyframes aurora {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }

    .floating {
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-10px);
        }
    }

    .pulse-glow {
        animation: pulseGlow 2s infinite;
    }

    @keyframes pulseGlow {

        0%,
        100% {
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
        }

        50% {
            box-shadow: 0 0 30px rgba(59, 130, 246, 0.6);
        }
    }

    .slide-in-right {
        animation: slideInRight 0.6s ease-out;
    }

    @keyframes slideInRight {
        from {
            transform: translateX(100px);
            opacity: 0;
        }

        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    .scale-hover {
        transition: transform 0.3s ease;
    }

    .scale-hover:hover {
        transform: scale(1.05) rotateY(5deg);
    }

    body {
        background: #fafaff;
    }

    td{
        color: #383838dd !important;
        font-weight: 600
    }
    h2{
        color: #383838dd !important;
        font-weight: 600;
    }
    textarea{
        color: #383838dd !important;
        font-weight: 600;
        border: 1px solid #d4d4d4;
    }

    label{
        color: #383838dd !important;
        font-weight: 600;
    }

    select{
        color: #383838dd !important;
        font-weight: 600;
        border: 1px solid #d4d4d4;
    }

    .cosmic-bg {
        background: #f3f3f3;
    }

    .sidebar-gradient {
        background: linear-gradient(180deg, rgba(249, 249, 249, 0.95) 0%, rgba(255, 255, 255, 0.943) 100%);
        backdrop-filter: blur(20px);
        border-right: 1px solid rgba(255, 253, 253, 0.61);
    }

    .nav-item {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        color: black
    }

    .nav-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        transition: left 0.5s;
    }

    .nav-item:hover::before {
        left: 100%;
    }

    .nav-item:hover {
        transform: translateX(10px);
        color: black;
    }

    .stat-card {
        background: white;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .stat-card:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
    }

    .data-table {
        background: white;
        box-shadow:rgba(0, 0, 0, 0.3);
        overflow: hidden;
    }


    .table-row {
        transition: all 0.3s ease;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }

    .form-card {
        background: white;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .futuristic-input {
        background: rgba(255, 255, 255, 0.05);
        color: gray;
        transition: all 0.3s ease;
    }

    .futuristic-input:focus {
        background: rgba(255, 255, 255, 0.1);
        border-color: #3b82f6;
        box-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
        outline: none;
    }

    .cyber-button {
        background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .cyber-button::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }

    .cyber-button:hover::before {
        left: 100%;
    }

    .cyber-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(59, 130, 246, 0.4);
    }

    .notification-ping {
        animation: ping 2s cubic-bezier(0, 0, 0.2, 1) infinite;
    }

    .avatar-ring {
        background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        padding: 2px;
        border-radius: 50%;
    }

    .dropdown-glass {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .chart-container {
        background: rgba(15, 15, 35, 0.6);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .progress-bar {
        background: linear-gradient(90deg, #3b82f6 0%, #8b5cf6 50%, #ec4899 100%);
        height: 4px;
        border-radius: 2px;
        animation: progressFlow 3s ease-in-out infinite;
    }

    @keyframes progressFlow {

        0%,
        100% {
            opacity: 0.6;
        }

        50% {
            opacity: 1;
        }
    }

    .sparkle {
        animation: sparkle 1.5s ease-in-out infinite alternate;
    }

    @keyframes sparkle {
        0% {
            opacity: 0.3;
            transform: scale(0.8);
        }

        100% {
            opacity: 1;
            transform: scale(1.2);
        }
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
