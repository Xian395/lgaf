<template>
  <ResidentLayout>
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 relative overflow-hidden">
      <!-- Floating particles background -->
      <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/4 left-1/4 w-2 h-2 bg-blue-300 rounded-full opacity-20 animate-pulse"></div>
        <div class="absolute top-1/3 right-1/3 w-3 h-3 bg-indigo-300 rounded-full opacity-30 animate-bounce"></div>
        <div class="absolute bottom-1/4 left-1/3 w-1 h-1 bg-purple-300 rounded-full opacity-40 animate-ping"></div>
      </div>

      <div class="relative z-10 py-4 sm:py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
          
          <!-- Header Section -->
          <div class="text-center mb-8 sm:mb-12">
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold bg-gradient-to-r from-indigo-600 via-purple-600 to-cyan-600 bg-clip-text text-transparent mb-4">
              My Submissions
            </h1>
            <p class="text-lg sm:text-xl text-gray-600 max-w-2xl mx-auto px-4">
              Track your reported issues and assistance requests
            </p>
          </div>

          <!-- Content Container -->
          <div class="bg-white shadow-xl border border-slate-200 rounded-lg overflow-hidden">
            
            <!-- Tab Navigation -->
            <div class="border-b border-gray-200">
              <nav class="-mb-px flex space-x-8 px-6" aria-label="Tabs">
                <button
                  @click="activeTab = 'assistance'"
                  :class="[
                    activeTab === 'assistance'
                      ? 'border-indigo-500 text-indigo-600'
                      : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300',
                    'whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm'
                  ]"
                >
                  Assistance Requests
                  <span
                    :class="[
                      activeTab === 'assistance'
                        ? 'bg-indigo-100 text-indigo-600'
                        : 'bg-gray-100 text-gray-900',
                      'ml-2 py-0.5 px-2.5 rounded-full text-xs font-medium'
                    ]"
                  >
                    {{ getAssistanceCount() }}
                  </span>
                </button>
                
                <button
                  @click="activeTab = 'issues'"
                  :class="[
                    activeTab === 'issues'
                      ? 'border-red-500 text-red-600'
                      : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300',
                    'whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm'
                  ]"
                >
                  Issue Reports
                  <span
                    :class="[
                      activeTab === 'issues'
                        ? 'bg-red-100 text-red-600'
                        : 'bg-gray-100 text-gray-900',
                      'ml-2 py-0.5 px-2.5 rounded-full text-xs font-medium'
                    ]"
                  >
                    {{ getIssuesCount() }}
                  </span>
                </button>
              </nav>
            </div>
            
            <!-- Tab Content -->
            <div class="p-4 sm:p-6">
              
              <!-- Assistance Request Tab -->
              <div v-if="activeTab === 'assistance'">
                <div v-if="!props.intakeSheets || props.intakeSheets.length === 0" class="text-center py-8 sm:py-16">
                  <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                  </svg>
                  <h3 class="mt-2 text-sm font-medium text-gray-900">No assistance requests found</h3>
                  <p class="mt-1 text-sm text-gray-500">You haven't submitted any assistance requests yet.</p>
                </div>

                <div v-else>
                  <!-- Mobile Card View -->
                  <div class="sm:hidden space-y-4">
                    <div v-for="sheet in props.intakeSheets" :key="sheet.id" class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
                      <div class="p-4">
                        <div class="flex items-center justify-between mb-3">
                          <div class="flex items-center">
                            <div class="w-8 h-8 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full flex items-center justify-center mr-3">
                              <span class="text-white font-medium text-sm">{{ sheet.client_name.charAt(0).toUpperCase() }}</span>
                            </div>
                            <span class="font-semibold text-gray-900 text-sm">{{ sheet.client_name }}</span>
                          </div>
                          <span :class="getIntakeStatusClass(sheet.status)" class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium">
                            <div :class="getIntakeStatusDotClass(sheet.status)" class="w-2 h-2 rounded-full mr-1.5"></div>
                            {{ formatStatus(sheet.status || 'PENDING') }}
                          </span>
                        </div>
                        
                        <div class="space-y-2 text-sm">
                          <div class="flex justify-between">
                            <span class="text-gray-500">Beneficiary:</span>
                            <span class="text-gray-700 font-medium">{{ sheet.beneficiary_name }}</span>
                          </div>
                          <div class="flex justify-between">
                            <span class="text-gray-500">Submitted:</span>
                            <span class="text-gray-700">{{ new Date(sheet.created_at).toLocaleDateString() }}</span>
                          </div>
                          <div class="pt-2">
                            <span class="text-gray-500 text-xs">Problem:</span>
                            <p class="text-gray-700 mt-1 text-sm">{{ sheet.problem_presented }}</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Desktop Table View -->
                  <div class="hidden sm:block bg-white rounded-xl shadow-lg border border-slate-200 overflow-hidden">
                    <div class="overflow-x-auto">
                      <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                          <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Client Information
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Beneficiary
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Problem
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Status
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Date Submitted
                            </th>
                          </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                          <tr v-for="sheet in props.intakeSheets" :key="sheet.id" class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                              <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                  <div class="h-10 w-10 rounded-full bg-blue-500 flex items-center justify-center">
                                    <span class="text-white font-medium text-sm">
                                      {{ sheet.client_name.charAt(0).toUpperCase() }}
                                    </span>
                                  </div>
                                </div>
                                <div class="ml-4">
                                  <div class="text-sm font-medium text-gray-900">
                                    {{ sheet.client_name }}
                                  </div>
                                  <div class="text-sm text-gray-500">
                                    {{ sheet.client_sex }} • {{ sheet.civil_status }}
                                  </div>
                                  <div class="text-sm text-gray-500">
                                    {{ sheet.present_address }}
                                  </div>
                                </div>
                              </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                              <div class="text-sm font-medium text-gray-900">
                                {{ sheet.beneficiary_name }}
                              </div>
                              <div class="text-sm text-gray-500">
                                {{ sheet.beneficiary_sex }} • {{ formatDate(sheet.beneficiary_dob) }}
                              </div>
                              <div class="text-sm text-gray-500">
                                {{ sheet.beneficiary_birthplace }}
                              </div>
                            </td>
                            <td class="px-6 py-4">
                              <div class="text-sm text-gray-900 max-w-xs truncate">
                                {{ sheet.problem_presented }}
                              </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                              <span :class="getIntakeStatusBadgeClass(sheet.status)" class="inline-flex px-3 py-1 text-sm font-medium rounded-full">
                                {{ formatStatus(sheet.status || 'PENDING') }}
                              </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                              {{ formatDate(sheet.created_at) }}
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Issues Tab -->
              <div v-if="activeTab === 'issues'">
                <div v-if="!props.issues || props.issues.length === 0" class="text-center py-8 sm:py-16">
                  <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                  </svg>
                  <h3 class="mt-2 text-sm font-medium text-gray-900">No issues reported</h3>
                  <p class="mt-1 text-sm text-gray-500">You haven't submitted any issue reports yet.</p>
                </div>

                <div v-else>
                  <!-- Mobile Card View for Issues -->
                  <div class="sm:hidden space-y-4">
                    <div v-for="issue in props.issues" :key="issue.id" class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
                      <div class="p-4">
                        <div class="flex items-center justify-between mb-3">
                          <div class="flex items-center">
                            <div class="w-8 h-8 bg-red-500 rounded-full flex items-center justify-center mr-3">
                              <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
                              </svg>
                            </div>
                            <span class="font-semibold text-gray-900 text-sm">{{ formatType(issue.type) }}</span>
                          </div>
                          <span :class="getStatusClass(issue.status)" class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium">
                            <div :class="getStatusDotClass(issue.status)" class="w-2 h-2 rounded-full mr-1.5"></div>
                            {{ formatStatus(issue.status) }}
                          </span>
                        </div>
                        
                        <div class="space-y-2 text-sm">
                          <div class="flex justify-between">
                            <span class="text-gray-500">Location:</span>
                            <span class="text-gray-700 font-medium">{{ issue.location }}</span>
                          </div>
                          <div class="flex justify-between">
                            <span class="text-gray-500">Submitted:</span>
                            <span class="text-gray-700">{{ new Date(issue.created_at).toLocaleDateString() }}</span>
                          </div>
                          <div class="pt-2">
                            <span class="text-gray-500 text-xs">Description:</span>
                            <p class="text-gray-700 mt-1 text-sm">{{ issue.description }}</p>
                          </div>
                          <div v-if="issue.image_path" class="pt-2">
                            <span class="text-gray-500 text-xs">Image:</span>
                            <div class="mt-1">
                              <span class="inline-flex items-center px-2 py-1 bg-blue-50 text-blue-700 rounded-md text-xs">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                  <path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/>
                                </svg>
                                Attached
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Desktop Table View for Issues -->
                  <div class="hidden sm:block bg-white rounded-xl shadow-lg border border-slate-200 overflow-hidden">
                    <div class="overflow-x-auto">
                      <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                          <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Issue Type
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Description
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Location
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Status
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Date Submitted
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Image
                            </th>
                          </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                          <tr v-for="issue in props.issues" :key="issue.id" class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                              <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                  <div class="h-10 w-10 rounded-full bg-red-500 flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                      <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
                                    </svg>
                                  </div>
                                </div>
                                <div class="ml-4">
                                  <div class="text-sm font-medium text-gray-900">
                                    {{ formatType(issue.type) }}
                                  </div>
                                </div>
                              </div>
                            </td>
                            <td class="px-6 py-4">
                              <div class="text-sm text-gray-900 max-w-xs truncate">
                                {{ issue.description }}
                              </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                              <div class="text-sm text-gray-900">
                                {{ issue.location }}
                              </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                              <span :class="getIssueStatusBadgeClass(issue.status)" class="inline-flex px-3 py-1 text-sm font-medium rounded-full">
                                {{ formatStatus(issue.status) }}
                              </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                              {{ formatDate(issue.created_at) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                              <div v-if="issue.image_path" class="flex items-center">
                                <span class="inline-flex items-center px-2 py-1 bg-blue-100 text-blue-800 rounded-md text-xs font-medium">
                                  <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/>
                                  </svg>
                                  View
                                </span>
                              </div>
                              <div v-else class="text-gray-400 text-xs">
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

          <!-- Summary Cards for Mobile -->
          <div class="sm:hidden mt-6 grid grid-cols-2 gap-4">
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-4 shadow-lg border border-white/20">
              <div class="flex items-center justify-between">
                <div>
                  <p class="text-xs text-gray-500 uppercase tracking-wide font-medium">Assistance</p>
                  <p class="text-2xl font-bold text-indigo-600">{{ getAssistanceCount() }}</p>
                </div>
                <div class="w-10 h-10 bg-gradient-to-r from-indigo-400 to-purple-500 rounded-lg flex items-center justify-center">
                  <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17h-2v-2h2v2zm2.07-7.75l-.9.92C13.45 12.9 13 13.5 13 15h-2v-.5c0-1.1.45-2.1 1.17-2.83l1.24-1.26c.37-.36.59-.86.59-1.41 0-1.1-.9-2-2-2s-2 .9-2 2H8c0-2.21 1.79-4 4-4s4 1.79 4 4c0 .88-.36 1.68-.93 2.25z"/>
                  </svg>
                </div>
              </div>
            </div>
            
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-4 shadow-lg border border-white/20">
              <div class="flex items-center justify-between">
                <div>
                  <p class="text-xs text-gray-500 uppercase tracking-wide font-medium">Issues</p>
                  <p class="text-2xl font-bold text-red-600">{{ getIssuesCount() }}</p>
                </div>
                <div class="w-10 h-10 bg-gradient-to-r from-red-400 to-pink-500 rounded-lg flex items-center justify-center">
                  <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
                  </svg>
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
import { defineProps, ref, onMounted } from 'vue';
import axios from 'axios';

const activeTab = ref('assistance');
const intakeSheets = ref([]);
const loading = ref(false);

onMounted(async () => {
  await fetchIntakeSheets();
});

const fetchIntakeSheets = async () => {
  try {
    loading.value = true;
    const response = await axios.get('/api/user/intake-sheets');
    intakeSheets.value = response.data;
  } catch (error) {
    console.error('Error fetching intake sheets:', error);
  } finally {
    loading.value = false;
  }
};

const formatType = (type) => {
  return type.charAt(0).toUpperCase() + type.slice(1).replace('_', ' ');
};

const formatStatus = (status) => {
  return status.charAt(0).toUpperCase() + status.slice(1).replace('_', ' ');
};

const formatDate = (dateString) => {
  if (!dateString) return "N/A";
  return new Date(dateString).toLocaleDateString("en-US", {
    year: "numeric",
    month: "short",
    day: "numeric",
  });
};

// Status classes for mobile cards (keeping original for mobile)
const getStatusClass = (status) => {
  const classes = {
    'pending': 'bg-yellow-100 text-yellow-800 border border-yellow-200',
    'in_progress': 'bg-blue-100 text-blue-800 border border-blue-200',
    'resolved': 'bg-green-100 text-green-800 border border-green-200',
    'closed': 'bg-gray-100 text-gray-800 border border-gray-200'
  };
  return classes[status] || 'bg-gray-100 text-gray-800 border border-gray-200';
};

const getStatusDotClass = (status) => {
  const classes = {
    'pending': 'bg-yellow-500 animate-pulse',
    'in_progress': 'bg-blue-500 animate-pulse',
    'resolved': 'bg-green-500',
    'closed': 'bg-gray-500'
  };
  return classes[status] || 'bg-gray-500';
};

// Status classes for mobile cards (keeping original for mobile)
const getIntakeStatusClass = (status) => {
  const classes = {
    'PENDING': 'bg-yellow-100 text-yellow-800 border border-yellow-200',
    'IN_PROGRESS': 'bg-blue-100 text-blue-800 border border-blue-200',
    'VERIFIED': 'bg-green-100 text-green-800 border border-green-200',
    'COMPLETED': 'bg-green-100 text-green-800 border border-green-200',
    'REJECTED': 'bg-red-100 text-red-800 border border-red-200'
  };
  return classes[status] || 'bg-gray-100 text-gray-800 border border-gray-200';
};

const getIntakeStatusDotClass = (status) => {
  const classes = {
    'PENDING': 'bg-yellow-500 animate-pulse',
    'IN_PROGRESS': 'bg-blue-500 animate-pulse',
    'VERIFIED': 'bg-green-500',
    'COMPLETED': 'bg-green-500',
    'REJECTED': 'bg-red-500'
  };
  return classes[status] || 'bg-gray-500';
};

// Badge classes for desktop table (matching admin style)
const getIntakeStatusBadgeClass = (status) => {
  const classes = {
    'PENDING': 'bg-yellow-100 text-yellow-800',
    'IN_PROGRESS': 'bg-blue-100 text-blue-800',
    'VERIFIED': 'bg-green-100 text-green-800',
    'APPROVED': 'bg-purple-100 text-purple-800',
    'COMPLETED': 'bg-emerald-100 text-emerald-800',
    'REJECTED': 'bg-red-100 text-red-800'
  };
  return classes[status] || 'bg-gray-100 text-gray-800';
};

const getIssueStatusBadgeClass = (status) => {
  const classes = {
    'pending': 'bg-yellow-100 text-yellow-800',
    'in_progress': 'bg-blue-100 text-blue-800',
    'resolved': 'bg-green-100 text-green-800',
    'closed': 'bg-gray-100 text-gray-800'
  };
  return classes[status] || 'bg-gray-100 text-gray-800';
};

const props = defineProps({
  issues: {
    type: Array,
    default: () => []
  },
  intakeSheets: {
    type: Array,
    default: () => []
  },
});

// Notification badge counts
const getAssistanceCount = () => {
  return props.intakeSheets?.length || 0;
};

const getIssuesCount = () => {
  return props.issues?.length || 0;
};
</script>

<style scoped>
/* Mobile responsive improvements */
@media (max-width: 640px) {
  .overflow-x-auto {
    scrollbar-width: thin;
    scrollbar-color: rgba(156, 163, 175, 0.5) transparent;
  }
  .overflow-x-auto::-webkit-scrollbar {
    height: 4px;
  }
  
  .overflow-x-auto::-webkit-scrollbar-track {
    background: transparent;
  }
  
  .overflow-x-auto::-webkit-scrollbar-thumb {
    background-color: rgba(156, 163, 175, 0.5);
    border-radius: 2px;
  }
}
</style>