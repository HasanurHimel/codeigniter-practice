<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Manage your Blog</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                <?php $message=$this->session->userdata('message') ;
                if($message){ ?>
                    <div class="alert alert-success">
                        <?php echo $message;
                        $this->session->unset_userdata('message');
                        ?>

                    </div>

                <?php   } ?>

                <thead>
                <tr>
                    <th>Serial</th>
                    <th>Blog title</th>
                    <th>Blog category</th>
                    <th>Photo</th>
                    <th>publication status</th>
                    <th>Action</th>

                </tr>
                </thead>


                <tbody>
                <?php $i=1 ?>
                <?php  foreach ($all_blog_data as $blog ) : ?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $blog->blog_title ?></td>
                    <td><?php echo $blog->category_name ?></td>
                    <td><img src="<?php echo base_url($blog->blog_photo) ?>" alt="" height="80px" width="80px"></td>
<!--                    <td><img src="--><?php //echo $blog->blog_photo ?><!--" alt="" height="80px" width="80px"></td>-->
                    <td><?php echo $blog->publication_status ==1 ? 'Published' : 'Unpublished' ?></td>
                    <td>
                        <?php
                        if ($blog->publication_status==1 ) {  ?>
                            <a href="<?php echo base_url() ; ?>SuperAdminController/unpublished_blog/<?php echo $blog->id ?>"><span class="btn btn-info btn-xs"><i class="fas fa-arrow-alt-circle-up "></i></span></a>
                        <?php } else{ ?>
                            <a href="<?php echo base_url() ; ?>SuperAdminController/published_blog/<?php echo $blog->id ?>"><span class="btn btn-danger btn-xs"><i class="fas fa-arrow-alt-circle-down "></i></span></a>

                        <?php  }
                        ?>

                        <a href="<?php echo base_url() ; ?>SuperAdminController/edit_blog/<?php echo $blog->id ?>"><span class="btn btn-secondary btn-xs"><i class="fas fa-edit  "></i></span></a>
                        <a href="<?php echo base_url() ; ?>SuperAdminController/delete_blog/<?php echo $blog->id ?>"><span class="btn btn-danger btn-xs"><i class="fas fa-trash  "></i></span></a>

                    </td>
                </tr>
                <?php endforeach;  ?>

                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>