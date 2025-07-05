<template>
  <AdminLayout>
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 py-8 px-4 sm:px-6 lg:px-8">
      <!-- Header + Stats Section -->
      <div class="max-w-7xl mx-auto mb-8">
        <div class="bg-white shadow-xl p-8 border border-slate-200">
          <!-- Header -->
          <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8">
            <div>
              <h1 class="text-3xl font-bold text-slate-800 mb-2">Report Management</h1>
              <p class="text-slate-600">Manage and track reported issues</p>
            </div>
            <div class="mt-4 sm:mt-0 flex gap-3">
              <button
                @click="exportFeedback"
                :disabled="isExporting"
                class="inline-flex items-center px-4 py-2 bg-emerald-600 hover:bg-emerald-700 disabled:bg-emerald-400 text-white font-medium rounded-lg transition-colors duration-200"
              >
                <svg v-if="!isExporting" class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <svg v-else class="w-4 h-4 mr-2 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                </svg>
                {{ isExporting ? 'Exporting...' : 'Export Data' }}
              </button>
            </div>
          </div>

          <!-- Stats -->
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-gradient-to-r from-red-50 to-red-100 rounded-xl p-6 border border-red-200">
              <div class="flex items-center">
                <div class="p-3 bg-red-100 rounded-lg">
                  <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z" />
                  </svg>
                </div>
                <div class="ml-4">
                  <p class="text-sm font-medium text-red-700">Total Reports</p>
                  <p class="text-2xl font-bold text-red-900">{{ issues.length }}</p>
                </div>
              </div>
            </div>

            <div class="bg-gradient-to-r from-yellow-50 to-yellow-100 rounded-xl p-6 border border-yellow-200">
              <div class="flex items-center">
                <div class="p-3 bg-yellow-100 rounded-lg">
                  <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                </div>
                <div class="ml-4">
                  <p class="text-sm font-medium text-yellow-700">Pending</p>
                  <p class="text-2xl font-bold text-yellow-900">{{ getStatusCount('pending') }}</p>
                </div>
              </div>
            </div>

            <div class="bg-gradient-to-r from-blue-50 to-blue-100 rounded-xl p-6 border border-blue-200">
              <div class="flex items-center">
                <div class="p-3 bg-blue-100 rounded-lg">
                  <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                  </svg>
                </div>
                <div class="ml-4">
                  <p class="text-sm font-medium text-blue-700">In Progress</p>
                  <p class="text-2xl font-bold text-blue-900">{{ getStatusCount('in_progress') }}</p>
                </div>
              </div>
            </div>

            <div class="bg-gradient-to-r from-green-50 to-green-100 rounded-xl p-6 border border-green-200">
              <div class="flex items-center">
                <div class="p-3 bg-green-100 rounded-lg">
                  <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                </div>
                <div class="ml-4">
                  <p class="text-sm font-medium text-green-700">Resolved</p>
                  <p class="text-2xl font-bold text-green-900">{{ getStatusCount('resolved') }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Filters + Issues Table Section -->
      <div class="max-w-7xl mx-auto">
        <div class="bg-white shadow-xl border border-slate-200 overflow-hidden">
          <!-- Filters -->
          <div class="px-8 py-6 border-b border-slate-200 bg-slate-50">
            <div class="flex items-center justify-between mb-4">
              <h3 class="text-xl font-semibold text-slate-800">Recent Reports</h3>
              <span class="text-sm text-slate-600">{{ filteredIssues.length }} of {{ issues.length }} reports</span>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
              <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Filter by Status</label>
                <select
                  v-model="selectedStatus"
                  @change="filterIssues"
                  class="block w-full rounded-md border-gray-300 text-sm focus:border-indigo-500 focus:ring-indigo-500"
                >
                  <option value="">All Statuses</option>
                  <option v-for="status in statuses" :key="status" :value="status">
                    {{ capitalizeFirst(status) }}
                  </option>
                </select>
              </div>
              <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Filter by Type</label>
                <select
                  v-model="selectedType"
                  @change="filterIssues"
                  class="block w-full rounded-md border-gray-300 text-sm focus:border-indigo-500 focus:ring-indigo-500"
                >
                  <option value="">All Types</option>
                  <option v-for="type in issueTypes" :key="type" :value="type">
                    {{ capitalizeFirst(type) }}
                  </option>
                </select>
              </div>
              <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Search</label>
                <input
                  v-model="searchQuery"
                  @input="filterIssues"
                  type="text"
                  placeholder="Search by description or location..."
                  class="block w-full rounded-md border-gray-300 text-sm focus:border-indigo-500 focus:ring-indigo-500"
                />
              </div>
            </div>
          </div>

          <!-- Issues Table -->
          <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200">
              <thead class="bg-slate-50">
                <tr>
                  <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Reporter</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Issue Details</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Status</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Image</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Date</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Actions</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-slate-200">
                <tr v-for="issue in filteredIssues" :key="issue.id" class="hover:bg-slate-50 transition-colors duration-150">
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="flex-shrink-0 h-10 w-10">
                        <div class="h-10 w-10 rounded-full bg-gradient-to-r from-blue-500 to-purple-600 flex items-center justify-center">
                          <span class="text-sm font-medium text-white">{{ getInitials(issue.user_name) }}</span>
                        </div>
                      </div>
                      <div class="ml-4">
                        <div class="text-sm font-medium text-slate-900">{{ issue.user_name }}</div>
                        <div class="text-sm text-slate-500">ID: {{ issue.id }}</div>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4">
                    <div class="text-sm font-medium text-slate-900">{{ capitalizeFirst(issue.type) }}</div>
                    <div class="text-sm text-slate-500 max-w-xs truncate" :title="issue.description">{{ issue.description }}</div>
                    <div class="text-sm text-slate-500">📍 {{ issue.location }}</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <select
                      v-model="issue.status"
                      @change="updateStatus(issue)"
                      :disabled="updatingStatus[issue.id]"
                      :class="[
                        'block w-full rounded-md text-sm focus:border-indigo-500 focus:ring-indigo-500 disabled:opacity-50 font-medium',
                        getStatusClass(issue.status)
                      ]"
                    >
                      <option v-for="status in statuses" :key="status" :value="status">
                        {{ capitalizeFirst(status) }}
                      </option>
                    </select>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div v-if="issue.file_path" class="flex items-center">
                      <img 
                        :src="issue.file_path" 
                        alt="Issue Image" 
                        class="h-12 w-12 object-cover rounded-lg cursor-pointer hover:opacity-80 transition-opacity border shadow-sm"
                        @click="openImageModal(issue.file_path)"
                        @error="handleImageError"
                      />
                    </div>
                    <div v-else class="flex items-center justify-center h-12 w-12 bg-slate-100 rounded-lg">
                      <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                      </svg>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500">
                    {{ formatDate(issue.created_at) }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <div class="flex items-center space-x-2">
                      <button
                        @click="viewReport(issue)"
                        class="text-blue-600 hover:text-blue-900 transition-colors duration-200"
                      >
                        View
                      </button>
                      <button
                        @click="quickUpdateStatus(issue)"
                        :disabled="updatingStatus[issue.id]"
                        class="text-indigo-600 hover:text-indigo-900 disabled:opacity-50 disabled:cursor-not-allowed transition-colors duration-200"
                      >
                        {{ updatingStatus[issue.id] ? 'Updating...' : 'Quick Update' }}
                      </button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
            
            <!-- Empty State -->
            <div v-if="filteredIssues.length === 0" class="text-center py-12">
              <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
              </svg>
              <h3 class="mt-2 text-sm font-medium text-gray-900">No issues found</h3>
              <p class="mt-1 text-sm text-gray-500">
                {{ issues.length === 0 ? 'No issues have been reported yet.' : 'Try adjusting your filters.' }}
              </p>
            </div>
          </div>
        </div>
      </div>

      <!-- View Report Modal -->
      <div v-if="selectedReport" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
        <div class="bg-white shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
          <div class="px-8 py-6 border-b border-slate-300">
            <div class="flex items-center justify-between">
              <h3 class="text-xl font-semibold text-slate-800">Report Details</h3>
              <button
                @click="selectedReport = null"
                class="text-slate-400 hover:text-slate-600 transition-colors duration-200"
              >
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
          </div>
          
          <div class="p-8 space-y-6">
            <div class="grid grid-cols-2 gap-6">
              <div>
                <label class="block text-sm font-medium text-slate-600 mb-1">Reporter</label>
                <p class="text-slate-900">{{ selectedReport.user_name }}</p>
              </div>
              <div>
                <label class="block text-sm font-medium text-slate-600 mb-1">Report ID</label>
                <p class="text-slate-900">#{{ selectedReport.id }}</p>
              </div>
              <div>
                <label class="block text-sm font-medium text-slate-600 mb-1">Type</label>
                <p class="text-slate-900">{{ capitalizeFirst(selectedReport.type) }}</p>
              </div>
              <div>
                <label class="block text-sm font-medium text-slate-600 mb-1">Status</label>
                <span :class="['inline-flex items-center px-3 py-1 rounded-full text-sm font-medium', getStatusBadgeClass(selectedReport.status)]">
                  {{ capitalizeFirst(selectedReport.status) }}
                </span>
              </div>
            </div>

            <div>
              <label class="block text-sm font-medium text-slate-600 mb-2">Location</label>
              <p class="text-slate-900">📍 {{ selectedReport.location }}</p>
            </div>

            <div>
              <label class="block text-sm font-medium text-slate-600 mb-2">Description</label>
              <div class="bg-slate-50 rounded-lg p-4">
                <p class="text-slate-900 leading-relaxed">{{ selectedReport.description }}</p>
              </div>
            </div>

            <div v-if="selectedReport.file_path">
              <label class="block text-sm font-medium text-slate-600 mb-2">Attached Image</label>
              <img 
                :src="selectedReport.file_path" 
                alt="Report Image" 
                class="max-w-full h-auto rounded-lg border shadow-sm cursor-pointer hover:opacity-80 transition-opacity"
                @click="openImageModal(selectedReport.file_path)"
              />
            </div>

            <div>
              <label class="block text-sm font-medium text-slate-600 mb-1">Reported Date</label>
              <p class="text-slate-900">{{ formatDate(selectedReport.created_at) }}</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Image Modal -->
      <div
        v-if="showImageModal"
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
        @click="closeImageModal"
        @keydown.esc="closeImageModal"
        tabindex="0"
      >
        <div class="relative max-w-4xl max-h-screen p-4" @click.stop>
          <img :src="selectedImage" alt="Full size image" class="max-w-full max-h-full object-contain rounded-lg" />
          <button
            @click="closeImageModal"
            class="absolute top-2 right-2 text-white bg-black bg-opacity-50 rounded-full p-2 hover:bg-opacity-75 focus:outline-none focus:ring-2 focus:ring-white"
          >
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>
  </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { ref, computed, onMounted } from 'vue';
import { router } from '@inertiajs/vue3';
import { notifyMinimal } from "@/globalFunctions.js";

const props = defineProps({
  issues: Array,
  issueTypes: Array,
  statuses: Array,
  success: String,
  error: String,
});

const showImageModal = ref(false);
const selectedImage = ref('');
const selectedReport = ref(null);
const updatingStatus = ref({});
const isExporting = ref(false);

const selectedStatus = ref('');
const selectedType = ref('');
const searchQuery = ref('');

const filteredIssues = computed(() => {
  let filtered = [...props.issues];

  if (selectedStatus.value) {
    filtered = filtered.filter(issue => issue.status === selectedStatus.value);
  }

  if (selectedType.value) {
    filtered = filtered.filter(issue => issue.type === selectedType.value);
  }

  if (searchQuery.value) {
    const query = searchQuery.value.toLowerCase();
    filtered = filtered.filter(issue => 
      issue.description.toLowerCase().includes(query) ||
      issue.location.toLowerCase().includes(query)
    );
  }

  return filtered;
});

const getInitials = (name) => {
  return name.split(' ').map(n => n[0]).join('').toUpperCase();
};

const capitalizeFirst = (str) => {
  return str.charAt(0).toUpperCase() + str.slice(1).replace('_', ' ');
};

const formatDate = (dateString) => {
  const date = new Date(dateString);
  return date.toLocaleDateString('en-US', {
    year: 'numeric',
    month: 'short',
    day: 'numeric',
    hour: '2-digit',
    minute: '2-digit'
  });
};

const getStatusCount = (status) => {
  return props.issues.filter(issue => issue.status === status).length;
};

const getStatusClass = (status) => {
  const classes = {
    'pending': 'border-yellow-300 bg-yellow-50 text-yellow-800',
    'in_progress': 'border-blue-300 bg-blue-50 text-blue-800',
    'resolved': 'border-green-300 bg-green-50 text-green-800'
  };
  return classes[status] || 'border-gray-300 bg-gray-50 text-gray-800';
};

const getStatusBadgeClass = (status) => {
  const classes = {
    'pending': 'bg-yellow-100 text-yellow-800',
    'in_progress': 'bg-blue-100 text-blue-800',
    'resolved': 'bg-green-100 text-green-800'
  };
  return classes[status] || 'bg-gray-100 text-gray-800';
};

const updateStatus = (issue) => {
  updatingStatus.value[issue.id] = true;
  
  console.log('Updating status for issue:', issue.id, 'to:', issue.status);
  
  router.put(route('admin.report.updateStatus', issue.id), { 
    status: issue.status 
  }, {
    onSuccess: () => {
      notifyMinimal("Status updated successfully!", "success");
    },
    onError: () => {
      notifyMinimal("Failed to update status. Please try again.", "error");
    },
    onFinish: () => {
      updatingStatus.value[issue.id] = false;
    },
    preserveState: true,
    preserveScroll: true,
  });
};

const quickUpdateStatus = (issue) => {
  const statusOrder = ['pending', 'in_progress', 'resolved'];
  const currentIndex = statusOrder.indexOf(issue.status);
  const nextIndex = (currentIndex + 1) % statusOrder.length;
  const newStatus = statusOrder[nextIndex];
  
  issue.status = newStatus;
  updatingStatus.value[issue.id] = true;
  
  console.log('Quick updating status for issue:', issue.id, 'to:', newStatus);
  
  router.put(route('admin.report.updateStatus', issue.id), { 
    status: newStatus 
  }, {
    onSuccess: () => {
      notifyMinimal(`Status updated to ${capitalizeFirst(newStatus)}!`, "success");
    },
    onError: () => {
      notifyMinimal("Failed to update status. Please try again.", "error");
    },
    onFinish: () => {
      updatingStatus.value[issue.id] = false;
    },
    preserveState: true,
    preserveScroll: true,
  });
};

const exportFeedback = () => {
  isExporting.value = true;
  
  try {
    window.location.href = route('admin.report.export');
    notifyMinimal("Export started successfully!", "success");
  } catch (error) {
    notifyMinimal("Failed to export data. Please try again.", "error");
  }
  
  setTimeout(() => {
    isExporting.value = false;
  }, 3000);
};

const viewReport = (issue) => {
  selectedReport.value = issue;
};

const openImageModal = (imagePath) => {
  selectedImage.value = imagePath;
  showImageModal.value = true;
  
  setTimeout(() => {
    document.querySelector('[tabindex="0"]')?.focus();
  }, 100);
};

const closeImageModal = () => {
  showImageModal.value = false;
  selectedImage.value = '';
};

const handleImageError = (event) => {
  console.error('Image failed to load:', event.target.src);
  event.target.style.display = 'none';
};

const filterIssues = () => {
};

onMounted(() => {
  if (props.success && props.success.trim() !== '') {
    notifyMinimal(props.success, 'success');
  }
  
  if (props.error && props.error.trim() !== '') {
    notifyMinimal(props.error, 'error');
  }
});
</script>