<!-- <template>
  <nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-sky-200/50 dark:bg-sky-900/80 dark:border-sky-700/50 shadow-lg transition-all duration-300">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      <Link :href="route('resident.dashboard')" class="flex items-center space-x-3 rtl:space-x-reverse group">
        <div class="relative">
          <ApplicationLogo class="h-10 w-10 transition-transform duration-300 group-hover:scale-110" />
          <div class="absolute -inset-1 bg-gradient-to-r from-sky-400 to-blue-500 rounded-full opacity-0 group-hover:opacity-20 transition-opacity duration-300 blur"></div>
        </div>
        <div class="flex flex-col">
          <span class="text-2xl font-bold bg-gradient-to-r from-sky-600 to-blue-600 bg-clip-text text-transparent dark:from-sky-300 dark:to-blue-300 transition-all duration-300">
            LGU Connect
          </span>
          <span class="text-xs text-sky-500 dark:text-sky-400 font-medium tracking-wider">
            Citizen Portal
          </span>
        </div>
      </Link>

      <button 
        @click="toggleMobileMenu"
        type="button" 
        class="relative inline-flex items-center p-3 w-12 h-12 justify-center text-sky-600 rounded-xl md:hidden hover:bg-sky-100 focus:outline-none focus:ring-2 focus:ring-sky-300 dark:text-sky-300 dark:hover:bg-sky-800 dark:focus:ring-sky-600 transition-all duration-300 group" 
        aria-controls="navbar-default" 
        :aria-expanded="showMobileMenu"
      >
        <span class="sr-only">Open main menu</span>
        <div class="relative w-6 h-6">
          <span 
            :class="[
              'absolute h-0.5 w-6 bg-current transform transition-all duration-300 ease-in-out',
              showMobileMenu ? 'rotate-45 translate-y-0' : '-translate-y-2'
            ]"
          ></span>
          <span 
            :class="[
              'absolute h-0.5 w-6 bg-current transform transition-all duration-300 ease-in-out',
              showMobileMenu ? 'opacity-0' : 'opacity-100'
            ]"
          ></span>
          <span 
            :class="[
              'absolute h-0.5 w-6 bg-current transform transition-all duration-300 ease-in-out',
              showMobileMenu ? '-rotate-45 translate-y-0' : 'translate-y-2'
            ]"
          ></span>
        </div>
      </button>

      <div class="hidden w-full md:block md:w-auto" id="navbar-default">
        <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-sky-200/50 rounded-2xl bg-sky-50/50 backdrop-blur-sm md:flex-row md:space-x-2 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-transparent dark:bg-sky-800/50 md:dark:bg-transparent dark:border-sky-700/50">
          <li class="relative">
            <Link 
              :href="route('resident.dashboard')" 
              :class="[
                'relative block py-3 px-4 rounded-xl font-semibold transition-all duration-300 group',
                route().current('resident.dashboard') 
                  ? 'text-white bg-gradient-to-r from-sky-500 to-blue-600 shadow-lg shadow-sky-500/25' 
                  : 'text-sky-700 hover:text-sky-900 hover:bg-sky-100/70 dark:text-sky-200 dark:hover:text-white dark:hover:bg-sky-700/50'
              ]"
              aria-current="page"
            >
              <div class="flex items-center space-x-2">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                </svg>
                <span>Dashboard</span>
              </div>
              <div v-if="!route().current('resident.dashboard')" class="absolute inset-0 rounded-xl bg-gradient-to-r from-sky-500 to-blue-600 opacity-0 group-hover:opacity-10 transition-opacity duration-300"></div>
            </Link>
          </li>
          
          <li class="relative">
            <Link 
              :href="route('resident.assistance.index')" 
              :class="[
                'relative block py-3 px-4 rounded-xl font-semibold transition-all duration-300 group',
                route().current('resident.assistance.index') 
                  ? 'text-white bg-gradient-to-r from-sky-500 to-blue-600 shadow-lg shadow-sky-500/25' 
                  : 'text-sky-700 hover:text-sky-900 hover:bg-sky-100/70 dark:text-sky-200 dark:hover:text-white dark:hover:bg-sky-700/50'
              ]"
            >
              <div class="flex items-center space-x-2">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                </svg>
                <span>Assistance</span>
              </div>
              <div v-if="!route().current('resident.assistance.index')" class="absolute inset-0 rounded-xl bg-gradient-to-r from-sky-500 to-blue-600 opacity-0 group-hover:opacity-10 transition-opacity duration-300"></div>
            </Link>
          </li>
          
          <li class="relative">
            <Link 
              :href="route('resident.feedback.index')" 
              :class="[
                'relative block py-3 px-4 rounded-xl font-semibold transition-all duration-300 group',
                route().current('resident.feedback.index') 
                  ? 'text-white bg-gradient-to-r from-sky-500 to-blue-600 shadow-lg shadow-sky-500/25' 
                  : 'text-sky-700 hover:text-sky-900 hover:bg-sky-100/70 dark:text-sky-200 dark:hover:text-white dark:hover:bg-sky-700/50'
              ]"
            >
              <div class="flex items-center space-x-2">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z" clip-rule="evenodd"/>
                </svg>
                <span>Feedback</span>
              </div>
              <div v-if="!route().current('resident.feedback.index')" class="absolute inset-0 rounded-xl bg-gradient-to-r from-sky-500 to-blue-600 opacity-0 group-hover:opacity-10 transition-opacity duration-300"></div>
            </Link>
          </li>
          
          <li class="relative">
            <Link 
              :href="route('resident.experience.index')" 
              :class="[
                'relative block py-3 px-4 rounded-xl font-semibold transition-all duration-300 group',
                route().current('resident.experience.index') 
                  ? 'text-white bg-gradient-to-r from-sky-500 to-blue-600 shadow-lg shadow-sky-500/25' 
                  : 'text-sky-700 hover:text-sky-900 hover:bg-sky-100/70 dark:text-sky-200 dark:hover:text-white dark:hover:bg-sky-700/50'
              ]"
            >
              <div class="flex items-center space-x-2">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                </svg>
                <span>Experience</span>
              </div>
              <div v-if="!route().current('resident.experience.index')" class="absolute inset-0 rounded-xl bg-gradient-to-r from-sky-500 to-blue-600 opacity-0 group-hover:opacity-10 transition-opacity duration-300"></div>
            </Link>
          </li>
          
          <li class="relative">
            <Link 
              :href="route('resident.about.index')" 
              :class="[
                'relative block py-3 px-4 rounded-xl font-semibold transition-all duration-300 group',
                route().current('resident.about.index') 
                  ? 'text-white bg-gradient-to-r from-sky-500 to-blue-600 shadow-lg shadow-sky-500/25' 
                  : 'text-sky-700 hover:text-sky-900 hover:bg-sky-100/70 dark:text-sky-200 dark:hover:text-white dark:hover:bg-sky-700/50'
              ]"
            >
              <div class="flex items-center space-x-2">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                </svg>
                <span>About</span>
              </div>
              <div v-if="!route().current('resident.about.index')" class="absolute inset-0 rounded-xl bg-gradient-to-r from-sky-500 to-blue-600 opacity-0 group-hover:opacity-10 transition-opacity duration-300"></div>
            </Link>
          </li>
        </ul>
      </div>

      <div class="hidden md:flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse relative">
        <button class="relative p-2 text-sky-600 rounded-xl hover:bg-sky-100 dark:text-sky-300 dark:hover:bg-sky-800 transition-all duration-300 group">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/>
          </svg>
          <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full animate-pulse"></span>
          <div class="absolute inset-0 rounded-xl bg-sky-500 opacity-0 group-hover:opacity-10 transition-opacity duration-300"></div>
        </button>

        <button 
          @click="toggleUserDropdown"
          type="button" 
          class="relative flex items-center justify-center w-10 h-10 bg-gradient-to-br from-sky-400 to-blue-600 rounded-xl hover:from-sky-500 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-sky-300 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105 group"
          id="user-menu-button" 
          :aria-expanded="showUserDropdown"
        >
          <div class="flex items-center justify-center w-full h-full text-white font-bold text-sm">
            {{ getUserInitials($page.props.auth.user.name) }}
          </div>
          <div class="absolute -inset-1 bg-gradient-to-r from-sky-400 to-blue-600 rounded-xl opacity-0 group-hover:opacity-30 transition-opacity duration-300 blur"></div>
        </button>
        
        <Transition
          enter-active-class="transition ease-out duration-200"
          enter-from-class="transform opacity-0 scale-95"
          enter-to-class="transform opacity-100 scale-100"
          leave-active-class="transition ease-in duration-150"
          leave-from-class="transform opacity-100 scale-100"
          leave-to-class="transform opacity-0 scale-95"
        >
          <div 
            v-show="showUserDropdown"
            class="absolute right-0 top-14 z-50 w-64 bg-white/95 backdrop-blur-md divide-y divide-gray-100 rounded-2xl shadow-2xl border border-gray-200/50 dark:bg-gray-800/95 dark:divide-gray-600 dark:border-gray-700/50" 
            id="user-dropdown"
          >
            <div class="px-4 py-4">
              <div class="flex items-center space-x-3">
                <div class="w-12 h-12 bg-gradient-to-br from-sky-400 to-blue-600 rounded-xl flex items-center justify-center text-white font-bold shadow-lg">
                  {{ getUserInitials($page.props.auth.user.name) }}
                </div>
                <div class="flex-1 min-w-0">
                  <p class="text-sm font-semibold text-gray-900 dark:text-white truncate">
                    {{ $page.props.auth.user.name }}
                  </p>
                  <p class="text-xs text-gray-500 dark:text-gray-400 truncate">
                    {{ $page.props.auth.user.email }}
                  </p>
                  <div class="flex items-center mt-1">
                    <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                    <span class="ml-2 text-xs text-green-600 dark:text-green-400 font-medium">Online</span>
                  </div>
                </div>
              </div>
            </div>
            
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
              <li>
                <Link 
                  :href="route('profile.edit')" 
                  class="flex items-center px-4 py-3 hover:bg-sky-50 dark:hover:bg-gray-700 transition-colors duration-200 group"
                >
                  <svg class="w-4 h-4 mr-3 text-gray-400 group-hover:text-sky-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                  </svg>
                  <span class="group-hover:text-sky-600 dark:group-hover:text-sky-400 font-medium">Profile Settings</span>
                </Link>
              </li>
              <li>
                <a href="#" class="flex items-center px-4 py-3 hover:bg-sky-50 dark:hover:bg-gray-700 transition-colors duration-200 group">
                  <svg class="w-4 h-4 mr-3 text-gray-400 group-hover:text-sky-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
                  </svg>
                  <span class="group-hover:text-sky-600 dark:group-hover:text-sky-400 font-medium">Preferences</span>
                </a>
              </li>
              <li>
                <a href="#" class="flex items-center px-4 py-3 hover:bg-sky-50 dark:hover:bg-gray-700 transition-colors duration-200 group">
                  <svg class="w-4 h-4 mr-3 text-gray-400 group-hover:text-sky-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                  </svg>
                  <span class="group-hover:text-sky-600 dark:group-hover:text-sky-400 font-medium">Help & Support</span>
                </a>
              </li>
            </ul>
            
            <div class="py-2">
              <Link 
                :href="route('logout')" 
                method="post" 
                as="button"
                class="flex items-center w-full px-4 py-3 text-sm text-red-600 hover:bg-red-50 dark:text-red-400 dark:hover:bg-red-900/20 transition-colors duration-200 group"
              >
                <svg class="w-4 h-4 mr-3" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"/>
                </svg>
                <span class="font-medium">Sign Out</span>
              </Link>
            </div>
          </div>
        </Transition>
      </div>
    </div>

    <Transition
      enter-active-class="transition-all duration-300 ease-out"
      enter-from-class="transform -translate-y-full opacity-0"
      enter-to-class="transform translate-y-0 opacity-100"
      leave-active-class="transition-all duration-300 ease-in"
      leave-from-class="transform translate-y-0 opacity-100"
      leave-to-class="transform -translate-y-full opacity-0"
    >
      <div 
        v-show="showMobileMenu"
        class="w-full md:hidden bg-white/95 backdrop-blur-md border-t border-sky-200/50 dark:bg-sky-800/95 dark:border-sky-700/50" 
        id="navbar-mobile"
      >
        <div class="px-4 py-6 space-y-3">
          <div class="space-y-2">
            <Link 
              :href="route('resident.dashboard')" 
              :class="[
                'flex items-center space-x-3 px-4 py-3 rounded-xl font-semibold transition-all duration-300',
                route().current('resident.dashboard') 
                  ? 'text-white bg-gradient-to-r from-sky-500 to-blue-600 shadow-lg' 
                  : 'text-sky-800 hover:bg-sky-100 dark:text-sky-100 dark:hover:bg-sky-700/50'
              ]"
            >
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
              </svg>
              <span>Dashboard</span>
            </Link>
            
            <Link 
              :href="route('resident.assistance.index')" 
              :class="[
                'flex items-center space-x-3 px-4 py-3 rounded-xl font-semibold transition-all duration-300',
                route().current('resident.assistance.index') 
                  ? 'text-white bg-gradient-to-r from-sky-500 to-blue-600 shadow-lg' 
                  : 'text-sky-800 hover:bg-sky-100 dark:text-sky-100 dark:hover:bg-sky-700/50'
              ]"
            >
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
              </svg>
              <span>Request Assistance</span>
            </Link>
            
            <Link 
              :href="route('resident.feedback.index')" 
              :class="[
                'flex items-center space-x-3 px-4 py-3 rounded-xl font-semibold transition-all duration-300',
                route().current('resident.feedback.index') 
                  ? 'text-white bg-gradient-to-r from-sky-500 to-blue-600 shadow-lg' 
                  : 'text-sky-800 hover:bg-sky-100 dark:text-sky-100 dark:hover:bg-sky-700/50'
              ]"
            >
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z" clip-rule="evenodd"/>
              </svg>
              <span>Feedback</span>
            </Link>
            
            <Link 
              :href="route('resident.experience.index')" 
              :class="[
                'flex items-center space-x-3 px-4 py-3 rounded-xl font-semibold transition-all duration-300',
                route().current('resident.experience.index') 
                  ? 'text-white bg-gradient-to-r from-sky-500 to-blue-600 shadow-lg' 
                  : 'text-sky-800 hover:bg-sky-100 dark:text-sky-100 dark:hover:bg-sky-700/50'
              ]"
            >
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
              </svg>
              <span>Service Experience</span>
            </Link>
            
            <Link 
              :href="route('resident.about.index')" 
              :class="[
                'flex items-center space-x-3 px-4 py-3 rounded-xl font-semibold transition-all duration-300',
                route().current('resident.about.index') 
                  ? 'text-white bg-gradient-to-r from-sky-500 to-blue-600 shadow-lg' 
                  : 'text-sky-800 hover:bg-sky-100 dark:text-sky-100 dark:hover:bg-sky-700/50'
              ]"
            >
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
              </svg>
              <span>About</span>
            </Link>
          </div>
          
          <div class="border-t border-sky-200 dark:border-sky-600 pt-4 mt-6">
            <div class="flex items-center space-x-4 px-4 py-3 bg-sky-50 dark:bg-sky-800/50 rounded-xl">
              <div class="w-12 h-12 bg-gradient-to-br from-sky-400 to-blue-600 rounded-xl flex items-center justify-center text-white font-bold shadow-lg">
                {{ getUserInitials($page.props.auth.user.name) }}
              </div>
              <div class="flex-1 min-w-0">
                <p class="text-sm font-semibold text-sky-800 dark:text-sky-100 truncate">
                  {{ $page.props.auth.user.name }}
                </p>
                <p class="text-xs text-sky-600 dark:text-sky-300 truncate">
                  {{ $page.props.auth.user.email }}
                </p>
                <div class="flex items-center mt-1">
                  <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                  <span class="ml-2 text-xs text-green-600 dark:text-green-400 font-medium">Online</span>
                </div>
              </div>
            </div>
            
            <div class="mt-4 space-y-2">
              <Link 
                :href="route('profile.edit')" 
                class="flex items-center space-x-3 px-4 py-3 text-sky-800 rounded-xl hover:bg-sky-100 dark:text-sky-100 dark:hover:bg-sky-700/50 transition-all duration-300"
              >
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                </svg>
                <span class="font-medium">Profile Settings</span>
              </Link>
              
              <a href="#" class="flex items-center space-x-3 px-4 py-3 text-sky-800 rounded-xl hover:bg-sky-100 dark:text-sky-100 dark:hover:bg-sky-700/50 transition-all duration-300">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
                </svg>
                <span class="font-medium">Preferences</span>
              </a>
              
              <a href="#" class="flex items-center space-x-3 px-4 py-3 text-sky-800 rounded-xl hover:bg-sky-100 dark:text-sky-100 dark:hover:bg-sky-700/50 transition-all duration-300">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                </svg>
                <span class="font-medium">Help & Support</span>
              </a>
              
              <Link 
                :href="route('logout')" 
                method="post" 
                as="button"
                class="flex items-center space-x-3 w-full px-4 py-3 text-red-600 rounded-xl hover:bg-red-50 dark:text-red-400 dark:hover:bg-red-900/20 transition-all duration-300"
              >
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"/>
                </svg>
                <span class="font-medium">Sign Out</span>
              </Link>
            </div>
          </div>
        </div>
      </div>
    </Transition>
  </nav>

  <main class="min-h-screen bg-gradient-to-br from-sky-50 via-white to-blue-50 dark:from-sky-900 dark:via-gray-900 dark:to-blue-900">
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

<style scoped>
#user-dropdown::-webkit-scrollbar {
  width: 4px;
}

#user-dropdown::-webkit-scrollbar-track {
  background: transparent;
}

#user-dropdown::-webkit-scrollbar-thumb {
  background: rgba(14, 165, 233, 0.3);
  border-radius: 2px;
}

#user-dropdown::-webkit-scrollbar-thumb:hover {
  background: rgba(14, 165, 233, 0.5);
}

.backdrop-blur-md {
  backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
}

.bg-clip-text {
  -webkit-background-clip: text;
  background-clip: text;
}
</style> -->


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
              :href="route('resident.feedback.index')" 
              :class="[
                'block py-2 px-3 rounded md:border-0 md:p-0 transition-colors duration-200',
                route().current('resident.feedback.index') 
                  ? 'text-white bg-blue-600 md:text-blue-600 md:bg-transparent' 
                  : 'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-600'
              ]"
            >
              Feedback
            </Link>
          </li>
          
          <li>
            <Link 
              :href="route('resident.experience.index')" 
              :class="[
                'block py-2 px-3 rounded md:border-0 md:p-0 transition-colors duration-200',
                route().current('resident.experience.index') 
                  ? 'text-white bg-blue-600 md:text-blue-600 md:bg-transparent' 
                  : 'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-600'
              ]"
            >
              Experience
            </Link>
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
        <!-- Notifications Button -->
          <Link 
              :href="route('resident.myrequest.index')" 
              :class="[
                'block py-2 px-3 rounded md:border-0 md:p-0 transition-colors duration-200',
                route().current('resident.myrequest.index') 
                  ? 'text-white bg-blue-600 md:text-blue-600 md:bg-transparent' 
                  : 'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-600'
              ]"
            >
              myRequest
            </Link>
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
            Request Assistance
          </Link>
          
          <Link 
            :href="route('resident.feedback.index')" 
            :class="[
              'block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200',
              route().current('resident.feedback.index') 
                ? 'text-white bg-blue-600' 
                : 'text-gray-900 hover:bg-gray-100'
            ]"
          >
            Feedback
          </Link>
          
          <Link 
            :href="route('resident.experience.index')" 
            :class="[
              'block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200',
              route().current('resident.experience.index') 
                ? 'text-white bg-blue-600' 
                : 'text-gray-900 hover:bg-gray-100'
            ]"
          >
            Service Experience
          </Link>
          
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
            myRequest
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