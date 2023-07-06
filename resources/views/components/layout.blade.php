<!DOCTYPE html>
<title>Project Tracker</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="{{ asset('app.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ asset('scripts.js') }}"></script>


<html>
    <body>
        <div class="row">
            <div class="d-flex flex-column flex-shrink-0 p-3 bg-light mx-3" style="min-height: 100vh; width: 280px;">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                    <span class="fs-4">Project Tracker</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                    <a href="/projects" class="nav-link" aria-current="page">
                        Projects
                    </a>
                    </li>
                    <li>
                    <a href="/activities" class="nav-link">
                        Activities
                    </a>
                    </li>
                    <li>
                    <a href="/tags" class="nav-link">
                        Tags
                    </a>
                    </li>                  
                    
                </ul>                
            </div>

            <div class="col">
                {{ $slot }}
            </div>
        </div>      
        
        
    </body>
</html>

<script>

    $('.nav-link').on('click', function() {
        $('.nav-link').removeClass('active');
        $(this).addClass('active');
    });
</script>
