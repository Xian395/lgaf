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
          <div class="bg-white/80 backdrop-blur-sm shadow-2xl border border-white/20 rounded-3xl overflow-hidden">
            
            <!-- Browser-style Tab Navigation -->
            <div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 relative overflow-hidden">
              <div class="absolute inset-0 bg-black/10"></div>
              <div class="relative z-10">
                <div class="flex flex-col sm:flex-row">
                  <button 
                    @click="activeTab = 'assistance'"
                    :class="activeTab === 'assistance' ? 'bg-white/20 border-b-4 border-white text-white' : 'text-white/80 hover:text-white hover:bg-white/10'"
                    class="relative px-4 sm:px-6 py-3 sm:py-4 font-medium text-sm transition-all duration-200 focus:outline-none rounded-t-lg sm:ml-2 order-1"
                  >
                    <div class="flex items-center justify-center sm:justify-start">
                      <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17h-2v-2h2v2zm2.07-7.75l-.9.92C13.45 12.9 13 13.5 13 15h-2v-.5c0-1.1.45-2.1 1.17-2.83l1.24-1.26c.37-.36.59-.86.59-1.41 0-1.1-.9-2-2-2s-2 .9-2 2H8c0-2.21 1.79-4 4-4s4 1.79 4 4c0 .88-.36 1.68-.93 2.25z"/>
                      </svg>
                      <span class="hidden sm:inline">Assistance Requests</span>
                      <span class="sm:hidden">Assistance</span>
                      <!-- Notification Badge -->
                      <div v-if="getAssistanceCount() > 0" class="ml-2 bg-yellow-400 text-yellow-900 rounded-full min-w-[20px] h-5 flex items-center justify-center text-xs font-bold px-1.5 animate-pulse">
                        {{ getAssistanceCount() }}
                      </div>
                    </div>
                  </button>
                  
                  <button 
                    @click="activeTab = 'issues'"
                    :class="activeTab === 'issues' ? 'bg-white/20 border-b-4 border-white text-white' : 'text-white/80 hover:text-white hover:bg-white/10'"
                    class="relative px-4 sm:px-6 py-3 sm:py-4 font-medium text-sm transition-all duration-200 focus:outline-none rounded-t-lg sm:ml-2 order-2"
                  >
                    <div class="flex items-center justify-center sm:justify-start">
                      <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
                      </svg>
                      <span class="hidden sm:inline">Issue Reports</span>
                      <span class="sm:hidden">Issues</span>
                      <!-- Notification Badge -->
                      <div v-if="getIssuesCount() > 0" class="ml-2 bg-red-400 text-red-900 rounded-full min-w-[20px] h-5 flex items-center justify-center text-xs font-bold px-1.5 animate-pulse">
                        {{ getIssuesCount() }}
                      </div>
                    </div>
                  </button>
                </div>
              </div>
            </div>
            
            <!-- Tab Content -->
            <div class="p-4 sm:p-8">
              
              <!-- Assistance Request Tab -->
              <div v-if="activeTab === 'assistance'" class="min-h-[400px]">
                <div v-if="!props.intakeSheets || props.intakeSheets.length === 0" class="text-center py-8 sm:py-16">
                  <div class="w-16 sm:w-24 h-16 sm:h-24 bg-gradient-to-r from-indigo-400 to-purple-500 rounded-full flex items-center justify-center mx-auto mb-4 sm:mb-6">
                    <svg class="w-8 sm:w-12 h-8 sm:h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17h-2v-2h2v2zm2.07-7.75l-.9.92C13.45 12.9 13 13.5 13 15h-2v-.5c0-1.1.45-2.1 1.17-2.83l1.24-1.26c.37-.36.59-.86.59-1.41 0-1.1-.9-2-2-2s-2 .9-2 2H8c0-2.21 1.79-4 4-4s4 1.79 4 4c0 .88-.36 1.68-.93 2.25z"/>
                    </svg>
                  </div>
                  <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-4">No Assistance Requests</h3>
                  <p class="text-gray-600 text-base sm:text-lg mb-6 px-4">You haven't submitted any assistance requests yet.</p>
                </div>

                <div v-else>
                  <!-- Mobile Card View -->
                  <div class="sm:hidden space-y-4">
                    <div v-for="sheet in props.intakeSheets" :key="sheet.id" class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
                      <div class="p-4">
                        <div class="flex items-center justify-between mb-3">
                          <div class="flex items-center">
                            <div class="w-8 h-8 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full flex items-center justify-center mr-3">
                              <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                              </svg>
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
                  <div class="hidden sm:block overflow-x-auto">
                    <table class="w-full">
                      <thead>
                        <tr class="text-left">
                          <th class="pb-6 text-lg font-semibold text-gray-800 border-b-2 border-gray-200">
                            <div class="flex items-center">
                              <svg class="w-5 h-5 mr-2 text-indigo-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                              </svg>
                              Client Name
                            </div>
                          </th>
                          <th class="pb-6 text-lg font-semibold text-gray-800 border-b-2 border-gray-200">
                            <div class="flex items-center">
                              <svg class="w-5 h-5 mr-2 text-purple-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                              </svg>
                              Beneficiary
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
                                <path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 2 2h8c1.1 0 2-.9 2-2V8l-6-6zm4 18H6V4h7v5h5v11z"/>
                              </svg>
                              Problem
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
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="sheet in props.intakeSheets" :key="sheet.id" class="border-t border-gray-100 hover:bg-gradient-to-r hover:from-indigo-50/50 hover:to-purple-50/50 transition-all duration-200">
                          <td class="py-6">
                            <div class="flex items-center">
                              <div class="w-10 h-10 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full flex items-center justify-center mr-3">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                  <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                </svg>
                              </div>
                              <span class="font-medium text-gray-900">{{ sheet.client_name }}</span>
                            </div>
                          </td>
                          <td class="py-6">
                            <span class="text-gray-700">{{ sheet.beneficiary_name }}</span>
                          </td>
                          <td class="py-6">
                            <span :class="getIntakeStatusClass(sheet.status)" class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium">
                              <div :class="getIntakeStatusDotClass(sheet.status)" class="w-2 h-2 rounded-full mr-2"></div>
                              {{ formatStatus(sheet.status || 'PENDING') }}
                            </span>
                          </td>
                          <td class="py-6">
                            <div class="max-w-xs">
                              <p class="text-gray-700 font-medium truncate">{{ sheet.problem_presented }}</p>
                            </div>
                          </td>
                          <td class="py-6">
                            <div class="flex items-center text-gray-700">
                              <svg class="w-4 h-4 mr-2 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M9 11H7v6h2v-6zm4 0h-2v6h2v-6zm4 0h-2v6h2v-6zm2.5-9H18V0h-2v2H8V0H6v2H3.5C2.67 2 2 2.67 2 3.5v1C2 5.33 2.67 6 3.5 6H20.5c.83 0 1.5-.67 1.5-1.5v-1C22 2.67 21.33 2 20.5 2z"/>
                              </svg>
                              <span class="font-medium">{{ new Date(sheet.created_at).toLocaleDateString() }}</span>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <!-- Issues Tab -->
              <div v-if="activeTab === 'issues'">
                <div v-if="!props.issues || props.issues.length === 0" class="text-center py-8 sm:py-16">
                  <div class="w-16 sm:w-24 h-16 sm:h-24 bg-gray-400 rounded-full flex items-center justify-center mx-auto mb-4 sm:mb-6">
                    <svg class="w-8 sm:w-12 h-8 sm:h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
                    </svg>
                  </div>
                  <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-4">No Issues Reported</h3>
                  <p class="text-gray-600 text-base sm:text-lg px-4">You haven't submitted any issues yet.</p>
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
                  <div class="hidden sm:block overflow-x-auto">
                    <table class="w-full">
                      <thead>
                        <tr class="text-left border-b-2 border-gray-200">
                          <th class="pb-4 text-sm font-semibold text-gray-700 uppercase tracking-wide">
                            <div class="flex items-center">
                              <svg class="w-4 h-4 mr-2 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                              </svg>
                              Type
                            </div>
                          </th>
                          <th class="pb-4 text-sm font-semibold text-gray-700 uppercase tracking-wide">
                            <div class="flex items-center">
                              <svg class="w-4 h-4 mr-2 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 2 2h8c1.1 0 2-.9 2-2V8l-6-6zm4 18H6V4h7v5h5v11z"/>
                              </svg>
                              Description
                            </div>
                          </th>
                          <th class="pb-4 text-sm font-semibold text-gray-700 uppercase tracking-wide">
                            <div class="flex items-center">
                              <svg class="w-4 h-4 mr-2 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                              </svg>
                              Status
                            </div>
                          </th>
                          <th class="pb-4 text-sm font-semibold text-gray-700 uppercase tracking-wide">
                            <div class="flex items-center">
                              <svg class="w-4 h-4 mr-2 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                              </svg>
                              Location
                            </div>
                          </th>
                          <th class="pb-4 text-sm font-semibold text-gray-700 uppercase tracking-wide">
                            <div class="flex items-center">
                              <svg class="w-4 h-4 mr-2 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M9 11H7v6h2v-6zm4 0h-2v6h2v-6zm4 0h-2v6h2v-6zm2.5-9H18V0h-2v2H8V0H6v2H3.5C2.67 2 2 2.67 2 3.5v1C2 5.33 2.67 6 3.5 6H20.5c.83 0 1.5-.67 1.5-1.5v-1C22 2.67 21.33 2 20.5 2z"/>
                              </svg>
                              Submitted
                            </div>
                          </th>
                          <th class="pb-4 text-sm font-semibold text-gray-700 uppercase tracking-wide">
                            <div class="flex items-center">
                              <svg class="w-4 h-4 mr-2 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/>
                              </svg>
                              Image
                            </div>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="issue in props.issues" :key="issue.id" class="border-b border-gray-100 hover:bg-gray-50 transition-colors duration-200">
                          <td class="py-4">
                            <div class="flex items-center">
                              <div class="w-8 h-8 bg-red-500 rounded-full flex items-center justify-center mr-3">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                  <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
                                </svg>
                              </div>
                              <span class="font-medium text-gray-900">{{ formatType(issue.type) }}</span>
                            </div>
                          </td>
                          <td class="py-4">
                            <div class="max-w-xs">
                              <p class="text-gray-700 truncate">{{ issue.description }}</p>
                            </div>
                          </td>
                          <td class="py-4">
                            <span :class="getStatusClass(issue.status)" class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium">
                              <div :class="getStatusDotClass(issue.status)" class="w-2 h-2 rounded-full mr-2"></div>
                              {{ formatStatus(issue.status) }}
                            </span>
                          </td>
                          <td class="py-4">
                            <span class="text-gray-700">{{ issue.location }}</span>
                          </td>
                          <td class="py-4">
                            <div class="flex items-center text-gray-600">
                              <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M9 11H7v6h2v-6zm4 0h-2v6h2v-6zm4 0h-2v6h2v-6zm2.5-9H18V0h-2v2H8V0H6v2H3.5C2.67 2 2 2.67 2 3.5v1C2 5.33 2.67 6 3.5 6H20.5c.83 0 1.5-.67 1.5-1.5v-1C22 2.67 21.33 2 20.5 2z"/>
                              </svg>
                              <span>{{ new Date(issue.created_at).toLocaleDateString() }}</span>
                            </div>
                          </td>
                          <td class="py-4">
                            <div v-if="issue.image_path" class="flex items-center">
                              <span class="inline-flex items-center px-2 py-1 bg-blue-50 text-blue-700 rounded-md text-xs">
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

const getPendingCount = () => {
  return props.issues.filter(issue => issue.status === 'pending' || issue.status === 'in_progress').length;
};

const getResolvedCount = () => {
  return props.issues.filter(issue => issue.status === 'resolved' || issue.status === 'closed').length;
};
</script>

<style scoped>
/* Browser tab styling */
button[style*="margin-bottom: -1px"] {
  border-bottom: 1px solid transparent;
}
button[style*="margin-bottom: -1px"].bg-white {
  border-bottom: 1px solid white;
  z-index: 1;
  position: relative;
}
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