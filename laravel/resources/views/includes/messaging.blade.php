<div class="footer fixed" style="left:17px;width: 783.5px;">

    <form role="search" class="navbar-form-custom" action="message" method="post">
    {{csrf_field()}}
        <div class="form-group">
            <input type="text" placeholder="Type your message" class="form-control" name="message_body" id="bottom-search">
        </div>
    </form>
    
</div>