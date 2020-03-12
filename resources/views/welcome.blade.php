<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="/favicon.png">

    <title>@yield('title', 'Surveyr - Cron monitoring for Laravel')</title>

    <link href="https://rsms.me/inter/inter.css" rel="stylesheet">
    <link href="{{ mix('css/site.css') }}" rel="stylesheet">

    @include('analytics.google')
</head>
<body>
    <div class="relative bg-gray-50 overflow-hidden">
        <div class="hidden sm:block sm:absolute sm:inset-y-0 sm:h-full sm:w-full">
            <div class="relative h-full max-w-screen-xl mx-auto">
                <svg class="absolute right-full transform translate-y-1/4 translate-x-1/4 lg:translate-x-1/2" width="404" height="784" fill="none" viewBox="0 0 404 784">
                    <defs>
                        <pattern id="svg-pattern-squares-1" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect width="404" height="784" fill="url(#svg-pattern-squares-1)" />
                </svg>
                <svg class="absolute left-full transform -translate-y-3/4 -translate-x-1/4 md:-translate-y-1/2 lg:-translate-x-1/2" width="404" height="784" fill="none" viewBox="0 0 404 784">
                    <defs>
                        <pattern id="svg-pattern-squares-2" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect width="404" height="784" fill="url(#svg-pattern-squares-2)" />
                </svg>
            </div>
        </div>

        <div x-data="{ open: false }" class="relative pt-6 pb-12 sm:pb-16 md:pb-20 lg:pb-28 xl:pb-32">
            <div class="max-w-screen-xl mx-auto px-4 sm:px-6">
                <nav class="relative flex items-center justify-between sm:h-10 md:justify-center">
                    <div class="flex items-center flex-1 md:absolute md:inset-y-0 md:left-0">
                        <div class="flex items-center justify-between w-full md:w-auto">
                            <a href="/">
                                <svg class="w-32" viewBox="0 0 1360 351" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <text id="Surveyr" font-family="Roboto-Regular, Roboto" font-size="300" font-weight="normal" letter-spacing="-4.4000001" fill="#202B36">
                                            <tspan x="396" y="278">S</tspan>
                                            <tspan x="569.578516" y="278" letter-spacing="-5.19999981">u</tspan>
                                            <tspan x="729.759375" y="278">r</tspan>
                                            <tspan x="831.273047" y="278" letter-spacing="-8.19999981">v</tspan>
                                            <tspan x="966.48125" y="278" letter-spacing="-3.20000005">e</tspan>
                                            <tspan x="1120.3125" y="278" letter-spacing="-4">y</tspan>
                                            <tspan x="1258.25586" y="278">r</tspan>
                                        </text>
                                        <g id="iconfinder_calendar_1814093" transform="translate(0.000000, 16.000000)" fill="#1274ED" fill-rule="nonzero">
                                            <path d="M286.696833,320 L31.8552036,320 C14.479638,320 0,305.498783 0,288.097324 L0,53.9026764 C0,36.5012165 11.5837104,22 26.7873303,22 L42.7149321,22 L42.7149321,43.026764 L26.7873303,43.026764 C24.6153846,43.026764 21.719457,47.377129 21.719457,53.9026764 L21.719457,288.097324 C21.719457,293.89781 26.7873303,298.973236 32.5791855,298.973236 L287.420814,298.973236 C293.21267,298.973236 298.280543,293.89781 298.280543,288.097324 L298.280543,53.9026764 C298.280543,47.377129 294.660633,43.026764 293.21267,43.026764 L277.285068,43.026764 L277.285068,22 L293.21267,22 C307.692308,22 320,36.5012165 320,53.9026764 L320,288.097324 C318.552036,305.498783 304.072398,320 286.696833,320" id="Fill-133"></path>
                                            <path d="M75,64 C69.1333333,64 64,58.9662921 64,53.2134831 L64,10.7865169 C64,5.03370787 69.1333333,0 75,0 C80.8666667,0 86,5.03370787 86,10.7865169 L86,53.2134831 C85.2666667,58.9662921 80.8666667,64 75,64" id="Fill-134"></path>
                                            <path d="M245,64 C239.133333,64 234,58.9662921 234,53.2134831 L234,10.7865169 C234,5.03370787 239.133333,0 245,0 C250.866667,0 256,5.03370787 256,10.7865169 L256,53.2134831 C256,58.9662921 250.866667,64 245,64" id="Fill-135"></path>
                                            <polygon id="Fill-136" points="106 22 212 22 212 44 106 44"></polygon>
                                        </g>
                                        <g id="iconfinder_Tick_Mark_1398911" transform="translate(82.000000, 128.000000)" fill="#1274ED" fill-rule="nonzero">
                                            <polygon id="Path" points="132.555794 0 53.1076803 79.2860246 23.413719 49.6640116 0 73.051412 53.0771937 126 59.9366816 119.187545 59.9366816 119.187545 156 23.3569877"></polygon>
                                        </g>
                                    </g>
                                </svg>
                            </a>
                            <div class="-mr-2 flex items-center md:hidden">
                                <button @click="open = true" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <a href="/#features" class="font-medium text-gray-500 hover:text-gray-900 focus:outline-none focus:text-gray-900 transition duration-150 ease-in-out">Features</a>
                        <a href="/#pricing" class="ml-10 font-medium text-gray-500 hover:text-gray-900 focus:outline-none focus:text-gray-900 transition duration-150 ease-in-out">Pricing</a>
                        <a href="/#pricing" class="ml-10 font-medium text-gray-500 hover:text-gray-900 focus:outline-none focus:text-gray-900 transition duration-150 ease-in-out">Sign Up</a>
                    </div>
                    <div class="hidden md:absolute md:flex md:items-center md:justify-end md:inset-y-0 md:right-0">
              <span class="inline-flex rounded-md shadow">
                <a href="/login" class="inline-flex items-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-indigo-600 bg-white hover:text-indigo-500 focus:outline-none focus:shadow-outline-blue active:bg-gray-50 active:text-indigo-700 transition duration-150 ease-in-out">
                  Log in
                </a>
              </span>
                    </div>
                </nav>
            </div>

            <div x-show="open" style="display: none;" class="absolute top-0 inset-x-0 p-2 md:hidden">
                <div class="rounded-lg shadow-md transition transform origin-top-right" x-show="open" x-transition:enter="duration-150 ease-out" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="duration-100 ease-in" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
                    <div class="rounded-lg bg-white shadow-xs overflow-hidden">
                        <div class="px-5 pt-4 flex items-center justify-between">
                            <div>
                                <svg class="w-32" viewBox="0 0 1360 351" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <text id="Surveyr" font-family="Roboto-Regular, Roboto" font-size="300" font-weight="normal" letter-spacing="-4.4000001" fill="#202B36">
                                            <tspan x="396" y="278">S</tspan>
                                            <tspan x="569.578516" y="278" letter-spacing="-5.19999981">u</tspan>
                                            <tspan x="729.759375" y="278">r</tspan>
                                            <tspan x="831.273047" y="278" letter-spacing="-8.19999981">v</tspan>
                                            <tspan x="966.48125" y="278" letter-spacing="-3.20000005">e</tspan>
                                            <tspan x="1120.3125" y="278" letter-spacing="-4">y</tspan>
                                            <tspan x="1258.25586" y="278">r</tspan>
                                        </text>
                                        <g id="iconfinder_calendar_1814093" transform="translate(0.000000, 16.000000)" fill="#1274ED" fill-rule="nonzero">
                                            <path d="M286.696833,320 L31.8552036,320 C14.479638,320 0,305.498783 0,288.097324 L0,53.9026764 C0,36.5012165 11.5837104,22 26.7873303,22 L42.7149321,22 L42.7149321,43.026764 L26.7873303,43.026764 C24.6153846,43.026764 21.719457,47.377129 21.719457,53.9026764 L21.719457,288.097324 C21.719457,293.89781 26.7873303,298.973236 32.5791855,298.973236 L287.420814,298.973236 C293.21267,298.973236 298.280543,293.89781 298.280543,288.097324 L298.280543,53.9026764 C298.280543,47.377129 294.660633,43.026764 293.21267,43.026764 L277.285068,43.026764 L277.285068,22 L293.21267,22 C307.692308,22 320,36.5012165 320,53.9026764 L320,288.097324 C318.552036,305.498783 304.072398,320 286.696833,320" id="Fill-133"></path>
                                            <path d="M75,64 C69.1333333,64 64,58.9662921 64,53.2134831 L64,10.7865169 C64,5.03370787 69.1333333,0 75,0 C80.8666667,0 86,5.03370787 86,10.7865169 L86,53.2134831 C85.2666667,58.9662921 80.8666667,64 75,64" id="Fill-134"></path>
                                            <path d="M245,64 C239.133333,64 234,58.9662921 234,53.2134831 L234,10.7865169 C234,5.03370787 239.133333,0 245,0 C250.866667,0 256,5.03370787 256,10.7865169 L256,53.2134831 C256,58.9662921 250.866667,64 245,64" id="Fill-135"></path>
                                            <polygon id="Fill-136" points="106 22 212 22 212 44 106 44"></polygon>
                                        </g>
                                        <g id="iconfinder_Tick_Mark_1398911" transform="translate(82.000000, 128.000000)" fill="#1274ED" fill-rule="nonzero">
                                            <polygon id="Path" points="132.555794 0 53.1076803 79.2860246 23.413719 49.6640116 0 73.051412 53.0771937 126 59.9366816 119.187545 59.9366816 119.187545 156 23.3569877"></polygon>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <div class="-mr-2">
                                <button @click="open = false" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="px-2 pt-2 pb-3">
                            <a href="/#features" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out">Features</a>
                            <a href="/#pricing" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out">Pricing</a>
                            <a href="/register" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out">Sign Up</a>
                        </div>
                        <div>
                            <a href="/login" class="block w-full px-5 py-3 text-center font-medium text-indigo-600 bg-gray-50 hover:bg-gray-100 hover:text-indigo-700 focus:outline-none focus:bg-gray-100 focus:text-indigo-700 transition duration-150 ease-in-out">
                                Log in
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-10 mx-auto max-w-screen-xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 xl:mt-28">
                <div class="text-center">
                    <h2 class="text-4xl tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl">
                        Cron monitoring
                        <br class="xl:hidden" />
                        <span class="text-indigo-600">for Laravel</span>
                    </h2>
                    <p class="mt-3 max-w-md mx-auto text-base text-gray-500 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                        Get an instant alert if your Laravel scheduled cron job fails to run.
                    </p>
                    <div class="mt-6 max-w-md mx-auto md:mt-12 md:max-w-3xl">
                        <img src="/img/surveyr.png" alt="Surveyr" class="shadow-lg rounded-lg">
                    </div>
                    <div class="mt-8 max-w-md mx-auto sm:flex sm:justify-center md:mt-12">
                        <div class="rounded-md shadow">
                            <a href="/#pricing" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline-indigo transition duration-150 ease-in-out md:py-4 md:text-lg md:px-10">
                                Sign Up
                            </a>
                        </div>
                        <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3">
                            <a href="/#features" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-indigo-600 bg-white hover:text-indigo-500 focus:outline-none focus:shadow-outline-blue transition duration-150 ease-in-out md:py-4 md:text-lg md:px-10">
                                Features
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.0.1/dist/alpine.js" defer></script>
</body>
</html>
