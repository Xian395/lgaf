<template>
  <nav class="sticky top-0 z-50 bg-white border-b border-gray-200 shadow-sm">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      <!-- Logo -->
      <Link :href="route('resident.dashboard')" class="flex items-center space-x-3">
        <img src="/logo.png" alt="LGU Connect Logo" class="h-10 w-10" />
        <div class="flex flex-col">
          <span class="text-xl font-bold text-blue-600">
            LGU Connect
          </span>
          <span class="text-xs text-gray-500 font-medium">
            Citizen Portal
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
              :href="route('resident.dashboard')" 
              :class="[
                'block py-2 px-3 rounded md:border-0 md:p-0 transition-colors duration-200',
                route().current('resident.dashboard') 
                  ? 'text-white bg-blue-600 md:text-blue-600 md:bg-transparent' 
                  : 'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-600'
              ]"
              aria-current="page"
            >
              Dashboard
            </Link>
          </li>
          
          <li>
            <Link 
              :href="route('resident.assistance.index')" 
              :class="[
                'block py-2 px-3 rounded md:border-0 md:p-0 transition-colors duration-200',
                route().current('resident.assistance.index') 
                  ? 'text-white bg-blue-600 md:text-blue-600 md:bg-transparent' 
                  : 'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-600'
              ]"
            >
              Assistance
            </Link>
          </li>
          
          <li>
            <Link 
              :href="route('resident.report.index')" 
              :class="[
                'block py-2 px-3 rounded md:border-0 md:p-0 transition-colors duration-200',
                route().current('resident.report.index') 
                  ? 'text-white bg-blue-600 md:text-blue-600 md:bg-transparent' 
                  : 'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-600'
              ]"
            >
              Report Issue
            </Link>
          </li>
          
          <!-- Feedback Dropdown -->
          <li class="relative">
            <button 
              @click="toggleFeedbackDropdown"
              :class="[
                'flex items-center justify-between w-full py-2 px-3 rounded md:border-0 md:p-0 md:hover:bg-transparent transition-colors duration-200',
                (route().current('resident.feedback.index') || route().current('resident.experience.index'))
                  ? 'text-white bg-blue-600 md:text-blue-600 md:bg-transparent' 
                  : 'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-600'
              ]"
              aria-expanded="false"
            >
              Feedback
              <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
              </svg>
            </button>
            
            <!-- Dropdown menu -->
            <div 
              v-show="showFeedbackDropdown"
              class="absolute top-full left-0 z-10 bg-white divide-y divide-gray-100 rounded-lg shadow-lg w-44 border border-gray-200 mt-1"
            >
              <ul class="py-2 text-sm text-gray-700">
                <li>
                  <Link 
                    :href="route('resident.feedback.index')" 
                    class="block px-4 py-2 hover:bg-gray-100 transition-colors duration-200"
                  >
                    Service Feedback
                  </Link>
                </li>
                <li>
                  <Link 
                    :href="route('resident.experience.index')" 
                    class="block px-4 py-2 hover:bg-gray-100 transition-colors duration-200"
                  >
                    Experience Feedback
                  </Link>
                </li>
              </ul>
            </div>
          </li>
          
          <li>
            <Link 
              :href="route('resident.about.index')" 
              :class="[
                'block py-2 px-3 rounded md:border-0 md:p-0 transition-colors duration-200',
                route().current('resident.about.index') 
                  ? 'text-white bg-blue-600 md:text-blue-600 md:bg-transparent' 
                  : 'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-600'
              ]"
            >
              About
            </Link>
          </li>
        </ul>
      </div>

      <!-- User dropdown -->
      <div class="hidden md:flex items-center md:order-2 space-x-3 relative">
        <!-- My Requests Link -->
        <Link 
          :href="route('resident.myrequest.index')" 
          :class="[
            'block py-2 px-3 rounded md:border-0 md:p-0 transition-colors duration-200',
            route().current('resident.myrequest.index') 
              ? 'text-white bg-blue-600 md:text-blue-600 md:bg-transparent' 
              : 'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-600'
          ]"
        >
          myRequests
        </Link>
        
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
        
        <!-- User Dropdown menu -->
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
            :href="route('resident.dashboard')" 
            :class="[
              'block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200',
              route().current('resident.dashboard') 
                ? 'text-white bg-blue-600' 
                : 'text-gray-900 hover:bg-gray-100'
            ]"
          >
            Dashboard
          </Link>
          
          <Link 
            :href="route('resident.assistance.index')" 
            :class="[
              'block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200',
              route().current('resident.assistance.index') 
                ? 'text-white bg-blue-600' 
                : 'text-gray-900 hover:bg-gray-100'
            ]"
          >
            Assistance
          </Link>
          
          <Link 
            :href="route('resident.report.index')" 
            :class="[
              'block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200',
              route().current('resident.report.index') 
                ? 'text-white bg-blue-600' 
                : 'text-gray-900 hover:bg-gray-100'
            ]"
          >
            Report Issue
          </Link>
          
          <!-- Mobile Feedback Section -->
          <div>
            <button 
              @click="toggleMobileFeedbackDropdown"
              :class="[
                'flex items-center justify-between w-full px-3 py-2 rounded-md text-base font-medium transition-colors duration-200',
                (route().current('resident.feedback.index') || route().current('resident.experience.index'))
                  ? 'text-white bg-blue-600' 
                  : 'text-gray-900 hover:bg-gray-100'
              ]"
            >
              Feedback
              <svg 
                :class="[
                  'w-4 h-4 transition-transform duration-200',
                  showMobileFeedbackDropdown ? 'rotate-180' : ''
                ]" 
                fill="currentColor" 
                viewBox="0 0 20 20"
              >
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
              </svg>
            </button>
            
            <div v-show="showMobileFeedbackDropdown" class="ml-4 mt-1 space-y-1">
              <Link 
                :href="route('resident.feedback.index')" 
                :class="[
                  'block px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200',
                  route().current('resident.feedback.index') 
                    ? 'text-white bg-blue-600' 
                    : 'text-gray-700 hover:bg-gray-100'
                ]"
              >
                Service Feedback
              </Link>
              
              <Link 
                :href="route('resident.experience.index')" 
                :class="[
                  'block px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200',
                  route().current('resident.experience.index') 
                    ? 'text-white bg-blue-600' 
                    : 'text-gray-700 hover:bg-gray-100'
                ]"
              >
                Service Experience
              </Link>
            </div>
          </div>
          
          <Link 
            :href="route('resident.about.index')" 
            :class="[
              'block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200',
              route().current('resident.about.index') 
                ? 'text-white bg-blue-600' 
                : 'text-gray-900 hover:bg-gray-100'
            ]"
          >
            About
          </Link>
          
          <Link 
            :href="route('resident.myrequest.index')" 
            :class="[
              'block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200',
              route().current('resident.myrequest.index') 
                ? 'text-white bg-blue-600' 
                : 'text-gray-900 hover:bg-gray-100'
            ]"
          >
            myRequests
          </Link>
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
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
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
    showMobileMenu.value = false;
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
  // Close user dropdown
  if (!event.target.closest('#user-menu-button') && !event.target.closest('#user-dropdown')) {
    showUserDropdown.value = false;
  }
  
  // Close feedback dropdown
  if (!event.target.closest('button[aria-expanded]') && !event.target.closest('.absolute')) {
    showFeedbackDropdown.value = false;
  }
  
  // Close mobile menu
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