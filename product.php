<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Category Page</title>
			<!-- Fonts -->
	<link rel="stylesheet" href="https://use.typekit.net/hja7nrk.css">
			<!-- Styling -->
    <link href="styles/product.css" rel="stylesheet"/>
    <!-- Style for icons (grid display) -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
<?php
    include('header.inc');
?>

    <section>
        <div class="product">
            <h2>Automated house cleaners</h2>
            <p>Our automated house cleaners are programmed to clean quietly and efficiently. View our range.</p>
            <p>Price ranges from: $699.99 to $899.99</p>
            <button class="button"><a href="vacuum_robot.html">View Vacuums Range</a></button>
        </div>

        <div class="product">
            <h2>Automated lawn-mowers</h2>
            <p>Our automated lawn-mowers are back for summer. When your grandparents can't mow the lawn anymore, we can.</p>
            <p>Price ranges from: $3499.99 to $4599.99</p>
            <button class="button"><a href="lawnmower_robot.html">View Lawn Mowers Range</a></button>
        </div>
        
        <div class="product">
            <h2>Automated pool-cleaners</h2>
            <p>Our newest product range, pool cleaners. To get you ready for summer without the extra effort.</p>
            <p>Price ranges from: $1499.99 to $2599.99</p>
            <button class="button"><a href="pool_robot.html">View Pool Cleaners Range</a></button>
        </div>

    </section>

    <section class=grid-display>
        <div class="grid-container">
    
    <div class="item1 grid-item">
        <div class="item-content">
            <div class="product-description"></div>
            <a href="enquire.html">
            <p>Click here to get in touch with us!</p>
            </a>
        </div>
    </div>
    
        <div class="item2 grid-item">
            <i id="quoteIcon" class='bx bxs-quote-left'></i>
            <p>Apex Automations has simply redefined the way we live our lives. We got the Roborock s8 and the LUBA AWD 5000. The Roborock just effortlessly cleans our home, so we can always come back to a clean home from a long day of work. The LUBA AWD 500 also keep our backyard meticulously clean, our neighbours often ask what our secret is!</p>
            <i id="quoteIcon" class='bx bxs-quote-right'></i>
        </div>
        
        <div class="item3 grid-item">
            <img src="images/apex_automation_logo_cropped.png" alt="Image 3">
            <div class="product-description">
            <p>Your Path to Effortless Cleanliness</p>
            </div>
        </div>
    
        <div class="item4 grid-item">
            <a href="pool_robot.html">
            <img src="images/zodiac_fx18_rear_angle.jpg" alt="Image 4">
            <div class="product-description">
                <h2 id="desc-4">Check out our pool cleaners like the Zodiac FX18 Robotic Pool Cleaner</h2>
            </div>
            </a>
        </div>
    
        <div class="item5 grid-item">
        </div>
    
    </section>

</body>

<?php
    include('footer.inc');
?>
	
</html>
