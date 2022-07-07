        <div class="footer">
            <div class="copyright">
                <p>Copyright © by <a href="https://dev.asukamethod.com/" target="_blank">Asuka Watanabe</a> 2022</p>
            </div>
        </div>
            
    </div>

    <!-- Required vendors -->
    <script src="{{ asset('backend/vendor/global/global.min.js')}}"></script>
    <script src="{{ asset('backend/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    
    <!-- Chart piety plugin files -->
    <script src="{{ asset('backend/vendor/peity/jquery.peity.min.js')}}"></script>
    
    
    <!-- Dashboard 1 -->
    <script src="{{ asset('backend/js/dashboard/dashboard-1.js')}}"></script>    
    <script src="{{ asset('backend/js/custom.min.js')}}"></script>
    <script src="{{ asset('backend/js/deznav-init.js')}}"></script>
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info')}}"
        switch(type){
            case 'info':
            toastr.info("{{ Session::get('message')}}");
            break;
            case 'success':
            toastr.success("{{ Session::get('message')}}");
            break;
            case 'warning':
            toastr.warning("{{ Session::get('message')}}");
            break;
            case 'error':
            toastr.error("{{ Session::get('message')}}");
            break;
        }
        @endif
    </script>    
    

</body>
</html>
    