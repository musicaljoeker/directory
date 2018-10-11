<?php
ini_set( 'display_errors', '1' );

include_once( "functions.php" );

// Get the IP address of the user who clicked the submit button
$ip = getUserIPAddress();

// Determine if the IP is from UW-Oshkosh
$isIPFromUWO = isIPFromUWO( $ip );

?>
<!doctype html>
<html lang="en">
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>University of Wisconsin Oshkosh - Directory</title>

  <link rel="shortcut icon" type="image/x-icon" href="images/favicons/favicon.ico">
  <link rel="apple-touch-icon" sizes="57x57" href="images/favicons/apple-touch-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="114x114" href="images/favicons/apple-touch-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="72x72" href="images/favicons/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="144x144" href="images/favicons/apple-touch-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="60x60" href="images/favicons/apple-touch-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="120x120" href="images/favicons/apple-touch-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="76x76" href="images/favicons/apple-touch-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="152x152" href="images/favicons/apple-touch-icon-152x152.png">
  <meta name="apple-mobile-web-app-title" content="UW Oshkosh">
  <link rel="icon" type="image/png" href="images/favicons/favicon-196x196.png" sizes="196x196">
  <link rel="icon" type="image/png" href="images/favicons/favicon-160x160.png" sizes="160x160">
  <link rel="icon" type="image/png" href="images/favicons/favicon-96x96.png" sizes="96x96">
  <link rel="icon" type="image/png" href="images/favicons/favicon-16x16.png" sizes="16x16">
  <link rel="icon" type="image/png" href="images/favicons/favicon-32x32.png" sizes="32x32">

  <!-- Including Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- Including datatables styles -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
  <!-- datatables responsive  --> 
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.3/css/rowReorder.dataTables.min.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css"/>

  <!-- Additions of Styles -->
  <link rel="stylesheet" type="text/css" media="all" href="styles/style.css">
  <link rel="stylesheet" type="text/css" media="all" href="styles/mobileStyles.css">
  <!-- <link rel="stylesheet" type="text/css" media="all" href="styles/nestedStyle.css"> -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
 
  <?php if(!$isIPFromUWO) { // if the IP address isn't from UWO, load the recaptcha library.
    ?>
    <!-- Google reCAPTCHA -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <?php
  } ?>

  </head>
  <header>
    <div class="wrapper">
      <div class="nav">
        <!-- &#9776 unicode for ☰ -->
        <a class="toggle-nav">&#9776</a>
        <a class="toggle-quickLinks">&#9776</a>
        <ul class="top-nav" id="main-navigation">
          <li><a href="http://www.uwosh.edu/about-uw-oshkosh/" class="top-nav-link">About</a></li>
          <li><a href="http://www.uwosh.edu/academics/" class="top-nav-link">Academics</a></li>
          <li><a href="http://www.uwoshkoshtitans.com/landing/index" class="top-nav-link">Athletics</a></li>
          <li><a href="http://www.uwosh.edu/alumni" class="top-nav-link">Alumni</a></li>
          <li><a href="https://admissions.uwosh.edu/" class="top-nav-link">Admissions</a></li>
          <li><a href="http://www.uwosh.edu/administration/" class="top-nav-link">Administration</a></li>
          <li><a href="http://www.uwosh.edu/resources/" class="top-nav-link">Resources</a></li>
          <li><a href="http://www.uwosh.edu/calendars/" class="top-nav-link">Calendars</a></li>
          <li>
            <a href="http://www.uwosh.edu/titan-services" class="top-nav-link">Titan Services &#9662;</a>
            <ul class="titan-services">
              <li><a href="http://www.uwosh.edu/site-index" class="titanServices">Site Index</a></li>
              <li><a href="http://www.uwosh.edu/directory" class="titanServices">Directory</a></li>
              <li><a href="http://www.uwosh.edu/registrar/titanweb/" class="titanServices">Titan Web</a></li>
              <li><a href="http://www.uwosh.edu/titanapps/" class="titanServices">Titan Apps</a></li>
              <li><a href="https://titanfiles.uwosh.edu/xythoswfs/webview/xythoslogin.action" class="titanServices">Titan Files</a></li>
              <li><a href="https://my.wisconsin.edu/" class="titanServices">My UW System</a></li>
              <li><a href="http://www.uwosh.edu/d2l/" class="titanServices">Desire2Learn(D2L)</a></li>
              <li><a href="http://www.uwosh.edu/library/" class="titanServices">Polk Library</a></li>
              <li><a href="http://www.portal.housing.uwosh.edu/" class="titanServices">MyUWO Portal</a></li>
              <li><a href="https://uwosh.collegiatelink.net/" class="titanServices">Student Clubs &amp; Orgs</a></li>
              <li><a href="https://uwosh.joinhandshake.com/login" class="titanServices">Handshake</a></li>
            </ul>
          </li>
        </ul>
      </div> <!-- End of "nav" -->
      <div class="logo-section">
        <div class="logoTitle">
          <div class="wordmark-wrapper">
              <a href="https://uwosh.edu/"><img src="images/wordmark.png" class="wordmark" alt="University wordmark, link to homepage"></a>
          </div>
          <div class="directory-title">UW Oshkosh Directory</div>
          <div class="quicklinks">
            <ul>
              <li><a href="http://www.uwosh.edu/future-students/">Future Students</a></li>
              <li><a href="http://www.uwosh.edu/parents-family-friends/">Parents</a></li>
              <li><a href="http://www.uwosh.edu/alumni">Alumni</a></li>
              <li><a href="http://www.uwosh.edu/faculty-and-staff/">Faculty and Staff</a></li>
              <li><a href="http://www.uwosh.edu/current-students/">Current Students</a></li>
            </ul>
          </div> <!-- End of "quickLinks" -->
        </div> <!-- End of "logoTile" -->       
      </div> <!-- End of "logo-section" -->
    </div> <!-- End of "wrapper" -->
  </header>
  <body>
    <main class="body-wrapper">
      <!-- the directory application goes here -->
      <img id="directory-background" src=""/>
      
      <div class="container"><!--beginFullContainer-->
        <!-- Nav tabs -->
        <div id="tabsContainer"><!--beginTabs-->
        <ul id="bootstrap-pills1" class="nav nav-pills" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="search-pill" data-toggle="pill" href="#pills-search" role="tab">Search</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="update-pill" data-toggle="pill" href="#pills-update-information" role="tab">Updating Your Information</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="print-pill" data-toggle="pill" href="#pills-printed-directory" role="tab">Printed Directory</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="retired-pill" data-toggle="pill" href="#pills-retired-staff" role="tab">Retired Staff</a>
          </li>
        </ul>
        
        <!-- Tab panes -->


        <div class="tab-content">
          <div class="tab-pane active" id="search" role="tabpanel" aria-labelledby="search">
            <div class="row">
              <div class="col-md-10 mx-auto">

                <ul id="bootstrap-pills2" class="nav nav-pills" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="all-pill" value="all" href="#" role="tab">All</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="faculty-staff-pill" value="faculty-and-staff" href="#" role="tab">Faculty / Staff / Department</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="students-pill" value="students" href="#" role="tab">Students</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="phone-pill" value="phone" href="#" role="tab">Phone</a>
                  </li>
                </ul>

              <!--input names-->
              <div id="inputName" class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="">Name</span>
                  </div>
                  <input id="first-name-search" type="text" class="form-control" placeholder="Enter a first name" aria-label="Enter a first name" aria-describedby="first-name-search">
                  <input id="last-name-search" type="text" class="form-control" placeholder="Enter a last name" aria-label="Enter a last name" aria-describedby="last-name-search">
                </div>

                <div id="inputPhone" class="input-group hidden">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="">Phone</span>
                  </div>
                  <input id="phone" type="number" class="form-control" placeholder="Enter the last 4 digits of a campus phone number ex. 1234" aria-label="Enter the last 4 digits of a campus phone number ex. 3020" aria-describedby="basic-addon1">
                  
                </div>
                
                 <!--input department-->
                <div id="select-dept-dropdown" class=" show  hidden input-group mb-3">
                  <div class="input-group-prepend">
                    <label  class="input-group-text" for="select-department-content">Department</label>
                  </div>
                  <select id="select-department-content" value="Select a department" class="custom-select">
                    <!-- Departments will be automatically loaded here with the AJAX call in fetch-departments.js -->
                  </select>
                </div>

                <?php
                  if(!$isIPFromUWO){
                    ?>
                    <!-- reCAPTCHA -->
                    <div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="6Lf1iFoUAAAAAMl6jqQOB3io4pflhlP0AVcj__LB"></div>
                    <?php
                  }
                ?>
                
                <a href="#resultsContainer"><button id="search-btn" type="button" class="btn btn-primary" <?php if(!$isIPFromUWO){ echo "disabled"; } ?>>Search</button></a>
                <button id="clear-btn" type="button" class="btn btn-primary" onclick="clearFields()">Clear</button>

                <p id="errorName" style="color: red; display: none; ">Please enter a first and/or last name </p>
                <p id="errorNameDepartment" style="color: red; display: none;"> Please enter a first and/or last name, or select a department</p>
                <p id="errorNamePhone" style="color: red; display: none;"> Please enter 4 digits</p>
                <p id="errorNameMinCharacter" style="color: red; display: none;"> Please enter a search criteria at least 3 characters in length</p>
              </div>
              <!--
              <div class="col-md-4">
                <p>
                  Examples:<br>
                  <b>First and Last Name:</b> Joe Smith or Smith, Joe<br />
                  <b>Email or Last Name:</b> smith or Smith<br />
                  <b>Campus Phone Number:</b> 1234
                </p>
              </div>
                    -->
            </div>
          </div>
                      
                  

          <div class="tab-pane" id="update-information" role="tabpanel" aria-labelledby="pills-update-information-tab">
            <p>Students: <a style="text-decoration:underline;" href="http://www.uwosh.edu/registrar/titanweb/">Log into TitanWeb.</a></p>
            <p>Employees: To update your home address, visit the <a style="text-decoration:underline;" href="https://my.wisconsin.edu">My UWSystem Portal</a>; to update your departmental address, contact Mindy Roever in Human Resources at <a style="text-decoration:underline;" href="mailto:hroffice@uwosh.edu?subject=Directory%20Update">hroffice@uwosh.edu</a>.</p>
            <p>Under the Family Educational Rights and Privacy Act, students may request the nondisclosure of directory information. This means that the search may not reveal the names of select students.</p>  
          </div>
          <div class="tab-pane" id="printed-directory" role="tabpanel" aria-labelledby="pills-printed-directory-tab">
            <p>When it comes to sustainable practices, there are not many institutions that do it better than UW Oshkosh. In accordance with the University's Sustainability Plan, there is a strong, growing on-campus recycling and waste reduction program. With this in mind it has been decided to forego the printed directory and instead embrace new technology.</p>
            <p>The online directory, also available on the <a style="text-decoration:underline;" href="https://uwosh.edu/umc/mobile-app/">University Mobile App</a>, is a quick and easy way to get the information you need quickly.</p>
          </div>
          <div class="tab-pane" id="retired-staff" role="tabpanel" aria-labelledby="pills-retired-staff-tab">
            <p><a href="https://www.uwosh.edu/directory/Directory_Retired_Staff_2014-15.pdf" style="text-decoration: underline">Directory of Retired Staff 2014-2015</a></p>
          </div>
        </div>
      
        

      </div><!--endtabs-->

      <!--beginResults-->
      <div id="resultsContainer" >
        <div class="row department-row">
          <div class="col-md-12">
            <h3>Department Info</h3>
            <table id="department-directory" class="display table nowrap" style="width:100%">
              <thead>
                <tr>
                  <th>Item</th>
                  <th>Phone</th>
                  <th>Office</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Item</th>
                  <th>Phone</th>
                  <th>Office</th>
                </tr>
              </tfoot>
              <tbody id="department-results-table-body"></tbody>
            </table>
          </div>
        </div>
        <div class="row results-row">
          <div class="col-md-12">
            <h3>People Results</h3>
            <div class="alert alert-info">
              <strong>Don't see what you are looking for?</strong> Click the green plus button to expand the row.
            </div>
            <table id="directory" class="display table nowrap" style="width:100%">
              <thead>
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>E-mail</th>
                  <th>Phone</th>
                  <th>Department</th>
                  <th>Mailstop</th>
                  <th>Building</th>
                  <th>Room</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>E-mail</th>
                  <th>Phone</th>
                  <th>Department</th>
                  <th>Mailstop</th>
                  <th>Building</th>
                  <th>Room</th>
                </tr>
              </tfoot>
              <tbody id="results-table-body"></tbody>
            </table>
          </div>
        </div>
      </div> <!--endResults-->
    </div> <!-- end Fullcontainer -->
    </main>
    <footer>
      <div class="topFooter">
        <span>The University of Wisconsin Oshkosh - Where Excellence and Opportunity Meet.</span>
      </div> <!-- End of "portal-footer" -->
      <div class="middleFooter">
        <div class="midFooter-container">
          <div class="location-container mid-child">
            <div class="wismap">
              <a href="https://www.google.com/maps?q=University+of+Wisconsin+Oshkosh+800+Algoma+Blvd.+Oshkosh,+WI+54901&um=1&ie=UTF-8&hl=en&sa=N&tab=wl" target="_blank" rel="noopener"><img src="images/footer/wismap-color.png"></a>
            </div> <!-- End of "wismap" -->
            <div class="address-phone">
              <p><b>Location</b></p>
              <p>
                <a href="https://www.google.com/maps?q=University+of+Wisconsin+Oshkosh+800+Algoma+Blvd.+Oshkosh,+WI+54901&um=1&ie=UTF-8&hl=en&sa=N&tab=wl" target="_blank" rel="noopener">University of Wisconsin Oshkosh</a><br />
                <a href="https://www.google.com/maps/place/University+of+Wisconsin-Oshkosh/@44.0253186,-88.5532102,17z/data=!3m1!4b1!4m5!3m4!1s0x8803ebe40a08408b:0xb8f8ec18c1c8b267!8m2!3d44.0253186!4d-88.5510215?hl=en" target="_blank" rel="noopener">
                  800 Algoma Blvd.<br />
                  Oshkosh, WI 54901<br />
                </a>
                <a href="tel:9204241234">(920) 424-1234</a>
              </p> 
            </div> <!-- End of "address-phone" -->
          </div> <!-- End of "location-container" -->
          <div class="mobileEmergency-container mid-child">
            <div class="mobile-emergency">
              <div>
                <a href="https://umc.uwosh.edu/mobile-app/" aria-label="mobile app"><i class="fa fa-mobile-alt desaturate" aria-hidden="true"></i></a>
              </div>
              <div>  
                <a href="http://emergency.uwosh.edu/" aria-label="emergency"><i class="fa fa-exclamation-triangle desaturate" aria-hidden="true"></i></a>
              </div>
            </div> <!-- End of "mobile-emergency" -->
            <div class="mobileEmergency-links">
              <p class="mobileEmergency-title"><b>Quick Links</b></p>
              <p><a href="https://umc.uwosh.edu/mobile-app/">Download UW Oshkosh's Mobile App</a></p>
              <p><a href="http://emergency.uwosh.edu/" class="emergency-p">Emergency and Safety Information</a></p>
            </div> <!-- End of "mobileEmergency-links" -->
          </div> <!-- End of mobileEmergency-container" -->
          <div class="resources-container mid-child">
            <div class="resourcesLinks">
              <p><b>Resources</b></p>
              <ul class="resources-links">
                <li><a href="http://www.uwosh.edu/resources/accessibility/">Accessibility</a></li>
                <li><a href="https://www.google.com/maps?q=University+of+Wisconsin+Oshkosh+800+Algoma+Blvd.+Oshkosh,+WI+54901&um=1&ie=UTF-8&hl=en&sa=N&tab=wl" target="_blank" rel="noopener">Get Directions</a></li>
                <li><a href="https://umc.uwosh.edu/for-media/">Media Relations</a></li>
                <li><a href="https://hr.uwosh.edu/careers/">Work at UW Oshkosh</a></li>
              </ul>
            </div> <!-- End of "resourcesLinks" -->
          </div> <!-- End of "resources-container" -->
          <div class="accredited-container mid-child">
            <div class="accredited-uwo">
                <a href="http://www.hlcommission.org/?option=com_directory&Action=ShowBasic&instid=2030" target="_blank" rel="noopener"><img src="images/footer/hlc.png" class="accredited" alt="accreditation image"></a>
                <a href="https://www.wisconsin.edu/" target="_blank" rel="noopener"><img src="images/footer/uw-system.png" class="uwo-system" alt="uw system image"></a>
            </div> <!-- End of "accredted-uwo" -->
          </div> <!-- End of "accredited-container" -->
        </div> <!-- End of "midFooter-container" -->
      </div> <!-- End of "middleFooter" -->
      <div class="bottomFooter">
        <div class="copyright">
          <span>&copy;<script>document.write(new Date().getFullYear())</script> UW Board of Regents</span>
        </div> <!-- End of "copyright" -->
        <div id="footer-social">
            <a href="https://www.facebook.com/uwoshkosh" target="_blank" rel="noopener" class="footerFacebook" aria-label="facebook"><i class="fab fa-facebook-f fa-2x desaturate" alt="Facebook logo"></i></a>
						<a href="https://twitter.com/uwoshkosh" target="_blank" rel="noopener" class="footerTwitter" aria-label="twitter"><i class="fab fa-twitter fa-2x desaturate"></i></a>
						<a href="http://instagram.com/uwoshkosh" target="_blank"  rel="noopener" class="footerInstagram" aria-label="instagram"><i class="fab fa-instagram fa-2x desaturate" aria-hidden="true" alt="Instagram logo"></i></a>
						<a href="http://www.youtube.com/uwosh" target="_blank" rel="noopener" class="footerYouTube" aria-label="youtube"><i class="fab fa-youtube fa-2x desaturate" aria-hidden="true" alt="YouTube logo"></i></a>
						<a href="http://www.linkedin.com/edu/school?id=19693" target="_blank" rel="noopener" class="footerLinkedIn" aria-label="linkedIn"><i class="fab fa-linkedin fa-2x desaturate" aria-hidden="true" alt="LinkedIn logo"></i></a>
						<a href="http://www.pinterest.com/uwoshkosh/" target="_blank" rel="noopener" class="footerPinterest" aria-label="pinterest"><i class="fab fa-pinterest-p fa-2x desaturate" aria-hidden="true" alt="Pinterest logo"></i></a>
						<a href="http://www.flickr.com/photos/uwoshkosh/sets/" target="_blank" rel="noopener" class="footerFlickr" aria-label="flickr"><i class="fab fa-flickr fa-2x desaturate" aria-hidden="true" alt="Flickr logo"></i></a>
					</div>
      </div> <!-- End of "bottomContainer" -->
    </footer>

    <!-- Including Bootstrap plugins, Popper, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    <script type="text/javascript" src="datatables/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/rowreorder/1.2.3/js/dataTables.rowReorder.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>

    <script type="text/javascript" src="js/fetch-departments.js"></script>
    <script type="text/javascript" src="js/directory.js"></script>

    <!-- Google Analytics Code -->
    <script>
                (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
            
                ga('create', 'UA-6634319-1', 'auto');
                ga('send', 'pageview');
            
        </script>
    
  </body>
</html>