<div class="container">
    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Edit your Category</div>
        <div class="card-body">


            <form action="<?php echo base_url()?>SuperAdminController/category_update/<?php echo $edit_data->id ?>" method="post">


                <?php
                $message=$this->session->userdata('message');
                if (isset($message)) {  ?>
                    <div class="alert alert-success">
                        <?php echo $message; ?>
                    </div>
                    <?php
                    $this->session->unset_userdata('message');

                } ?>


                <div class="form-group row">
                    <label for="category_title" class="col-sm-3 col-form-label col-form-label-sm">Category Title</label>
                    <div class="col-sm-9">
                        <input type="text"  " value="<?php echo $edit_data->category_name ?>" name="category_name" class="form-control form-control-sm"  placeholder="Category title">
<!--                        <input type="hidden"  " value="--><?php //echo $edit_data->id ?><!--" name="id" class="form-control form-control-sm"  placeholder="Category title">-->
                        <h6 style="color: red;"><i><small><?php echo form_error('category_name'); ?></small></i></h6>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="category_title" class="col-sm-3 col-form-label col-form-label-sm">Category Description</label>
                    <div class="col-sm-9">

                        <textarea class="form-control" name="category_description" placeholder="Category description">value="<?php echo $edit_data->category_description ?>"</textarea>
                        <h6 style="color: red;"><i><small><?php echo form_error('category_description') ; ?></small></i></h6>

                    </div>
                </div>

                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-3 pt-0">Publication status</legend>
                        <div class="col-sm-9">
                            <div class="form-check">
                                <input class="form-check-input" <?php echo $edit_data->publication_status==1 ? 'checked' : ' ' ?> type="radio" name="publication_status"  value="1" >
                                <label class="form-check-label" for="gridRadios1">
                                    Published
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" <?php echo $edit_data->publication_status==0 ? 'checked' : ' ' ?>  type="radio" name="publication_status" value="0">
                                <label class="form-check-label" for="gridRadios2">
                                    Unpublished
                                </label>
                            </div>
                        </div>
                </fieldset>

                <div class="form-group">
                    <div class="col-sm-8 m-auto">
                        <button type="submit" class="btn btn-primary btn-block">Update category</button>
                    </div>
                </div>

            </form>


        </div>
    </div>
</div>