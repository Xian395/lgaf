<template>
  <ResidentLayout>
    <template #header>
      <div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-blue-600 p-6 text-white relative overflow-hidden">
        <div class="absolute inset-0 bg-black/10"></div>
        <div class="relative z-10">
          <h2 class="font-bold text-2xl text-white leading-tight flex items-center">
            <svg class="w-8 h-8 mr-3" fill="currentColor" viewBox="0 0 24 24">
              <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
            </svg>
            Resident Dashboard
          </h2>
          <p class="text-white/80 mt-2">Welcome back! Manage your services and provide feedback.</p>
        </div>
      </div>
    </template>

    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 py-8 px-4 sm:px-6 lg:px-8">
      <!-- Floating particles background -->
      <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/4 left-1/4 w-2 h-2 bg-blue-300 rounded-full opacity-20 animate-pulse"></div>
        <div class="absolute top-1/3 right-1/3 w-3 h-3 bg-indigo-300 rounded-full opacity-30 animate-bounce"></div>
        <div class="absolute bottom-1/4 left-1/3 w-1 h-1 bg-purple-300 rounded-full opacity-40 animate-ping"></div>
        <div class="absolute top-2/3 left-1/2 w-2 h-2 bg-purple-300 rounded-full opacity-25 animate-pulse"></div>
        <div class="absolute bottom-1/3 right-1/4 w-1 h-1 bg-blue-300 rounded-full opacity-30 animate-ping"></div>
      </div>

      <div class="relative max-w-7xl mx-auto">
        <!-- Welcome Card -->
        <div class="bg-white/80 backdrop-blur-sm shadow-2xl rounded-3xl border border-white/20 overflow-hidden mb-8 transition-all duration-500 hover:shadow-3xl">
          <div class="p-8 lg:p-12">
            <div class="flex items-center justify-between mb-6">
              <div>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">
                  Welcome to Tubod Services! 🏛️
                </h1>
                <p class="text-lg text-gray-600">
                  You're logged in as a resident. Access your services and share your feedback with us.
                </p>
              </div>
              <div class="hidden md:block">
                <div class="w-24 h-24 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center">
                  <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                  </svg>
                </div>
              </div>
            </div>
            
            <!-- Quick Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
              <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-6 rounded-2xl text-white">
                <div class="flex items-center justify-between">
                  <div>
                    <p class="text-blue-100 text-sm font-medium">Services Available</p>
                    <p class="text-3xl font-bold">5</p>
                  </div>
                  <svg class="w-8 h-8 text-blue-200" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                  </svg>
                </div>
              </div>
              
              <div class="bg-gradient-to-r from-purple-500 to-purple-600 p-6 rounded-2xl text-white">
                <div class="flex items-center justify-between">
                  <div>
                    <p class="text-purple-100 text-sm font-medium">Feedback Forms</p>
                    <p class="text-3xl font-bold">2</p>
                  </div>
                  <svg class="w-8 h-8 text-purple-200" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-7 12h-2v-2h2v2zm0-4h-2V6h2v4z"/>
                  </svg>
                </div>
              </div>
              
              <div class="bg-gradient-to-r from-indigo-500 to-indigo-600 p-6 rounded-2xl text-white">
                <div class="flex items-center justify-between">
                  <div>
                    <p class="text-indigo-100 text-sm font-medium">Your Impact</p>
                    <p class="text-3xl font-bold">100%</p>
                  </div>
                  <svg class="w-8 h-8 text-indigo-200" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Main Action Cards -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
          <!-- General Feedback Card -->
          <div class="bg-white/80 backdrop-blur-sm shadow-2xl rounded-3xl border border-white/20 overflow-hidden transition-all duration-500 hover:shadow-3xl group hover:scale-105">
            <div class="bg-gradient-to-r from-green-500 to-emerald-600 p-6 text-white">
              <div class="flex items-center justify-between">
                <div>
                  <h3 class="text-2xl font-bold mb-2">General Feedback</h3>
                  <p class="text-green-100">Share your overall experience with our services</p>
                </div>
                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm">
                  <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-7 12h-2v-2h2v2zm0-4h-2V6h2v4z"/>
                  </svg>
                </div>
              </div>
            </div>
            <div class="p-8">
              <div class="space-y-4">
                <div class="flex items-center text-gray-600">
                  <svg class="w-5 h-5 mr-3 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                  </svg>
                  Rate your satisfaction
                </div>
                <div class="flex items-center text-gray-600">
                  <svg class="w-5 h-5 mr-3 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                  </svg>
                  Select services used
                </div>
                <div class="flex items-center text-gray-600">
                  <svg class="w-5 h-5 mr-3 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                  </svg>
                  Provide suggestions
                </div>
              </div>
              <div class="mt-8">
                <a href="/resident/feedback" class="group inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-600 to-emerald-600 text-white font-semibold rounded-2xl transition-all duration-300 hover:from-green-700 hover:to-emerald-700 hover:shadow-lg">
                  <span>Give Feedback</span>
                  <svg class="ml-2 w-5 h-5 transition-transform group-hover:translate-x-1" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/>
                  </svg>
                </a>
              </div>
            </div>
          </div>

          <!-- Service Experience Card -->
          <div class="bg-white/80 backdrop-blur-sm shadow-2xl rounded-3xl border border-white/20 overflow-hidden transition-all duration-500 hover:shadow-3xl group hover:scale-105">
            <div class="bg-gradient-to-r from-orange-500 to-red-500 p-6 text-white">
              <div class="flex items-center justify-between">
                <div>
                  <h3 class="text-2xl font-bold mb-2">Service Experience</h3>
                  <p class="text-orange-100">Rate your recent service interaction</p>
                </div>
                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm">
                  <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                  </svg>
                </div>
              </div>
            </div>
            <div class="p-8">
              <div class="space-y-4">
                <div class="flex items-center text-gray-600">
                  <svg class="w-5 h-5 mr-3 text-orange-500" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                  </svg>
                  Rate overall service
                </div>
                <div class="flex items-center text-gray-600">
                  <svg class="w-5 h-5 mr-3 text-orange-500" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                  </svg>
                  Staff courtesy feedback
                </div>
                <div class="flex items-center text-gray-600">
                  <svg class="w-5 h-5 mr-3 text-orange-500" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                  </svg>
                  Service time evaluation
                </div>
              </div>
              <div class="mt-8">
                <a href="/resident/experience" class="group inline-flex items-center px-6 py-3 bg-gradient-to-r from-orange-600 to-red-600 text-white font-semibold rounded-2xl transition-all duration-300 hover:from-orange-700 hover:to-red-700 hover:shadow-lg">
                  <span>Share Experience</span>
                  <svg class="ml-2 w-5 h-5 transition-transform group-hover:translate-x-1" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/>
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>

        <!-- Services Section -->
        <div class="bg-white/80 backdrop-blur-sm shadow-2xl rounded-3xl border border-white/20 overflow-hidden transition-all duration-500 hover:shadow-3xl">
          <div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-blue-600 p-6 text-white relative overflow-hidden">
            <div class="absolute inset-0 bg-black/10"></div>
            <div class="relative z-10">
              <h3 class="text-2xl font-bold mb-2 flex items-center">
                <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                </svg>
                Available Services
              </h3>
              <p class="text-white/80">Services provided by the Municipality of Tubod</p>
            </div>
          </div>
          <div class="p-8 lg:p-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
              <div class="group p-6 border-2 border-gray-200 rounded-2xl transition-all duration-300 hover:border-indigo-300 hover:shadow-lg hover:scale-105 bg-gradient-to-br from-blue-50 to-indigo-50">
                <div class="flex items-center mb-4">
                  <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                    <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg>
                  </div>
                  <h4 class="text-lg font-semibold text-gray-800">Burial Services</h4>
                </div>
                <p class="text-gray-600 text-sm">Support for burial arrangements and related services.</p>
              </div>

              <div class="group p-6 border-2 border-gray-200 rounded-2xl transition-all duration-300 hover:border-green-300 hover:shadow-lg hover:scale-105 bg-gradient-to-br from-green-50 to-emerald-50">
                <div class="flex items-center mb-4">
                  <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-4">
                    <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M11 9h2V6h3V4h-3V1h-2v3H8v2h3v3zm-4 9c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2zm-9.83-3.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03L21.7 4H5.21l-.94-2H1v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.13 0-.25-.11-.25-.25z"/>
                    </svg>
                  </div>
                  <h4 class="text-lg font-semibold text-gray-800">Food Supply</h4>
                </div>
                <p class="text-gray-600 text-sm">Food assistance programs and supply distribution.</p>
              </div>

              <div class="group p-6 border-2 border-gray-200 rounded-2xl transition-all duration-300 hover:border-red-300 hover:shadow-lg hover:scale-105 bg-gradient-to-br from-red-50 to-pink-50">
                <div class="flex items-center mb-4">
                  <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mr-4">
                    <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M19 8l-4 4h3c0 3.31-2.69 6-6 6-1.01 0-1.97-.25-2.8-.7l-1.46 1.46C8.97 19.54 10.43 20 12 20c4.42 0 8-3.58 8-8h3l-4-4zM6 12c0-3.31 2.69-6 6-6 1.01 0 1.97.25 2.8.7l1.46-1.46C15.03 4.46 13.57 4 12 4c-4.42 0-8 3.58-8 8H1l4 4 4-4H6z"/>
                    </svg>
                  </div>
                  <h4 class="text-lg font-semibold text-gray-800">Medical Services</h4>
                </div>
                <p class="text-gray-600 text-sm">Healthcare assistance and medical support services.</p>
              </div>

              <div class="group p-6 border-2 border-gray-200 rounded-2xl transition-all duration-300 hover:border-purple-300 hover:shadow-lg hover:scale-105 bg-gradient-to-br from-purple-50 to-violet-50">
                <div class="flex items-center mb-4">
                  <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mr-4">
                    <svg class="w-6 h-6 text-purple-600" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82zM12 3L1 9l11 6 9-4.91V17h2V9L12 3z"/>
                    </svg>
                  </div>
                  <h4 class="text-lg font-semibold text-gray-800">Educational Assistance</h4>
                </div>
                <p class="text-gray-600 text-sm">Educational support and scholarship programs.</p>
              </div>

              <div class="group p-6 border-2 border-gray-200 rounded-2xl transition-all duration-300 hover:border-orange-300 hover:shadow-lg hover:scale-105 bg-gradient-to-br from-orange-50 to-amber-50">
                <div class="flex items-center mb-4">
                  <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center mr-4">
                    <svg class="w-6 h-6 text-orange-600" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M9 11H7v6h2v-6zm4 0h-2v6h2v-6zm4 0h-2v6h2v-6zm2.5-9H18V0h-2v2H8V0H6v2H3.5C2.67 2 2 2.67 2 3.5v1C2 5.33 2.67 6 3.5 6H20.5c.83 0 1.5-.67 1.5-1.5v-1C22 2.67 21.33 2 20.5 2zM3.5 19H20.5c.83 0 1.5-.67 1.5-1.5V7H2v10.5c0 .83.67 1.5 1.5 1.5z"/>
                    </svg>
                  </div>
                  <h4 class="text-lg font-semibold text-gray-800">Senior Citizen Services</h4>
                </div>
                <p class="text-gray-600 text-sm">Support and assistance programs for senior citizens.</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Footer Section -->
        <div class="mt-8 text-center">
          <div class="bg-white/60 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
            <p class="text-gray-600 mb-4">
              Have questions or need assistance? We're here to help!
            </p>
            <div class="flex items-center justify-center space-x-6 text-sm text-gray-500">
              <div class="flex items-center">
                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                </svg>
                24/7 Support
              </div>
              <div class="flex items-center">
                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.89 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                </svg>
                Quick Response
              </div>
              <div class="flex items-center">
                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
                Quality Service
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </ResidentLayout>
</template>

<script setup>
import ResidentLayout from '@/Layouts/ResidentLayout.vue';
</script>

<style scoped>
.hover\:shadow-3xl:hover {
  box-shadow: 0 35px 60px -12px rgba(0, 0, 0, 0.25);
}
</style>