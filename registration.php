<!DOCTYPE html>
<html>
<head>
  <title>Job Application Form</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h2>Job Application Form <hr></h2>
  
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return displayData()">
  <div class="nd">
    <div class="name">
      <label for="name">Name:</label> 
      <input type="text" id="name" name="name" required>
    </div>  
    <div class="dob">
    <label for="dob">Date of Birth:</label>
      <input type="date" id="dob" name="dob" required>
    </div>
  </div>
  <div class="ep">
    <div class="email">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    </div>  
    <div class="phone">
    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone" required>
    </div>
  </div>
    

    

   

    <label for="experience">Experience:</label>
    <textarea id="experience" name="experience" rows="4" required></textarea>

    <label for="education">Education:</label>
    <textarea id="education" name="education" rows="4" required></textarea>

    <label for="skills">Skills:</label>
    <textarea id="skills" name="skills" rows="4" required></textarea>

    <input type="submit" value="Submit">
  </form>

  <!-- Popup window -->
  <div id="popup" class="popup">
    <div id="popup-content">
      <!-- Data will be populated here -->
    </div>
    <span id="close-btn" class="close">&times;</span>
    <a href="#" class="download-btn" onclick="downloadDetails()">Download Details</a>
  </div>
  <script>
    function displayData() {
      var name = document.getElementById("name").value;
      var dob = document.getElementById("dob").value;
      var email = document.getElementById("email").value;
      var phone = document.getElementById("phone").value;
      var experience = document.getElementById("experience").value;
      var education = document.getElementById("education").value;
      var skills = document.getElementById("skills").value;

      var formattedData = "<h3>Registration Success full!!!</h3>  <h2>Job Application Details</h2>" +
        "<p><strong>Name:</strong> " + name + "</p>" +
        "<p><strong>Date of Birth:</strong> " + dob + "</p>" +
        "<p><strong>Email:</strong> " + email + "</p>" +
        "<p><strong>Phone:</strong> " + phone + "</p>" +
        "<p><strong>Experience:</strong> " + experience + "</p>" +
        "<p><strong>Education:</strong> " + education + "</p>" +
        "<p><strong>Skills:</strong> " + skills + "</p>";

      var popup = document.getElementById("popup");
      var popupContent = document.getElementById("popup-content");
      var closeBtn = document.getElementById("close-btn");

      popupContent.innerHTML = formattedData;
      popup.style.display = "block";

      closeBtn.onclick = function() {
        popup.style.display = "none";
      };

      return false; // Prevent form submission
    }

    function downloadDetails() {
      var text = document.getElementById("popup-content").innerText;
      var filename = "job_application_details.txt";
      var element = document.createElement("a");
      element.setAttribute("href", "data:text/plain;charset=utf-8," + encodeURIComponent(text));
      element.setAttribute("download", filename);
      element.style.display = "none";
      document.body.appendChild(element);
      element.click();
      document.body.removeChild(element);
    }
  </script>
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo '<div id="popup" class="popup">';
    echo '<div id="popup-content">';
    echo '<h2>Job Application Form - Submission</h2>';
    echo '<p><strong>Name:</strong> ' . $_POST["name"] . '</p>';
    echo '<p><strong>Date of Birth:</strong> ' . $_POST["dob"] . '</p>';
    echo '<p><strong>Email:</strong> ' . $_POST["email"] . '</p>';
    echo '<p><strong>Phone:</strong> ' . $_POST["phone"] . '</p>';
    echo '<p><strong>Experience:</strong> ' . $_POST["experience"] . '</p>';
    echo '<p><strong>Education:</strong> ' . $_POST["education"] . '</p>';
    echo '<p><strong>Skills:</strong> ' . $_POST["skills"] . '</p>';
    echo '</div>';
    echo '<span id="close-btn" class="close">&times;</span>';
    echo '<a href="#" class="download-btn" onclick="downloadDetails()">Download Details</a>';
    echo '</div>';
  }
  ?>

  <script>
    // Close popup when close button is clicked
    var closeBtn = document.getElementById("close-btn");
    closeBtn.onclick = function() {
      var popup = document.getElementById("popup");
      popup.style.display = "none";
    };

    // Download details when download button is clicked
    var downloadBtn = document.getElementsByClassName("download-btn")[0];
    downloadBtn.onclick = function() {
      var text = document.getElementById("popup-content").innerText;
      var filename = "job_application_details.txt";
      var element = document.createElement("a");
      element.setAttribute("href", "data:text/plain;charset=utf-8," + encodeURIComponent(text));
      element.setAttribute("download", filename);
      element.style.display = "none";
      document.body.appendChild(element);
      element.click();
      document.body.removeChild(element);
    };
  </script>
</body>
</html>
