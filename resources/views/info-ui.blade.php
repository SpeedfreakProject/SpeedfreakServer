<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Information -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Speedfreak - Info</title>

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600' rel='stylesheet' type='text/css'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css' rel='stylesheet' type='text/css'>

    <!-- CSS -->
    <link href="https://bootswatch.com/cosmo/bootstrap.css" rel="stylesheet">
</head>
<body style="padding-top: 80px;">
    <div>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="/nfsw/Engine/Server/InfoUI">
                        <span style="font-size: 18px;" rel="tooltip" data-html="true" data-original-title='<em>"An individual who drives any vehicle at excessive speeds"</em>' data-placement="right">
                            <i class="fa fa-car"></i>
                            Speed<strong>freak</strong>
                            -
                            <span style="font-size: 16px;"><em>A new NFSW server.</em></span>
                        </span>
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="spark-navbar-collapse">
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <p class="navbar-text">Server by <strong><a class="navbar-link" href="http://www.elitepvpers.com/forum/members/6781934-leorblx.html">CoderLeo (leorblx)</a></strong></p>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Server Info</h3>
                    <small class="help-block">
                        <strong>Note:</strong> Some data may be cached. Run <code>php artisan cache:clear</code> from the root server directory if you would like to clear the cache.
                    </small>
                    <small class="help-block">
                        If you don't know what that means, don't worry about it. Data is cleared when you restart the machine, anyway.
                    </small>

                    <table class="table table-responsive table-bordered">
                        <tr>
                            <td>Total Users</td>
                            <td>{{ $totalUsers }}</td>
                        </tr>
                        <tr>
                            <td>Total Personas</td>
                            <td>{{ $totalPersonas }}</td>
                        </tr>
                        <tr>
                            <td>Online Users</td>
                            <td>
                                {{ $totalLoggedInUsers }}
                                @if ($totalLoggedInUsers >= config('speedfreak.server.maximumPlayers'))
                                    <i class="fa fa-exclamation-circle" data-placement="right" rel="tooltip" title="Maximum amount of players online"></i>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Most Recent Login</td>
                            <td>{{ $mostRecentLogin ?: 'N/A' }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-lg-4">
                    <div class="well">
                        <h3>Chat info</h3>

                        <p>
                            The chat server should be running on
                            <code>
                                127.0.0.1:9001
                            </code>
                        </p>
                        <p>You can test this by running <code>telnet 127.0.0.1 9001</code> from the machine running this server.</p>
                        <p><strong>Note:</strong> If you are running Windows, you will need to <a href="http://windows.microsoft.com/en-us/windows/telnet-faq#1TC=windows-7">install Telnet.</a></p>

                        <p>If you are testing the connection from another host, run <code>telnet IP_TO_SERVER_HERE 9001</code>.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- JavaScript -->
        <script src="/js/app.js"></script>
        <script>
            $(function() {
               $('body').tooltip({ selector: '[rel=tooltip]' });
            });
        </script>
    </div>
</body>
</html>