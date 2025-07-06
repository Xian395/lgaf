<template>
  <ResidentLayout>
    <div class="min-h-screen bg-gradient-to-br from-indigo-50 via-white to-cyan-50 relative overflow-hidden">
      <!-- Animated Background Elements -->
      <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 left-20 w-72 h-72 bg-gradient-to-r from-blue-400/20 to-purple-400/20 rounded-full mix-blend-multiply filter blur-xl animate-pulse"></div>
        <div class="absolute top-40 right-20 w-96 h-96 bg-gradient-to-r from-cyan-400/20 to-blue-400/20 rounded-full mix-blend-multiply filter blur-xl animate-pulse delay-1000"></div>
        <div class="absolute -bottom-20 left-40 w-80 h-80 bg-gradient-to-r from-purple-400/20 to-pink-400/20 rounded-full mix-blend-multiply filter blur-xl animate-pulse delay-2000"></div>
      </div>

      <div class="relative z-10 py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
          
         <!-- Hero Header -->
<div class="text-center mb-12 p-8">
    <!-- Government Logos Row -->
    <div class="flex items-center justify-center gap-12 mb-8">
        <!-- Philippine National Logo -->
        <div class="w-20 h-20 flex items-center justify-center overflow-hidden">
            <img src="/logo.png" alt="Philippine National Logo" class="w-25 h-25 object-contain">
        </div>

        <!-- Provincial Government Logo -->
        <div class="w-20 h-20 flex items-center justify-center overflow-hidden">
            <img src="/DILG.png" alt="Provincial Government Logo" class="w-25 h-25 object-contain">
        </div>

        <!-- Municipal Government Logo -->
        <div class="w-20 h-20 flex items-center justify-center overflow-hidden">
            <img src="/SEAL.png" alt="Municipal Government Logo" class="w-25 h-25 object-contain">
        </div>

        <!-- Local Barangay Logo -->
        <div class="w-20 h-20 flex items-center justify-center overflow-hidden">
            <img src="/DSWD.png" alt="Local Barangay Logo" class="w-25 h-25 object-contain">
        </div>
    </div>

    <h1 class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-indigo-600 via-purple-600 to-cyan-600 bg-clip-text text-transparent mb-4">
        Tubod Services Portal
    </h1>
    <p class="text-xl text-gray-600 max-w-2xl mx-auto">
        Your gateway to municipal services and community feedback
    </p>
</div>

          <!-- Stats Cards -->
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <div class="bg-white/70 backdrop-blur-sm p-6 shadow-xl border border-white/20 hover:shadow-2xl transition-all duration-300 hover:scale-105">
              <div class="flex items-center justify-between">
                <div>
                  <p class="text-sm font-medium text-gray-600">Available Services</p>
                  <p class="text-3xl font-bold text-indigo-600">5</p>
                </div>
                <div class="w-12 h-12 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-2xl flex items-center justify-center">
                  <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                  </svg>
                </div>
              </div>
            </div>
            
            <div class="bg-white/70 backdrop-blur-sm p-6 shadow-xl border border-white/20 hover:shadow-2xl transition-all duration-300 hover:scale-105">
              <div class="flex items-center justify-between">
                <div>
                  <p class="text-sm font-medium text-gray-600">Feedback Options</p>
                  <p class="text-3xl font-bold text-emerald-600">2</p>
                </div>
                <div class="w-12 h-12 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-2xl flex items-center justify-center">
                  <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-7 12h-2v-2h2v2zm0-4h-2V6h2v4z"/>
                  </svg>
                </div>
              </div>
            </div>
            
            <div class="bg-white/70 backdrop-blur-sm p-6 shadow-xl border border-white/20 hover:shadow-2xl transition-all duration-300 hover:scale-105">
              <div class="flex items-center justify-between">
                <div>
                  <p class="text-sm font-medium text-gray-600">Community Impact</p>
                  <p class="text-3xl font-bold text-pink-600">100%</p>
                </div>
                <div class="w-12 h-12 bg-gradient-to-r from-pink-500 to-rose-600 rounded-2xl flex items-center justify-center">
                  <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                  </svg>
                </div>
              </div>
            </div>
          </div>

          <!-- Main Action Cards -->
          <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
            <!-- General Feedback Card -->
            <div class="group relative">
              <div class="absolute inset-0 bg-gradient-to-r from-emerald-400 to-cyan-400 rounded-3xl blur opacity-20 group-hover:opacity-30 transition-opacity"></div>
              <div class="relative bg-white/80 backdrop-blur-sm shadow-2xl border border-white/20 overflow-hidden hover:shadow-3xl transition-all duration-500 hover:scale-105">
                <div class="bg-gradient-to-r from-emerald-500 to-teal-600 p-8 text-white relative overflow-hidden">
                  <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -mr-16 -mt-16"></div>
                  <div class="absolute bottom-0 left-0 w-24 h-24 bg-white/10 rounded-full -ml-12 -mb-12"></div>
                  <div class="relative z-10">
                    <div class="flex items-center justify-between mb-4">
                      <h3 class="text-2xl font-bold">General Feedback</h3>
                      <div class="w-14 h-14 bg-white/20 rounded-2xl flex items-center justify-center backdrop-blur-sm">
                        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24">
                          <path d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-7 12h-2v-2h2v2zm0-4h-2V6h2v4z"/>
                        </svg>
                      </div>
                    </div>
                    <p class="text-emerald-100 text-lg">Share your overall experience and help us improve</p>
                  </div>
                </div>
                <div class="p-8">
                  <div class="space-y-4 mb-6">
                    <div class="flex items-center text-gray-700">
                      <div class="w-8 h-8 bg-emerald-100 rounded-full flex items-center justify-center mr-3">
                        <svg class="w-4 h-4 text-emerald-600" fill="currentColor" viewBox="0 0 24 24">
                          <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                      </div>
                      <span>Rate your satisfaction level</span>
                    </div>
                    <div class="flex items-center text-gray-700">
                      <div class="w-8 h-8 bg-emerald-100 rounded-full flex items-center justify-center mr-3">
                        <svg class="w-4 h-4 text-emerald-600" fill="currentColor" viewBox="0 0 24 24">
                          <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                        </svg>
                      </div>
                      <span>Select services you've used</span>
                    </div>
                    <div class="flex items-center text-gray-700">
                      <div class="w-8 h-8 bg-emerald-100 rounded-full flex items-center justify-center mr-3">
                        <svg class="w-4 h-4 text-emerald-600" fill="currentColor" viewBox="0 0 24 24">
                          <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm5 11h-4v4h-2v-4H7v-2h4V7h2v4h4v2z"/>
                        </svg>
                      </div>
                      <span>Provide improvement suggestions</span>
                    </div>
                  </div>
                  <a href="/resident/feedback" class="group inline-flex items-center px-8 py-4 bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-semibold rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                    <span>Give Feedback</span>
                    <svg class="ml-3 w-5 h-5 transition-transform group-hover:translate-x-1" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/>
                    </svg>
                  </a>
                </div>
              </div>
            </div>

            <!-- Service Experience Card -->
            <div class="group relative">
              <div class="absolute inset-0 bg-gradient-to-r from-orange-400 to-pink-400 rounded-3xl blur opacity-20 group-hover:opacity-30 transition-opacity"></div>
              <div class="relative bg-white/80 backdrop-blur-sm shadow-2xl border border-white/20 overflow-hidden hover:shadow-3xl transition-all duration-500 hover:scale-105">
                <div class="bg-gradient-to-r from-orange-500 to-pink-600 p-8 text-white relative overflow-hidden">
                  <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -mr-16 -mt-16"></div>
                  <div class="absolute bottom-0 left-0 w-24 h-24 bg-white/10 rounded-full -ml-12 -mb-12"></div>
                  <div class="relative z-10">
                    <div class="flex items-center justify-between mb-4">
                      <h3 class="text-2xl font-bold">Service Experience</h3>
                      <div class="w-14 h-14 bg-white/20 rounded-2xl flex items-center justify-center backdrop-blur-sm">
                        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24">
                          <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                        </svg>
                      </div>
                    </div>
                    <p class="text-orange-100 text-lg">Rate your recent service interaction</p>
                  </div>
                </div>
                <div class="p-8">
                  <div class="space-y-4 mb-6">
                    <div class="flex items-center text-gray-700">
                      <div class="w-8 h-8 bg-orange-100 rounded-full flex items-center justify-center mr-3">
                        <svg class="w-4 h-4 text-orange-600" fill="currentColor" viewBox="0 0 24 24">
                          <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                      </div>
                      <span>Rate overall service quality</span>
                    </div>
                    <div class="flex items-center text-gray-700">
                      <div class="w-8 h-8 bg-orange-100 rounded-full flex items-center justify-center mr-3">
                        <svg class="w-4 h-4 text-orange-600" fill="currentColor" viewBox="0 0 24 24">
                          <path d="M16 4c0-1.11.89-2 2-2s2 .89 2 2-.89 2-2 2-2-.89-2-2zM4 18v-4h2v4h2v2H4c-1.1 0-2-.9-2-2zm0-6V6h2v6H4zm18 4h-2v-4h2v4zm-2-6V4h2v2h-2z"/>
                        </svg>
                      </div>
                      <span>Evaluate staff courtesy</span>
                    </div>
                    <div class="flex items-center text-gray-700">
                      <div class="w-8 h-8 bg-orange-100 rounded-full flex items-center justify-center mr-3">
                        <svg class="w-4 h-4 text-orange-600" fill="currentColor" viewBox="0 0 24 24">
                          <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/>
                        </svg>
                      </div>
                      <span>Rate service timing</span>
                    </div>
                  </div>
                  <a href="/resident/experience" class="group inline-flex items-center px-8 py-4 bg-gradient-to-r from-orange-600 to-pink-600 text-white font-semibold rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                    <span>Share Experience</span>
                    <svg class="ml-3 w-5 h-5 transition-transform group-hover:translate-x-1" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/>
                    </svg>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <!-- Services Grid -->
          <div class="bg-white/80 backdrop-blur-sm shadow-2xl border border-white/20 overflow-hidden">
            <div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 p-8 text-white relative overflow-hidden">
              <div class="absolute inset-0 bg-black/10"></div>
              <div class="relative z-10">
                <h2 class="text-3xl font-bold mb-2 flex items-center">
                  <svg class="w-8 h-8 mr-3" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                  </svg>
                  Municipal Services
                </h2>
                <p class="text-white/90 text-lg">Comprehensive services for Tubod residents</p>
              </div>
            </div>
            
            <div class="p-8">
              <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="group relative p-6 bg-gradient-to-br from-blue-50 to-indigo-100 rounded-2xl hover:shadow-xl transition-all duration-300 hover:scale-105">
                  <div class="absolute inset-0 bg-gradient-to-r from-blue-500/10 to-indigo-500/10 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                  <div class="relative">
                    <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                      <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                      </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Burial Services</h3>
                    <p class="text-gray-600">Compassionate support for burial arrangements and related services</p>
                  </div>
                </div>

                <div class="group relative p-6 bg-gradient-to-br from-green-50 to-emerald-100 rounded-2xl hover:shadow-xl transition-all duration-300 hover:scale-105">
                  <div class="absolute inset-0 bg-gradient-to-r from-green-500/10 to-emerald-500/10 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                  <div class="relative">
                    <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                      <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M11 9h2V6h3V4h-3V1h-2v3H8v2h3v3zm-4 9c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"/>
                      </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Food Supply</h3>
                    <p class="text-gray-600">Food assistance programs and distribution services</p>
                  </div>
                </div>

                <div class="group relative p-6 bg-gradient-to-br from-red-50 to-pink-100 rounded-2xl hover:shadow-xl transition-all duration-300 hover:scale-105">
                  <div class="absolute inset-0 bg-gradient-to-r from-red-500/10 to-pink-500/10 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                  <div class="relative">
                    <div class="w-16 h-16 bg-gradient-to-r from-red-500 to-pink-600 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                      <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19 8l-4 4h3c0 3.31-2.69 6-6 6-1.01 0-1.97-.25-2.8-.7l-1.46 1.46C8.97 19.54 10.43 20 12 20c4.42 0 8-3.58 8-8h3l-4-4z"/>
                      </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Medical Services</h3>
                    <p class="text-gray-600">Healthcare assistance and medical support programs</p>
                  </div>
                </div>

                <div class="group relative p-6 bg-gradient-to-br from-purple-50 to-violet-100 rounded-2xl hover:shadow-xl transition-all duration-300 hover:scale-105">
                  <div class="absolute inset-0 bg-gradient-to-r from-purple-500/10 to-violet-500/10 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                  <div class="relative">
                    <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-violet-600 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                      <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82zM12 3L1 9l11 6 9-4.91V17h2V9L12 3z"/>
                      </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Educational Assistance</h3>
                    <p class="text-gray-600">Educational support and scholarship programs</p>
                  </div>
                </div>

                <div class="group relative p-6 bg-gradient-to-br from-yellow-50 to-orange-100 rounded-2xl hover:shadow-xl transition-all duration-300 hover:scale-105">
                  <div class="absolute inset-0 bg-gradient-to-r from-yellow-500/10 to-orange-500/10 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                  <div class="relative">
                    <div class="w-16 h-16 bg-gradient-to-r from-yellow-500 to-orange-600 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                      <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M9 11H7v6h2v-6zm4 0h-2v6h2v-6zm4 0h-2v6h2v-6zm2.5-9H18V0h-2v2H8V0H6v2H3.5C2.67 2 2 2.67 2 3.5v1C2 5.33 2.67 6 3.5 6H20.5c.83 0 1.5-.67 1.5-1.5v-1C22 2.67 21.33 2 20.5 2z"/>
                      </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Senior Citizen Services</h3>
                    <p class="text-gray-600">Dedicated support and assistance for senior citizens</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Footer -->
          <div class="mt-12 text-center">
            <div class="bg-white/60 backdrop-blur-sm rounded-3xl p-8 border border-white/20">
              <h3 class="text-2xl font-bold text-gray-800 mb-4">Need Assistance?</h3>
              <p class="text-gray-600 mb-6 text-lg">
                We're here to help you navigate our services and address your concerns
              </p>
              <div class="flex flex-wrap items-center justify-center gap-8 text-sm">
                <div class="flex items-center bg-gradient-to-r from-green-500 to-emerald-600 text-white px-4 py-2 rounded-full">
                  <div class="w-3 h-3 bg-white rounded-full mr-2 animate-pulse"></div>
                  24/7 Support Available
                </div>
                <div class="flex items-center bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-4 py-2 rounded-full">
                  <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                  </svg>
                  Quick Response Time
                </div>
                <div class="flex items-center bg-gradient-to-r from-purple-500 to-pink-600 text-white px-4 py-2 rounded-full">
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
    </div>
  </ResidentLayout>
</template>

<script setup>
import ResidentLayout from '@/Layouts/ResidentLayout.vue';
</script>

<style scoped>
.hover\:shadow-3xl:hover {
  box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
}

@keyframes float {
  0%, 100% { transform: translateY(0px); }
  50% { transform: translateY(-10px); }
}

.animate-float {
  animation: float 3s ease-in-out infinite;
}
</style>