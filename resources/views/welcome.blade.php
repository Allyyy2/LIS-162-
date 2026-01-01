<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Music Library</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="antialiased h-screen w-full bg-cover bg-center bg-no-repeat flex items-center justify-center relative overflow-hidden"
      style="background-image: url('https://assets.armadamusic.com/eyJidWNrZXQiOiJhcm1hZGFmdWdhIiwia2V5IjoidXBsb2Fkcy9uZXdzL1RyYW5jZS1NdXNpYy5qcGciLCJlZGl0cyI6eyJqcGVnIjp7InF1YWxpdHkiOjEwMCwicHJvZ3Jlc3NpdmUiOnRydWUsInRyZWxsaXNRdWFudGlzYXRpb24iOnRydWUsIm92ZXJzaG9vdERlcmluZ2luZyI6dHJ1ZSwib3B0aW1pemVTY2FucyI6dHJ1ZX0sInJlc2l6ZSI6eyJ3aWR0aCI6MTUwMCwiaGVpZ2h0Ijo4MDAsImZpdCI6ImNvdmVyIn0sInNoYXJwZW4iOnRydWV9fQ==');">

    <div class="absolute inset-0 bg-black/50 backdrop-blur-[2px]"></div>

    <div class="bg-white rounded-2xl shadow-2xl flex flex-col md:flex-row w-full max-w-5xl overflow-hidden z-10 m-4 h-[720px] md:h-auto">
        
        {{-- LEFT SIDE: BLUE GRADIENT AREA --}}
        <div class="w-full md:w-1/2 bg-gradient-to-br from-blue-600 to-indigo-700 p-12 text-white flex flex-col justify-between relative overflow-hidden">
            <div class="absolute -top-10 -left-10 w-40 h-40 bg-blue-500 rounded-full mix-blend-multiply filter blur-xl opacity-70"></div>
            <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-indigo-500 rounded-full mix-blend-multiply filter blur-xl opacity-70"></div>
            
            <div class="relative z-10 font-bold text-xs tracking-widest uppercase opacity-80 flex items-center gap-3 mb-10">
                Hello, Welcome!
            </div>

            <div class="relative z-8 mb-8">
                <h1 class="text-5xl font-bold mb-6 leading-tight">
                    Love your music,<br>build your <br>library.
                </h1>
                <p class="text-blue-100 text-sm opacity-90 leading-loose pr-4">
                    Music is the soundtrack of your life. Whether it's the latest hits or timeless classics,
                    organize your favorite songs in one place.
                </p>
            </div>
        </div>

        {{-- RIGHT SIDE: ACTION AREA --}}
        <div class="w-full md:w-1/2 p-12 bg-white flex flex-col justify-center items-center text-center">
            @auth
                <div class="w-full">
                    <div class="mb-6 p-4 bg-blue-50 rounded-full w-20 h-20 flex items-center justify-center mx-auto text-blue-600 text-3xl">🎧</div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-3">Welcome Back!</h2>
                    <a href="{{ url('/dashboard') }}" class="block w-full py-4 bg-blue-600 text-white font-bold rounded-xl shadow-lg hover:bg-blue-700 transition duration-300">
                        Go to Dashboard
                    </a>
                </div>
            @else
                <div class="w-full">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Get Started</h2>
                    <p class="text-gray-500 mb-10">Join your personal music cloud today.</p>

                    <div class="space-y-5">
                        <a href="{{ route('login') }}" class="group block w-full py-4 px-6 bg-blue-600 text-white font-bold rounded-xl shadow-md hover:bg-blue-700 transition duration-300 flex items-center justify-between">
                            <span>Log in to Account</span>
                            <span class="opacity-70 group-hover:translate-x-1 transition-transform">→</span>
                        </a>
                        <a href="{{ route('register') }}" class="group block w-full py-4 px-6 bg-white border-2 border-gray-100 text-gray-700 font-bold rounded-xl hover:border-blue-100 hover:bg-blue-50 transition duration-300 flex items-center justify-between">
                            <span>Create New Account</span>
                            <span class="text-gray-400 group-hover:translate-x-1 transition-transform">→</span>
                        </a>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</body>
</html>