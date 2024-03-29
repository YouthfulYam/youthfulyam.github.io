

<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Nicolas Rivera">
    <meta name="description" content="Apex Automation enquire form page">
    <meta name="keywords" content="HTML5, enquireForm">

    <!-- CSS -->
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/enquire.css">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://use.typekit.net/hja7nrk.css">
    <!-- Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Product Enquiry</title>
</head>    

<body>
<?php
    include('header.inc');
?>

<main>
    <section id="intro-block">
        <h1>Product Enquiry</h1>
        <p class="intro-paragraph">Eager to learn more about our amazing products? Or simply just want to get in touch with us? Well, we're here to help, fill out the form below and we will get in touch ASAP!</p>
    </section>
    <aside>
        <div>
            <a href="#enquiryForm" class="go-button">
                <button id="go-button">
                        <i class='bx bx-news'></i>Go to Form Section
                </button>
            </a>
        </div>
    </aside>




  <section class="form-section"  aria-label="Product Enquiry">
    <div class="form_wrapper">
    <form method="post" action="http://mercury.swin.edu.au/it000000/formtest.php" id ="enquiryForm">
            
            <fieldset>
                <legend>Contact Information</legend>

                <label for="firstName">First Name:<span class="asterisk">&#42;</span></label>
                <input type="text" id="firstName" name="firstName" maxlength="25" pattern="[A-Za-z]+" required class="input-box">

                <label for="lastName">Last Name:<span class="asterisk">&#42;</span></label>
                <input type="text" id="lastName" name="lastName" maxlength="25" pattern="[A-Za-z]+" required class="input-box">


                <div>
                <label for="companyName">Company Name:</label>
                <input type="text" id="companyName" name="companyName" maxlength="25" pattern="[A-Za-z]+" placeholder="Optional" class="input-box">
                </div>
                    
                <div>
                <label for="email">Email Address:<span class="asterisk">&#42;</span></label>
                <input type="email" id="email" name="email" required class="input-box">
                </div>
                        
                <div>
                <label>Address:<span class="asterisk">&#42;</span></label>
                </div>
                <div >
                <input type="text" id="lineAddress1" name="streetAddress" maxlength="40" placeholder="Address" required class="input-box">
                </div>
                <div >
                <input type="text" id="lineAddress2" name= "apartmentAddress" maxlength="40" placeholder="Apartment, Suite etc (optional)" class="input-box">
                </div>
                <div >
                <input type="text" id="suburb" name="suburb" maxlength="20" placeholder="Suburb/Town" required class="input-box">
                </div>
                
                <label for="state">State:<span class="asterisk">&#42;</span></label>
                <select id="state" name="state" required>
                    <option value="" disabled selected>State</option>
                    <option value="VIC">VIC</option>
                    <option value="NSW">NSW</option>
                    <option value="QLD">QLD</option>
                    <option value="NT">NT</option>
                    <option value="WA">WA</option>
                    <option value="SA">SA</option>
                    <option value="TAS">TAS</option>
                    <option value="ACT">ACT</option>
                </select>
                
                <label for="postcode">Postcode:<span class="asterisk">&#42;</span></label>
                <input type="text" id="postcode" name="postcode" pattern="\d{4}" placeholder="Postal Code" required class="input-box">
                
                <div>
                <label for="phoneNumber">Phone Number:<span class="asterisk">&#42;</span></label>
                <input type="tel" id="phoneNumber" name="phoneNumber" maxlength="10" placeholder="Phone or Mobile" required class="input-box">
                </div>
                </fieldset>
                
                <fieldset>
                    <legend>Preferred Contact</legend>
                    <label><input type="radio" name="preferredContact" value="email" checked><i class='bx bxl-gmail'></i>Email</label>
                    <label><input type="radio" name="preferredContact" value="post"><i class='bx bxs-envelope' ></i>Post</label>
                    <label><input type="radio" name="preferredContact" value="phone"><i class='bx bx-phone-call' ></i>Phone</label>
                    <label><input type="radio" name="preferredContact" value="mobile"> <i class='bx bx-mobile' ></i>Mobile</label>
                    <label><input type="radio" name="preferredContact" value="sms"><i class='bx bx-chat' ></i>SMS</label>
                </fieldset>

                <fieldset>
                    <legend> Product Name</legend>
                    <label for="product">Product:<span class="asterisk">&#42;</span></label>
                    <select id="product" name="product" required>
                        <option value="" disabled selected>Select a product</option>
                        <option value="autonomousVacuumCleaner1">Ecovacs Deebot t20</option>
                        <option value="autonomousVacuumCleaner2">Roborock s8</option>
                        <option value="autonomousPoolCleaner1">Madimack GT Freedom i80</option>
                        <option value="autonomousPoolCleaner2">Zodiac FX18 Robotic Pool Cleaner</option>
                        <option value="autonomousLawnmower1">LUBA AWD 5000</option>
                        <option value="autonomousLawnmower2">Segway Navimow H800A-VF 800m2</option>
                    </select>
                </fieldset>
                
                <fieldset>
                    <legend> Product Enquiry</legend>
                    <p><label for="comments">Comments:<span class="asterisk">&#42;</span></label></p>
                    <p><textarea id="comments" name="comments" placeholder="Please describe what you want to find out" required></textarea></p>
                
                <div>
                    <button type="submit" class="submit-button">Submit</button>     
                </div>
        </form>

      
    </div>
  </section>
  <section class="form-section"  aria-label="PurchaseProduct">
    <div class="form_wrapper">
        <form method="post" action="process_order.php" id="purchaseForm" novalidate>
        <!-- Old Submission form link
            <form method="post" action="http://mercury.swin.edu.au/it000000/formtest.php" id ="enquiryForm">
        -->
            
            <fieldset>
                <fieldset class="purchase-product">
                    <legend>Purchase a product</legend>
                                        
                        <fieldset>
                        <legend>Product Categories</legend>

                        <!-- Product Tabs -->
                        <div class="product-tabs">
                            <!-- Vacuum Tab -->
                            <input type="radio" name="product-category" id="vacuum-tab" checked>
                            <label class="product-tab" for="vacuum-tab">Vacuums</label>

                            <!-- Pool Cleaner Tab -->
                            <input type="radio" name="product-category" id="pool-cleaner-tab">
                            <label class="product-tab" for="pool-cleaner-tab">Pool Cleaner</label>

                            <!-- Lawn Mower Tab -->
                            <input type="radio" name="product-category" id="lawn-mower-tab">
                            <label class="product-tab" for="lawn-mower-tab">Lawn Mowers</label>

                            <!-- Products for Vacuum Tab -->
                            <div class="tab-content" id="vacuum-products">
                            <label>
                                <input type="radio" name="product" value="Ecovacs_Deebot_t20"> Ecovacs Deebot t20
                                <p class="product-price">$1,799</p>
                            </label>
                            <label>
                                <input type="radio" name="product" value="Roborock_s8"> Roborock s8
                                <p class="product-price">$1,699</p>
                            </label>
                            </div>

                            <!-- Products for Lawn Mower Tab -->
                            <div class="tab-content" id="lawn-mower-products">
                            <label>
                                <input type="radio" name="product" value="LUBA_AWD_5000"> LUBA AWD 5000
                                <p class="product-price">$4,399</p>
                            </label>
                            <label>
                                <input type="radio" name="product" value="Segway_Navimov_H800A-VF_800m2"> Segway Navimow H800A-VF 800m2
                                <p class="product-price">$2,899</p>
                            </label>
                            </div>

                            <!-- Products for Pool Cleaner Tab -->
                            <div class="tab-content" id="pool-cleaner-products">
                            <label>
                                <input type="radio" name="product" value="Madimack_GT_Freedom_i80"> Madimack GT Freedom i80
                                <p class="product-price">$2,798</p>
                            </label>
                            <label>
                                <input type="radio" name="product" value="Zodiac_FX18_Robotic_Pool_Cleaner"> Zodiac FX18 Robotic Pool Cleaner
                                <p class="product-price">$1,199</p>
                            </label>
                            </div>

                        </div>
                        </fieldset>       
            
                    <br>
            
                    <label for="quantity">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" min="1" required>
            
                    <br>
            
                    <label for="cardType">Credit card type:</label>
                    <select id="cardType" name="cardType" required>
                        <option value="" disabled selected>Select Card Type</option>
                        <option value="visa">Visa</option>
                        <option value="mastercard">Mastercard</option>
                        <option value="amex">American Express</option>
                    </select>
            
                    <br>
            
                    <label for="cardName">Name on credit card:</label>
                    <input type="text" id="cardName" name="cardName" required>
            
                    <br>
            
                    <label for="cardNumber">Credit card number:</label>
                    <input type="text" id="cardNumber" name="cardNumber" maxlength="16" required>
            
                    <br>
            
                    <label for="expiryDate">Expiry date:</label>
                    <input type="text" id="expiryDate" name="expiryDate" pattern="\d{2}/\d{4}" placeholder="mm/yyyy" required>
            
                    <br>
            
                    <label for="cvv">CVV:</label>
                    <input type="text" id="cvv" name="cvv" pattern="\d{3}" maxlength="3" required>

                    <br>

                    <input type="hidden" id="totalCost" name="totalCost" value="0.00">

            
                </fieldset>
                
                <div>
                    <button type="submit" class="submit-button">Checkout</button>     
                </div>
        </form>

      
    </div>
  </section>
  
    <section id="demo_product_left">
        <div id="text_wrapper_left">
                <a href="lawnmower_robot.html">
                    <h1> LUBA AWD 5000 </h1>
                    <p> Introducing the LUBA AWD 5000, a robotic lawnmower with quick setup, all-wheel drive for 37-degree slopes, and obstacle avoidance. Mow up to 1.5 acres with a rate of 500m2/hour! Starting at $4,399 AUD</p>
                </a>
            </div>
    </section>

    <section id="demo_product_right">
        <div id="text_wrapper_right">
                <a href="pool_robot.html">
                    <h1> GT Freedom i80 </h1>
                    <p> Check out our Pool cleaner, the GT Freedom i80. Suitable for pools up to 15m, 8 hour battery life and with its Intelligent navigation, it will map and clean your whole pool efficiently!</p>
                </a>
            </div>
    </section>
    
    <section id="demo_logo_left">
        <div id="text_wrapper_left_logo">
                    <h1> Your Path to Effortless Cleanliness</h1>
            </div>
    </section>
  
    <hr>
    <div id="footer">
        <p>
            2023 &#169;Apex Automation by HTML Heroes!
        </p>
    </div>

</main>
</body>
</html>
