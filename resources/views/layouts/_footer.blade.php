<footer class="footer">
    <div class="container">
        <p class="float-left">
            Powered By<a href="#">  MamerBBS </a><span style="color: #e27575;font-size: 14px;">❤</span>
        </p>

        <p class="float-right"><a href="mailto:{{ setting('contact_email') }}">联系我们</a></p>
        @if(!empty($location))
            <p class="pull-right" style="margin-right: 20px"> 来自: {{$location}}</p>
        @endif
    </div>
</footer>
