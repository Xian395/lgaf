<template>
  <ResidentLayout>
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 py-8 px-4 sm:px-6 lg:px-8">
      <!-- Floating particles background -->
      <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/4 left-1/4 w-2 h-2 bg-blue-300 rounded-full opacity-20 animate-pulse"></div>
        <div class="absolute top-1/3 right-1/3 w-3 h-3 bg-indigo-300 rounded-full opacity-30 animate-bounce"></div>
        <div class="absolute bottom-1/4 left-1/3 w-1 h-1 bg-purple-300 rounded-full opacity-40 animate-ping"></div>
      </div>

      <div class="relative max-w-4xl mx-auto">
        <!-- Progress indicator -->
        <div class="mb-8">
          <div class="flex items-center justify-center mb-4">
            <div class="flex space-x-2">
              <div 
                v-for="step in 5" 
                :key="step"
                class="w-3 h-3 rounded-full transition-all duration-300"
                :class="getStepProgress(step - 1) ? 'bg-indigo-500 scale-110' : 'bg-gray-300'"
              ></div>
            </div>
          </div>
          <div class="text-center text-sm text-gray-600">
            {{ getProgressText() }}
          </div>
        </div>

        <!-- Main form card -->
        <div class="bg-white/80 backdrop-blur-sm shadow-2xl rounded-3xl border border-white/20 overflow-hidden transition-all duration-500 hover:shadow-3xl">
          <!-- Header section with gradient -->
          <div class="bg-gradient-to-r from-red-600 via-orange-600 to-yellow-600 p-8 text-white relative overflow-hidden">
            <div class="absolute inset-0 bg-black/10"></div>
            <div class="relative z-10">
              <div class="flex items-center justify-center mb-4">
                <div class="p-3 bg-white/20 rounded-full backdrop-blur-sm">
                  <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M1 21h22L12 2 1 21zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                  </svg>
                </div>
              </div>
              <h1 class="text-4xl font-bold text-center mb-4 tracking-tight">
                Report an Issue
              </h1>
              <p class="text-xl text-center text-white/90 leading-relaxed max-w-2xl mx-auto">
                Help us improve Tubod by reporting issues in your community. Your reports help us address problems quickly.
              </p>
            </div>
          </div>

          <!-- Form content -->
          <div class="p-8 lg:p-12">
            <form @submit.prevent="submitForm" class="space-y-10">
              
              <!-- Issue Details Section -->
              <div class="group">
                <div class="text-center mb-8">
                  <h3 class="text-2xl font-semibold text-gray-800 mb-2 flex items-center justify-center">
                    <svg class="w-6 h-6 mr-2 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M1 21h22L12 2 1 21zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                    </svg>
                    Issue Details
                  </h3>
                </div>
                
                <div class="grid grid-cols-1 gap-6">
                  <!-- Issue Type -->
                  <div class="group">
                    <label for="type" class="block text-sm font-semibold text-gray-700 mb-2">Issue Type</label>
                    <select
                      id="type"
                      v-model="form.type"
                      required
                      class="w-full px-4 py-3 border-2 border-gray-200 rounded-2xl focus:border-red-500 focus:ring-0 transition-all duration-300 bg-white/50 backdrop-blur-sm text-gray-800"
                    >
                      <option value="">Select an issue type</option>
                      <option v-for="type in issueTypes" :key="type" :value="type">
                        {{ formatType(type) }}
                      </option>
                    </select>
                    <p v-if="form.errors.type" class="mt-2 text-sm text-red-600">
                      {{ form.errors.type }}
                    </p>
                  </div>

                  <!-- Description -->
                  <div class="group">
                    <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                    <textarea
                      id="description"
                      v-model="form.description"
                      rows="5"
                      required
                      class="w-full px-4 py-3 border-2 border-gray-200 rounded-2xl focus:border-red-500 focus:ring-0 transition-all duration-300 bg-white/50 backdrop-blur-sm text-gray-800 placeholder-gray-400 resize-none"
                      placeholder="Describe the issue in detail..."
                    ></textarea>
                    <p v-if="form.errors.description" class="mt-2 text-sm text-red-600">
                      {{ form.errors.description }}
                    </p>
                  </div>

                  <!-- Location -->
                  <div class="group">
                    <label for="location" class="block text-sm font-semibold text-gray-700 mb-2">Location</label>
                    <input
                      id="location"
                      v-model="form.location"
                      type="text"
                      required
                      class="w-full px-4 py-3 border-2 border-gray-200 rounded-2xl focus:border-red-500 focus:ring-0 transition-all duration-300 bg-white/50 backdrop-blur-sm text-gray-800 placeholder-gray-400"
                      placeholder="Barangay / Street / Purok"
                    />
                    <p v-if="form.errors.location" class="mt-2 text-sm text-red-600">
                      {{ form.errors.location }}
                    </p>
                  </div>
                </div>
              </div>

              <!-- Animated divider -->
              <div class="flex items-center justify-center my-8">
                <div class="h-px bg-gradient-to-r from-transparent via-gray-300 to-transparent w-full"></div>
                <div class="px-4">
                  <div class="w-3 h-3 bg-red-500 rounded-full animate-pulse"></div>
                </div>
                <div class="h-px bg-gradient-to-r from-transparent via-gray-300 to-transparent w-full"></div>
              </div>

              <!-- File Upload Section -->
              <div class="group">
                <div class="text-center mb-8">
                  <h3 class="text-2xl font-semibold text-gray-800 mb-2 flex items-center justify-center">
                    <svg class="w-6 h-6 mr-2 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M14 2H6c-1.1 0-2 .9-2 2v16c0 1.1.89 2 2 2h12c1.1 0 2-.9 2-2V8l-6-6zm4 18H6V4h7v5h5v11z"/>
                    </svg>
                    Supporting Evidence
                  </h3>
                  <p class="text-gray-600">Upload an image to help us understand the issue better (Optional)</p>
                </div>
                
                <div class="group">
                  <div class="relative">
                    <input
                      id="file"
                      type="file"
                      accept="image/jpeg,image/png"
                      @change="handleFileChange"
                      class="hidden"
                    />
                    <label
                      for="file"
                      class="flex flex-col items-center justify-center w-full h-48 border-2 border-dashed border-gray-300 rounded-2xl cursor-pointer bg-white/50 backdrop-blur-sm hover:bg-gray-50 hover:border-red-400 transition-all duration-300"
                      :class="form.file ? 'border-red-500 bg-red-50' : ''"
                    >
                      <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                        </svg>
                        <p class="mb-2 text-sm text-gray-500">
                          <span class="font-semibold">Click to upload</span> or drag and drop
                        </p>
                        <p class="text-xs text-gray-500">JPG or PNG (max 2MB)</p>
                        <p v-if="form.file" class="mt-2 text-sm text-red-600 font-medium">
                          Selected: {{ form.file.name }}
                        </p>
                      </div>
                    </label>
                  </div>
                  <p v-if="form.errors.file" class="mt-2 text-sm text-red-600">
                    {{ form.errors.file }}
                  </p>
                </div>
              </div>

              <!-- Submit Button -->
              <div class="pt-8">
                <div class="flex justify-center">
                  <button
                    type="submit"
                    :disabled="form.processing || !isFormValid"
                    class="group relative px-12 py-4 bg-gradient-to-r from-red-600 to-orange-600 text-white font-semibold rounded-2xl transition-all duration-300 hover:from-red-700 hover:to-orange-700 hover:scale-105 hover:shadow-xl disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:scale-100 focus:outline-none focus:ring-4 focus:ring-red-300"
                  >
                    <span class="flex items-center">
                      <svg v-if="form.processing" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                      </svg>
                      <span class="text-lg">
                        {{ form.processing ? 'Submitting...' : 'Submit Report' }}
                      </span>
                      <svg v-if="!form.processing" class="ml-2 w-5 h-5 transition-transform group-hover:translate-x-1" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/>
                      </svg>
                    </span>
                  </button>
                </div>
                <div class="text-center mt-4 text-sm text-gray-500">
                  {{ isFormValid ? 'Ready to submit' : 'Please complete all required fields' }}
                </div>
              </div>
            </form>
          </div>
        </div>

        <!-- Thank you message -->
        <div v-if="showThankYou" class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-50">
          <div class="bg-white rounded-3xl p-8 max-w-md mx-4 text-center animate-bounce">
            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
              <svg class="w-8 h-8 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
              </svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-2">Report Submitted!</h3>
            <p class="text-gray-600">Thank you for helping improve our community. We'll address this issue promptly.</p>
          </div>
        </div>
      </div>
    </div>
  </ResidentLayout>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';
import ResidentLayout from '@/Layouts/ResidentLayout.vue';
import { notifyMinimal } from '@/globalFunctions.js';
import { ref, computed } from 'vue';

defineProps({
  issueTypes: Array,
});

const showThankYou = ref(false);

const form = useForm({
  type: '',
  description: '',
  location: '',
  file: null,
});

const isFormValid = computed(() => {
  return form.type && form.description && form.location;
});

const formatType = (type) => {
  return type.charAt(0).toUpperCase() + type.slice(1).replace('_', ' ');
};

const handleFileChange = (event) => {
  form.file = event.target.files[0] || null;
};

const getStepProgress = (step) => {
  const fields = ['type', 'description', 'location', 'file', 'complete'];
  const field = fields[step];
  if (field === 'file') {
    return true; 
  }
  if (field === 'complete') {
    return isFormValid.value;
  }
  return form[field] !== null && form[field] !== '';
};

const getProgressText = () => {
  const completed = [
    form.type, 
    form.description, 
    form.location, 
    'completed', 
    isFormValid.value ? 'completed' : ''
  ].filter(field => field !== null && field !== '').length;
  return `${completed} of 5 sections completed`;
};

const submitForm = () => {
  form.post(route('resident.report.store'), {
    onSuccess: () => {
      showThankYou.value = true;
      setTimeout(() => {
        showThankYou.value = false;
        form.reset();
      }, 3000);
      notifyMinimal('Report submitted successfully!', 'success');
    },
    onError: () => {
      notifyMinimal('Failed to submit report. Please check the form.', 'error');
    },
  });
};
</script>

<style scoped>
.animate-bounce {
  animation: bounce 0.5s ease-in-out;
}

@keyframes bounce {
  0%, 20%, 53%, 80%, 100% {
    transform: translate3d(0,0,0);
  }
  40%, 43% {
    transform: translate3d(0, -10px, 0);
  }
  70% {
    transform: translate3d(0, -5px, 0);
  }
  90% {
    transform: translate3d(0, -2px, 0);
  }
}

.hover\:shadow-3xl:hover {
  box-shadow: 0 35px 60px -12px rgba(0, 0, 0, 0.25);
}
</style>