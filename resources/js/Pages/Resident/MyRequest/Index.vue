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
          
          <!-- Header Section -->
          <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-indigo-600 via-purple-600 to-cyan-600 bg-clip-text text-transparent mb-4">
              My Submissions
            </h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
              Track your reported issues and assistance requests
            </p>
          </div>

          <!-- Tab Navigation -->
          <div class="bg-white/80 backdrop-blur-sm shadow-2xl border border-white/20 rounded-3xl overflow-hidden">
            <div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 relative overflow-hidden">
              <div class="absolute inset-0 bg-black/10"></div>
              <div class="relative z-10">
                <nav class="flex">
                  <button 
                    @click="activeTab = 'assistance'"
                    :class="activeTab === 'assistance' ? 'bg-white/20 border-b-4 border-white' : 'hover:bg-white/10'"
                    class="flex-1 px-8 py-6 text-white font-semibold text-lg transition-all duration-300 focus:outline-none"
                  >
                    <div class="flex items-center justify-center">
                      <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17h-2v-2h2v2zm2.07-7.75l-.9.92C13.45 12.9 13 13.5 13 15h-2v-.5c0-1.1.45-2.1 1.17-2.83l1.24-1.26c.37-.36.59-.86.59-1.41 0-1.1-.9-2-2-2s-2 .9-2 2H8c0-2.21 1.79-4 4-4s4 1.79 4 4c0 .88-.36 1.68-.93 2.25z"/>
                      </svg>
                      Assistance Request
                    </div>
                  </button>
                  <button 
                    @click="activeTab = 'issues'"
                    :class="activeTab === 'issues' ? 'bg-white/20 border-b-4 border-white' : 'hover:bg-white/10'"
                    class="flex-1 px-8 py-6 text-white font-semibold text-lg transition-all duration-300 focus:outline-none"
                  >
                    <div class="flex items-center justify-center">
                      <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
                      </svg>
                      Report Submitted
                    </div>
                  </button>
                </nav>
              </div>
            </div>
            
            <!-- Tab Content -->
            <div class="p-8">
              
              <!-- Assistance Request Tab -->
              <div v-if="activeTab === 'assistance'" class="min-h-[400px]">
                <div class="text-center py-16">
                  <div class="w-24 h-24 bg-gradient-to-r from-indigo-400 to-purple-500 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17h-2v-2h2v2zm2.07-7.75l-.9.92C13.45 12.9 13 13.5 13 15h-2v-.5c0-1.1.45-2.1 1.17-2.83l1.24-1.26c.37-.36.59-.86.59-1.41 0-1.1-.9-2-2-2s-2 .9-2 2H8c0-2.21 1.79-4 4-4s4 1.79 4 4c0 .88-.36 1.68-.93 2.25z"/>
                    </svg>
                  </div>
                  <h3 class="text-2xl font-bold text-gray-800 mb-4">Assistance Requests</h3>
                  <p class="text-gray-600 text-lg mb-6">This section will display your assistance requests once the backend is ready.</p>
                  <div class="bg-gradient-to-r from-indigo-100 to-purple-100 rounded-2xl p-6 max-w-md mx-auto">
                    <p class="text-indigo-800 font-medium">Feature coming soon!</p>
                    <p class="text-indigo-600 text-sm mt-2">We're working on implementing this functionality.</p>
                  </div>
                </div>
              </div>

              <!-- Issues Tab -->
              <div v-if="activeTab === 'issues'">
                <div v-if="props.issues.length === 0" class="text-center py-12">
                  <div class="w-24 h-24 bg-gradient-to-r from-gray-400 to-gray-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
                    </svg>
                  </div>
                  <h3 class="text-2xl font-bold text-gray-800 mb-2">No Issues Reported</h3>
                  <p class="text-gray-600">You haven't submitted any issues yet.</p>
                </div>

                <div v-else class="overflow-x-auto">
                  <table class="w-full">
                    <thead>
                      <tr class="text-left">
                        <th class="pb-6 text-lg font-semibold text-gray-800 border-b-2 border-gray-200">
                          <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-indigo-600" fill="currentColor" viewBox="0 0 24 24">
                              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                            Type
                          </div>
                        </th>
                        <th class="pb-6 text-lg font-semibold text-gray-800 border-b-2 border-gray-200">
                          <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-purple-600" fill="currentColor" viewBox="0 0 24 24">
                              <path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 2 2h8c1.1 0 2-.9 2-2V8l-6-6zm4 18H6V4h7v5h5v11z"/>
                            </svg>
                            Description
                          </div>
                        </th>
                        <th class="pb-6 text-lg font-semibold text-gray-800 border-b-2 border-gray-200">
                          <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-emerald-600" fill="currentColor" viewBox="0 0 24 24">
                              <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                            </svg>
                            Status
                          </div>
                        </th>
                        <th class="pb-6 text-lg font-semibold text-gray-800 border-b-2 border-gray-200">
                          <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                              <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                            </svg>
                            Location
                          </div>
                        </th>
                        <th class="pb-6 text-lg font-semibold text-gray-800 border-b-2 border-gray-200">
                          <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                              <path d="M9 11H7v6h2v-6zm4 0h-2v6h2v-6zm4 0h-2v6h2v-6zm2.5-9H18V0h-2v2H8V0H6v2H3.5C2.67 2 2 2.67 2 3.5v1C2 5.33 2.67 6 3.5 6H20.5c.83 0 1.5-.67 1.5-1.5v-1C22 2.67 21.33 2 20.5 2z"/>
                            </svg>
                            Submitted
                          </div>
                        </th>
                        <th class="pb-6 text-lg font-semibold text-gray-800 border-b-2 border-gray-200">
                          <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-orange-600" fill="currentColor" viewBox="0 0 24 24">
                              <path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/>
                            </svg>
                            Image
                          </div>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="issue in props.issues" :key="issue.id" class="border-t border-gray-100 hover:bg-gradient-to-r hover:from-indigo-50/50 hover:to-purple-50/50 transition-all duration-200">
                        <td class="py-6">
                          <div class="flex items-center">
                            <div class="w-10 h-10 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full flex items-center justify-center mr-3">
                              <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                              </svg>
                            </div>
                            <span class="font-medium text-gray-800">{{ formatType(issue.type) }}</span>
                          </div>
                        </td>
                        <td class="py-6">
                          <div class="max-w-xs">
                            <p class="text-gray-700 font-medium truncate">{{ issue.description }}</p>
                          </div>
                        </td>
                        <td class="py-6">
                          <span :class="getStatusClass(issue.status)" class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium">
                            <div :class="getStatusDotClass(issue.status)" class="w-2 h-2 rounded-full mr-2"></div>
                            {{ formatStatus(issue.status) }}
                          </span>
                        </td>
                        <td class="py-6">
                          <div class="flex items-center text-gray-700">
                            <svg class="w-4 h-4 mr-2 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                              <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                            </svg>
                            <span class="font-medium">{{ issue.location }}</span>
                          </div>
                        </td>
                        <td class="py-6">
                          <div class="flex items-center text-gray-700">
                            <svg class="w-4 h-4 mr-2 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
                              <path d="M9 11H7v6h2v-6zm4 0h-2v6h2v-6zm4 0h-2v6h2v-6zm2.5-9H18V0h-2v2H8V0H6v2H3.5C2.67 2 2 2.67 2 3.5v1C2 5.33 2.67 6 3.5 6H20.5c.83 0 1.5-.67 1.5-1.5v-1C22 2.67 21.33 2 20.5 2z"/>
                            </svg>
                            <span class="font-medium">{{ new Date(issue.created_at).toLocaleDateString() }}</span>
                          </div>
                        </td>
                        <td class="py-6">
                          <div v-if="issue.file_path" class="flex items-center">
                            <a :href="`/storage/${issue.file_path}`" target="_blank" 
                               class="group inline-flex items-center px-4 py-2 bg-gradient-to-r from-orange-500 to-red-600 text-white font-medium rounded-lg shadow-md hover:shadow-lg transition-all duration-300 hover:scale-105">
                              <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/>
                              </svg>
                              View Image
                            </a>
                          </div>
                          <div v-else class="flex items-center text-gray-400">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                              <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15h2v-6h-2v6zm0-8h2V7h-2v2z"/>
                            </svg>
                            No image
                          </div>
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
    </div>
  </ResidentLayout>
</template>

<script setup>
import ResidentLayout from '@/Layouts/ResidentLayout.vue';
import { defineProps, ref } from 'vue';

const activeTab = ref('assistance');

const formatType = (type) => {
  return type.charAt(0).toUpperCase() + type.slice(1).replace('_', ' ');
};

const formatStatus = (status) => {
  return status.charAt(0).toUpperCase() + status.slice(1).replace('_', ' ');
};

const getStatusClass = (status) => {
  const classes = {
    'pending': 'bg-yellow-100 text-yellow-800 border border-yellow-200',
    'in_progress': 'bg-blue-100 text-blue-800 border border-blue-200',
    'resolved': 'bg-emerald-100 text-emerald-800 border border-emerald-200',
    'closed': 'bg-gray-100 text-gray-800 border border-gray-200'
  };
  return classes[status] || 'bg-gray-100 text-gray-800 border border-gray-200';
};

const getStatusDotClass = (status) => {
  const classes = {
    'pending': 'bg-yellow-500 animate-pulse',
    'in_progress': 'bg-blue-500 animate-pulse',
    'resolved': 'bg-emerald-500',
    'closed': 'bg-gray-500'
  };
  return classes[status] || 'bg-gray-500';
};

const props = defineProps({
  issues: Array,
});

const getPendingCount = () => {
  return props.issues.filter(issue => issue.status === 'pending' || issue.status === 'in_progress').length;
};

const getResolvedCount = () => {
  return props.issues.filter(issue => issue.status === 'resolved' || issue.status === 'closed').length;
};
</script>

<style scoped>
.hover\:shadow-3xl:hover {
  box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
}
</style>