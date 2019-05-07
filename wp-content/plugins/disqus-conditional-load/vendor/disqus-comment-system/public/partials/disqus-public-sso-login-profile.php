
<script>
    var win = window;
    var isWindowed = win.opener && win.opener !== win.top;
    var isDsqRedirect = win.location.href.indexOf('opener=dsq-sso-login') > -1;
    if (isWindowed && isDsqRedirect)
        window.close();
</script>
