@if (app()->environment() == 'production')
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-3892196-95"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-3892196-95');
    </script>
@endif
