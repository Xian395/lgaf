<template>
  <nav class="sticky top-0 z-50 bg-white border-b border-gray-200 shadow-sm">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      <!-- Logo -->
      <Link :href="route('admin.dashboard')" class="flex items-center space-x-3">
        <img src="/icon2.png" alt="LGU Connect Logo" class="h-10 w-10" />
        <div class="flex flex-col">
          <span class="text-xl font-bold text-blue-600">
            LGU Connect
          </span>
          <span class="text-xs text-gray-500 font-medium">
            Admin Portal
          </span>
        </div>
      </Link>

      <!-- Mobile menu button -->
      <button 
        @click="toggleMobileMenu"
        type="button" 
        class="inline-flex items-center p-2 w-10 h-10 justify-center text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-300"
        aria-controls="navbar-default" 
        :aria-expanded="showMobileMenu"
      >
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" fill="none" viewBox="0 0 17 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
      </button>

      <!-- Navigation items -->
      <div class="hidden w-full md:block md:w-auto" id="navbar-default">
        <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white">
          <li>
            <Link 
              :href="route('admin.dashboard')" 
              :class="[
                'block py-2 px-3 rounded md:border-0 md:p-0 transition-colors duration-200',
                route().current('admin.dashboard') 
                  ? 'text-white bg-blue-600 md:text-blue-600 md:bg-transparent' 
                  : 'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-600'
              ]"
              aria-current="page"
            >
              Home
            </Link>
          </li>
          <li>
             <Link 
              :href="route('admin.assistance.index')" 
              :class="[
                'block py-2 px-3 rounded md:border-0 md:p-0 transition-colors duration-200',
                route().current('admin.assistance.index') 
                  ? 'text-white bg-blue-600 md:text-blue-600 md:bg-transparent' 
                  : 'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-600'
              ]"
              aria-current="page"
            >
              manageRequests
            </Link>
          </li>
          <li>
             <Link 
              :href="route('admin.report.index')" 
              :class="[
                'block py-2 px-3 rounded md:border-0 md:p-0 transition-colors duration-200',
                route().current('admin.report.index') 
                  ? 'text-white bg-blue-600 md:text-blue-600 md:bg-transparent' 
                  : 'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-600'
              ]"
              aria-current="page"
            >
              manageReports
            </Link>
          </li>
          
          <!-- Feedback Dropdown -->
          <li class="relative">
            <button 
              @click="toggleFeedbackDropdown"
              :class="[
                'flex items-center py-2 px-3 rounded md:border-0 md:p-0 transition-colors duration-200',
                (route().current('admin.feedback.index') || route().current('admin.service.index'))
                  ? 'text-white bg-blue-600 md:text-blue-600 md:bg-transparent' 
                  : 'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-600'
              ]"
            >
              manageFeedback
              <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
              </svg>
            </button>
            
            <!-- Feedback Dropdown Menu -->
            <div 
              v-show="showFeedbackDropdown"
              class="absolute left-0 top-full mt-1 w-48 bg-white border border-gray-200 rounded-lg shadow-lg z-50"
            >
              <div class="py-1">
                <Link 
                  :href="route('admin.feedback.index')"
                  :class="[
                    'block px-4 py-2 text-sm transition-colors duration-200',
                    route().current('admin.feedback.index')
                      ? 'text-blue-600 bg-blue-50'
                      : 'text-gray-700 hover:bg-gray-100'
                  ]"
                >
                  Service Feedback
                </Link>
                <Link 
                  :href="route('admin.service.index')"
                  :class="[
                    'block px-4 py-2 text-sm transition-colors duration-200',
                    route().current('admin.service.index')
                      ? 'text-blue-600 bg-blue-50'
                      : 'text-gray-700 hover:bg-gray-100'
                  ]"
                >
                  Experience Feedback
                </Link>
              </div>
            </div>
          </li>
        </ul>
      </div>

      <!-- User dropdown -->
      <div class="hidden md:flex items-center md:order-2 space-x-3 relative">
        <!-- Notifications Button -->
        <button class="relative p-2 text-gray-500 rounded-lg hover:bg-gray-100 transition-colors duration-200">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/>
          </svg>
          <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
        </button>

        <button 
          @click="toggleUserDropdown"
          type="button" 
          class="flex items-center justify-center w-8 h-8 bg-blue-600 rounded-full hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300 transition-colors duration-200"
          id="user-menu-button" 
          :aria-expanded="showUserDropdown"
        >
          <span class="text-white font-medium text-sm">
            {{ getUserInitials($page.props.auth.user.name) }}
          </span>
        </button>
        
        <!-- Dropdown menu -->
        <div 
          v-show="showUserDropdown"
          class="absolute right-0 top-12 z-50 w-56 bg-white divide-y divide-gray-100 rounded-lg shadow-lg border border-gray-200"
          id="user-dropdown"
        >
          <!-- User Info Header -->
          <div class="px-4 py-3">
            <div class="flex items-center space-x-3">
              <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center text-white font-medium">
                {{ getUserInitials($page.props.auth.user.name) }}
              </div>
              <div class="flex-1 min-w-0">
                <p class="text-sm font-medium text-gray-900 truncate">
                  {{ $page.props.auth.user.name }}
                </p>
                <p class="text-sm text-gray-500 truncate">
                  {{ $page.props.auth.user.email }}
                </p>
              </div>
            </div>
          </div>
          
          <!-- Menu Items -->
          <ul class="py-2 text-sm text-gray-700">
            <li>
              <Link 
                :href="route('profile.edit')" 
                class="block px-4 py-2 hover:bg-gray-100 transition-colors duration-200"
              >
                Profile Settings
              </Link>
            </li>
            <li>
              <a href="#" class="block px-4 py-2 hover:bg-gray-100 transition-colors duration-200">
                Preferences
              </a>
            </li>
            <li>
              <a href="#" class="block px-4 py-2 hover:bg-gray-100 transition-colors duration-200">
                Help & Support
              </a>
            </li>
          </ul>
          
          <!-- Sign Out -->
          <div class="py-2">
            <Link 
              :href="route('logout')" 
              method="post" 
              as="button"
              class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100 transition-colors duration-200"
            >
              Sign Out
            </Link>
          </div>
        </div>
      </div>
    </div>

    <!-- Mobile menu -->
    <div 
      v-show="showMobileMenu"
      class="w-full md:hidden bg-white border-t border-gray-200" 
      id="navbar-mobile"
    >
      <div class="px-4 py-4 space-y-3">
        <!-- Mobile Navigation Links -->
        <div class="space-y-1">
          <Link 
            :href="route('admin.dashboard')" 
            :class="[
              'block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200',
              route().current('admin.dashboard') 
                ? 'text-white bg-blue-600' 
                : 'text-gray-900 hover:bg-gray-100'
            ]"
          >
            Home
          </Link>
           <Link 
            :href="route('admin.assistance.index')" 
            :class="[
              'block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200',
              route().current('admin.assistance.index') 
                ? 'text-white bg-blue-600' 
                : 'text-gray-900 hover:bg-gray-100'
            ]"
          >
            manageRequests
          </Link>
           <Link 
            :href="route('admin.report.index')" 
            :class="[
              'block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200',
              route().current('admin.report.index') 
                ? 'text-white bg-blue-600' 
                : 'text-gray-900 hover:bg-gray-100'
            ]"
          >
            manageReports
          </Link>
          
          <!-- Mobile Feedback Section -->
          <div>
            <button 
              @click="toggleMobileFeedbackDropdown"
              :class="[
                'flex items-center justify-between w-full px-3 py-2 rounded-md text-base font-medium transition-colors duration-200',
                (route().current('admin.feedback.index') || route().current('admin.service.index'))
                  ? 'text-white bg-blue-600' 
                  : 'text-gray-900 hover:bg-gray-100'
              ]"
            >
              manageFeedback
              <svg 
                :class="[
                  'w-4 h-4 transition-transform duration-200',
                  showMobileFeedbackDropdown ? 'rotate-180' : ''
                ]" 
                fill="none" 
                stroke="currentColor" 
                viewBox="0 0 24 24"
              >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
              </svg>
            </button>
            
            <!-- Mobile Feedback Dropdown -->
            <div 
              v-show="showMobileFeedbackDropdown"
              class="ml-4 mt-1 space-y-1"
            >
              <Link 
                :href="route('admin.feedback.index')"
                :class="[
                  'block px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200',
                  route().current('admin.feedback.index')
                    ? 'text-white bg-blue-600'
                    : 'text-gray-700 hover:bg-gray-100'
                ]"
              >
                Service Feedback
              </Link>
              <Link 
                :href="route('admin.service.index')"
                :class="[
                  'block px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200',
                  route().current('admin.service.index')
                    ? 'text-white bg-blue-600'
                    : 'text-gray-700 hover:bg-gray-100'
                ]"
              >
                Experience Feedback
              </Link>
            </div>
          </div>
        </div>
        
        <!-- Mobile User Section -->
        <div class="border-t border-gray-200 pt-4 mt-4">
          <div class="flex items-center px-3 py-2 bg-gray-50 rounded-md">
            <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center text-white font-medium">
              {{ getUserInitials($page.props.auth.user.name) }}
            </div>
            <div class="ml-3 flex-1 min-w-0">
              <p class="text-sm font-medium text-gray-900 truncate">
                {{ $page.props.auth.user.name }}
              </p>
              <p class="text-sm text-gray-500 truncate">
                {{ $page.props.auth.user.email }}
              </p>
            </div>
          </div>
          
          <!-- Mobile User Menu -->
          <div class="mt-3 space-y-1">
            <Link 
              :href="route('profile.edit')" 
              class="block px-3 py-2 text-base font-medium text-gray-900 rounded-md hover:bg-gray-100 transition-colors duration-200"
            >
              Profile Settings
            </Link>
            <a href="#" class="block px-3 py-2 text-base font-medium text-gray-900 rounded-md hover:bg-gray-100 transition-colors duration-200">
              Preferences
            </a>
            <a href="#" class="block px-3 py-2 text-base font-medium text-gray-900 rounded-md hover:bg-gray-100 transition-colors duration-200">
              Help & Support
            </a>
            <Link 
              :href="route('logout')" 
              method="post" 
              as="button"
              class="block w-full text-left px-3 py-2 text-base font-medium text-red-600 rounded-md hover:bg-gray-100 transition-colors duration-200"
            >
              Sign Out
            </Link>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <main class="min-h-screen bg-gray-50">
    <slot />
  </main>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import { Link } from '@inertiajs/vue3';

const showMobileMenu = ref(false);
const showUserDropdown = ref(false);
const showFeedbackDropdown = ref(false);
const showMobileFeedbackDropdown = ref(false);

const toggleMobileMenu = () => {
  showMobileMenu.value = !showMobileMenu.value;
  if (showMobileMenu.value) {
    showUserDropdown.value = false;
    showFeedbackDropdown.value = false;
  }
};

const toggleUserDropdown = () => {
  showUserDropdown.value = !showUserDropdown.value;
  if (showUserDropdown.value) {
    showMobileMenu.value = false;
    showFeedbackDropdown.value = false;
  }
};

const toggleFeedbackDropdown = () => {
  showFeedbackDropdown.value = !showFeedbackDropdown.value;
  if (showFeedbackDropdown.value) {
    showUserDropdown.value = false;
  }
};

const toggleMobileFeedbackDropdown = () => {
  showMobileFeedbackDropdown.value = !showMobileFeedbackDropdown.value;
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
  if (!event.target.closest('.relative') || !event.target.closest('button')) {
    showFeedbackDropdown.value = false;
  }
};

onMounted(() => {
  document.addEventListener('click', handleClickOutside);
});

onUnmounted(() => {
  document.removeEventListener('click', handleClickOutside);
});
</script>