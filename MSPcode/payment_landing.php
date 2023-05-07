<?php
// Define a variable for the page title
$pageTitle = "Dashboard";
?>
<!DOCTYPE html>
<html>
  <head>
    <title>PAYMENT LANDING</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style4.css">
    <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script src="https://js.stripe.com/v3/"></script>
  </head>
  <style></style>
  <body>
  <div class="header-container">
  <div class="logo-container">
    <div class="logo">
      <h1 class="logo-text">Expert<span class="trademark">&reg;</span></h1>
    </div>
    <?php include 'navigation.php';?>
  </div>
  </div>
    <section id="landingtxt">
	<div class="landing-container">
		<h1 class="landing-product">Buy New Cool Products</h1>
		<p class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod est vel ante mollis, ut ultrices massa elementum. Etiam congue bibendum nulla id laoreet. Praesent rutrum auctor velit id lobortis.</p>
		<section>
			<div class="product">
				<img src="https://i.imgur.com/EHyR2nP.png" alt="The cover of Stubborn Attachments">
				<div class="description">
					<h3>{{ product.name }}</h3>
					<h5>${{ product.get_display_price }}</h5>
				</div>
			</div>
			<button type="button" id="checkout-button">Checkout</button>
		</section>
		{% csrf_token %}
		<p>Donec imperdiet sapien nulla, ac gravida purus malesuada ut. Ut eget turpis vitae augue malesuada lacinia eu ac sapien. Integer sit amet ipsum eu velit iaculis faucibus eu quis eros. Duis faucibus lectus nec tellus dictum, eu efficitur justo sodales.</p>
	</div>


    <!--<footer>
    <div class="footer-container">
      <div class="footer-column">
        <ul class="footer-nav">
          <li><a href="#">Training</a></li>
          <li><a href="#">Payment</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="#">Account</a></li>
        </ul>
        <p class="footer-info">Phone: 123-456-7890 | Address: 123 Main St. | Email: info@expert.com</p>
        <div class="footer-logo">

          <p class="footer-copyright">Expert Training since 2023 &#169; </p>
        </div>
      </div>
      <div class="footer-column">
        <ul class="social-icons">
          <li><a href="#"><i class="fab fa-twitter"></i></a></li>
          <li><a href="#"><i class="fab fa-facebook"></i></a></li>
          <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
          <li><a href="#"><i class="fab fa-instagram"></i></a></li>
        </ul>
      </div>
    </div>
  </footer>-->
  <?php
  include('footer.php');
  ?>
  </body>
  <script type="text/javascript">
    const csrftoken = document.querySelector('[name=csrfmiddlewaretoken]').value;
    // Create an instance of the Stripe object with your publishable API key
    var stripe = Stripe("{{ STRIPE_PUBLIC_KEY }}");
    var checkoutButton = document.getElementById("checkout-button");
    checkoutButton.addEventListener("click", function () {
      fetch("{% url 'create-checkout-session' product.id %}", {
        method: "POST",
        headers: {
            'X-CSRFToken': csrftoken
        }
      })
        .then(function (response) {
          return response.json();
        })
        .then(function (session) {
          return stripe.redirectToCheckout({ sessionId: session.id });
        })
        .then(function (result) {
          // If redirectToCheckout fails due to a browser or network
          // error, you should display the localized error message to your
          // customer using error.message.
          if (result.error) {
            alert(result.error.message);
          }
        })
        .catch(function (error) {
          console.error("Error:", error);
        });
    });
  </script>
</html>