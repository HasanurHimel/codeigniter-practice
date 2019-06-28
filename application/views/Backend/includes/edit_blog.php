<div class="container">
    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Edit your Blog</div>
        <div class="card-body">


            <form action="<?php echo base_url();  ?>SuperAdminController/update_blog/<?php echo $edit_data->id ?>" id="selected_category" method="post" enctype="multipart/form-data">

                <?php $message=$this->session->userdata('message') ;
                if($message){ ?>
                    <div class="alert alert-success">
                        <?php echo $message;
                        $this->session->unset_userdata('message');
                        ?>

                    </div>

                <?php   } ?>

                <div class="form-group row">
                    <label for="blog_title" class="col-sm-3 col-form-label col-form-label-sm">Blog Category</label>
                    <div class="col-sm-9">
                        <select name="blog_category" class="custom-select custom-select-lg mb-3" required>
                            <?php foreach($category_name as $category)  : ?>
                                <option  value="<?php echo $category->id ?>"><?php echo $category->category_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="blog_title" class="col-sm-3 col-form-label col-form-label-sm">Blog Title</label>
                    <div class="col-sm-9">
                        <input value="<?php echo $edit_data->blog_title; ?>" type="text" name="blog_title" class="form-control form-control-sm"  placeholder="Blog title">
                        <h6 style="color: red"><i><small><?php echo form_error('blog_title'); ?></small></i></h6>

                    </div>
                </div>

                <div class="form-group row">
                    <label for="blog_title" class="col-sm-3 col-form-label col-form-label-sm">Blog Photo</label>
                    <div class="col-sm-9">
                        <div class="custom-file">
                            <img src="<?php echo base_url($edit_data->blog_photo) ?>" alt="" height="80px" width="80px">
                            <input type="file" name="blog_photo" >

                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="blog_short_description" class="col-sm-3 col-form-label col-form-label-sm">Blog short Description</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="blog_short_description" placeholder="Blog short Description"><?php echo $edit_data->blog_short_description; ?></textarea>
                        <h6 style="color: red"><i><small><?php echo form_error('blog_short_description'); ?></small></i></h6>

                    </div>
                </div>

                <div class="form-group row">
                    <label for="blog_long_description" class="col-sm-3 col-form-label col-form-label-sm">Blog long Description</label>
                    <div class="col-sm-9">
                        <textarea id="summary-ckeditor" name="blog_long_description" class="form-control" placeholder="Blog long Description"><?php echo $edit_data->blog_long_description; ?></textarea>
                        <h6 style="color: red"><i><small><?php echo form_error('blog_long_description'); ?></small></i></h6>

                    </div>
                </div>



                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-3 pt-0">Publication status</legend>
                        <div class="col-sm-9">
                            <div class="form-check">
                                <input  class="form-check-input" type="radio" <?php echo $edit_data->publication_status ==1 ? 'checked' : ' ' ?> name="publication_status"  value="1" >
                                <label class="form-check-label" for="gridRadios1">
                                    Published
                                </label>
                            </div>
                            <div class="form-check">
                                <input  class="form-check-input" type="radio" <?php echo $edit_data->publication_status ==0 ? 'checked' : ' ' ?> name="publication_status" value="0">
                                <label class="form-check-label" for="gridRadios2">
                                    Unpublished
                                </label>
                            </div>
                        </div>
                </fieldset>

                <div class="form-group">
                    <div class="col-sm-8 m-auto">
                        <button type="submit" class="btn btn-primary btn-block">Create category</button>
                    </div>
                </div>

            </form>


        </div>
    </div>
</div>

<script>
    document.forms['selected_category'].elements['blog_category'].value = <?php echo $edit_data->blog_category ?>;
</script>