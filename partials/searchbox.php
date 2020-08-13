<form action="" method="get">
    <div class="d-flex searchbox">
        <input type="text" class="form-control" value="<?php echo isset($_GET['city']) ? $_GET['city'] : '' ?>"
               name="city" id="search_box"><br>
        <input type="submit" class="btn btn-primary" id="search_button" value="Search">
    </div>
</form>

