<!DOCTYPE html>
<html lang="en">

<head>
  <title><?php echo 'Home'; ?></title>

  <link rel="stylesheet" href="../styles/styles1.css">

</head>

<body>
  <div class="container">
    <header>
      <div class="header-content">
        <h1 class="logo"><img src="images/logo.png" alt="">MedSource</h1>
        <nav>
          <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="buy.html">Buy</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li><a href="login.html">Login</a></li>
          </ul>
        </nav>
      </div>
    </header>


    <section class="hero">
      <h2>Welcome to MedSource</h2>
      <p>Effective Medicine, New Medicine Everyday</p>
    </section>

    <section class="features">
      <h2>Features</h2>
      <div class="feature">
        <i class="fa fa-check-circle"></i>
        <h3>FAST DELIVERY</h3>
        <p>With MedSource's Fast Delivery service, you can expect your orders to arrive at your doorstep in record time. We prioritize efficiency and ensure that your products are dispatched promptly after you place your order. Whether it's urgent medication or everyday essentials, our dedicated delivery team works round-the-clock to make sure you get what you need when you need it</p>
      </div>
      <div class="feature">
        <i class="fa fa-check-circle"></i>
        <h3>SUPPORT 24/7</h3>
        <p>At MedSource, we recognize that healthcare needs can emerge at any time of day or night. That is why our Support team is available 24 hours a day, 7 days a week. Our pleasant and educated customer support team is accessible 24 hours a day, 7 days a week, ready to answer your questions, provide help, and ensure a smooth and satisfying experience with our services.</p>
      </div>
      <div class="feature">
        <i class="fa fa-check-circle"></i>
        <h3>MEDICATION DISPENSING</h3>
        <p>Our Medication Dispensing service is intended to improve and simplify your healthcare routine. Say goodbye to the trouble of managing several prescriptions, because MedSource will do it for you. Our skilled pharmacists carefully package and label your prescription medications, making it easy to adhere to your treatment plan precisely. We also provide digital tracking and regular reminders, so you never miss a dose and can focus on your well-being with confidence.</p>
      </div>
    </section>

    <section class="testimonials">
      <h2>Testimonials</h2>
      <div class="testimonial">
        <img src="images/person_1.jpg" alt="Testimonial Avatar">
        <blockquote>
          <p>"MedSource has been a lifesaver! Their fast delivery service is incredible, and I always receive my medications on time. The 24/7 support is truly commendable; the team is so helpful and understanding. I highly recommend their medication dispensing service, it has made managing my prescriptions so much easier."</p>
          <cite>John Doe</cite>
        </blockquote>
      </div>
      <div class="testimonial">
        <img src="images/person_2.jpg" alt="Testimonial Avatar">
        <blockquote>
          <p>"I am beyond impressed with MedSource's fast and reliable delivery. I had an emergency situation, and they delivered the medication within hours. The 24/7 support was there to guide me through the process, and their assistance was invaluable. I feel secure knowing that my health is in good hands with QuickMedRx's medication dispensing."</p>
          <cite>Jane Smith</cite>
        </blockquote>
      </div>
    </section>
    <!-- ... Rest of the code ... -->

    <footer>

      <p>&copy; 2023 MedSource. All rights reserved.</p>
      <p><a href="./register.php?user_type=patient">User Register Here</a></p>
      <p><a href="./register.php?user_type=admin">Admin Register Here</a></p>
      <p><a href="./login.php?user_type=patient">User Login</a></p>
      <p><a href="./login.php?user_type=doctor">Doctor Login</a></p>
      <p><a href="./login.php?user_type=pharmacist">Pharmacist Login</a></p>
      <p><a href="./login.php?user_type=admin">Admin Login</a></p>
      <p><a href="./admin.php">Admin Page</a></p>
      <p>Sign Up</p>
      <p>&copy; <?php echo date("Y"); ?> My Website. All rights reserved.</p>
    </footer>
  </div>
</body>

</html>