<div class="container">
    <?php if(!empty($success_msg)){ ?>
    <div class="col-xs-12">
        <div class="alert alert-success"><?php echo $success_msg; ?></div>
    </div>
    <?php }elseif(!empty($error_msg)){ ?>
    <div class="col-xs-12">
        <div class="alert alert-danger"><?php echo $error_msg; ?></div>
    </div>
    <?php } ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default ">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="95%">Phone Book</th>
                            <th width="5%"><a href="<?php echo site_url('phonebooks/add/'); ?>" ><button type="button" class="btn btn-primary">Create </button></a></th>
                        </tr>
                    </thead>
                </table>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="">ID</th>
                            <th width="">Name/Organization</th>
                            <th width="">Contact Number</th>
                            <th width="">Action</th>
                        </tr>
                    </thead>
                    <tbody id="userData">
                        <?php if(!empty($phonebooks)): foreach($phonebooks as $phonebook): ?>
                        <tr>
                            <td><?php echo $phonebook['id']; ?></td>
                            <td><?php echo $phonebook['name']; ?></td>
                            <td><?php echo (strlen($phonebook['contactno'])>150)?substr($phonebook['contactno'],0,150).'...':$phonebook['contactno']; ?></td>
                            <td>
                                <a href="<?php echo site_url('phonebooks/view/'.$phonebook['id']); ?>"><button type="button" class="btn btn-info">View </button></a>
                                <a href="<?php echo site_url('phonebooks/edit/'.$phonebook['id']); ?>"><button type="button" class="btn btn-success">Edit </button></a>
                                <a href="<?php echo site_url('phonebooks/delete/'.$phonebook['id']); ?>" onclick="return confirm('Are you sure to delete?')"><button type="button" class="btn btn-danger">Delete </button></a>
                            </td>
                        </tr>
                        <?php endforeach; else: ?>
                        <tr><td colspan="4">Data(s) not found......</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>