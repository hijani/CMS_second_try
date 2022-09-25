<div class="well">
    <h4>Blog Search</h4>

    <?php 
        if(isset($_POST['post_search'])) {
            $search_text = $_POST['post_search_text'];

        }
    
    ?>
    <form action="" method="post">
        <div class="input-group">
            <input name="post_search_text" type="text" class="form-control">
            <span class="input-group-btn">
                <button name="post_search" class="btn btn-default" type="submit">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
        </div>
    </form>
    <!-- /.input-group -->
</div>