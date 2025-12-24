<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sijil Penghargaan - {{ $student->first_name }}</title>
    <link rel="icon" type="image/svg" href="/images/logo-1.svg">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Great+Vibes&family=Montserrat:wght@300;400;600&display=swap');
    
    /* Reset & Viewport Fix */
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
        overflow: hidden; /* Elak scrollbar muncul di browser */
    }

    @media print {
        .no-print { display: none; }
        body { overflow: visible; background: white; }
        .cert-outer-wrapper { padding: 0; transform: none !important; }
        .cert-container { 
            box-shadow: none !important; 
            border: 8px double #78350f !important;
            width: 100% !important;
            height: 100% !important;
        }
    }

    /* Container yang akan mengecil ikut saiz window */
    .cert-outer-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100vw;
        height: 100vh;
        padding: 20px;
        box-sizing: border-box;
    }

    .cert-container {
        /* Guna min/max untuk paksa sijil kekal dalam view */
        width: 100%;
        max-width: 1000px; /* Saiz maksimum atas skrin */
        aspect-ratio: 297 / 210; /* Nisbah A4 Landscape */
        max-height: calc(100vh - 40px); /* Paksa tinggi tak lebih tinggi skrin */
        background: white;
        position: relative;
        display: flex;
        flex-direction: column;
        box-sizing: border-box;
    }

    .font-title { font-family: 'Cinzel', serif; }
    .font-script { font-family: 'Great Vibes', cursive; }
    .font-body { font-family: 'Montserrat', sans-serif; }
</style>
</head>

<body class="bg-gray-800 font-body">

    <div class="absolute top-5 right-5 no-print z-50">
        <button onclick="window.print()" class="bg-amber-600 text-white px-6 py-2 rounded-lg shadow-lg hover:bg-amber-700 transition font-bold">
            Cetak Sijil
        </button>
    </div>

    <div class="cert-outer-wrapper">
        <div class="cert-container shadow-2xl border-8 border-double border-amber-900 p-4 md:p-6">
            
            <div class="absolute top-0 left-0 w-16 h-16 border-t-4 border-l-4 border-amber-500 opacity-30"></div>
            <div class="absolute top-0 right-0 w-16 h-16 border-t-4 border-r-4 border-amber-500 opacity-30"></div>
            <div class="absolute bottom-0 left-0 w-16 h-16 border-b-4 border-l-4 border-amber-500 opacity-30"></div>
            <div class="absolute bottom-0 right-0 w-16 h-16 border-b-4 border-r-4 border-amber-500 opacity-30"></div>
            
            <div class="relative z-10 flex flex-col items-center justify-between h-full border-2 border-amber-200 p-4">
                
                <div class="text-center">
                    <img src="{{ asset('images/logo-1.svg') }}" class="w-24 h-24 mx-auto mb-2">
                    <h1 class="font-title text-lg md:text-xl font-bold text-amber-900 uppercase leading-tight">
                        قوست فغاجين القرآن السراج 
                    </h1>
                    <h2 class="font-title text-sm md:text-md text-amber-800">
                        Pusat Pengajian Quran As-Siraaj
                    </h2>
                    <p class="text-[9px] italic text-gray-500 leading-none">"Menerangi Hidupmu di Dunia dan di Sana"</p>
                </div>

                <div class="text-center flex-grow flex flex-col justify-center py-2">
                    <h3 class="font-script text-3xl md:text-4xl text-amber-700 mb-1">Sijil Penghargaan</h3>
                    <p class="text-gray-600 uppercase tracking-widest text-[9px] md:text-xs mb-3">Dengan ini diperakui bahawa</p>
                    
                    <h4 class="font-title text-xl md:text-3xl font-bold text-gray-900 border-b-2 border-amber-200 inline-block px-6 pb-1 mb-1">
                        {{ $student->first_name }} {{ $student->last_name }}
                    </h4>

                    <p class="text-gray-700 font-semibold text-xs md:text-sm mb-4">
                        {{ substr($student->ic_number, 0, 6) }}-{{ substr($student->ic_number, 6, 2) }}-{{ substr($student->ic_number, 8) }}
                    </p>

                    <p class="text-gray-600 text-[9px] md:text-xs mb-1 uppercase">Telah Berjaya</p>
                    <p class="font-title text-md md:text-xl text-amber-900 font-bold leading-tight">
                       {{ $achievement->title }}
                    </p>
                </div>

                <div class="w-full">
                    <div class="text-center mb-4">
                        <p class="text-gray-600 text-[9px] md:text-xs italic leading-none">pada tarikh</p>
                        <p class="font-semibold text-gray-800 text-xs md:text-sm">{{ \Carbon\Carbon::parse($achievement->date)->format('d F Y') }}</p>
                    </div>

                   <div class="relative w-full mt-auto pb-12 px-12">
                        <div class="absolute bottom-0 left-6">
                            <img src="{{ asset('images/cert.png') }}" alt="Seal" class="w-60 h-60 object-contain">
                        </div>

                        <div class="flex justify-end">
                            <div class="text-center">
                                <div class="w-48 md:w-64 border-b-2 border-gray-400 mb-2 mx-auto">
                                    <span class="font-script text-2xl md:text-3xl text-gray-700">Ahmad Mustaqim</span>
                                </div>
                                <p class="font-bold text-[10px] md:text-sm text-gray-800 uppercase tracking-tight">
                                    Ahmad Mustaqim Bin Mohamed Noor 
                                </p>
                                <p class="text-[9px] md:text-[11px] text-gray-600 font-medium">
                                    Chief Operating Officer PPQ As-Siraaj 
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>