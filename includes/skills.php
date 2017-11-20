<?php 
$skill = array(
      'python'    => 'Python', 
      'php'       => 'PHP',
      'css'       => 'CSS',
      'html5'     => 'HTML5',
      'jQuery'    => 'jQuery',
      'bootstrap' => 'Bootstrap',
      'photoshop' => 'Photoshop'
);
?>
<div class="row skill">
      <div class="three columns header-col">
            <h1><span>Skills</span></h1>
      </div>
            <div class="nine columns main-col">
                  <p class="skilltxt"><?php include "textfile/skills.txt" ?></p>
                  <div class="bars">
			      <ul class="skills">
                              <?php foreach ($skill as $skills => $list) { ?>
                              <li><span class="bar-expand <?php echo $skills; ?>"></span><em><?php echo $list;?></em></li>
                        <?php  
                              }
                        ?>
				</ul>
			</div><!-- end skill-bars -->
		</div> <!-- main-col end -->
</div> 