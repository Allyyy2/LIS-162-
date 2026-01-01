<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Poppins', sans-serif; }

        /* --- SCOPED STYLES: These only affect the Guest Layout (Login/Register) --- */
        
        /* 1. Scoped Inputs */
        #guest-layout-wrapper input[type="email"], 
        #guest-layout-wrapper input[type="password"], 
        #guest-layout-wrapper input[type="text"] {
            background-color: #ffffff !important;
            color: #111827 !important;
            border: 2px solid #e5e7eb !important;
            padding: 14px 16px !important;
            font-size: 15px !important;
            border-radius: 12px !important;
            width: 100% !important;
        }

        #guest-layout-wrapper input:focus {
            outline: none !important;
            border-color: #2563eb !important; /* BLUE Focus */
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.2) !important;
        }

        /* 2. Scoped Labels & Text */
        #guest-layout-wrapper label {
            color: #1f2937 !important;
            font-weight: 600 !important;
            font-size: 0.95rem !important;
        }
        #guest-layout-wrapper .text-sm {
            color: #374151 !important;
        }

        /* 3. Scoped Links (Forgot Password?) */
        #guest-layout-wrapper a {
            color: #2563eb !important; /* BLUE Text */
            font-weight: 600 !important;
        }
        #guest-layout-wrapper a:hover {
            color: #1d4ed8 !important; /* Darker Blue */
            text-decoration: underline;
        }

        /* 4. Scoped Buttons (Login/Register) */
        #guest-layout-wrapper button {
            /* Blue to Cyan Gradient */
            background-image: linear-gradient(to right, #2563eb, #0ea5e9) !important;
            background-color: transparent !important;
            border: none !important;
            color: white !important;
            font-weight: bold !important;
            padding: 12px 24px !important;
            border-radius: 12px !important;
            transition: transform 0.2s ease;
        }
        #guest-layout-wrapper button:hover {
            opacity: 0.9;
            transform: scale(1.02);
        }
    </style>
</head>

<body class="font-sans text-gray-900 antialiased h-screen w-full bg-cover bg-center bg-no-repeat flex items-center justify-center relative overflow-hidden"
      style="background-image: url('https://w0.peakpx.com/wallpaper/222/516/HD-wallpaper-waveform-blue-light-music.jpg');">

    {{-- WRAPPER ID: This restricts the Blue CSS above to ONLY these pages --}}
    <div id="guest-layout-wrapper" class="contents">

        {{-- DARK OVERLAY --}}
        <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-[2px]"></div>

        {{-- DECORATIVE GLOWS (Blue Only) --}}
        <div class="absolute top-[-50px] left-[-50px] w-64 h-64 bg-cyan-500 rounded-full mix-blend-screen filter blur-[80px] opacity-30 animate-pulse"></div>
        <div class="absolute bottom-[-50px] right-[-50px] w-72 h-72 bg-blue-600 rounded-full mix-blend-screen filter blur-[80px] opacity-30"></div>

        {{-- MAIN CARD --}}
        <div class="w-full sm:max-w-md px-8 py-10 bg-white/95 backdrop-blur-xl rounded-3xl shadow-2xl relative z-10 border border-white/50 mx-4">
            
            {{-- HEADER ICON --}}
            <div class="flex justify-center mb-6">
                {{-- Icon is now Blue/Cyan gradient --}}
                <div class="w-16 h-16 bg-gradient-to-br from-blue-600 to-cyan-500 rounded-full flex items-center justify-center text-white text-3xl shadow-lg transform hover:scale-110 transition duration-300">
                    ♫
                </div>
            </div>

            {{-- SLOT --}}
            <div class="w-full">
                {{ $slot }}
            </div>
            
        </div>
    </div> 
    
</body>
</html>