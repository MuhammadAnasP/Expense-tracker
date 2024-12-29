<script setup>
</script>

<template>
    <div class="bg-gradient-to-b from-red-100 to-gray-200">
        <div>
            <nav class="bg-red-900 p-2 md:px-10 md:py-5">
                <div class="w-full flex flex-wrap items-center justify-between">
                    <div class="flex items-center md:order-2 space-x-3 md:space-x-0">
                        <div class="flex gap-1 items-center">
                            <div>
                                <p class="text-xs text-white">Welcome back</p>
                                <h1 class="text-white font-semibold">James</h1>
                            </div>
                            <button type="button" class=" text-sm rounded-full md:me-0 focus:ring-4" id="user-menu-button"
                                aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                                <img class="w-8 h-8 rounded-full" src="/images/male.png" alt="user photo">
                            </button>
                            <svg class="h-6" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>

                        <!-- Dropdown menu -->
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                            id="user-dropdown">
                            <div class="px-4 py-3">
                                <span class="block text-sm text-gray-900 dark:text-white">Bonnie Green</span>
                                <span
                                    class="block text-sm  text-gray-500 truncate dark:text-gray-400">name@flowbite.com</span>
                            </div>
                            <ul class="py-2" aria-labelledby="user-menu-button">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Earnings</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                                        out</a>
                                </li>
                            </ul>
                        </div>
                        <button data-collapse-toggle="navbar-user" type="button"
                            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-100 rounded-lg md:hidden hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-600"
                            aria-controls="navbar-user" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 17 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M1 1h15M1 7h15M1 13h15" />
                            </svg>
                        </button>
                    </div>
                    <!-- hidden -->
                    <div class="items-center justify-between w-full md:flex md:flex-1 md:w-auto md:order-1"
                        id="navbar-user">
                        <ul
                            class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-red-900 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 border-gray-700">
                            <li>
                                <a href="#" class="block py-2 text-gray-100 rounded hover:text-gray-400">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block py-2 text-gray-100 rounded hover:text-gray-400 ">
                                    How eREC Works
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block py-2 text-gray-100 rounded hover:text-gray-400">
                                    Benefits
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block py-2 text-gray-100 rounded hover:text-gray-400">
                                    Security & Privacy
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block py-2 text-gray-100 rounded hover:text-gray-400 ">
                                    How much
                                </a>
                            </li>
                        </ul>
                        <div class="relative md:mx-16 flex-grow">
                            <form action="/search" method="GET">
                                <input type="text" name="member_id"
                                    class="w-full py-2 px-4 bg-red-900 border border-gray-100 rounded-lg placeholder-gray-100"
                                    placeholder="Find Members via ID E.g. 999999">
                                <button type="submit" class="absolute right-0 top-0 mt-2 mr-4">
                                    <svg class="h-6 w-6 text-gray-100" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-4.35-4.35M17 10a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>

        </div>
        <div class="p-2 md:px-10">
            <div class="text-center font-bold p-5">
                <h1 class="text-3xl">Bronx High School of Science</h1>
                <h1 class="mt-2">District: New York</h1>
            </div>

            <div class="flex flex-wrap justify-center font-semibold">
                <div class="text-red-700 border-gray-400 border-r px-5"><a href="#">eREC Profile</a></div>
                <div class="border-gray-400 border-r px-5"><a href="#" class="font-semibold">Group Administrator</a></div>
                <div class="border-gray-400 border-r px-5"><a href="#" class="font-semibold">Other Administrators</a>
                </div>
                <div class="border-gray-400 border-r px-5"><a href="#" class="font-semibold">Group Users</a></div>
                <div class="border-gray-400 border-r px-5"><a href="#" class="font-semibold">General</a></div>
                <div class="border-gray-400 border-r px-5"><a href="#" class="font-semibold">Member list</a></div>
                <div class="px-5"><a href="#" class="font-semibold">Account Summary</a></div>
            </div>

            <div class="p-5 mt-5 bg-gray-700 text-white rounded-lg">
                <div class="flex gap-2 items-center text-2xl font-bold">
                    <div class="rounded-full border border-red-700 p-1">
                        <svg class="w-4 text-red-700" fill="currentColor" viewBox="0 0 25 25" stroke="none">
                            <path
                                d="M12 2l3.09 6.26L22 9.27l-5 4.87L18.18 21 12 17.27 5.82 21 7 14.14 2 9.27l6.91-1.01L12 2z" />
                        </svg>
                    </div>
                    <h1>Group Basic Details</h1>
                </div>
                <div class="grid gap-4 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 border-y-2 border-gray-400 mt-3 py-3">
                    <div>
                        <h1 class="font-bold">Group Admin Name</h1>
                        <h1>Jane Doe</h1>
                    </div>
                    <div>
                        <h1 class="font-bold">eREC Group ID</h1>
                        <h1>999999</h1>
                    </div>
                    <div>
                        <h1 class="font-bold">Account Status</h1>
                        <h1 class="text-yellow-500">In-Active</h1>
                    </div>
                    <div>
                        <h1 class="font-bold">Last Sign in</h1>
                        <h1>July 30, 2024</h1>
                    </div>
                    <div>
                        <h1 class="font-bold">Account Type</h1>
                        <h1>School - Public</h1>
                    </div>
                    <div>
                        <h1 class="font-bold">Expiry Date</h1>
                        <h1>-</h1>
                    </div>
                </div>
                <div class="flex justify-between items-center p-3 mt-5 bg-gray-500 rounded-lg">
                    <div>
                        <h1 class="font-bold">Invite New eREC Members</h1>
                        <h1>Invite Parents / Guardians / Employees to join your eREC account</h1>
                    </div>
                    <div>
                        <button class="bg-white text-red-700 font-semibold rounded-md p-2">Invite Now</button>
                    </div>
                </div>
            </div>

            <div class="rounded-lg bg-white mt-5">
                <div class="accordion-item border-b border-gray-300 ">
                    <div class="accordion-header cursor-pointer bg-white hover:bg-gray-200 flex items-center rounded-lg">
                        <div class="accordion-controller flex-grow flex items-center justify-between p-5">
                            <div class="flex gap-2 items-center text-2xl font-bold">
                                <svg fill="currentColor" class="bi bi-person w-12 md:w-6" viewBox="0 0 16 16">
                                    <path
                                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                                </svg>
                                <h2 class="text-red-700">Group Plan / Promotion Information</h2>
                            </div>
                            <span class="accordion-expand-collapse-icon ml-4">
                                <svg class="h-6" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="accordion-content border-t-2 p-5"> <!-- hidden -->
                        <div class="flex gap-5 justify-between items-center italic p-3 bg-yellow-400 rounded-lg">
                            <div class="bg-yellow-200 p-3 rounded-full">
                                <svg fill="currentColor" class="bi bi-exclamation-triangle-fill w-5" viewBox="0 0 16 16">
                                    <path
                                        d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5m.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                                </svg>
                            </div>
                            <div>
                                <h1 class="font-bold">Pay your Balance Due of <span class="text-red-700">$4500.00</span>
                                </h1>
                                <h1>Please pay it before the Plan expires, to continue the eREC services</h1>
                            </div>
                            <button class="bg-red-700 text-white font-semibold rounded-lg px-4 py-2 ml-auto">Pay
                                $4500.00</button>
                        </div>
                        <h1 class="mt-3">Need Help on Payments? Contact Support team:
                            <a href="" class="text-red-700 font-semibold underline">888-514-eREC (3732)</a>
                        </h1>
                    </div>
                </div>
            </div>

            <div class="rounded-lg bg-white mt-5">
                <div class="accordion-item border-b border-gray-300">
                    <div class="accordion-header cursor-pointer bg-white hover:bg-gray-200 flex items-center rounded-lg">
                        <div class="accordion-controller flex-grow flex flex-col md:flex-row items-center justify-between p-5">
                            <div class="flex gap-2 items-center text-2xl font-bold">
                                <svg fill="currentColor" class="bi bi-people w-12 md:w-6" viewBox="0 0 16 16">
                                    <path
                                        d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4" />
                                </svg>
                                <h2 class="text-red-700">Other Administrator List</h2>
                            </div>
                            <div class="flex gap-3">
                                <h1>Filter admin status by: </h1>
                                <div class="flex justify-center items-center">
                                    <div
                                        class="relative inline-flex items-center cursor-pointer w-48 border border-gray-500 rounded-full">
                                        <span
                                            class="w-1/2 h-full bg-red-700 text-white flex items-center justify-center rounded-l-full">
                                            Active
                                        </span>
                                        <span
                                            class="w-1/2 h-full bg-white text-gray-700 flex items-center justify-center rounded-r-full">
                                            Inactive
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-content border-t-2 p-5">
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-md border border-black">
                                <thead class="text-gray-700 bg-gray-200">
                                    <tr>
                                        <th class="p-3 border-r-2 border-gray-300">Admin User Name</th>
                                        <th class="p-3 border-r-2 border-gray-300">Title</th>
                                        <th class="p-3 border-r-2 border-gray-300">eREC Role</th>
                                        <th class="p-3 border-r-2 border-gray-300">Username / Email</th>
                                        <th class="p-3 border-r-2">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="p-3 border-r-2 border-gray-100">Jane Doe</td>
                                        <td class="p-3 border-r-2 border-gray-100">HOD</td>
                                        <td class="p-3 border-r-2 border-gray-100">Dept. of science</td>
                                        <td class="p-3 border-r-2 border-gray-100">name@group.com</td>
                                        <td class="p-3 flex gap-3">
                                            <button
                                                class="text-red-700 font-semibold border border-gray-300 rounded-md px-4 py-1">View</button>
                                            <button
                                                class="text-red-700 font-semibold border border-gray-300 rounded-md px-4 py-1">Edit</button>
                                            <button
                                                class="text-red-700 font-semibold border border-gray-300 rounded-md px-4 py-1">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="rounded-lg bg-white mt-5">
                <div class="accordion-item border-b border-gray-300">
                    <div class="accordion-header cursor-pointer bg-white hover:bg-gray-200 flex items-center rounded-lg">
                        <div class="accordion-controller flex-grow flex items-center justify-between p-5">
                            <div class="flex gap-2 items-center text-2xl font-bold">
                                <svg fill="currentColor" class="bi bi-geo-alt-fill w-10 md:w-5" viewBox="0 0 16 16">
                                    <path
                                        d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                                </svg>
                                <h2 class="text-red-700">General School Information</h2>
                            </div>
                            <span class="accordion-expand-collapse-icon ml-4 flex gap-3">
                                <a href="#" class="text-red-700 underline">Edit Details</a>
                                <svg class="h-6" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="accordion-content border-t-2 p-5">
                        <h1 class="font-bold">Primary Address</h1>
                        <h1>Bronx High School of Science, 1234 Main Street, City Hall Park, New York city, New York, Zip
                            code-10007</h1>
                        <div class="grid gap-4 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mt-4">
                            <div>
                                <h1 class="font-bold">Primary Phone Number</h1>
                                <h1>212-456-7890</h1>
                            </div>
                            <div>
                                <h1 class="font-bold">Secondary Phone Number</h1>
                                <h1>314-123-4567</h1>
                            </div>
                            <div>
                                <h1 class="font-bold">FAX Number</h1>
                                <h1>314-123-4567</h1>
                            </div>
                            <div>
                                <h1 class="font-bold">Website URL</h1>
                                <h1>www.school.com</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="rounded-lg bg-white mt-5">
                <div class="accordion-item border-b border-gray-300">
                    <div class="accordion-header cursor-pointer bg-white hover:bg-gray-200 flex items-center rounded-lg">
                        <div class="accordion-controller flex-grow flex items-center justify-between p-5">
                            <div class="flex gap-2 items-center text-2xl font-bold">
                                <svg fill="currentColor" class="bi bi-currency-dollar w-6" viewBox="0 0 16 16">
                                    <path
                                        d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73z" />
                                </svg>
                                <h2 class="text-red-700">Payment History</h2>
                            </div>
                            <span class="accordion-expand-collapse-icon ml-4">
                                <svg class="h-6" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="accordion-content border-t-2 p-5">
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-md border border-black">
                                <thead class="text-gray-700 bg-gray-200">
                                    <tr>
                                        <th class="p-3 border-r-2 border-gray-300">Transaction Date</th>
                                        <th class="p-3 border-r-2 border-gray-300">Amount Received</th>
                                        <th class="p-3 border-r-2 border-gray-300">Transaction Status</th>
                                        <th class="p-3 border-r-2 border-gray-300">Username / Email</th>
                                        <th class="p-3">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="p-3 border-r-2 border-gray-100">12/4/2026</td>
                                        <td class="p-3 border-r-2 border-gray-100">-</td>
                                        <td class="p-3 border-r-2 border-gray-100">
                                            <p class="text-yellow-500 font-semibold">Pending</p>
                                        </td>
                                        <td class="p-3 border-r-2 border-gray-100">name@group.com</td>
                                        <td class="p-3 flex gap-3">
                                            <button
                                                class="text-red-700 font-semibold border border-gray-300 rounded-md px-4 py-1">View
                                                Details</button>
                                            <button
                                                class="text-red-700 font-semibold border border-gray-300 rounded-md px-4 py-1">Download
                                                Receipt</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>