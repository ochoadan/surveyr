<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="/favicon.png">

    <title>@yield('title', 'Surveyr - Cron monitoring for Laravel')</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <link href="{{ mix('css/site.css') }}" rel="stylesheet">

    @include('analytics.google')
</head>
<body>
    <div class="relative bg-surveyr-bg overflow-hidden">
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
                        <a href="/login" class="inline-flex items-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-surveyr-blue bg-white hover:text-blue-500 focus:outline-none focus:shadow-outline-blue active:bg-surveyr-bg active:text-blue-700 transition duration-150 ease-in-out">
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
                            <a href="/#features" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-surveyr-bg focus:outline-none focus:text-gray-900 focus:bg-surveyr-bg transition duration-150 ease-in-out">Features</a>
                            <a href="/#pricing" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-surveyr-bg focus:outline-none focus:text-gray-900 focus:bg-surveyr-bg transition duration-150 ease-in-out">Pricing</a>
                            <a href="/register" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-surveyr-bg focus:outline-none focus:text-gray-900 focus:bg-surveyr-bg transition duration-150 ease-in-out">Sign Up</a>
                        </div>
                        <div>
                            <a href="/login" class="block w-full px-5 py-3 text-center font-medium text-surveyr-blue bg-surveyr-bg hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:bg-gray-100 focus:text-blue-700 transition duration-150 ease-in-out">
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
                        <span class="text-surveyr-blue">for Laravel</span>
                    </h2>
                    <p class="mt-3 max-w-md mx-auto text-base text-gray-500 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                        Get an instant alert if your Laravel scheduled cron job fails to run.
                    </p>
                    <div class="mt-6 max-w-md mx-auto md:mt-12 md:max-w-3xl">
                        <img src="/img/surveyr.png" alt="Surveyr" class="shadow-lg rounded-lg">
                    </div>
                    <div class="mt-8 max-w-md mx-auto sm:flex sm:justify-center md:mt-12">
                        <div class="rounded-md shadow">
                            <a href="/#features" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-surveyr-blue bg-white hover:text-blue-500 focus:outline-none focus:shadow-outline-blue transition duration-150 ease-in-out md:py-4 md:text-lg md:px-10">
                                Features
                            </a>
                        </div>
                        <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-10">
                            <a href="/#pricing" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-surveyr-blue hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue transition duration-150 ease-in-out md:py-4 md:text-lg md:px-10">
                                Sign Up
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="features" class="overflow-hidden">
        <div class="relative max-w-screen-xl mx-auto py-16 md:py-32 px-4 sm:px-6 lg:px-8">
            <div class="relative lg:grid lg:grid-cols-3 lg:col-gap-12">
                <div class="lg:col-span-1">
                    <h3 class="text-3xl leading-9 font-extrabold tracking-tight text-gray-900 sm:text-4xl sm:leading-10">
                        Are you losing data or customers?
                    </h3>
                    <p class="mt-8 text-base leading-6 text-gray-500">
                        Scheduled cron jobs often form the backbone of a Laravel application, usually carrying out critical tasks on behalf of your customers. Yet, often these jobs are hard to monitor as they run in the background. No system is 100% resilient and downtime is inevitable. If these jobs stop working for any reason, <strong>you may lose data and even&nbsp;customers</strong>.
                    </p>
                    <p class="mt-4 text-base leading-6 text-gray-500">
                        Surveyr saves you time and money by monitoring your scheduled jobs in Laravel and sending you alerts if a job stops working for whatever reason. This means you can stop worrying about cron jobs and focus your energy on building your Laravel app and <strong>growing your&nbsp;business</strong>.
                    </p>
                </div>
                <div class="mt-10 sm:grid sm:grid-cols-2 sm:col-gap-8 sm:row-gap-10 lg:col-span-2 lg:mt-0">
                    <div>
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-surveyr-blue text-white">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div class="mt-5">
                            <h5 class="text-lg leading-6 font-medium text-gray-900">Painless Setup</h5>
                            <p class="mt-2 text-base leading-6 text-gray-500">
                                Use our Laravel package to quickly import your schedule monitors into Surveyr and handle sending pings to Surveyr. Get up and running in minutes not hours.
                            </p>
                        </div>
                    </div>
                    <div class="mt-10 sm:mt-0">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-surveyr-blue text-white">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div class="mt-5">
                            <h5 class="text-lg leading-6 font-medium text-gray-900">Email &amp; Slack Alerts</h5>
                            <p class="mt-2 text-base leading-6 text-gray-500">
                                Get alerted as soon as a problem occurs so you can diagnose and resolve it as quickly. Configure email alerts, Slack alerts or both.
                            </p>
                        </div>
                    </div>
                    <div class="mt-10 sm:mt-0">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-surveyr-blue text-white">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </div>
                        <div class="mt-5">
                            <h5 class="text-lg leading-6 font-medium text-gray-900">View Cron Output</h5>
                            <p class="mt-2 text-base leading-6 text-gray-500">
                                See exactly what your scheduled cron jobs are outputting to keep an eye on performance or to help debug issues when they arise.
                            </p>
                        </div>
                    </div>
                    <div class="mt-10 sm:mt-0">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-surveyr-blue text-white">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <div class="mt-5">
                            <h5 class="text-lg leading-6 font-medium text-gray-900">Confirmation Emails</h5>
                            <p class="mt-2 text-base leading-6 text-gray-500">
                                Once your schedule monitor has been successfully set up and pinged for the first time, we send you a confirmation email to let you know we're monitoring it.
                            </p>
                        </div>
                    </div>
                    <div class="mt-10 sm:mt-0">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-surveyr-blue text-white">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div class="mt-5">
                            <h5 class="text-lg leading-6 font-medium text-gray-900">Full Cron Support</h5>
                            <p class="mt-2 text-base leading-6 text-gray-500">
                                Surveyr supports any cron schedule including up-to-the-minute monitoring. We even display human readable versions of cron schedules to make your life easier.
                            </p>
                        </div>
                    </div>
                    <div class="mt-10 sm:mt-0">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-surveyr-blue text-white">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                        <div class="mt-5">
                            <h5 class="text-lg leading-6 font-medium text-gray-900">Team Collaboration</h5>
                            <p class="mt-2 text-base leading-6 text-gray-500">
                                Invite your team members so that they can manage their own apps and schedule monitors under a single team account and have access to the correct information when they need it.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="pricing" class="bg-blue-900">
        <div class="pt-12 px-4 sm:px-6 lg:px-8 lg:pt-20">
            <div class="text-center">
                <h2 class="mt- text-3xl leading-9 font-extrabold text-white sm:text-4xl sm:leading-10 lg:text-5xl lg:leading-none">
                    Simple Pricing
                </h2>
                <p class="mt-3 max-w-4xl mx-auto text-xl leading-7 text-gray-300 sm:mt-5 sm:text-2xl sm:leading-8">
                    Try Surveyr for free. No card required. Money back guarantee.
                </p>
            </div>
        </div>

        <div class="mt-16 bg-white pb-16 lg:mt-20 lg:pb-24">
            <div class="relative z-0">
                <div class="absolute inset-0 h-5/6 bg-blue-900 lg:h-2/3"></div>
                <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="relative lg:grid lg:grid-cols-7">
                        <div class="mx-auto max-w-md lg:mx-0 lg:max-w-none lg:col-start-1 lg:col-end-3 lg:row-start-2 lg:row-end-3">
                            <div class="h-full flex flex-col rounded-lg shadow-lg overflow-hidden lg:rounded-none lg:rounded-l-lg">
                                <div class="flex-1 flex flex-col">
                                    <div class="bg-white px-6 py-10">
                                        <div>
                                            <h2 class="text-center text-2xl leading-8 font-medium text-gray-900">
                                                Solo
                                            </h2>
                                            <div class="mt-4 flex items-center justify-center">
                                              <span class="px-3 flex items-start text-6xl leading-none tracking-tight text-gray-900">
                                                <span class="mt-2 mr-2 text-4xl font-medium">
                                                  $
                                                </span>
                                                <span class="font-extrabold">
                                                  5
                                                </span>
                                              </span>
                                                <span class="text-xl leading-7 font-medium text-gray-400">
                                                /month
                                              </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-1 flex flex-col justify-between border-t-2 border-gray-100 p-6 bg-surveyr-bg sm:p-10 lg:p-6 xl:p-10">
                                        <ul>
                                            <li class="flex items-start">
                                                <div class="flex-shrink-0">
                                                    <svg class="h-6 w-6 text-green-500" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </div>
                                                <p class="ml-3 text-base leading-6 font-medium text-gray-500">
                                                    <strong>5</strong> schedule monitors
                                                </p>
                                            </li>
                                            <li class="mt-4 flex items-start">
                                                <div class="flex-shrink-0">
                                                    <svg class="h-6 w-6 text-green-500" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </div>
                                                <p class="ml-3 text-base leading-6 font-medium text-gray-500">
                                                    <strong>1</strong> team member
                                                </p>
                                            </li>
                                            <li class="mt-4 flex items-start">
                                                <div class="flex-shrink-0">
                                                    <svg class="h-6 w-6 text-green-500" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </div>
                                                <p class="ml-3 text-base leading-6 font-medium text-gray-500">
                                                    Unlimited apps
                                                </p>
                                            </li>
                                            <li class="mt-4 flex items-start">
                                                <div class="flex-shrink-0">
                                                    <svg class="h-6 w-6 text-green-500" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </div>
                                                <p class="ml-3 text-base leading-6 font-medium text-gray-500">
                                                    30 day event log
                                                </p>
                                            </li>
                                            <li class="mt-4 flex items-start">
                                                <div class="flex-shrink-0">
                                                    <svg class="h-6 w-6 text-green-500" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </div>
                                                <p class="ml-3 text-base leading-6 font-medium text-gray-500">
                                                    Email support
                                                </p>
                                            </li>
                                        </ul>
                                        <div class="mt-8">
                                            <div class="rounded-lg shadow-md">
                                                <a href="/register" class="block w-full text-center rounded-lg border border-transparent bg-white px-6 py-3 text-base leading-6 font-medium text-surveyr-blue hover:text-blue-500 focus:outline-none focus:shadow-outline transition ease-in-out duration-150">
                                                    Start your 10 day trial
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-10 max-w-lg mx-auto lg:mt-0 lg:max-w-none lg:mx-0 lg:col-start-3 lg:col-end-6 lg:row-start-1 lg:row-end-4">
                            <div class="relative z-10 rounded-lg shadow-xl">
                                <div class="pointer-events-none absolute inset-0 rounded-lg border-2 border-surveyr-blue"></div>
                                <div class="absolute inset-x-0 top-0 transform translate-y-px">
                                    <div class="flex justify-center transform -translate-y-1/2">
                                      <span class="inline-flex rounded-full bg-surveyr-blue px-4 py-1 text-sm leading-5 font-semibold tracking-wider uppercase text-white">
                                        Most popular
                                      </span>
                                    </div>
                                </div>
                                <div class="bg-white rounded-t-lg px-6 pt-12 pb-10">
                                    <div>
                                        <h2 class="text-center text-3xl leading-9 font-semibold text-gray-900 sm:-mx-6">
                                            Startup
                                        </h2>
                                        <div class="mt-4 flex items-center justify-center">
                                        <span class="px-3 flex items-start text-6xl leading-none tracking-tight text-gray-900 sm:text-6xl">
                                          <span class="mt-2 mr-2 text-4xl font-medium">
                                            $
                                          </span>
                                          <span class="font-extrabold">
                                            29
                                          </span>
                                        </span>
                                        <span class="text-2xl leading-8 font-medium text-gray-400">
                                          /month
                                        </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-t-2 border-gray-100 rounded-b-lg pt-10 pb-8 px-6 bg-surveyr-bg sm:px-10 sm:py-10">
                                    <ul>
                                        <li class="flex items-start">
                                            <div class="flex-shrink-0">
                                                <svg class="h-6 w-6 text-green-500" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                                </svg>
                                            </div>
                                            <p class="ml-3 text-base leading-6 font-medium text-gray-500">
                                                <strong>30</strong> schedule monitors
                                            </p>
                                        </li>
                                        <li class="mt-4 flex items-start">
                                            <div class="flex-shrink-0">
                                                <svg class="h-6 w-6 text-green-500" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                                </svg>
                                            </div>
                                            <p class="ml-3 text-base leading-6 font-medium text-gray-500">
                                                <strong>5</strong> team members
                                            </p>
                                        </li>
                                        <li class="mt-4 flex items-start">
                                            <div class="flex-shrink-0">
                                                <svg class="h-6 w-6 text-green-500" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                                </svg>
                                            </div>
                                            <p class="ml-3 text-base leading-6 font-medium text-gray-500">
                                                Unlimited apps
                                            </p>
                                        </li>
                                        <li class="mt-4 flex items-start">
                                            <div class="flex-shrink-0">
                                                <svg class="h-6 w-6 text-green-500" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                                </svg>
                                            </div>
                                            <p class="ml-3 text-base leading-6 font-medium text-gray-500">
                                                30 day event log
                                            </p>
                                        </li>
                                        <li class="mt-4 flex items-start">
                                            <div class="flex-shrink-0">
                                                <svg class="h-6 w-6 text-green-500" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                                </svg>
                                            </div>
                                            <p class="ml-3 text-base leading-6 font-medium text-gray-500">
                                                Email support
                                            </p>
                                        </li>
                                    </ul>
                                    <div class="mt-10">
                                        <div class="rounded-lg shadow-md">
                                            <a href="/register" class="block w-full text-center rounded-lg border border-transparent bg-surveyr-blue px-6 py-4 text-xl leading-6 font-medium text-white hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition ease-in-out duration-150">
                                                Start your 10 day trial
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-10 mx-auto max-w-md lg:m-0 lg:max-w-none lg:col-start-6 lg:col-end-8 lg:row-start-2 lg:row-end-3">
                            <div class="h-full flex flex-col rounded-lg shadow-lg overflow-hidden lg:rounded-none lg:rounded-r-lg">
                                <div class="flex-1 flex flex-col">
                                    <div class="bg-white px-6 py-10">
                                        <div>
                                            <h2 class="text-center text-2xl leading-8 font-medium text-gray-900">
                                                Business
                                            </h2>
                                            <div class="mt-4 flex items-center justify-center">
                                              <span class="px-3 flex items-start text-6xl leading-none tracking-tight text-gray-900">
                                                <span class="mt-2 mr-2 text-4xl font-medium">
                                                  $
                                                </span>
                                                <span class="font-extrabold">
                                                  99
                                                </span>
                                              </span>
                                              <span class="text-xl leading-7 font-medium text-gray-400">
                                                /month
                                              </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-1 flex flex-col justify-between border-t-2 border-gray-100 p-6 bg-surveyr-bg sm:p-10 lg:p-6 xl:p-10">
                                        <ul>
                                            <li class="flex items-start">
                                                <div class="flex-shrink-0">
                                                    <svg class="h-6 w-6 text-green-500" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </div>
                                                <p class="ml-3 text-base leading-6 font-medium text-gray-500">
                                                    <strong>200</strong> schedule monitors
                                                </p>
                                            </li>
                                            <li class="mt-4 flex items-start">
                                                <div class="flex-shrink-0">
                                                    <svg class="h-6 w-6 text-green-500" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </div>
                                                <p class="ml-3 text-base leading-6 font-medium text-gray-500">
                                                    <strong>Unlimited</strong> team members
                                                </p>
                                            </li>
                                            <li class="mt-4 flex items-start">
                                                <div class="flex-shrink-0">
                                                    <svg class="h-6 w-6 text-green-500" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </div>
                                                <p class="ml-3 text-base leading-6 font-medium text-gray-500">
                                                    Unlimited apps
                                                </p>
                                            </li>
                                            <li class="mt-4 flex items-start">
                                                <div class="flex-shrink-0">
                                                    <svg class="h-6 w-6 text-green-500" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </div>
                                                <p class="ml-3 text-base leading-6 font-medium text-gray-500">
                                                    30 day event log
                                                </p>
                                            </li>
                                            <li class="mt-4 flex items-start">
                                                <div class="flex-shrink-0">
                                                    <svg class="h-6 w-6 text-green-500" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </div>
                                                <p class="ml-3 text-base leading-6 font-medium text-gray-500">
                                                    Email support
                                                </p>
                                            </li>
                                        </ul>
                                        <div class="mt-8">
                                            <div class="rounded-lg shadow-md">
                                                <a href="/register" class="block w-full text-center rounded-lg border border-transparent bg-white px-6 py-3 text-base leading-6 font-medium text-surveyr-blue hover:text-blue-500 focus:outline-none focus:shadow-outline transition ease-in-out duration-150">
                                                    Start your 10 day trial
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-16 md:mt-24 text-center px-4 sm:px-6 lg:px-8">
                <h3 class="text-xl leading-9 font-extrabold tracking-tight text-gray-900 sm:text-2xl sm:leading-10">
                    100% No-Risk 30-Day Money Back&nbsp;Guarantee
                </h3>
                <p class="mt-3 max-w-md mx-auto text-base text-gray-500 sm:text-md md:mt-5 md:text-lg md:max-w-4xl">
                    If for any reason you are not happy with our product or service, simply let us know within 30 days of the end of your free trial and we'll refund 100% of your money. No questions asked.
                </p>
            </div>
        </div>
    </div>

    <div id="faq" class="bg-surveyr-bg">
        <div class="max-w-screen-xl mx-auto pt-12 pb-16 sm:pt-16 sm:pb-20 px-4 sm:px-6 lg:pt-20 lg:pb-28 lg:px-8">
            <h2 class="text-3xl leading-9 font-extrabold text-gray-900">
                Frequently Asked Questions
            </h2>
            <div class="mt-6 border-t-2 border-gray-200 pt-10">
                <dl class="md:grid md:grid-cols-2 md:gap-8">
                    <div>
                        <div>
                            <dt class="text-lg leading-6 font-medium text-gray-900">
                                What is a schedule monitor?
                            </dt>
                            <dd class="mt-2">
                                <p class="text-base leading-6 text-gray-500">
                                    A schedule monitor is a monitor for a single scheduled cron job. For example, in Laravel each <code>$schedule->command()</code> you have will require an individual schedule monitor.
                                </p>
                            </dd>
                        </div>
                        <div class="mt-12">
                            <dt class="text-lg leading-6 font-medium text-gray-900">
                                What happens when my 10 day free trial ends?
                            </dt>
                            <dd class="mt-2">
                                <p class="text-base leading-6 text-gray-500">
                                    When your free trial ends you will need to sign up for a subscription via the billing page. If you don't upgrade to a paid plan at this point your schedule cron jobs will no longer be monitored.
                                </p>
                            </dd>
                        </div>
                        <div class="mt-12">
                            <dt class="text-lg leading-6 font-medium text-gray-900">
                                What happens if I go over my schedule monitor limit?
                            </dt>
                            <dd class="mt-2">
                                <p class="text-base leading-6 text-gray-500">
                                    When you reach the limit of schedule monitors for your plan you will no longer be able to create new schedule monitors. To create new schedule monitors you will need to upgrade to a higher plan.
                                </p>
                            </dd>
                        </div>
                    </div>
                    <div class="mt-12 md:mt-0">
                        <div>
                            <dt class="text-lg leading-6 font-medium text-gray-900">
                                Will your package slow down or break my app?
                            </dt>
                            <dd class="mt-2">
                                <p class="text-base leading-6 text-gray-500">
                                    Our Laravel package is designed to put minimal extra load on your scheduled jobs and will not affect your jobs even if pings to our service fail.
                                </p>
                            </dd>
                        </div>
                        <div class="mt-12">
                            <dt class="text-lg leading-6 font-medium text-gray-900">
                                Can I upgrade my plan?
                            </dt>
                            <dd class="mt-2">
                                <p class="text-base leading-6 text-gray-500">
                                    You can upgrade your plan at any time via the billing page. Upgrades will be prorated and you won't be charged until the beginning of the next billing cycle.
                                </p>
                            </dd>
                        </div>
                        <div class="mt-12">
                            <dt class="text-lg leading-6 font-medium text-gray-900">
                                Can I cancel my subscription?
                            </dt>
                            <dd class="mt-2">
                                <p class="text-base leading-6 text-gray-500">
                                    You can cancel your subscripiton at any time via the billing page. When the current billing cycle ends your schedule cron jobs will no longer be monitored and your card will stop being billed.
                                </p>
                            </dd>
                        </div>
                    </div>
                </dl>
            </div>
        </div>
    </div>

    <div class="bg-white">
        <div class="max-w-screen-xl mx-auto py-12 px-4 overflow-hidden sm:px-6 lg:px-8">
            <nav class="-mx-5 -my-2 flex flex-wrap justify-center">
                <div class="px-5 py-2">
                    <a href="/privacy" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                        Privacy
                    </a>
                </div>
                <div class="px-5 py-2">
                    <a href="/terms" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                        Terms
                    </a>
                </div>
                <div class="px-5 py-2">
                    <a href="https://twitter.com/surveyrio" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                        Twitter
                    </a>
                </div>
                <div class="px-5 py-2">
                    <a href="ma&#105;lto&#58;suppor%&#55;&#52;&#64;sur%76e&#121;r%2Ei&#37;6F" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                        Support
                    </a>
                </div>
            </nav>
            <div class="mt-8">
                <p class="text-center text-base leading-6 text-gray-400">
                    &copy; {{ date('Y') }} - Surveyr is a project by <a href="https://dev7studios.co/">Dev7studios</a>
                </p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.0.1/dist/alpine.js" defer></script>
</body>
</html>
