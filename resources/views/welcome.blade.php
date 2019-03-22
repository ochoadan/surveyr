<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="/favicon.png">

    <title>@yield('title', 'Surveyr - Cron schedule monitoring for Laravel')</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:400,400i|Roboto:500" rel="stylesheet">
    <link href="{{ mix('css/site.css') }}" rel="stylesheet">

    @include('analytics.google')
</head>
<body class="is-boxed">
    <div class="body-wrap">
        <header class="site-header">
            <div class="container">
                <div class="site-header-inner">
                    <div class="brand header-brand">
                        <a href="/">
                            <svg width="1360px" height="351px" viewBox="0 0 1360 351" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
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
                    </div>
                    <ul class="header-links mb-0">
                        <li>
                            <a href="/#features">Features</a>
                            <a href="/#pricing">Pricing</a>
                            <a href="/login">Login</a>
                            <a href="/register">Sign Up</a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <main>
            <section class="hero text-center">
                <div class="container-sm">
                    <div class="hero-inner">
                        <h1 class="hero-title h2-mobile mt-0 is-revealing">Cron schedule monitoring for Laravel</h1>
                        <p class="hero-paragraph is-revealing">Get an instant alert if your Laravel scheduled cron job fails to run.</p>
                        <div class="hero-browser">
                            <div class="bubble-3 is-revealing">
                                <svg width="427" height="286" viewBox="0 0 427 286" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <defs>
                                        <path d="M213.5 286C331.413 286 427 190.413 427 72.5S304.221 16.45 186.309 16.45C68.396 16.45 0-45.414 0 72.5S95.587 286 213.5 286z" id="bubble-3-a"/>
                                    </defs>
                                    <g fill="none" fill-rule="evenodd">
                                        <mask id="bubble-3-b" fill="#fff">
                                            <use xlink:href="#bubble-3-a"/>
                                        </mask>
                                        <use fill="#4E8FF8" xlink:href="#bubble-3-a"/>
                                        <path d="M64.5 129.77c117.913 0 213.5-95.588 213.5-213.5 0-117.914-122.779-56.052-240.691-56.052C-80.604-139.782-149-201.644-149-83.73c0 117.913 95.587 213.5 213.5 213.5z" fill="#1274ED" mask="url(#bubble-3-b)"/>
                                        <path d="M381.5 501.77c117.913 0 213.5-95.588 213.5-213.5 0-117.914-122.779-56.052-240.691-56.052C236.396 232.218 168 170.356 168 288.27c0 117.913 95.587 213.5 213.5 213.5z" fill="#75ABF3" mask="url(#bubble-3-b)"/>
                                    </g>
                                </svg>
                            </div>
                            <div class="bubble-4 is-revealing">
                                <svg width="230" height="235" viewBox="0 0 230 235" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <defs>
                                        <path d="M196.605 234.11C256.252 234.11 216 167.646 216 108 216 48.353 167.647 0 108 0S0 48.353 0 108s136.959 126.11 196.605 126.11z" id="bubble-4-a"/>
                                    </defs>
                                    <g fill="none" fill-rule="evenodd">
                                        <mask id="bubble-4-b" fill="#fff">
                                            <use xlink:href="#bubble-4-a"/>
                                        </mask>
                                        <use fill="#7CE8DD" xlink:href="#bubble-4-a"/>
                                        <circle fill="#3BDDCC" mask="url(#bubble-4-b)" cx="30" cy="108" r="108"/>
                                        <circle fill="#B1F1EA" opacity=".7" mask="url(#bubble-4-b)" cx="265" cy="88" r="108"/>
                                    </g>
                                </svg>
                            </div>
                            <div class="hero-browser-inner is-revealing">
                                <img src="/img/surveyr.png" alt="Surveyr">
                            </div>
                            <div class="bubble-1 is-revealing">
                                <svg width="61" height="52" viewBox="0 0 61 52" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <defs>
                                        <path d="M32 43.992c17.673 0 28.05 17.673 28.05 0S49.674 0 32 0C14.327 0 0 14.327 0 32c0 17.673 14.327 11.992 32 11.992z" id="bubble-1-a"/>
                                    </defs>
                                    <g fill="none" fill-rule="evenodd">
                                        <mask id="bubble-1-b" fill="#fff">
                                            <use xlink:href="#bubble-1-a"/>
                                        </mask>
                                        <use fill="#FF6D8B" xlink:href="#bubble-1-a"/>
                                        <path d="M2 43.992c17.673 0 28.05 17.673 28.05 0S19.674 0 2 0c-17.673 0-32 14.327-32 32 0 17.673 14.327 11.992 32 11.992z" fill="#FF4F73" mask="url(#bubble-1-b)"/>
                                        <path d="M74 30.992c17.673 0 28.05 17.673 28.05 0S91.674-13 74-13C56.327-13 42 1.327 42 19c0 17.673 14.327 11.992 32 11.992z" fill-opacity=".8" fill="#FFA3B5" mask="url(#bubble-1-b)"/>
                                    </g>
                                </svg>
                            </div>
                            <div class="bubble-2 is-revealing">
                                <svg width="179" height="126" viewBox="0 0 179 126" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <defs>
                                        <path d="M104.697 125.661c41.034 0 74.298-33.264 74.298-74.298s-43.231-7.425-84.265-7.425S0-28.44 0 12.593c0 41.034 63.663 113.068 104.697 113.068z" id="bubble-2-a"/>
                                    </defs>
                                    <g fill="none" fill-rule="evenodd">
                                        <mask id="bubble-2-b" fill="#fff">
                                            <use xlink:href="#bubble-2-a"/>
                                        </mask>
                                        <use fill="#838DEA" xlink:href="#bubble-2-a"/>
                                        <path d="M202.697 211.661c41.034 0 74.298-33.264 74.298-74.298s-43.231-7.425-84.265-7.425S98 57.56 98 98.593c0 41.034 63.663 113.068 104.697 113.068z" fill="#626CD5" mask="url(#bubble-2-b)"/>
                                        <path d="M43.697 56.661c41.034 0 74.298-33.264 74.298-74.298s-43.231-7.425-84.265-7.425S-61-97.44-61-56.407C-61-15.373 2.663 56.661 43.697 56.661z" fill="#B1B6F1" opacity=".64" mask="url(#bubble-2-b)"/>
                                    </g>
                                </svg>

                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="intro section">
                <div class="container-sm">
                    <div class="section-inner">
                        <p>Scheduled cron jobs often form the backbone of a Laravel application, usually carrying out critical tasks on behalf of your customers. Yet, often these jobs are hard to monitor as they run in the background. No system is 100% resilient and downtime is inevitable. If these jobs stop working for any reason, <strong>you may lose data and even customers</strong>.</p>

                        <p>Surveyr saves you time and money by monitoring your scheduled jobs in Laravel and sending you an alert if a job stops working for whatever reason. This means you can stop worrying about cron jobs and focus your energy on building your Laravel app and growing your business.</p>

                        <p>Buffer managed to generate <a href="https://open.buffer.com/cronjob-generates-4-million-year/" target="_blank">$4 million per year from a single cron job</a>. Imagine the impact it would have on their business if it stopped working!</p>
                    </div>
                </div>
            </section>

            <section id="features" class="features section">
                <div class="container">
                    <div class="features-inner section-inner has-bottom-divider">
                        <div class="feature">
                            <div class="feature-content">
                                <div class="feature-icon">
                                    <svg width="80" height="80" xmlns="http://www.w3.org/2000/svg">
                                        <g fill="none" fill-rule="evenodd">
                                            <path d="M48.066 61.627c6.628 0 10.087-16.79 10.087-23.418 0-6.627-5.025-9.209-11.652-9.209C39.874 29 24 42.507 24 49.135c0 6.627 17.439 12.492 24.066 12.492z" fill-opacity=".24" fill="#A0A6EE"/>
                                            <path d="M26 54l28-28" stroke="#838DEA" stroke-width="2" stroke-linecap="square"/>
                                            <path d="M26 46l20-20M26 38l12-12M26 30l4-4M34 54l20-20M42 54l12-12" stroke="#767DE1" stroke-width="2" stroke-linecap="square"/>
                                            <path d="M50 54l4-4" stroke="#838DEA" stroke-width="2" stroke-linecap="square"/>
                                        </g>
                                    </svg>
                                </div>
                                <h3 class="feature-title">Minimal Setup</h3>
                                <p class="text-sm">Use our Laravel package to quickly import your schedule monitors into Surveyr and handle sending pings to Surveyr. Minimal setup&nbsp;required.</p>
                            </div>
                            <div class="feature-image">
                                <img src="{{ url('/img/feature-setup.png') }}" alt="Setting up Surveyr schuedle monitors in Laravel">
                            </div>
                        </div>
                        <div class="feature">
                            <div class="feature-content">
                                <div class="feature-icon">
                                    <svg width="80" height="80" xmlns="http://www.w3.org/2000/svg">
                                        <g fill="none" fill-rule="evenodd">
                                            <path d="M48.066 61.627c6.628 0 10.087-16.79 10.087-23.418 0-6.627-5.025-9.209-11.652-9.209C39.874 29 24 42.507 24 49.135c0 6.627 17.439 12.492 24.066 12.492z" fill-opacity=".24" fill="#75ABF3"/>
                                            <path d="M34 52V35M40 52V42M46 52V35M52 52V42M28 52V28" stroke="#4D8EF7" stroke-width="2" stroke-linecap="square"/>
                                        </g>
                                    </svg>
                                </div>
                                <h3 class="feature-title">Quick Alerts</h3>
                                <p class="text-sm">Get alerted as soon as a problem occurs so you can diagnose and resolve it as quickly as&nbsp;possible.</p>
                            </div>
                            <div class="feature-image">
                                <img src="{{ url('/img/feature-dashboard.png') }}" alt="Viewing a schedule monitor in Surveyr">
                            </div>
                        </div>
                        <div class="feature">
                            <div class="feature-content">
                                <div class="feature-icon">
                                    <svg width="80" height="80" xmlns="http://www.w3.org/2000/svg">
                                        <g fill="none" fill-rule="evenodd">
                                            <path d="M48.066 61.627c6.628 0 10.087-16.79 10.087-23.418 0-6.627-5.025-9.209-11.652-9.209C39.874 29 24 42.507 24 49.135c0 6.627 17.439 12.492 24.066 12.492z" fill-opacity=".32" fill="#FF97AC"/>
                                            <path stroke="#FF6D8B" stroke-width="2" stroke-linecap="square" d="M49 45h6V25H35v6M43 55h2v-2M25 53v2h2M27 35h-2v2"/>
                                            <path stroke="#FF6D8B" stroke-width="2" stroke-linecap="square" d="M43 35h2v2M39 55h-2M33 55h-2M39 35h-2M33 35h-2M45 49v-2M25 49v-2M25 43v-2M45 43v-2"/>
                                        </g>
                                    </svg>

                                </div>
                                <h3 class="feature-title">View Cron Output</h3>
                                <p class="text-sm">See exactly what your scheduled cron jobs are outputting to easily check performance or debug&nbsp;issues.</p>
                            </div>
                            <div class="feature-image">
                                <img src="{{ url('/img/feature-output.png') }}" alt="Viewing job output in Surveyr">
                            </div>
                        </div>
                        <div class="feature feature-center">
                            <div class="feature-content">
                                <div class="feature-icon">
                                    <svg width="80" height="80" xmlns="http://www.w3.org/2000/svg">
                                        <g transform="translate(24 25)" fill="none" fill-rule="evenodd">
                                            <path d="M24.066 36.627c6.628 0 10.087-16.79 10.087-23.418C34.153 6.582 29.128 4 22.501 4 15.874 4 0 17.507 0 24.135c0 6.627 17.439 12.492 24.066 12.492z" fill-opacity=".32" fill="#A0EEE5"/>
                                            <circle stroke="#39D8C8" stroke-width="2" stroke-linecap="square" cx="5" cy="4" r="4"/>
                                            <path stroke="#39D8C8" stroke-width="2" stroke-linecap="square" d="M23 22h8v8h-8zM11 10l9 9"/>
                                        </g>
                                    </svg>
                                </div>
                                <h3 class="feature-title">Much more...</h3>
                                <p class="text-sm">Many more features including support for <strong>full cron schedules</strong> (up to every mintue), <strong>team collaboration</strong> and&nbsp;more.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="pricing" class="pricing section">
                <div class="container-sm">
                    <div class="section-inner">
                        <div class="text-center is-revealing">
                            <h2 class="section-title mt-0">Simple Pricing</h2>
                            <p class="section-paragraph">We like to make things stupidly simple, including our pricing.</p>
                        </div>
                        @php
                        $plans = config('billing.plans');
                        $plans = collect($plans)->reject(function($plan) {
                            return $plan['archived'];
                        });
                        @endphp
                        <table class="pricing-table">
                            <thead>
                                <tr>
                                    @foreach ($plans as $plan)
                                        <th>{{ $plan['title'] }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="pricing-price">
                                    @foreach ($plans as $plan)
                                        <td><span>&dollar;{{ $plan['price'] }}</span>/month</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    @foreach ($plans as $plan)
                                        <td><strong>{{ $plan['schedule_monitor_limit'] }}</strong> schedule monitors</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    @foreach ($plans as $plan)
                                        <td>30 day event log</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    @foreach ($plans as $plan)
                                        <td>Unlimited apps</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    @foreach ($plans as $plan)
                                        <td>Unlimited team members</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    @foreach ($plans as $plan)
                                        <td>Email support</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    @foreach ($plans as $plan)
                                        <td>{{ $plan['trial'] }} day free trial</td>
                                    @endforeach
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    @foreach ($plans as $plan)
                                        <td>
                                            <a href="{{ url('register?plan=' . $plan['id']) }}" class="button button-primary">Start Free Trial</a>
                                        </td>
                                    @endforeach
                                </tr>
                            </tfoot>
                        </table>
                        <div id="mbg" class="text-center">
                            <h3>100% No-Risk 30-Day Money Back Guarantee</h3>
                            <p>If for any reason you are not happy with our product or service, simply let us know within 30 days of your purchase and we'll refund 100% of your money. No questions asked.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section id="faq" class="faq section">
                <div class="container">
                    <div class="section-inner">
                        <div class="text-center is-revealing">
                            <h2 class="section-title mt-0">FAQ</h2>
                        </div>
                        <div class="faq-row">
                            <div class="faq-item">
                                <h4>What is a schedule monitor?</h4>
                                <p class="text-sm">A schedule monitor is a monitor for a single scheduled cron job. For example, in Laravel each <code>$schedule->command()</code> you have will require an individual schedule monitor.</p>
                            </div>
                            <div class="faq-item">
                                <h4>What happens when my 10 day free trial ends?</h4>
                                <p class="text-sm">When your free trial ends your subscription will begin and your card will be charged the amount for your selected plan. Billing will continue until you cancel your subscription.</p>
                            </div>
                            <div class="faq-item">
                                <h4>What happens if I go over my schedule monitor limit?</h4>
                                <p class="text-sm">When you reach the limit of schedule monitors for your plan you will no longer be able to create new schedule monitors. To create new schedule monitors you will need to upgrade to a higher plan.</p>
                            </div>
                        </div>
                        <div class="faq-row">
                            <div class="faq-item">
                                <h4>Will your package slow down or break my app?</h4>
                                <p class="text-sm">Our Laravel package is designed to put minimal extra load on your scheduled jobs and will not affect your jobs even if pings to our service fail.</p>
                            </div>
                            <div class="faq-item">
                                <h4>Can I upgrade my plan?</h4>
                                <p class="text-sm">You can upgrade your plan at any time via the billing page. Upgrades will be prorated and you won't be charged until the beginning of the next billing cycle.</p>
                            </div>
                            <div class="faq-item">
                                <h4>Can I cancel my subscription?</h4>
                                <p class="text-sm">You can cancel your subscripiton at any time via the billing page. When the current billing cycle ends your schedule cron jobs will no longer be monitored and your card will stop being billed.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <footer class="site-footer text-light">
            <div class="container">
                <div class="site-footer-inner">
                    <div class="brand footer-brand">
                        <a href="/">
                            <svg width="1360px" height="351px" viewBox="0 0 1360 351" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
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
                    </div>
                    <ul class="footer-links list-reset">
                        <li>
                            <a href="{{ url('/terms') }}">Terms</a>
                        </li>
                        <li>
                            <a href="{{ url('/privacy') }}">Privacy</a>
                        </li>
                        <li>
                            <a href="https://twitter.com/surveyrio">Twitter</a>
                        </li>
                        <li>
                            <a href='ma&#105;lto&#58;suppor%&#55;&#52;&#64;sur%76e&#121;r%2Ei&#37;6F'>Contact</a>
                        </li>
                    </ul>
                    <ul class="footer-social-links list-reset">
                    </ul>
                    <div class="footer-copyright">&copy; {{ date('Y') }} - Surveyr is a project by&nbsp;<a href="https://dev7studios.co">Dev7studios</div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
