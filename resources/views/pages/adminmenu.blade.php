<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    

    <div class="mt-8 text-2xl">
        Administracinė skiltis.
    </div>

    <div class="md:mr-56 mt-6 text-gray-500">
       Pasirinkite administracinę skiltį, kurioje atliksite koregavimą
    </div>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
    <div class="p-6">
        <div class="flex items-center">
            
            <svg class="w-8 h-9 text-gray-400" viewBox="0 0 17 17" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g></g><path d="M17 9.984l-1.958 0.002-2.051-3.986h-7.949l-2.968 3.999-2.074 0.001v4.977h2.002c0 0.008-0.002 0.015-0.002 0.023 0 1.103 0.897 2 2 2s2-0.897 2-2c0-0.008-0.002-0.015-0.002-0.023h5.005c-0.001 0.008-0.003 0.015-0.003 0.023 0 1.103 0.897 2 2 2s2-0.897 2-2c0-0.008-0.002-0.015-0.002-0.023h2.002v-4.993zM13.918 9.987l-3.897 0.004v-2.991h2.36l1.537 2.987zM5.544 7h3.477v2.992l-5.701 0.005 2.224-2.997zM4 16c-0.551 0-1-0.449-1-1s0.449-1 1-1 1 0.449 1 1-0.449 1-1 1zM13 16c-0.551 0-1-0.449-1-1s0.449-1 1-1 1 0.449 1 1-0.449 1-1 1zM16 13.977h-1.291c-0.35-0.582-0.981-0.977-1.709-0.977s-1.359 0.395-1.709 0.977h-5.582c-0.35-0.582-0.981-0.977-1.709-0.977s-1.359 0.395-1.709 0.977h-1.291v-2.977l15-0.015v2.992z" fill="#999" /></svg>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="https://laravel.com/docs">Draudimo užsakymai</a></div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
               Šiais moderniais laikais užtenka keliu paspaudimų
                apdrausti savo turtą. Visa tai galite padaryti nepalikdami namų. Patvirtinkite įrašą, tenkinanti standartus
            </div>

            <a href="{{ route('turtodrauda') }}">
                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                        <div>Žiurėti užsakymus</div>

                        <div class="ml-1 text-indigo-500">
                            <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </div>
                </div>
            </a>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
        <div class="flex items-center">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"><path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="https://laracasts.com">Pranešti įvykiai</a></div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
                Įvykus nelaimingam atsitikimui kurio įvykio metu buvo apgadintas draustas turtas, prašome patvirtinti nukentėjusiujų formą,
                gaudami kuo išsamesne informaciją apie įvykio aplinkybes ir pateikite įrodymus vaidzinių metodu
                 </div>

            <a href="https://laracasts.com">
                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                        <div>Žiurėti deklaracijos formas</div>

                        <div class="ml-1 text-indigo-500">
                            <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </div>
                </div>
            </a>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200">
        <div class="flex items-center">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"><path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Administratoriai</div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
                Koreguoti esamu vartotojų pareigas internetiniame puslapyje
            </div>

            <a href="https://laracasts.com">
                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                        <div>Koreguoti administratorius</div>

                        <div class="ml-1 text-indigo-500">
                            <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </div>
                </div>
            </a>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200 md:border-l">
        

        
    </div>
</div>

            </div>
        </div>
    </div>
</x-app-layout>