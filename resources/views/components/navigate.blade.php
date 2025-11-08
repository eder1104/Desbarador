<nav class="navbar-colombia shadow-md">
    <div class="container mx-auto px-6 py-3 flex justify-between items-center">
        <a href="{{ url('/') }}" class="flex items-center space-x-2 text-white font-bold text-xl logo-colombia">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m0 0h4m-4 0H7m10-8l2 2m-2-2v8m0 0h4m-4 0h-4" />
            </svg>
            <span>Desbarador</span>
            <img src="https://twemoji.maxcdn.com/v/latest/svg/1f1e8-1f1f4.svg"
                alt="🇨🇴" class="emoji-bandera inline ml-1" />
        </a>

        <ul class="flex space-x-6 text-white font-medium">
            <li><a href="{{ url('/') }}" class="hover:text-yellow-300 transition">Inicio</a></li>
            <li><a href="#" class="hover:text-yellow-300 transition">Convertidor</a></li>
            <li><a href="#" class="hover:text-yellow-300 transition">Acerca de</a></li>
        </ul>
    </div>
</nav>

<style>
    /* Navbar animada con colores suaves de Colombia */
    .navbar-colombia {
        background: linear-gradient(270deg, #ffdf6c, #4a68b1, #d94f4f);
        background-size: 400% 400%;
        animation: banderaMove 12s ease infinite;
        color: white;
        font-family: 'Poppins', sans-serif;
        border-bottom: 3px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
        backdrop-filter: blur(6px);
    }

    @keyframes banderaMove {
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

    .logo-colombia span {
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
    }

    .navbar-colombia ul li a {
        transition: all 0.2s ease;
    }

    .navbar-colombia ul li a:hover {
        color: #fff176;
        transform: translateY(-1px);
    }

    /* Emoji bandera */
    .emoji-bandera {
        width: 1.5em;
        height: 1.5em;
        vertical-align: middle;
    }
</style>