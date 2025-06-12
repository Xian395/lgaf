<template>
  <AdminLayout>
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 py-8 px-4 sm:px-6 lg:px-8">
      <div class="max-w-7xl mx-auto mb-8">
        <div class="bg-white rounded-2xl shadow-xl p-8 border border-slate-200">
          <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <div>
              <h1 class="text-3xl font-bold text-slate-800 mb-2">Service Experience Management</h1>
              <p class="text-slate-600">Monitor service delivery quality and resident satisfaction metrics</p>
            </div>
            <div class="mt-4 sm:mt-0 flex gap-3">
              <button
                @click="viewAnalytics"
                class="inline-flex items-center px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white font-medium rounded-lg transition-colors duration-200"
              >
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
                Analytics
              </button>
              <button
                @click="exportData"
                class="inline-flex items-center px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white font-medium rounded-lg transition-colors duration-200"
              >
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Export Data
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="max-w-7xl mx-auto mb-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
          <div class="bg-white rounded-xl shadow-lg p-6 border border-slate-200">
            <div class="flex items-center">
              <div class="p-3 bg-blue-100 rounded-lg">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
              </div>
              <div class="ml-4">
                <p class="text-sm font-medium text-slate-600">Total Responses</p>
                <p class="text-2xl font-bold text-slate-900">{{ stats.total_responses }}</p>
              </div>
            </div>
          </div>

          <div class="bg-white rounded-xl shadow-lg p-6 border border-slate-200">
            <div class="flex items-center">
              <div class="p-3 bg-yellow-100 rounded-lg">
                <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                </svg>
              </div>
              <div class="ml-4">
                <p class="text-sm font-medium text-slate-600">Average Rating</p>
                <p class="text-2xl font-bold text-slate-900">{{ stats.average_rating }}/5</p>
              </div>
            </div>
          </div>

          <div class="bg-white rounded-xl shadow-lg p-6 border border-slate-200">
            <div class="flex items-center">
              <div class="p-3 bg-green-100 rounded-lg">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
              </div>
              <div class="ml-4">
                <p class="text-sm font-medium text-slate-600">This Week</p>
                <p class="text-2xl font-bold text-slate-900">{{ stats.recent_responses }}</p>
              </div>
            </div>
          </div>

          <div class="bg-white rounded-xl shadow-lg p-6 border border-slate-200">
            <div class="flex items-center">
              <div class="p-3 bg-indigo-100 rounded-lg">
                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
              </div>
              <div class="ml-4">
                <p class="text-sm font-medium text-slate-600">Staff Courtesy (Yes)</p>
                <p class="text-2xl font-bold text-slate-900">{{ stats.satisfaction_metrics.courteous_staff.Yes }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="max-w-7xl mx-auto mb-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
          <div class="bg-white rounded-2xl shadow-xl p-6 border border-slate-200">
            <h3 class="text-lg font-semibold text-slate-800 mb-4">Staff Courtesy</h3>
            <div class="space-y-3">
              <div v-for="(count, response) in stats.satisfaction_metrics.courteous_staff" :key="response" class="flex items-center justify-between">
                <div class="flex items-center">
                  <div :class="getCourtesyColor(response)" class="w-3 h-3 rounded-full mr-3"></div>
                  <span class="text-sm font-medium text-slate-700">{{ response }}</span>
                </div>
                <div class="flex items-center">
                  <span class="text-sm font-bold text-slate-900 mr-2">{{ count }}</span>
                  <div class="w-16 bg-slate-200 rounded-full h-2">
                    <div 
                      :class="getCourtesyColor(response).replace('bg-', 'bg-')" 
                      class="h-2 rounded-full transition-all duration-300"
                      :style="{ width: getPercentage(count, getTotalCourtesy()) + '%' }"
                    ></div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="bg-white rounded-2xl shadow-xl p-6 border border-slate-200">
            <h3 class="text-lg font-semibold text-slate-800 mb-4">Easy to Understand</h3>
            <div class="space-y-3">
              <div v-for="(count, response) in stats.satisfaction_metrics.easy_to_understand" :key="response" class="flex items-center justify-between">
                <div class="flex items-center">
                  <div :class="getUnderstandColor(response)" class="w-3 h-3 rounded-full mr-3"></div>
                  <span class="text-sm font-medium text-slate-700">{{ response }}</span>
                </div>
                <div class="flex items-center">
                  <span class="text-sm font-bold text-slate-900 mr-2">{{ count }}</span>
                  <div class="w-16 bg-slate-200 rounded-full h-2">
                    <div 
                      :class="getUnderstandColor(response)" 
                      class="h-2 rounded-full transition-all duration-300"
                      :style="{ width: getPercentage(count, getTotalUnderstand()) + '%' }"
                    ></div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="bg-white rounded-2xl shadow-xl p-6 border border-slate-200">
            <h3 class="text-lg font-semibold text-slate-800 mb-4">Rating Distribution</h3>
            <div class="space-y-3">
              <div v-for="(count, rating) in stats.rating_distribution" :key="rating" class="flex items-center justify-between">
                <div class="flex items-center">
                  <span class="text-yellow-400 mr-2">{{ '⭐'.repeat(parseInt(rating)) }}</span>
                  <span class="text-sm font-medium text-slate-700">{{ rating }} Star</span>
                </div>
                <div class="flex items-center">
                  <span class="text-sm font-bold text-slate-900 mr-2">{{ count }}</span>
                  <div class="w-16 bg-slate-200 rounded-full h-2">
                    <div 
                      class="bg-gradient-to-r from-yellow-400 to-yellow-500 h-2 rounded-full transition-all duration-300"
                      :style="{ width: getPercentage(count, stats.total_responses) + '%' }"
                    ></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="max-w-7xl mx-auto mb-8">
        <div class="bg-white rounded-2xl shadow-xl p-8 border border-slate-200">
          <h3 class="text-xl font-semibold text-slate-800 mb-6">Service Completion Time</h3>
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <div v-for="(count, time) in stats.satisfaction_metrics.completion_time" :key="time" class="text-center p-4 bg-slate-50 rounded-lg">
              <div class="text-2xl font-bold text-slate-900 mb-2">{{ count }}</div>
              <div class="text-sm text-slate-600">{{ time }}</div>
              <div class="mt-2 w-full bg-slate-200 rounded-full h-2">
                <div 
                  class="bg-gradient-to-r from-blue-500 to-indigo-600 h-2 rounded-full transition-all duration-300"
                  :style="{ width: getPercentage(count, getTotalCompletion()) + '%' }"
                ></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="max-w-7xl mx-auto">
        <div class="bg-white rounded-2xl shadow-xl border border-slate-200 overflow-hidden">
          <div class="px-8 py-6 border-b border-slate-200">
            <h3 class="text-xl font-semibold text-slate-800">Recent Service Experiences</h3>
          </div>

          <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200">
              <thead class="bg-slate-50">
                <tr>
                  <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">User</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Overall Rating</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Staff Courtesy</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Completion Time</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Easy to Understand</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Date</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Actions</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-slate-200">
                <tr v-for="experience in experiences.data" :key="experience.id" class="hover:bg-slate-50 transition-colors duration-150">
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="flex-shrink-0 h-8 w-8">
                        <div class="h-8 w-8 rounded-full bg-gradient-to-r from-indigo-500 to-purple-600 flex items-center justify-center">
                          <span class="text-xs font-medium text-white">{{ getUserInitials(experience.user?.email) }}</span>
                        </div>
                      </div>
                      <div class="ml-3">
                        <div class="text-sm font-medium text-slate-900">{{ experience.user?.email || 'Anonymous' }}</div>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="flex text-yellow-400">
                        <span v-for="i in 5" :key="i" class="text-sm">
                          {{ i <= experience.rating ? '⭐' : '☆' }}
                        </span>
                      </div>
                      <span class="ml-2 text-sm font-medium text-slate-700">{{ experience.rating }}/5</span>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span :class="getCourtesyBadgeClass(experience.courteous_staff)" class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium">
                      {{ experience.courteous_staff }}
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-900">
                    {{ experience.completion_time }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span :class="getUnderstandBadgeClass(experience.easy_to_understand)" class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium">
                      {{ experience.easy_to_understand }}
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500">
                    {{ formatDate(experience.created_at) }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <div class="flex items-center space-x-2">
                      <button
                        @click="viewExperience(experience)"
                        class="text-blue-600 hover:text-blue-900 transition-colors duration-200"
                      >
                        View
                      </button>
                      <button
                        @click="deleteExperience(experience)"
                        class="text-red-600 hover:text-red-900 transition-colors duration-200"
                      >
                        Delete
                      </button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <div v-if="experiences.links.length > 3" class="px-6 py-4 border-t border-slate-200">
            <div class="flex items-center justify-between">
              <div class="text-sm text-slate-700">
                Showing {{ experiences.from }} to {{ experiences.to }} of {{ experiences.total }} results
              </div>
              <div class="flex space-x-1">
                <button
                  v-for="link in experiences.links"
                  :key="link.label"
                  @click="link.url && changePage(link.url)"
                  :disabled="!link.url"
                  :class="[
                    'px-3 py-2 text-sm font-medium rounded-md transition-colors duration-200',
                    link.active 
                      ? 'bg-blue-600 text-white' 
                      : link.url 
                        ? 'text-slate-700 hover:bg-slate-100' 
                        : 'text-slate-400 cursor-not-allowed'
                  ]"
                  v-html="link.label"
                />
              </div>
            </div>
          </div>
        </div>
      </div>

      <div v-if="selectedExperience" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-lg w-full max-h-[90vh] overflow-y-auto">
          <div class="px-8 py-6 border-b border-slate-200">
            <div class="flex items-center justify-between">
              <h3 class="text-xl font-semibold text-slate-800">Service Experience Details</h3>
              <button
                @click="selectedExperience = null"
                class="text-slate-400 hover:text-slate-600 transition-colors duration-200"
              >
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
          </div>
          
          <div class="p-8 space-y-6">
            <div>
              <label class="block text-sm font-medium text-slate-600 mb-2">Overall Rating</label>
              <div class="flex items-center">
                <div class="flex text-yellow-400 text-xl">
                  <span v-for="i in 5" :key="i">
                    {{ i <= selectedExperience.rating ? '⭐' : '☆' }}
                  </span>
                </div>
                <span class="ml-3 text-lg font-medium text-slate-700">{{ selectedExperience.rating }}/5</span>
              </div>
            </div>

            <div>
              <label class="block text-sm font-medium text-slate-600 mb-2">Staff Courtesy</label>
              <span :class="getCourtesyBadgeClass(selectedExperience.courteous_staff)" class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium">
                {{ selectedExperience.courteous_staff }}
              </span>
            </div>

            <div>
              <label class="block text-sm font-medium text-slate-600 mb-2">Completion Time</label>
              <p class="text-slate-900">{{ selectedExperience.completion_time }}</p>
            </div>

            <div>
              <label class="block text-sm font-medium text-slate-600 mb-2">Easy to Understand</label>
              <span :class="getUnderstandBadgeClass(selectedExperience.easy_to_understand)" class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium">
                {{ selectedExperience.easy_to_understand }}
              </span>
            </div>

            <div>
              <label class="block text-sm font-medium text-slate-600 mb-1">User</label>
              <p class="text-slate-900">{{ selectedExperience.user?.email || 'Anonymous' }}</p>
            </div>

            <div>
              <label class="block text-sm font-medium text-slate-600 mb-1">Submitted</label>
              <p class="text-slate-900">{{ formatDate(selectedExperience.created_at) }}</p>
            </div>
          </div>
        </div>
      </div>

      <div v-if="confirmDelete" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full">
          <div class="px-8 py-6 border-b border-slate-200">
            <h3 class="text-lg font-semibold text-slate-800">Confirm Delete</h3>
          </div>
          
          <div class="p-8">
            <p class="text-slate-600 mb-6">Are you sure you want to delete this service experience feedback? This action cannot be undone.</p>
            
            <div class="flex justify-end space-x-3">
              <button
                @click="confirmDelete = null"
                class="px-4 py-2 text-slate-600 hover:text-slate-800 font-medium transition-colors duration-200"
              >
                Cancel
              </button>
              <button
                @click="confirmDeleteExperience"
                class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors duration-200"
              >
                Delete
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AdminLayout>
</template>

<script>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { Head, router } from '@inertiajs/vue3'

export default {
  components: {
    AdminLayout,
    Head
  },
  
  props: {
    experiences: Object,
    stats: Object
  },
  
  data() {
    return {
      selectedExperience: null,
      confirmDelete: null
    }
  },
  
  methods: {
    viewExperience(experience) {
      this.selectedExperience = experience
    },
    
    deleteExperience(experience) {
      this.confirmDelete = experience
    },
    
    confirmDeleteExperience() {
      if (this.confirmDelete) {
        router.delete(route('admin.manage-service-experience.destroy', this.confirmDelete.id), {
          onSuccess: () => {
            this.confirmDelete = null
          }
        })
      }
    },
    
    changePage(url) {
      router.get(url)
    },
    
    viewAnalytics() {
      router.get(route('admin.manage-service-experience.analytics'))
    },
    
    exportData() {
      window.open(route('admin.manage-service-experience.export'), '_blank')
    },
    
    formatDate(dateString) {
      const date = new Date(dateString)
      return date.toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'short',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
      })
    },
    
    getUserInitials(email) {
      if (!email) return 'A'
      const parts = email.split('@')[0].split('.')
      if (parts.length >= 2) {
        return (parts[0][0] + parts[1][0]).toUpperCase()
      }
      return email[0].toUpperCase()
    },
    
    getCourtesyColor(response) {
      switch (response) {
        case 'Yes': return 'bg-green-500'
        case 'No': return 'bg-red-500'
        case 'Somewhat': return 'bg-yellow-500'
        default: return 'bg-slate-400'
      }
    },
    
    getUnderstandColor(response) {
      switch (response) {
        case 'Yes': return 'bg-blue-500'
        case 'No': return 'bg-red-500'
        case 'Somewhat': return 'bg-orange-500'
        default: return 'bg-slate-400'
      }
    },
    
    getCourtesyBadgeClass(response) {
      switch (response) {
        case 'Yes': return 'bg-green-100 text-green-800'
        case 'No': return 'bg-red-100 text-red-800'
        case 'Somewhat': return 'bg-yellow-100 text-yellow-800'
        default: return 'bg-slate-100 text-slate-800'
      }
    },
    
    getUnderstandBadgeClass(response) {
      switch (response) {
        case 'Yes': return 'bg-blue-100 text-blue-800'
        case 'No': return 'bg-red-100 text-red-800'
        case 'Somewhat': return 'bg-orange-100 text-orange-800'
        default: return 'bg-slate-100 text-slate-800'
      }
    },
    
    getPercentage(value, total) {
      return total > 0 ? Math.round((value / total) * 100) : 0
    },
    
    getTotalCourtesy() {
      const metrics = this.stats.satisfaction_metrics.courteous_staff
      return metrics.Yes + metrics.No + metrics.Somewhat
    },
    
    getTotalUnderstand() {
      const metrics = this.stats.satisfaction_metrics.easy_to_understand
      return metrics.Yes + metrics.No + metrics.Somewhat
    },
    
    getTotalCompletion() {
      const metrics = this.stats.satisfaction_metrics.completion_time
      return Object.values(metrics).reduce((sum, count) => sum + count, 0)
    }
  }
}
</script>