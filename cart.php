<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = {
        theme: {
        extend: {
            screens: {
            'mouse': {'raw': '(hover: hover)'},
            }
        }
        }
    }
    </script>

    <title>Cart</title>
</head>


<body>
    <?php 
    include 'header.php';
    ?>
    <main class="w-[80%] mx-auto bg-slate-50">
        <div class="flex flex-col">
            <div class="flex justify-between font-semibold bg-white shadow-lg p-4 mb-10">
                <h3 class="w-[20%]">Product</h3>
                <h3 class="w-[20%]">Price</h3>
                <h3 class="w-[20%]">Quantity</h3>
                <h3 class="w-[20%]">Subtotal</h3>
            </div>
            <div class="flex justify-between items-center bg-white shadow-lg p-4">
                <div class="flex flex-col w-[20%]">
                    <img class="block ml-3" src="./resources/lcd-monitor.jpg" alt="">
                    <p class="text-center">LCD Monitor</p>
                </div>
                <p class="w-[20%]">$650</p>
                <div class="w-[20%]"><input class="max-w-[100%] ring-2 ring-orange-500 outline-none" type="number" min="1" value="1"></div>
                <p class="w-[20%]">$650</p>
            </div>
        </div>
        <div class="w-[60%] mx-auto border border-black bg-white mt-20 p-6 rounded-lg">
            <h3 class="text-center font-semibold text-xl mb-1">Cart Total</h3>
            <div class="bordeer border-b-2 border-gray-300 flex justify-between">
                <p>Subtotal</p>
                <p>$650</p>
            </div>
            <div class="bordeer border-b-2 border-gray-300 flex justify-between">
                <p>Shipping</p>
                <p>Free</p>
            </div>
            <div class="flex justify-between text-red-700 font-medium">
                <p>Total</p>
                <p>$650</p>
            </div>
            <div class="flex justify-center items-center mt-10">
                <button class="bg-orange-600 hover:bg-[#DB4444] p-3 px-5 rounded-full text-sm text-white md:text-base">Process to checkout</button>
            </div>
        </div>
    













    </main>

<?php 
include 'footer.php';
?> 
</body>
</html>