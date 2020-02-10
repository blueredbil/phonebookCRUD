<div class="container">
    <div class="col-xs-12">
    <?php 
        if(!empty($success_msg)){
            echo '<div class="alert alert-success">'.$success_msg.'</div>';
        }elseif(!empty($error_msg)){
            echo '<div class="alert alert-danger">'.$error_msg.'</div>';
        }
    ?>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo $action; ?> Phone Book <a href="<?php echo site_url('phonebooks/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
                <div class="panel-body">
                    <form method="post" action="" class="form">
                        <div class="form-group">
                            <label for="name">Name/Organization</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter name/organization" value="<?php echo !empty($phonebook['name'])?$phonebook['name']:''; ?>">
                            <?php echo form_error('name','<p class="help-block text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="contactno">Contact Number</label>
                            <textarea name="contactno" class="form-control" placeholder="Enter contact number"><?php echo !empty($phonebook['contactno'])?$phonebook['contactno']:''; ?></textarea>
                            <?php echo form_error('contactno','<p class="text-danger">','</p>'); ?>
                        </div>
                        <input type="submit" name="phonebookSubmit" class="btn btn-primary" value="Submit"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>