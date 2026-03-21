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

    <title>Category Products</title>  <!--Dynamic according to the chosen category-->
</head>
<body>
    <?php 
    include 'header.php';
    ?>
    <main class="w-[95%] mx-auto">
        <div class="bg-slate-50 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-7 mb-20">
            <div class="bg-white shadow-md rounded-lg p-2">
                <div class="relative w-[100%] mx-auto">
                    <img class="max-w-[100%] object-cover mx-auto"  src="./resources//coat.png" alt="">
                    <img class="absolute top-[3%] right-[2%] h-4 w-4 md:w-6 md:h-6" src="./resources/whitre-heart.png" alt="">
                </div>
                <h3>Gucci duffle bag</h3>
                <div class="flex">
                    <p class="mr-4">$260</p>
                    <p class="text-gray-500 line-through">$360</p>
                </div>
                <div>
                    <div class="flex gap-x-1">
                        <img src="./resources/fullStar.png" alt=""><img src="./resources/fullStar.png" alt=""><img src="./resources/fullStar.png" alt=""><img src="./resources/fullStar.png" alt=""><img src="./resources/fullStar.png" alt="">
                    </div>
                    <p>(65)</p>
                </div>
                <div class="flex justify-center items-center mt-10">
                    <button class="bg-[#DB4444] hover:bg-orange-700 p-3 px-5 rounded-full text-sm text-white md:text-base">Add to cart</button>
                </div>
            </div>
            <div class="bg-white shadow-md rounded-lg p-2">
                <div class="relative w-[100%] mx-auto">
                    <img class="max-w-[100%] object-cover mx-auto"  src="./resources//coat.png" alt="">
                    <img class="absolute top-[3%] right-[2%] h-4 w-4 md:w-6 md:h-6" src="./resources/whitre-heart.png" alt="">
                </div>
                <h3>Gucci duffle bag</h3>
                <div class="flex">
                    <p class="mr-4">$260</p>
                    <p class="text-gray-500 line-through">$360</p>
                </div>
                <div>
                    <div class="flex gap-x-1">
                        <img src="./resources/fullStar.png" alt=""><img src="./resources/fullStar.png" alt=""><img src="./resources/fullStar.png" alt=""><img src="./resources/fullStar.png" alt=""><img src="./resources/fullStar.png" alt="">
                    </div>
                    <p>(65)</p>
                </div>
                <div class="flex justify-center items-center mt-10">
                    <button class="bg-[#DB4444] hover:bg-orange-700 p-3 px-5 rounded-full text-sm text-white md:text-base">Add to cart</button>
                </div>
            </div>
            <div class="bg-white shadow-md rounded-lg p-2">
                <div class="relative w-[100%] mx-auto">
                    <img class="max-w-[100%] object-cover mx-auto"  src="./resources//coat.png" alt="">
                    <img class="absolute top-[3%] right-[2%] h-4 w-4 md:w-6 md:h-6" src="./resources/whitre-heart.png" alt="">
                </div>
                <h3>Gucci duffle bag</h3>
                <div class="flex">
                    <p class="mr-4">$260</p>
                    <p class="text-gray-500 line-through">$360</p>
                </div>
                <div>
                    <div class="flex gap-x-1">
                        <img src="./resources/fullStar.png" alt=""><img src="./resources/fullStar.png" alt=""><img src="./resources/fullStar.png" alt=""><img src="./resources/fullStar.png" alt=""><img src="./resources/fullStar.png" alt="">
                    </div>
                    <p>(65)</p>
                </div>
                <div class="flex justify-center items-center mt-10">
                    <button class="bg-[#DB4444] hover:bg-orange-700 p-3 px-5 rounded-full text-sm text-white md:text-base">Add to cart</button>
                </div>
            </div>
            <div class="bg-white shadow-md rounded-lg p-2">
                <div class="relative w-[100%] mx-auto">
                    <img class="max-w-[100%] object-cover mx-auto"  src="./resources//coat.png" alt="">
                    <img class="absolute top-[3%] right-[2%] h-4 w-4 md:w-6 md:h-6" src="./resources/whitre-heart.png" alt="">
                </div>
                <h3>Gucci duffle bag</h3>
                <div class="flex">
                    <p class="mr-4">$260</p>
                    <p class="text-gray-500 line-through">$360</p>
                </div>
                <div>
                    <div class="flex gap-x-1">
                        <img src="./resources/fullStar.png" alt=""><img src="./resources/fullStar.png" alt=""><img src="./resources/fullStar.png" alt=""><img src="./resources/fullStar.png" alt=""><img src="./resources/fullStar.png" alt="">
                    </div>
                    <p>(65)</p>
                </div>
                <div class="flex justify-center items-center mt-10">
                    <button class="bg-[#DB4444] hover:bg-orange-700 p-3 px-5 rounded-full text-sm text-white md:text-base">Add to cart</button>
                </div>
            </div>
            <div class="bg-white shadow-md rounded-lg p-2">
                <div class="relative w-[100%] mx-auto">
                    <img class="max-w-[100%] object-cover mx-auto"  src="./resources//coat.png" alt="">
                    <img class="absolute top-[3%] right-[2%] h-4 w-4 md:w-6 md:h-6" src="./resources/whitre-heart.png" alt="">
                </div>
                <h3>Gucci duffle bag</h3>
                <div class="flex">
                    <p class="mr-4">$260</p>
                    <p class="text-gray-500 line-through">$360</p>
                </div>
                <div>
                    <div class="flex gap-x-1">
                        <img src="./resources/fullStar.png" alt=""><img src="./resources/fullStar.png" alt=""><img src="./resources/fullStar.png" alt=""><img src="./resources/fullStar.png" alt=""><img src="./resources/fullStar.png" alt="">
                    </div>
                    <p>(65)</p>
                </div>
                <div class="flex justify-center items-center mt-10">
                    <button class="bg-[#DB4444] hover:bg-orange-700 p-3 px-5 rounded-full text-sm text-white md:text-base">Add to cart</button>
                </div>
            </div>
            <div class="bg-white shadow-md rounded-lg p-2">
                <div class="relative w-[100%] mx-auto">
                    <img class="max-w-[100%] object-cover mx-auto"  src="./resources//coat.png" alt="">
                    <img class="absolute top-[3%] right-[2%] h-4 w-4 md:w-6 md:h-6" src="./resources/whitre-heart.png" alt="">
                </div>
                <h3>Gucci duffle bag</h3>
                <div class="flex">
                    <p class="mr-4">$260</p>
                    <p class="text-gray-500 line-through">$360</p>
                </div>
                <div>
                    <div class="flex gap-x-1">
                        <img src="./resources/fullStar.png" alt=""><img src="./resources/fullStar.png" alt=""><img src="./resources/fullStar.png" alt=""><img src="./resources/fullStar.png" alt=""><img src="./resources/fullStar.png" alt="">
                    </div>
                    <p>(65)</p>
                </div>
                <div class="flex justify-center items-center mt-10">
                    <button class="bg-[#DB4444] hover:bg-orange-700 p-3 px-5 rounded-full text-sm text-white md:text-base">Add to cart</button>
                </div>
            </div>
        </div>

    <?php 
    include 'footer-service.php';
    ?>

    </main>

<?php 
include 'footer.php';
?> 
</body>
</html>