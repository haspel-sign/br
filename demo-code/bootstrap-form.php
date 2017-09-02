<!-- ------------------  Start Booking-Room-Search Form ----------------------- -->
<form id="searchForm" class="form-inline" action="{http://yoursite.com/booking-dir}" method="get">
    <div
        class="input-group">
        <div class="input-group-addon">
            <span class="fa fa-calendar fa-lg" aria-hidden="true"></span>
        </div>
        <input type="text" name="checkin" class="form-control input-lg" id="checkin"
               placeholder="настаняване">
    </div>
    <div
        class="input-group">
        <div class="input-group-addon">
            <span class="fa fa-calendar fa-lg" aria-hidden="true"></span>
        </div>
        <input type="text" class="form-control input-lg" name="checkout" id="checkout"
               placeholder="напускане">
    </div>
    <div
        class="input-group">
        <div class="input-group-addon">
            <span class="fa fa-user fa-lg" aria-hidden="true"></span>
        </div>
        <input type="number" class="form-control input-lg" name="adults" id="adults"
               placeholder="гости">
    </div>
<span class="input-group">
<button id="searchButton" class="btn btn-info btn-lg" data-toggle="tooltip"
        data-placement="bottom"
        title="търси свободни стаи"
        type="submit"><i class="fa fa-search" aria-hidden="true"></i>
    търси
</button>
</span>
</form>
