<?php 
use Cake\Core\Configure;
echo $this->Form->control('AnimaisGalerias.imagem[]', ['type'=>'file', 'label'=>'', 'multiple'=>'multiple']);
?>
<div id="myCarousel" class="carousel slide">
	<!-- Indicators -->
    <ul class="carousel-indicators">
    	<?php    
    	foreach ($animal->animais_galerias as $index=>$animaisGaleria){
    	    $ativo = ($index===0)?"active":"";
    	    echo "<li data-id=\"".$index."\" ".$ativo."></li>";
    	}
    	?>        
    </ul>
  
    <!-- The slideshow -->
    <div class="carousel-inner">
    	<?php    
    	foreach ($animal->animais_galerias as $index=>$animaisGaleria){
    	    $ativo = ($index===0)?"active":"";
    	    echo "<div class=\"carousel-item ".$ativo."\">".$this->Html->image(Configure::read('App.fotosUrl').$animaisGaleria->imagem)."</div>";
    	}
    	?>            
    </div>

  
    <!-- Left and right controls -->
  	<a class="carousel-control-prev" href="#myCarousel">
    	<span class="carousel-control-prev-icon"></span>
  	</a>
  	<a class="carousel-control-next" href="#myCarousel">
    	<span class="carousel-control-next-icon"></span>
  	</a>
</div>