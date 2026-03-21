<!DOCTYPE html>
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
    <title>Sign Up</title>
</head>
<body>
    <?php 
    include 'header.php';
    ?>
    <main>
    <div class="sm:flex sm:justify-between">
        <div class="w-[60%] mx-auto p-2 sm:w-[50%] sm:mx-0 sm:flex sm:justify-center sm:items-center md:w-[50%]">
        <div class="md:w-[70%] lg:w-[50%]">
                <h1 class="text-center font-semibold text-2xl">Create an account</h1>
                <div class="flex flex-col mb-3 ">
                    <label class="mb-1 font-medium" for="name">Name</label>
                    <input class="focus:outline-none ring-1 ring-orange-500 p-2  rounded-lg focus:bg-orange-50 text-sm" type="text" id="name">
                </div> 
                <div class="flex flex-col mb-3 ">
                    <label class="mb-1 font-medium" for="email">Email</label>
                    <input class="focus:outline-none ring-1 ring-orange-500 p-2  rounded-lg focus:bg-orange-50 text-sm" type="text" id="email">
                </div>       
                <div class="flex flex-col mb-3 ">
                    <label class="mb-1 font-medium" for="pass">Password</label>
                    <input class="focus:outline-none ring-1 ring-orange-500 p-2  rounded-lg focus:bg-orange-50" type="password" id="pass">
                </div>     
                <div class="flex justify-center items-center mt-10">
                    <button class="bg-orange-500 hover:bg-orange-600 p-3 px-5 rounded-full text-sm text-white md:text-base">Create Account</button>
                </div>
                <a href="login.php"><p class="text-center mt-4 text-gray-600 mouse:hover:underline">Already have account? Log In</p></a>
            </div> 
        </div> 
        
        <div class="hiddden sm:block bg-orange-200 rounded-l-lg w-[50%]">
            <img class="hidden sm:block" src="./resources/login.png" alt="">
        </div>
    </div>





    </main>
    
    <footer>
        <?php
        include 'footer.php';
        ?>
    </footer>
</body>
</html>