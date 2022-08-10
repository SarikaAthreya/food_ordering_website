<html>
    <head>
        <title>Purple & Sweet</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
    </head>
    </body>
    <section id="navigation">
        <div class="division">
            <div class="logo">
                <a href="#" title="logo">
                <img src="images/logo.jpg" alt="Website Logo" class="img_response">
                </a>
            </div>
            <div class="menu text_right">
                <ul>
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="category.html">Categories</a>
                    </li>
                    <li>
                        <a href="food.html">Foods</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>
<section class="purple text-center">
        <div class="division">
            <h2 class="text-center text_white">Fill this form to confirm your order.</h2>

            <form action="#" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="fmenu_img">
                        <img src="images/summerfruitcake.jpg" alt="Summer Fruit Cake" class="img_response img_curve">
                    </div>
    
                    <div class="fmenu_desc">
                    <h4>Summer sw-heat</h4>
                    <p class="price">Rs.1500</p>
                        <div class="order_label">Quantity</div>
                        <input type="number" name="qty" class="input_response" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order_label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Park Jimin" class="input_response" required>

                    <div class="order_label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9991xxxxxx" class="input_response" required>

                    <div class="order_label">Email</div>
                    <input type="email" name="email" placeholder="E.g. jimin@gmail.com" class="input_response" required>

                    <div class="order_label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input_response" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="button1 button2">
                </fieldset>

            </form>

        </div>
    </section>
    <section id="footer">
        <div class="division text-center">
            2021. All rights reserved.
        </div>
    </section>
</html>