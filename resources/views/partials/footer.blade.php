<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        {{ isset($commonSetting) ? $commonSetting->footer_text : '' }}
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <script>document.write(new Date().getFullYear());</script></strong> All rights reserved.
</footer>
