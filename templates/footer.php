    <footer>
        <div class="container-fluid bg-light text-center p-3">
            <span class="small">©Copyright 2023, Historia Interactiva</span>
        </div>
    </footer>

    <script>
        $(document).ready(function() {
            verifyOrientation();
           
            window.addEventListener('orientationchange', function() {
                verifyOrientation();
            });
            
            if (isMobileDevice()) {
                $("#mobileMessage").show();
            }
        });

        function verifyOrientation() {        
            var orientation = window.orientation;
          
            if (orientation === 0 || orientation === 180) {
                $("#verticalMessage").show();
            } else {                
                $("#verticalMessage").hide();
            }
        }

        function isMobileDevice() {
            return window.innerWidth < 768 || (window.innerWidth < 1024 && window.orientation === 90);
        }
    </script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
</body>
</html>  