<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', config('app.name'))</title>

    <link href="{{ mix('css/site.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">{{ config('app.name') }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/#features">{{__('Features')}}</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="/home">{{__('Dashboard')}}</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="/login">{{__('Login')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/register">{{__('Sign Up')}}</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Cron schedule monitoring for Laravel</h1>
            <p class="lead">Get an instant alert if your Laravel scheduled cron job fails to run.</p>
        </div>
    </div>

    <div class="container py-5">
        <p>Scheduled cron jobs often form the backbone of a Laravel application, usually carrying out critical tasks on behalf of your customers. Yet, often these jobs are hard to monitor as they run in the background. No system is 100% resilient and downtime is inevitable. If these jobs stop working for any reason, <strong>you may lose data and even customers</strong>.</p>

        <p>Surveyr saves you time and money by monitoring your scheduled jobs in Laravel and sending you an alert if a job stops working for whatever reason. This means you can stop worrying about cron jobs and focus your energy on building your Laravel app and growing your business.</p>

        <p>Buffer managed to generate <a href="https://open.buffer.com/cronjob-generates-4-million-year/" target="_blank">$4 million per year from a single cron job</a>. Imagine the impact it would have on their business if it stopped working!</p>
    </div>

    <div id="setup">
        <div class="container py-5 text-center">
            <h2 class="h1 mb-5">Easy as 1, 2, 3</h2>
            <div class="row">
                <div class="col-md-4">
                    <h3>Step 1</h3>
                    <p>Install our package and quickly set up schedule monitors in Surveyr.</p>
                </div>
                <div class="col-md-4">
                    <h3>Step 2</h3>
                    <p>We continuously monitor your scheduled cron jobs after we receive the first ping.</p>
                </div>
                <div class="col-md-4">
                    <h3>Step 3</h3>
                    <p>When a job fails to run on schedule we send alerts to the people you specify.</p>
                </div>
            </div>
        </div>
    </div>

    <div id="features">
        <div class="container py-5 text-center">
            <h2 class="h1 mb-5">Features</h2>
            <div class="row">
                <div class="col-md-6 mb-5">
                    <h3>Quick Setup</h3>
                    <p>Use our Laravel package to quickly import your schedule monitors into Surveyr, instead of creating monitors manually.</p>
                </div>
                <div class="col-md-6 mb-5">
                    <h3>Flexible Alerts</h3>
                    <p>When something does go wrong, we make it easy to alert the right person in the right location.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-5">
                    <h3>Team Collaboration</h3>
                    <p>Invite your team to collaborate on schedule monitors and diagnose issues when they occur.</p>
                </div>
                <div class="col-md-6 mb-5">
                    <h3>Full Cron Schedules</h3>
                    <p>We support any cron schedule, including jobs that run up to every minute.</p>
                </div>
            </div>
        </div>
    </div>

    <div id="coming-soon">
        <div class="container py-5">
            <h2 class="h1 mb-5">Coming Soon...</h2>
            <p>We're not quite ready to release Surveyr to the world yet, but if you're interested in becoming a beta tester or being notified when we launch pop your email address in the form below to subscribe and be the first to know.</p>
            <form class="form-inline mb-3">
                <div class="form-group">
                    <input type="email" class="form-control mr-2" id="emailInput" placeholder="hi@example.com" style="min-width: 300px;">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <p><small class="form-text text-muted">We'll only ever send updates specifically about Surveyr to this email address.<br>No spam, we promise. Unsubscribe at any time.</small></p>
        </div>
    </div>

    <footer class="footer">
        <div class="container py-5">
            <p>&copy; Surveyr is a project by <a href="https://dev7studios.co">Dev7studios</a></p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
