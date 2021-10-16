<?php                
for($i=0; $i < count($gambar); $i++){?>
                <div class="carousel-item <?php if($i==0) echo 'active';?>">
                  <img src="<?= base_url($gambar[$i])?>">
                </div>
<?php
}?>

                              