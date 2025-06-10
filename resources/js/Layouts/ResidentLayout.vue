<template>
  <nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      <!-- Logo -->
      <Link :href="route('resident.dashboard')" class="flex items-center space-x-3 rtl:space-x-reverse">
        <ApplicationLogo class="h-8" />
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">
          Your App
        </span>
      </Link>

      <!-- Mobile menu button -->
      <button 
        @click="toggleMobileMenu"
        type="button" 
        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" 
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
        <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
          <li>
            <Link 
              :href="route('resident.dashboard')" 
              class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500" 
              aria-current="page"
            >
              Dashboard
            </Link>
          </li>
          <li>
            <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
              Request Assistance
            </a>
          </li>
          <li>
            <Link 
              :href="route('resident.feedback.index')" 
              :class="[
                'block py-2 px-3 rounded md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent',
                route().current('resident.feedback.index') 
                  ? 'text-blue-700 bg-blue-50 md:bg-transparent md:text-blue-700 dark:text-blue-500' 
                  : 'text-gray-900 hover:bg-gray-100 dark:text-white md:dark:hover:text-blue-500'
              ]"
            >
              Feedback
            </Link>
          </li>
          <li>
            <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
              Report Issue
            </a>
          </li>
          <li>
            <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
              About
            </a>
          </li>
        </ul>
      </div>

      <!-- User dropdown -->
      <div class="hidden md:flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
        <button 
          @click="toggleUserDropdown"
          type="button" 
          class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" 
          id="user-menu-button" 
          :aria-expanded="showUserDropdown"
          data-dropdown-toggle="user-dropdown" 
          data-dropdown-placement="bottom"
        >
          <span class="sr-only">Open user menu</span>
          <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-white font-medium text-sm">
            {{ getUserInitials($page.props.auth.user.name) }}
          </div>
        </button>
        
        <!-- Dropdown menu -->
        <div 
          v-show="showUserDropdown"
          class="absolute right-0 top-12 z-50 my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" 
          id="user-dropdown"
        >
          <div class="px-4 py-3">
            <span class="block text-sm text-gray-900 dark:text-white">{{ $page.props.auth.user.name }}</span>
            <span class="block text-sm text-gray-500 truncate dark:text-gray-400">{{ $page.props.auth.user.email }}</span>
          </div>
          <ul class="py-2" aria-labelledby="user-menu-button">
            <li>
              <Link 
                :href="route('profile.edit')" 
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
              >
                Profile
              </Link>
            </li>
            <li>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                Settings
              </a>
            </li>
            <li>
              <Link 
                :href="route('logout')" 
                method="post" 
                as="button"
                class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
              >
                Sign out
              </Link>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Mobile menu -->
    <div 
      v-show="showMobileMenu"
      class="w-full md:hidden" 
      id="navbar-mobile"
    >
      <ul class="font-medium flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
        <li>
          <Link 
            :href="route('resident.dashboard')" 
            class="block py-2 px-3 text-white bg-blue-700 rounded" 
            aria-current="page"
          >
            Dashboard
          </Link>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
            Request Assistance
          </a>
        </li>
        <li>
          <Link 
            :href="route('resident.feedback.index')" 
            :class="[
              'block py-2 px-3 rounded',
              route().current('resident.feedback.index') 
                ? 'text-white bg-blue-700' 
                : 'text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700'
            ]"
          >
            Feedback
          </Link>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
            Report Issue
          </a>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
            About
          </a>
        </li>
        <li class="border-t pt-2 mt-2">
          <div class="px-3 py-2">
            <span class="block text-sm font-medium text-gray-900 dark:text-white">{{ $page.props.auth.user.name }}</span>
            <span class="block text-sm text-gray-500 dark:text-gray-400">{{ $page.props.auth.user.email }}</span>
          </div>
        </li>
        <li>
          <Link 
            :href="route('profile.edit')" 
            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
          >
            Profile
          </Link>
        </li>
        <li>
          <Link 
            :href="route('logout')" 
            method="post" 
            as="button"
            class="block w-full text-left py-2 px-3 text-gray-900 rounded hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
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