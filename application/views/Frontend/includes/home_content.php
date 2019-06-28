<div class="row text-center">

<?php echo $calendar; ?>

    <?php foreach ($all_published_blog as $blog): ?>
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card h-100">
            <img class="card-img-top" src="<?php echo base_url($blog->blog_photo)?>" alt="">
            <div class="card-body">
                <h4 class="card-title"><?php echo $blog->blog_title ?></h4>
                <p class="card-text"><?php echo $blog->blog_short_description ?></p>
            </div>
            <div class="card-footer">
                <a href="<?php echo base_url()?>Welcome/blog_details/<?php echo $blog->id ?>" class="btn btn-primary">Details</a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>


</div>