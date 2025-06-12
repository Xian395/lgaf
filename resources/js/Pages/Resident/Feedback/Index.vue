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
                v-for="step in 7" 
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
          <div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-blue-600 p-8 text-white relative overflow-hidden">
            <div class="absolute inset-0 bg-black/10"></div>
            <div class="relative z-10">
              <div class="flex items-center justify-center mb-4">
                <div class="p-3 bg-white/20 rounded-full backdrop-blur-sm">
                  <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                  </svg>
                </div>
              </div>
              <h1 class="text-4xl font-bold text-center mb-4 tracking-tight">
                Welcome
              </h1>
              <p class="text-xl text-center text-white/90 leading-relaxed max-w-2xl mx-auto">
                Your feedback helps us improve the public services in Tubod. Please answer the questions below.
              </p>
            </div>
          </div>

          <!-- Form content -->
          <div class="p-8 lg:p-12">
            <form @submit.prevent="submit" class="space-y-10">
              
              <!-- Personal Information Section -->
              <div class="group">
                <div class="text-center mb-8">
                  <h3 class="text-2xl font-semibold text-gray-800 mb-2 flex items-center justify-center">
                    <svg class="w-6 h-6 mr-2 text-indigo-500" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                    Personal Information
                  </h3>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                  <div class="group">
                    <label for="full_name" class="block text-sm font-semibold text-gray-700 mb-2">Full Name</label>
                    <input
                      id="full_name"
                      type="text"
                      v-model="form.full_name"
                      required
                      readonly
                      class="w-full px-4 py-3 border-2 border-gray-200 rounded-2xl bg-gray-50 text-gray-600 cursor-not-allowed"
                      :placeholder="user?.name || 'Loading...'"
                    />
                    <p class="text-xs text-gray-500 mt-1">This information is automatically filled from your account</p>
                    <InputError class="mt-2" :message="form.errors.full_name" />
                  </div>

                  <div class="group">
                    <label for="age" class="block text-sm font-semibold text-gray-700 mb-2">Age</label>
                    <input
                      id="age"
                      type="number"
                      v-model.number="form.age"
                      required
                      autofocus
                      min="1"
                      class="w-full px-4 py-3 border-2 border-gray-200 rounded-2xl focus:border-indigo-500 focus:ring-0 transition-all duration-300 bg-white/50 backdrop-blur-sm text-gray-800 placeholder-gray-400"
                      placeholder="Enter your age"
                    />
                    <InputError class="mt-2" :message="form.errors.age" />
                  </div>

                  <div class="group">
                    <label for="gender" class="block text-sm font-semibold text-gray-700 mb-2">Gender</label>
                    <select
                      id="gender"
                      v-model="form.gender"
                      required
                      class="w-full px-4 py-3 border-2 border-gray-200 rounded-2xl focus:border-indigo-500 focus:ring-0 transition-all duration-300 bg-white/50 backdrop-blur-sm text-gray-800"
                    >
                      <option value="">Select Gender</option>
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                      <option value="other">Prefer not to say</option>
                    </select>
                    <InputError class="mt-2" :message="form.errors.gender" />
                  </div>

                  <div class="group">
                    <label for="barangay" class="block text-sm font-semibold text-gray-700 mb-2">Barangay</label>
                    <select
                      id="barangay"
                      v-model="form.barangay"
                      required
                      class="w-full px-4 py-3 border-2 border-gray-200 rounded-2xl focus:border-indigo-500 focus:ring-0 transition-all duration-300 bg-white/50 backdrop-blur-sm text-gray-800"
                    >
                      <option value="">Select Barangay</option>
                      <option value="cawilan">Cawilan</option>
                      <option value="del_rosario">Del Rosario</option>
                      <option value="capayahan">Capayahan</option>
                      <option value="marga">Marga</option>
                      <option value="san_isidro">San Isidro</option>
                      <option value="motorpol">Motorpol</option>
                      <option value="san_pablo">San Pablo</option>
                      <option value="timamana">Timamana</option>
                    </select>
                    <InputError class="mt-2" :message="form.errors.barangay" />
                  </div>
                </div>
              </div>

              <!-- Animated divider -->
              <div class="flex items-center justify-center my-8">
                <div class="h-px bg-gradient-to-r from-transparent via-gray-300 to-transparent w-full"></div>
                <div class="px-4">
                  <div class="w-3 h-3 bg-indigo-500 rounded-full animate-pulse"></div>
                </div>
                <div class="h-px bg-gradient-to-r from-transparent via-gray-300 to-transparent w-full"></div>
              </div>

              <!-- Feedback Questions Section Header -->
              <div class="text-center mb-8">
                <h3 class="text-2xl font-semibold text-gray-800 mb-2 flex items-center justify-center">
                  <svg class="w-6 h-6 mr-2 text-indigo-500" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-7 12h-2v-2h2v2zm0-4h-2V6h2v4z"/>
                  </svg>
                  Feedback Questions
                </h3>
              </div>

              <!-- Star Rating Section -->
              <div class="group">
                <div class="text-center mb-8">
                  <h3 class="text-xl font-semibold text-gray-800 mb-2">How satisfied are you with the service?</h3>
                  <p class="text-gray-600">Click on the stars to rate your experience</p>
                </div>
                
                <div class="flex justify-center items-center mb-6">
                  <div class="flex space-x-2">
                    <button
                      type="button"
                      v-for="star in 5"
                      :key="star"
                      @click="setRating(star)"
                      @mouseenter="hoverRating = star"
                      @mouseleave="hoverRating = 0"
                      class="text-7xl transition-all duration-200 transform hover:scale-110 focus:outline-none focus:ring-4 focus:ring-indigo-300 rounded-lg p-2"
                      :class="getRatingClass(star)"
                    >
                      ★
                    </button>
                  </div>
                </div>
                
                <div class="text-center">
                  <div class="text-lg font-medium text-gray-700 mb-2">
                    {{ getRatingText() }}
                  </div>
                  <div class="flex justify-center">
                    <div class="px-4 py-2 bg-indigo-50 rounded-full">
                      <span class="text-indigo-600 font-medium">
                        {{ form.rating ? `${form.rating} out of 5 stars` : "Select a rating" }}
                      </span>
                    </div>
                  </div>
                </div>
                <InputError class="mt-3 text-center" :message="form.errors.rating" />
              </div>

              <!-- Services Used Section -->
              <div class="group">
                <div class="mb-6">
                  <h3 class="text-xl font-semibold text-gray-800 mb-2 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-indigo-500" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                    </svg>
                    What Services did you use?
                  </h3>
                  <p class="text-gray-600">Select all services that apply</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                  <label
                    v-for="service in services"
                    :key="service"
                    class="relative group cursor-pointer"
                  >
                    <input
                      type="checkbox"
                      :value="service"
                      v-model="form.service_used"
                      class="sr-only"
                    />
                    <div 
                      class="p-6 border-2 rounded-2xl transition-all duration-300 hover:scale-105 hover:shadow-lg flex items-center"
                      :class="getServiceClass(service)"
                    >
                      <div class="flex items-center justify-center mr-4">
                        <div class="w-6 h-6 rounded-lg border-2 transition-all duration-200 flex items-center justify-center"
                             :class="form.service_used.includes(service) ? 'border-indigo-500 bg-indigo-500' : 'border-gray-300'">
                          <svg v-if="form.service_used.includes(service)" class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                          </svg>
                        </div>
                      </div>
                      <span class="text-base font-medium">{{ service }}</span>
                    </div>
                  </label>
                </div>
                <InputError class="mt-3" :message="form.errors.service_used" />
              </div>

              <!-- Suggestions Section -->
              <div class="group">
                <div class="mb-6">
                  <h3 class="text-xl font-semibold text-gray-800 mb-2 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-indigo-500" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M14 2H6c-1.1 0-2 .9-2 2v16c0 1.1.89 2 2 2h12c1.1 0 2-.9 2-2V8l-6-6zm4 18H6V4h7v5h5v11z"/>
                    </svg>
                    Suggestions (Optional)
                  </h3>
                  <p class="text-gray-600">Share your thoughts and suggestions to help us improve</p>
                </div>
                
                <textarea
                  id="suggestions"
                  v-model="form.suggestions"
                  rows="4"
                  class="w-full px-4 py-3 border-2 border-gray-200 rounded-2xl focus:border-indigo-500 focus:ring-0 transition-all duration-300 bg-white/50 backdrop-blur-sm text-gray-800 placeholder-gray-400 resize-none"
                  placeholder="Share your thoughts and suggestions..."
                ></textarea>
                <InputError class="mt-3" :message="form.errors.suggestions" />
              </div>

              <!-- Submit Button -->
              <div class="pt-8">
                <div class="flex justify-center">
                  <button
                    type="submit"
                    :disabled="form.processing || !isFormValid"
                    class="group relative px-12 py-4 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold rounded-2xl transition-all duration-300 hover:from-indigo-700 hover:to-purple-700 hover:scale-105 hover:shadow-xl disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:scale-100 focus:outline-none focus:ring-4 focus:ring-indigo-300"
                  >
                    <span class="flex items-center">
                      <svg v-if="form.processing" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                      </svg>
                      <span class="text-lg">
                        {{ form.processing ? 'Submitting...' : 'Submit Feedback' }}
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
            <h3 class="text-2xl font-bold text-gray-800 mb-2">Thank You!</h3>
            <p class="text-gray-600">Your feedback has been submitted successfully.</p>
          </div>
        </div>
      </div>
    </div>
  </ResidentLayout>
</template>

<script setup>
import ResidentLayout from "@/Layouts/ResidentLayout.vue";
import InputError from "@/Components/InputError.vue";
import { useForm, usePage } from "@inertiajs/vue3";
import { notifyMinimal } from "@/globalFunctions.js";
import { ref, computed, onMounted } from 'vue';

// Get authenticated user data
const { props } = usePage();
const user = computed(() => props.auth.user);

const services = [
    "Burial",
    "Food Supply",
    "Medical",
    "Educational Assistance",
    "Senior Citizen",
];

const hoverRating = ref(0);
const showThankYou = ref(false);

const form = useForm({
    full_name: "",
    age: null,
    gender: "",
    barangay: "",
    rating: null,
    service_used: [],
    suggestions: "",
});

// Pre-populate full name when component mounts
onMounted(() => {
    if (user.value) {
        form.full_name = user.value.name || user.value.full_name || "";
    }
});

const isFormValid = computed(() => {
    return form.full_name && form.age && form.gender && form.barangay && form.rating && form.service_used.length > 0;
});

const setRating = (rating) => {
    form.rating = rating;
};

const getRatingClass = (star) => {
    const activeRating = hoverRating.value || form.rating || 0;
    if (star <= activeRating) {
        return hoverRating.value 
            ? 'text-yellow-400 drop-shadow-lg' 
            : 'text-indigo-500 drop-shadow-lg';
    }
    return 'text-gray-300 hover:text-yellow-300';
};

const getRatingText = () => {
    const rating = form.rating;
    const texts = {
        1: 'Poor - We need to improve',
        2: 'Fair - Below expectations',
        3: 'Good - Meets expectations',
        4: 'Very Good - Exceeds expectations',
        5: 'Excellent - Outstanding service'
    };
    return rating ? texts[rating] : 'Select your rating';
};

const getServiceClass = (service) => {
    if (form.service_used.includes(service)) {
        return 'border-indigo-500 bg-indigo-50 text-indigo-700 shadow-lg ring-2 ring-indigo-200';
    }
    return 'border-gray-200 bg-white text-gray-700 hover:border-indigo-300 hover:bg-indigo-50';
};

const getStepProgress = (step) => {
    const fields = ['full_name', 'age', 'gender', 'barangay', 'rating', 'service_used', 'suggestions'];
    const field = fields[step];
    if (field === 'service_used') {
        return form[field].length > 0;
    }
    if (field === 'suggestions') {
        return true; // Optional field, always considered complete
    }
    return form[field] !== null && form[field] !== '';
};

const getProgressText = () => {
    const completed = [
        form.full_name, 
        form.age, 
        form.gender, 
        form.barangay, 
        form.rating, 
        form.service_used.length > 0 ? 'completed' : '',
        'completed' // suggestions is optional
    ].filter(field => field !== null && field !== '').length;
    return `${completed} of 7 sections completed`;
};

const submit = () => {
    form.post(route("resident.feedback.store"), {
        onSuccess: () => {
            showThankYou.value = true;
            setTimeout(() => {
                showThankYou.value = false;
                form.reset();
            }, 3000);
            notifyMinimal("Your responce has been submitted successfully!", "success");
        },
        onError: () => {
            notifyMinimal(
                "Failed to submit feedback. Please try again.",
                "error"
            );
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