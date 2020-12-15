    <script src="{{ asset("js/jquery.min.js") }}"></script>
    <script src="{{ asset("js/bootstrap.bundle.min.js") }}"></script>
    <script src="{{ asset("js/mdb.min.js") }}"></script>

    <!-- load file script for image preview on register page -->
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            var outputsm = document.getElementById('outputsm');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.height=200;
            output.width=200;
            outputsm.src=URL.createObjectURL(event.target.files[0]);
        };
        const submitted=(e)=>{
            var element=document.getElementById(e.target.id);
            element.innerHTML="<div class='spinner spinner-border-sm spinner-border spinner-white'></div>";
        }
    </script>
</body>
</html>