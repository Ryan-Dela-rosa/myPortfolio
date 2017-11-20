
<section id="contact">
   <div class="row section-head">
      <div class="two columns header-col">
         <h1><span>Get In Touch.</span></h1>
      </div>
      <div class="ten columns">
         <p class="lead">Lets Work Together and get the code Rolling!!!</p>
      </div>
   </div>
<div class="row">
   <div class="eight columns">
            <!-- form -->
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" id="contactForm" name="clients">
      			<fieldset>
                  <div>
         				<label for="contactfullName">Full Name: </label>
                        <span class="error"><?= $contactName_error; ?></span>
         				<input type="text" value="<?= $contactName ?>" size="35" id="contactName" name="name">
                  </div>

                  <div>
         			   <label for="contactEmail">Email: </label>
                       <span class="error"><?= $contactEmail_error; ?></span>
         				<input type="text" value="<?= $contactEmail ?>" size="35" id="contactEmail" name="email" >
                  </div>

                  <div>
                     <label for="contactNumber">Phone <br> Number: </label>
                     <span class="error"><?= $contactNumber_error; ?></span>
                     <input type="text" value="<?= $contactNumber ?>" size="35" id="contactNumber" name="number">
                  </div>

                  <div>
                     <label for="contactMessage">Message: </label>
                     <span class="error"><?= $contactMessage_error; ?></span>
                     <textarea type="text"cols="50" rows="15" id="contactMessage" value="<?php echo htmlspecialchars($contactMessage); ?>" name="message"><?= $contactMessage ?></textarea>
                  </div>

                  <div>
                     <button class ="button" type="submit" name="submit" value="<?= $contactMessage; ?>">Submit</button>
                  </div>

      			</fieldset>
            </form>
             <!-- Form End -->
   </div>

<!-- widgets (right side) -->
<aside class="four columns footer-widgets">
   <div class="widget widget_contact">
		<h4>Address and Phone</h4>
		<p class="address">
         <h3><?= $myDetail['myNickName']; ?></h3>
			    <?= $myDetail['myAddress']; ?><br>
            <span id="num"><?= $myDetail['myCellNum']; ?></span><br>
            Email: <br>
            <span id="num"><?= $myDetail['myEmail'] . "<br>" . $myDetail['myEmail2']; ?></span>
      </p>
	</div>

<!-- widgets (right side - calendar) -->
   <div class="widget widget_tweets">
      <ul id="twitter">
         <div id="technews">
            <script type="text/javascript" src="https://feed.mikle.com/js/fw-loader.js" data-fw-param="53058/"></script>
               <div id="calendar">
                  <p id="calendar-day"></p>
                  <p id="calendar-date"></p>
                  <p id="calendar-month-year"></p>
                  <p id="time"></p>
               </div>
         </div>
      </ul>
		    </div>
</aside>
</div>
</section>
