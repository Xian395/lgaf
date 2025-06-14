<template>
  <AdminLayout>

     <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 py-8 px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
      <div class="max-w-7xl mx-auto mb-8">
        <div class="bg-white rounded-2xl shadow-xl p-8 border border-slate-200">
          <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <div>
              <h1 class="text-3xl font-bold text-slate-800 mb-2">Report Management</h1>
            </div>
            <div class="mt-4 sm:mt-0 flex gap-3">
              <button
                @click="exportFeedback"
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
     </div>
 
      

  </AdminLayout> 
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
</script>