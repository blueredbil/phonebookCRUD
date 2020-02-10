<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Phone Book Details <a href="<?php echo site_url('phonebooks/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Name/Organization:</label>
                    <p><?php echo !empty($phonebook['name'])?$phonebook['name']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Contact Number:</label>
                    <p><?php echo !empty($phonebook['contactno'])?$phonebook['contactno']:''; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>