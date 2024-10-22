<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register - Kost 24K</title>
    <!-- tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- flowbite -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="src/assets/css/tailwind.output.css" />
    <script
        src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
        defer></script>
    <script src="src/assets/js/init-alpine.js"></script>
</head>

<body>
    <div class="flex items-center min-h-screen p-6 bg-gray-50">
        <div
            class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl shadow-purple-500">
            <div class="flex flex-col overflow-y-auto md:flex-row-reverse">
                <div class="h-32 md:h-auto md:w-1/2">
                    <img
                        aria-hidden="true"
                        class="object-cover w-full h-full"
                        src="src/assets/img/forgot-password-office.jpeg"
                        alt="Office" />
                </div>
                <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                    <div class="w-full">
                        <span class="mb-4 text-2xl font-extrabold">Create your account</span>
                        <h1
                            class="mb-4 text-xl font-semibold text-gray-700">
                            Register
                        </h1>
                        <!-- nama -->
                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700">Nama Lengkap</span>
                            <input
                                type="text"
                                name="name"
                                id="name"
                                class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input"
                                placeholder="Jane Doe" />
                        </label>
                        <!-- nama -->
                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700">NIK</span>
                            <input
                                name="nik"
                                id="nik"
                                type="text"
                                minlength="10"
                                class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input"
                                placeholder="12345678" />
                        </label>
                        <!-- nama -->
                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700">Nomor HP</span>
                            <input
                                name="no_hp"
                                id="no_hp"
                                type="text"
                                minlength="12"
                                class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input"
                                placeholder="xxxxxxxxxxxx" />
                        </label>
                        <!-- email -->
                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700">Email</span>
                            <input
                                name="email"
                                id="email"
                                type="email"
                                class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input"
                                placeholder="Jane Doe" />
                        </label>
                        <!-- password -->
                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700">Password</span>
                            <input
                                name="password"
                                id="password"
                                class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                placeholder="***************"
                                type="password" />
                        </label>
                        <!-- password confirm -->
                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700">Konfirmasi Password</span>
                            <input
                                name="password_confirm"
                                id="password_confirm"
                                class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                placeholder="***************"
                                type="password" />
                        </label>

                        <!-- You should use a button here, as the anchor is only used for the example  -->
                        <a
                            class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                            href="src/index.html">
                            Register
                        </a>
                        <p class="mt-1 flex flex-col">
                            <a
                                class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
                                href="login.php">
                                have an account?
                            </a>
                            <a
                                class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
                                href="index.php">
                                Home
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>