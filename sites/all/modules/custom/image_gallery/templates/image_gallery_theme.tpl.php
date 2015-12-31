<?php
global $base_url;

$node = $variables['node'];

if($node && $node->type == 'vehicle'){
    ?>
    <div id="car-image-gallery-wrapper">
        <div class="row">
            <div class="col-md-12">
                <?php
                if(isset($node->field_images['und']) && $node->field_images['und']){
                    foreach($node->field_images['und'] as $index => $image){
                        $pixel = image_style_url('pixel', $image['uri']);
                        $thumb = image_style_url('medium', $image['uri']);
                        $large = image_style_url('full', $image['uri']);

                        if($index <= 8){
                        ?>
                            <div class="image-gallery-item col-md-4">
                                <a href="<?=$large?>" class="ana-car" rel="group"><img src="<?=$thumb?>" alt=""></a>
                            </div>
                        <?php
                        }else{
                            ?>
                            <a href="<?=$large?>" class="ana-car" rel="group"><img src="<?=$pixel?>" alt="" style="display: none"></a>
                            <?php
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <?php
}