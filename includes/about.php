<?php 
$myDetail = array(
   'contactDet'   => 'Contact Details',
   'myName'       => 'Benigno Ryan U. Dela Rosa',
   'myAddress'    => 'Sumulong Highway, <br> Barangay Mayamot, Antipolo City',
   'myCellNum'    => '(+63)927-960-7328',
   'myEmail'      => 'ryandelarosa08@gmail.com',
   'myEmail2'     => 'ryandelarosa08@yahoo.com',
   'myNickName'   => 'Ryan U. Dela Rosa'
);
?>
   <section id="about">
      <div class="row">
         <div class="three columns">
            <img class="profile-pic"  src="images/about.jpg" alt="profile" />
         </div>
         <div class="nine columns main-col">
            <h2>About Me</h2>
            
            <?php include "includes/textfile/about.txt" ?>

            <div class="row">
               <div class="columns contact-details">
                  <h2><?= $myDetail['contactDet']; ?></h2>
                  <p class="address">
						   <span id="name"> <?= $myDetail['myName']; ?></span><br>
						   <span>
                        <?= $myDetails = $myDetail['myAddress'] . "<br>" . $myDetail['myCellNum'] . "<br>" . $myDetail['myEmail'] . "<br>" . $myDetail['myEmail2']; ?>
                     </span><br>
					   </p>
               </div>
               <div class="columns download">
                  <p>
                     <a href="https://www.dropbox.com/s/p8ktgw4ncsfhpz1/Resume%202.2.doc?dl=0" class="button" target="resume"><i class="fa fa-download"></i>Download Resume</a>
                  </p>
               </div>
            </div> <!-- end row -->
         </div> <!-- end .main-col -->
      </div>
   </section> 