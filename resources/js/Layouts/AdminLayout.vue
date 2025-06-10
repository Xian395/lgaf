<template>
  <nav class="bg-sky-50 border-sky-200 dark:bg-sky-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      <!-- Logo -->
      <Link :href="route('admin.dashboard')" class="flex items-center space-x-3 rtl:space-x-reverse">
        <ApplicationLogo class="h-8" />
        <span class="self-center text-2xl font-semibold whitespace-nowrap text-sky-800 dark:text-sky-100">
          Admin Panel
        </span>
      </Link>

      <!-- Mobile menu button -->
      <button 
        @click="toggleMobileMenu"
        type="button" 
        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-sky-600 rounded-lg md:hidden hover:bg-sky-100 focus:outline-none focus:ring-2 focus:ring-sky-300 dark:text-sky-300 dark:hover:bg-sky-800 dark:focus:ring-sky-600" 
        aria-controls="navbar-default" 
        :aria-expanded="showMobileMenu"
      >
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
      </button>

      <!-- Navigation items -->
      <div class="hidden w-full md:block md:w-auto" id="navbar-default">
        <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-sky-200 rounded-lg bg-sky-100 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-sky-50 dark:bg-sky-800 md:dark:bg-sky-900 dark:border-sky-700">
          <li>
            <Link 
              :href="route('admin.dashboard')" 
              class="block py-2 px-3 text-white bg-sky-600 rounded md:bg-transparent md:text-sky-600 md:p-0 dark:text-sky-100 md:dark:text-sky-400" 
              aria-current="page"
            >
              Dashboard
            </Link>
          </li>
          <li>
            <a href="#" class="block py-2 px-3 text-sky-800 rounded hover:bg-sky-200 md:hover:bg-transparent md:border-0 md:hover:text-sky-600 md:p-0 dark:text-sky-100 md:dark:hover:text-sky-400 dark:hover:bg-sky-700 dark:hover:text-white md:dark:hover:bg-transparent">
              Manage Requests
            </a>
          </li>
          <li>
            <a href="#" class="block py-2 px-3 text-sky-800 rounded hover:bg-sky-200 md:hover:bg-transparent md:border-0 md:hover:text-sky-600 md:p-0 dark:text-sky-100 md:dark:hover:text-sky-400 dark:hover:bg-sky-700 dark:hover:text-white md:dark:hover:bg-transparent">
              Manage Feedback
            </a>
          </li>
          <li>
            <a href="#" class="block py-2 px-3 text-sky-800 rounded hover:bg-sky-200 md:hover:bg-transparent md:border-0 md:hover:text-sky-600 md:p-0 dark:text-sky-100 md:dark:hover:text-sky-400 dark:hover:bg-sky-700 dark:hover:text-white md:dark:hover:bg-transparent">
              Manage Report Issues
            </a>
          </li>
        </ul>
      </div>

      <!-- User dropdown -->
    <div class="hidden md:flex items-center md:order-2 space-x-1 md:space-x-0 rtl:space-x-reverse relative">
        <button 
          @click="toggleUserDropdown"
          type="button" 
          class="flex items-center justify-between py-2 px-3 text-gray-900 bg-gray-100 rounded-lg hover:bg-gray-200 md:hover:bg-gray-200 md:border-0 md:hover:text-blue-700 dark:text-white dark:bg-gray-700 md:dark:hover:text-blue-500 dark:focus:text-white dark:hover:bg-gray-600 md:dark:hover:bg-gray-600"
          id="user-menu-button" 
          :aria-expanded="showUserDropdown"
        >
          <svg class="w-5 h-5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9.183 14h1.634a3.987 3.987 0 0 1 4.134 2.512A8.949 8.949 0 0 1 10 18Z"/>
          </svg>
         
        </button>
        
        <!-- Dropdown menu -->
        <div 
          v-show="showUserDropdown"
          class="absolute left-0 top-12 z-10 font-normal bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700 dark:divide-gray-600" 
          id="user-dropdown"
        >
          <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="user-menu-button">
            <li>
              <Link 
                :href="route('profile.edit')" 
                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
              >
                Profile
              </Link>
            </li>
            <li>
              <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                Settings
              </a>
            </li>
          </ul>
          <div class="py-1">
            <Link 
              :href="route('logout')" 
              method="post" 
              as="button"
              class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
            >
              Sign out
            </Link>
          </div>
        </div>
      </div>
    </div>

    <!-- Mobile menu -->
    <div 
      v-show="showMobileMenu"
      class="w-full md:hidden" 
      id="navbar-mobile"
    >
      <ul class="font-medium flex flex-col p-4 mt-4 border border-sky-200 rounded-lg bg-sky-100 dark:bg-sky-800 dark:border-sky-700">
        <li>
          <Link 
            :href="route('admin.dashboard')" 
            class="block py-2 px-3 text-white bg-sky-600 rounded" 
            aria-current="page"
          >
            Dashboard
          </Link>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 text-sky-800 rounded hover:bg-sky-200 dark:text-sky-100 dark:hover:bg-sky-700">
            Manage Requests
          </a>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 text-sky-800 rounded hover:bg-sky-200 dark:text-sky-100 dark:hover:bg-sky-700">
            Manage Feedback
          </a>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 text-sky-800 rounded hover:bg-sky-200 dark:text-sky-100 dark:hover:bg-sky-700">
            Manage Report Issues
          </a>
        </li>
        
        <li class="border-t border-sky-300 dark:border-sky-600 pt-2 mt-2">
          <div class="px-3 py-2">
            <span class="block text-sm font-medium text-sky-800 dark:text-sky-100">{{ $page.props.auth.user.name }}</span>
            <span class="block text-sm text-sky-600 dark:text-sky-300">{{ $page.props.auth.user.email }}</span>
          </div>
        </li>
        <li>
          <Link 
            :href="route('profile.edit')" 
            class="block py-2 px-3 text-sky-800 rounded hover:bg-sky-200 dark:text-sky-100 dark:hover:bg-sky-700"
          >
            Profile
          </Link>
        </li>
        <li>
          <Link 
            :href="route('logout')" 
            method="post" 
            as="button"
            class="block w-full text-left py-2 px-3 text-sky-800 rounded hover:bg-sky-200 dark:text-sky-100 dark:hover:bg-sky-700"
          >
            Sign out
          </Link>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Page Content -->
  <main>
    <slot />
  </main>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';

const showMobileMenu = ref(false);
const showUserDropdown = ref(false);

const toggleMobileMenu = () => {
  showMobileMenu.value = !showMobileMenu.value;
  if (showMobileMenu.value) {
    showUserDropdown.value = false;
  }
};

const toggleUserDropdown = () => {
  showUserDropdown.value = !showUserDropdown.value;
  if (showUserDropdown.value) {
    showMobileMenu.value = false;
  }
};

const getUserInitials = (name) => {
  return name
    .split(' ')
    .map(word => word.charAt(0))
    .join('')
    .toUpperCase()
    .substring(0, 2);
};

const handleClickOutside = (event) => {
  if (!event.target.closest('#user-menu-button') && !event.target.closest('#user-dropdown')) {
    showUserDropdown.value = false;
  }
  if (!event.target.closest('[aria-controls="navbar-default"]') && !event.target.closest('#navbar-mobile')) {
    showMobileMenu.value = false;
  }
};

onMounted(() => {
  document.addEventListener('click', handleClickOutside);
});

onUnmounted(() => {
  document.removeEventListener('click', handleClickOutside);
});
</script>