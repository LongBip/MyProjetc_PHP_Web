<!DOCTYPE html>
<html>
    <head>
<!-- Đầu trang -->        @include('backend.dashboard.component.head')
    </head>
<body>
    <div id="wrapper">
<!-- menu -->    @include('backend.dashboard.component.sidebar')         
        <div id="page-wrapper" class="gray-bg">
<!-- thanh công cụ-->         @include('backend.dashboard.component.nav')    
<!-- content --> @include($template)            
<!-- footer -->  @include('backend.dashboard.component.footer')
         
        </div>
        </div>
    </div> 
<!-- Script -->
@include('backend.dashboard.component.script')
</body>
</html>
