<!DOCTYPE html>
<html>
<head>
  <style>
    body {
                  margin: 0;
                  padding: 0;
                }
                .navbar {
                  position:-webkit-sticky;
                  top: 0;
                  left: 0;
                  width: 100%;
                  background-color: #333;
                  color: #fff;
                  padding: 20px;
                  display: flex;
                  justify-content: center;
                  align-items: center;
                }
                .navbar .logo {
                  display: flex;
                  align-items: center;
                }
                .navbar .logo img {
                  height: 50px;
                  margin-right: 10px;
                }
                .navbar ul {
                  list-style-type: none;
                  margin: 0;
                  padding: 0;
                }
                .navbar ul li {
                  display: inline-block;
                  margin-right: 20px;
                }
                .navbar ul li a {
                  text-decoration: none;
                  color: #fff;
                  font-weight: bold;
                  transition: color 0.2s ease;
                  font-size: 20px;
                }
                .navbar ul li a:hover {
                  color:deepskyblue;
                }
                .content {
                  padding: 100px 20px;
                }
                h6, p {
  font-family: sans-serif;
                }

    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
    }

    h2 {
      margin-bottom: 20px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="email"],
    textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .error-message {
      color: red;
      font-size: 12px;
      margin-top: 5px;
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }

    .callout {
  position: fixed;
  bottom: 35px;
  right: 20px;
  margin-left: 20px;
  max-width: 300px;
}

.callout-header {
  padding: 25px 15px;
  background: #555;
  font-size: 30px;
  color: white;
}

.callout-container {
  padding: 15px;
  background-color: #ccc;
  color: black
}

.closebtn {
  position: absolute;
  top: 5px;
  right: 15px;
  color: white;
  font-size: 30px;
  cursor: pointer;
}

.closebtn:hover {
  color: lightgrey;
}
  </style>
</head>
<body>
    <div class="navbar">
                <div class="logo">
                  <img src="logo1.png" alt="Logo">
                </div>
                <ul>
                  <li><a href="skite.html">Home</a></li>
                  <li><a href="about.html">About</a></li>
                  <li><a href="news.html">Terms and conditions</a></li>
                </ul>
              </div>
              <div class="callout">
  <div class="callout-header">Callout for enquries</div>
  <span class="closebtn" onclick="this.parentElement.style.display='none';">×</span>
  <div class="callout-container">
    <p>EMAIL-skiteagencies@gmail.com</br>
       CONTACT NUMBER-1800-759-485
    </p>
  </div>
</div>

  <?php
    $attributes = array(
      "name" => "",
      "email" => "",
      "phone" => "",
      "address" => "",
      "departure_date" => "",
      "return_date" => "",
      "destination" => "",
      "no_of_travelers" => "",
      "passport_number" => "",
      "special_requests" => ""
    );

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Collect attribute values
      foreach ($attributes as $attribute => $value) {
        $attributes[$attribute] = trim($_POST[$attribute]);
      }

      // Validate attribute values
      $errors = validateAttributes($attributes);

      // If there are no errors, process the data (e.g., save to database, send emails, etc.)
      if (empty($errors)) {
        // Process the data
        // ...

        // Display success message
        echo '<div class="container">';
        echo '<h2>Form submitted successfully!</h2>';
        echo '</div>';
      }
    }

    function validateAttributes($attributes) {
      $errors = array();

      // Validate each attribute
      if (empty($attributes['name'])) {
        $errors['name'] = 'Name is required';
      }

      if (empty($attributes['email'])) {
        $errors['email'] = 'Email is required';
      } elseif (!filter_var($attributes['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email format';
      }

      if (empty($attributes['phone'])) {
        $errors['phone'] = 'Phone number is required';
      } elseif (!preg_match('/^\d{10}$/', $attributes['phone'])) {
        $errors['phone'] = 'Invalid phone number';
      }

      if (empty($attributes['address'])) {
        $errors['address'] = 'Address is required';
      }

      if (empty($attributes['departure_date'])) {
        $errors['departure_date'] = 'Departure date is required';
      }

      if (empty($attributes['return_date'])) {
        $errors['return_date'] = 'Return date is required';
      }

      if (empty($attributes['destination'])) {
        $errors['destination'] = 'Destination is required';
      }

      if (empty($attributes['no_of_travelers'])) {
        $errors['no_of_travelers'] = 'no of passengers is required';
      }

      if (empty($attributes['passport_number'])) {
        $errors['passport_number'] = 'Passport number is required';
      }

      if (empty($attributes['special_requests'])) {
        $errors['special_requests'] = 'Special requests are required';
      }

      return $errors;
    }
  ?>

  <div class="container">
    <h2>Travel Booking Form</h2>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $attributes['name']; ?>">
        <span class="error-message"><?php echo isset($errors['name']) ? $errors['name'] : ''; ?></span>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $attributes['email']; ?>">
        <span class="error-message"><?php echo isset($errors['email']) ? $errors['email'] : ''; ?></span>
      </div>
      <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" value="<?php echo $attributes['phone']; ?>">
        <span class="error-message"><?php echo isset($errors['phone']) ? $errors['phone'] : ''; ?></span>
      </div>
      <div class="form-group">
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="<?php echo $attributes['address']; ?>">
        <span class="error-message"><?php echo isset($errors['address']) ? $errors['address'] : ''; ?></span>
      </div>
      <div class="form-group">
        <label for="departure_date">Departure Date:</label>
        <input type="text" id="departure_date" name="departure_date" value="<?php echo $attributes['departure_date']; ?>">
        <span class="error-message"><?php echo isset($errors['departure_date']) ? $errors['departure_date'] : ''; ?></span>
      </div>
      <div class="form-group">
        <label for="return_date">Return Date:</label>
        <input type="text" id="return_date" name="return_date" value="<?php echo $attributes['return_date']; ?>">
        <span class="error-message"><?php echo isset($errors['return_date']) ? $errors['return_date'] : ''; ?></span>
      </div>
      <div class="form-group">
        <label for="destination">Destination:</label>
        <input type="text" id="destination" name="destination" value="<?php echo $attributes['destination']; ?>">
        <span class="error-message"><?php echo isset($errors['destination']) ? $errors['destination'] : ''; ?></span>
      </div>
      <div class="form-group">
        <label for="no_of_travelers">Total people for the trip: </label>
        <input type="text" id="no_of_travelers" name="no_of_travelers" value="<?php echo $attributes['no_of_travelers']; ?>">
        <span class="error-message"><?php echo isset($errors['no_of_travelers']) ? $errors['no_of_travelers'] : ''; ?></span>
      </div>
      <div class="form-group">
        <label for="passport_number">No of places:</label>
        <input type="text" id="passport_number" name="passport_number" value="<?php echo $attributes['passport_number']; ?>">
        <span class="error-message"><?php echo isset($errors['passport_number']) ? $errors['passport_number'] : ''; ?></span>
      </div>
      <div class="form-group">
        <label for="special_requests">Special Requests:</label>
        <textarea id="special_requests" name="special_requests"><?php echo $attributes['special_requests']; ?></textarea>
        <span class="error-message"><?php echo isset($errors['special_requests']) ? $errors['special_requests'] : ''; ?></span>
      </div>
      <div class="form-group">
        <input type="submit" value="Submit">
      </div>
    </form>
  </div>
</body>
</html>
