<template>
  <ResidentLayout>
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
        <!-- Header Section -->
        <div class="bg-white/80 backdrop-blur-sm shadow-2xl rounded-3xl border border-white/20 overflow-hidden mb-8 transition-all duration-500 hover:shadow-3xl">
          <div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-blue-600 p-8 lg:p-12 text-white relative overflow-hidden">
            <div class="absolute inset-0 bg-black/10"></div>
            <div class="relative z-10 text-center">
              <div class="w-24 h-24 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-6 backdrop-blur-sm">
                <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
              </div>
              <h1 class="text-4xl font-bold mb-4">About Tubod Services</h1>
              <p class="text-xl text-white/90 max-w-3xl mx-auto">
                Discover our commitment to serving the residents of Tubod with excellence, transparency, and dedication to community development.
              </p>
            </div>
          </div>
        </div>

        <!-- Mission & Vision Cards -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
          <!-- Mission Card -->
          <div class="bg-white/80 backdrop-blur-sm shadow-2xl rounded-3xl border border-white/20 overflow-hidden transition-all duration-500 hover:shadow-3xl group hover:scale-105">
            <div class="bg-gradient-to-r from-emerald-500 to-teal-600 p-6 text-white">
              <div class="flex items-center justify-between">
                <div>
                  <h3 class="text-2xl font-bold mb-2">Our Mission</h3>
                  <p class="text-emerald-100">Serving our community with dedication</p>
                </div>
                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm">
                  <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                  </svg>
                </div>
              </div>
            </div>
            <div class="p-8">
              <p class="text-gray-700 text-lg leading-relaxed">
                To provide accessible, efficient, and quality services to all residents of Tubod, fostering community growth, 
                social welfare, and sustainable development through responsive governance and inclusive participation.
              </p>
              <div class="mt-6 space-y-3">
                <div class="flex items-center text-gray-600">
                  <svg class="w-5 h-5 mr-3 text-emerald-500" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                  </svg>
                  Accessible public services
                </div>
                <div class="flex items-center text-gray-600">
                  <svg class="w-5 h-5 mr-3 text-emerald-500" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                  </svg>
                  Community-centered approach
                </div>
                <div class="flex items-center text-gray-600">
                  <svg class="w-5 h-5 mr-3 text-emerald-500" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                  </svg>
                  Sustainable development
                </div>
              </div>
            </div>
          </div>

          <!-- Vision Card -->
          <div class="bg-white/80 backdrop-blur-sm shadow-2xl rounded-3xl border border-white/20 overflow-hidden transition-all duration-500 hover:shadow-3xl group hover:scale-105">
            <div class="bg-gradient-to-r from-violet-500 to-purple-600 p-6 text-white">
              <div class="flex items-center justify-between">
                <div>
                  <h3 class="text-2xl font-bold mb-2">Our Vision</h3>
                  <p class="text-violet-100">Building a thriving community</p>
                </div>
                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm">
                  <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                  </svg>
                </div>
              </div>
            </div>
            <div class="p-8">
              <p class="text-gray-700 text-lg leading-relaxed">
                To be a model municipality recognized for excellent public service delivery, vibrant community life, 
                and progressive development that ensures every resident enjoys a high quality of life in a safe and prosperous environment.
              </p>
              <div class="mt-6 space-y-3">
                <div class="flex items-center text-gray-600">
                  <svg class="w-5 h-5 mr-3 text-violet-500" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                  </svg>
                  Excellence in service delivery
                </div>
                <div class="flex items-center text-gray-600">
                  <svg class="w-5 h-5 mr-3 text-violet-500" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                  </svg>
                  Progressive community development
                </div>
                <div class="flex items-center text-gray-600">
                  <svg class="w-5 h-5 mr-3 text-violet-500" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                  </svg>
                  Safe and prosperous environment
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Core Values Section -->
        <div class="bg-white/80 backdrop-blur-sm shadow-2xl rounded-3xl border border-white/20 overflow-hidden mb-8 transition-all duration-500 hover:shadow-3xl">
          <div class="bg-gradient-to-r from-amber-500 to-orange-600 p-6 text-white relative overflow-hidden">
            <div class="absolute inset-0 bg-black/10"></div>
            <div class="relative z-10">
              <h3 class="text-2xl font-bold mb-2 flex items-center">
                <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
                Our Core Values
              </h3>
              <p class="text-amber-100">The principles that guide our service to the community</p>
            </div>
          </div>
          <div class="p-8 lg:p-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
              <div class="group text-center p-6 border-2 border-gray-200 rounded-2xl transition-all duration-300 hover:border-blue-300 hover:shadow-lg hover:scale-105 bg-gradient-to-br from-blue-50 to-indigo-50">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                  <svg class="w-8 h-8 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                  </svg>
                </div>
                <h4 class="text-lg font-semibold text-gray-800 mb-2">Integrity</h4>
                <p class="text-gray-600 text-sm">Maintaining honesty and transparency in all our actions</p>
              </div>

              <div class="group text-center p-6 border-2 border-gray-200 rounded-2xl transition-all duration-300 hover:border-green-300 hover:shadow-lg hover:scale-105 bg-gradient-to-br from-green-50 to-emerald-50">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                  <svg class="w-8 h-8 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm-1 16H9V7h9v14z"/>
                  </svg>
                </div>
                <h4 class="text-lg font-semibold text-gray-800 mb-2">Accountability</h4>
                <p class="text-gray-600 text-sm">Taking responsibility for our decisions and their outcomes</p>
              </div>

              <div class="group text-center p-6 border-2 border-gray-200 rounded-2xl transition-all duration-300 hover:border-purple-300 hover:shadow-lg hover:scale-105 bg-gradient-to-br from-purple-50 to-violet-50">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                  <svg class="w-8 h-8 text-purple-600" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M16 4c0-1.11.89-2 2-2s2 .89 2 2-.89 2-2 2-2-.89-2-2zm4 18v-6h2.5l-2.54-7.63A1.5 1.5 0 0 0 18.5 7.5h-1A1.5 1.5 0 0 0 16 9v6.5c0 .83.67 1.5 1.5 1.5H18v5h2zm-7.5-10.5c.83 0 1.5-.67 1.5-1.5s-.67-1.5-1.5-1.5S11 9.17 11 10s.67 1.5 1.5 1.5zM5.5 6c1.11 0 2-.89 2-2s-.89-2-2-2-2 .89-2 2 .89 2 2 2zm2.5 16v-6H6V9c0-.83.67-1.5 1.5-1.5h2c.83 0 1.5.67 1.5 1.5v7h-2v6H8z"/>
                  </svg>
                </div>
                <h4 class="text-lg font-semibold text-gray-800 mb-2">Excellence</h4>
                <p class="text-gray-600 text-sm">Striving for the highest quality in all services we provide</p>
              </div>

              <div class="group text-center p-6 border-2 border-gray-200 rounded-2xl transition-all duration-300 hover:border-red-300 hover:shadow-lg hover:scale-105 bg-gradient-to-br from-red-50 to-pink-50">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                  <svg class="w-8 h-8 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                  </svg>
                </div>
                <h4 class="text-lg font-semibold text-gray-800 mb-2">Compassion</h4>
                <p class="text-gray-600 text-sm">Serving with empathy and understanding for all residents</p>
              </div>
            </div>
          </div>
        </div>

        <!-- History & Background Section -->
        <div class="bg-white/80 backdrop-blur-sm shadow-2xl rounded-3xl border border-white/20 overflow-hidden mb-8 transition-all duration-500 hover:shadow-3xl">
          <div class="p-8 lg:p-12">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
              <div>
                <h3 class="text-3xl font-bold text-gray-800 mb-6 flex items-center">
                  <svg class="w-8 h-8 mr-3 text-indigo-600" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                  </svg>
                  Our Story
                </h3>
                <div class="space-y-4 text-gray-700">
                  <p class="text-lg leading-relaxed">
                    The Municipality of Tubod has been serving its residents with dedication and commitment for decades. 
                    Our journey began with a simple mission: to create a community where every resident can thrive and prosper.
                  </p>
                  <p>
                    Over the years, we have evolved and adapted to meet the changing needs of our community, 
                    embracing technology and innovation while maintaining our core values of service, integrity, and compassion.
                  </p>
                  <p>
                    Today, we continue to build on this legacy, working tirelessly to provide accessible, efficient, 
                    and quality services that improve the lives of all Tubod residents.
                  </p>
                </div>
              </div>
              <div class="relative">
                <div class="bg-gradient-to-br from-indigo-500 to-purple-600 rounded-3xl p-8 text-white shadow-2xl">
                  <div class="text-center">
                    <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-6 backdrop-blur-sm">
                      <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                      </svg>
                    </div>
                    <h4 class="text-2xl font-bold mb-4">Serving with Pride</h4>
                    <p class="text-lg text-white/90 mb-6">
                      Every service we provide reflects our commitment to excellence and community development.
                    </p>
                    <div class="grid grid-cols-2 gap-4 text-sm">
                      <div class="text-center">
                        <div class="text-2xl font-bold">5</div>
                        <div class="text-white/80">Core Services</div>
                      </div>
                      <div class="text-center">
                        <div class="text-2xl font-bold">24/7</div>
                        <div class="text-white/80">Support</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Contact Information -->
        <div class="bg-white/80 backdrop-blur-sm shadow-2xl rounded-3xl border border-white/20 overflow-hidden transition-all duration-500 hover:shadow-3xl">
          <div class="bg-gradient-to-r from-teal-500 to-cyan-600 p-6 text-white relative overflow-hidden">
            <div class="absolute inset-0 bg-black/10"></div>
            <div class="relative z-10">
              <h3 class="text-2xl font-bold mb-2 flex items-center">
                <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.89 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                </svg>
                Get in Touch
              </h3>
              <p class="text-teal-100">We're here to serve you and answer your questions</p>
            </div>
          </div>
          <div class="p-8 lg:p-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
              <div class="group p-6 border-2 border-gray-200 rounded-2xl transition-all duration-300 hover:border-teal-300 hover:shadow-lg hover:scale-105 bg-gradient-to-br from-teal-50 to-cyan-50">
                <div class="w-16 h-16 bg-teal-100 rounded-full flex items-center justify-center mx-auto mb-4">
                  <svg class="w-8 h-8 text-teal-600" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                  </svg>
                </div>
                <h4 class="text-lg font-semibold text-gray-800 mb-2">Visit Us</h4>
                <p class="text-gray-600 text-sm">Municipality of Tubod<br>Government Center</p>
              </div>

              <div class="group p-6 border-2 border-gray-200 rounded-2xl transition-all duration-300 hover:border-teal-300 hover:shadow-lg hover:scale-105 bg-gradient-to-br from-teal-50 to-cyan-50">
                <div class="w-16 h-16 bg-teal-100 rounded-full flex items-center justify-center mx-auto mb-4">
                  <svg class="w-8 h-8 text-teal-600" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                  </svg>
                </div>
                <h4 class="text-lg font-semibold text-gray-800 mb-2">Call Us</h4>
                <p class="text-gray-600 text-sm">24/7 Support Line<br>Available Always</p>
              </div>

              <div class="group p-6 border-2 border-gray-200 rounded-2xl transition-all duration-300 hover:border-teal-300 hover:shadow-lg hover:scale-105 bg-gradient-to-br from-teal-50 to-cyan-50">
                <div class="w-16 h-16 bg-teal-100 rounded-full flex items-center justify-center mx-auto mb-4">
                  <svg class="w-8 h-8 text-teal-600" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.89 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                  </svg>
                </div>
                <h4 class="text-lg font-semibold text-gray-800 mb-2">Email Us</h4>
                <p class="text-gray-600 text-sm">Quick Response<br>Professional Service</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Footer Section -->
        <div class="mt-8 text-center">
          <div class="bg-white/60 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
            <p class="text-gray-600 mb-4">
              Thank you for being part of the Tubod community. Together, we build a better future.
            </p>
            <div class="flex items-center justify-center space-x-6 text-sm text-gray-500">
              <div class="flex items-center">
                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                </svg>
                Committed to Excellence
              </div>
              <div class="flex items-center">
                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm-1 16H9V7h9v14z"/>
                </svg>
                Transparent Service
              </div>
              <div class="flex items-center">
                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                </svg>
                Community First
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