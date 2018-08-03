<?php 
echo $this->Form->control('fotos[]', ['type'=>'file', 'label'=>'', 'multiple'=>'multiple']);
?>
<div id="myCarousel" class="carousel slide">
	<!-- Indicators -->
    <ul class="carousel-indicators">
        <li class="item1 active" data-id="0"></li>
        <li class="item2" data-id="1"></li>
        <li class="item3" data-id="2"></li>
        <li class="item4" data-id="3"></li>
    </ul>
  
    <!-- The slideshow -->
    <div class="carousel-inner">
        <div class="carousel-item active">
    		<?=$this->Html->image('fotos/img1.jpg');?>
        </div>
        <div class="carousel-item">
        	<?=$this->Html->image('fotos/img2.jpg');?>
        </div>
        <div class="carousel-item">
        	<?=$this->Html->image('fotos/img3.jpg');?>
        </div>
    </div>
  
    <!-- Left and right controls -->
  	<a class="carousel-control-prev" href="#myCarousel">
    	<span class="carousel-control-prev-icon"></span>
  	</a>
  	<a class="carousel-control-next" href="#myCarousel">
    	<span class="carousel-control-next-icon"></span>
  	</a>
</div>