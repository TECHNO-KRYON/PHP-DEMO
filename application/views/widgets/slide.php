<?php if(!empty($slides)){?>
    <div class="container">
        <div class="bxslider-bg clearfix">
            <div class="bx-wrapper">
                <div class="bxslider" style="direction:ltr">
                    <?php foreach($slides as $s){?>
                    <div class="img">
                        <img  class="img-responsive slide" src="<?php echo base_url()?>images/slides/<?php echo $s->image; ?>" alt="<?php echo $s->title; ?>" />
                        <a href="#"><div class="title"><h1><?php echo $s->title; ?></h1><?php echo $s->description; ?></div></a>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
    <div class="bxslider-shadow"></div>
<?php }?>    