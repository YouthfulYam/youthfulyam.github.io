<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Apex Automation enhancements page">
    <meta name="keywords" content="HTML5, enhancements">
    <!-- CSS -->
    <link rel="stylesheet" href="styles/enhancements.css">
    <link rel="stylesheet" href="styles/header.css">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://use.typekit.net/hja7nrk.css">
    <title>Enhancements</title>
</head>

<body>
<?php
    include('header.inc');
?>

    <section>
        <h1>Enhancements</h1>
      <h2> Nicolas Rivera </h2>
        <ol class="enhancements-content">
            <li><h2>3D Model Viewer &ndash; Marmoset</h2>
                <ul>
                    <li>A tool used to showcase 3D models, one of the features it has is that it is compatible with HTML.</li>
                    <li>I also wanted to have a small gallery of models so that you could switch between different models. This was achieved by having three thumbnail images which each have their own respective hyperlink. When clicked the iViewer will load up that HTML page, thus the new model.</li>
                    <li>Source of Reference: <a href="https://marmoset.co/posts/getting-started-with-viewer/"> Marmoset 3D Viewer</a></li>
                    <li>Hyperlink to Implementation: <a href="index.html">Home page</a></li>
                </ul>
            </li>
            <li><h2>Responsive Design</h2>
                <ul>
                    <li>Ensures that the whole page is both suitable and presentable for both desktop and mobile use.</li>
                    <li>Made sure that it works for a variety of different small and large width sizes, using an overflow-x to prevent undesired movement on the x-axis.</li>
                    <li>Source of Reference: <a href="https://www.w3schools.com/css/css_rwd_intro.asp">Responsiveness </a></li>
                    <li>Hyperlink to Implementation: <a href="enquire.html">Enquire page</a></li>
                </ul>
            </li>
            <li><h2>Scroll Button</h2>
                <ul>
                    <li>I experimented with a version where the enquiry form would follow with the page as the user scrolls, but I wasn’t satisfied with how it looked and I wasn’t able to find a harmony of having extra elements without being obscured by the form, so I discovered a way to have a button to take you to a certain section of the page.</li>
                    <li>While being limited by not using JavaScript, I used a simple HTML implementation.</li>
                    <li>Source of reference: <a href="https://www.w3schools.com/howto/howto_css_smooth_scroll.asp#section2">Scroll </a></li>
                    <li>Hyperlink to Implementation: <a href="enquire.html">Enquire Page</a></li>
                </ul>
            </li>
            <li><h2>Product Display &ndash; Hover</h2>
                <ul>
                    <li>A setup to display images such as a product or logo in an aesthetically pleasing way.</li>
                    <li>Using CSS elements to position an image to the left with text on the right (alternating pattern).</li>
                    <li>A hover effect so that the user can click on the text to go directly to the product page with a smooth scroll effect.</li>
                    <li>Source of Reference: <a href="https://www.w3schools.com/cssref/sel_hover.php">CSS Hover Selector </a></li>
                    <li>Hyperlink to Implementation: <a href="enquire.html">Enquire Page</a></li>
                </ul>
            </li>
            <li><h2>Product Display &ndash; Grid Display</h2>
                <ul>
                    <li>A stylistic grid display mixed with images and text to attract and keep the attention of the user.</li>
                    <li>Has appropriate links to their relavant page.</li>
                    <li>Has CSS responsiveness so that it still looks appealing in mobile view </li>
                    <li>Source of reference: <a href="https://www.w3schools.com/cssref/pr_grid-template.php">Grid Display </a></li>
                    <li>Hyperlink to Implementation: <a href="product.html">Product Page</a></li>
                </ul>
            </li>
        </ol>
	<h2> Cooper Simester </h2>
	<ol class="enhancements-content">
            <li><h2>JavaScript Member Selection Buttons</h2>
                <ul>
                    <li>Instead of having all of our members information listed on the same page in a descending order, I wanted to make it so you could
					use buttons to navigate to different members while on the same page.</li>
                    <li>I started looking at JavaScript to achieve this as it didn't seem possible with just HTML and CSS, and realised JS is very
					similar to Java itself, making it easier to figure out.</li>
                    <li>The function I created takes a parameter of the member who you want to show, and sets all other members visibility to none.</li>
                    <li>I also used this function when the page first loads to only show the first members information.</li>
                    <li>Hyperlink to Implementation: <a href="about.html">About page</a></li>
                </ul>
            </li>
	</ol>
	<h2> Josh Williams </h2>
        <ol class="enhancements-content">
            <li><h2>Drop Down Product Viewer</h2>
                <ul>
                    <li>A simple addition to the navigation bar that drops down to reveal the product range pages. Having all of our products in the navigation bar looked too crowded, so to provide a better experience, the drop down is a clear and efficient use of space.</li>
                    <li>I wanted to implement this to allow users to navigate directly to the products they want, rather than having to "dig" through the website to find their link.</li>
		    <li>Source of reference: <a href="https://www.w3schools.com/howto/howto_css_dropdown.asp">Hoverable Dropdown</a></li>
                    <li>Implementation: Each page for navigation </li>
                </ul>
            </li>
	</ol>
<h2> Thisaga kariyawasam</h2>
<ol class="enhancements-content">
   <li><h2></h2>Redirection to enquiry</h2></li>
	<ul>
   <li>Included a table with product specifications for a clearer presentation of information.</li>
   <li>Incorporated a testimonials section to showcase customer reviews and feedback.</li>
   <li>Added a call-to-action section encouraging users to contact and experience the products.</li>
   <li>Included an "Latest News" section to provide updates on advancements in autonomous robotics.</li>
   <li>Hyperlink to Implementation: <a href="index.html">Index</a></li>
</ul>
</li>
</ol>
<h2> Brayden Hall</h2>
<ol class="enhancements-content">
   <li><h2></h2>Redirection to enquiry</h2></li>
	<ul>
    <li>Basic photoshop of product images to remove gradient backgrounds for a cleaner look, having them blend into our page.</li>
   <li>images are floated left and right, set width to 30% to allow for better device scaling.</li>
   <li>various lists for better information presentation.</li>
   <li>asside to sepperate lists and make clear the change in subject</li>
   <li>table element for cleaner presentation. </li>
   <li>h2 headers underlined to better structure page and information</li>
   <li>Hyperlinked to enquire page for purchaes to be made</li>
   <li>Hyperlink to Implementation: <a href="pool_robot.html">Index</a></li>
   <li>Hyperlink to Implementation: <a href="lawnmower_robot.html">Index</a></li>
   <li>Hyperlink to Implementation: <a href="vacuum_robot.html">Index</a></li>
</ul>
</li>
</ol>


These enhancements collectively contribute to a more visually appealing, organized, and user-friendly website.</li>
	</ul>
    </section>
<?php
    include('footer.inc');
?>
</body>
</html>
