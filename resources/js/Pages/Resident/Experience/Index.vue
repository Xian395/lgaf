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
                v-for="step in 4" 
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
        <div class="bg-white/80 backdrop-blur-sm shadow-2xl border border-white/20 overflow-hidden transition-all duration-500 hover:shadow-3xl">
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
                Share Your Experience
              </h1>
              <p class="text-xl text-center text-white/90 leading-relaxed max-w-2xl mx-auto">
                Your feedback helps us deliver exceptional service. Every response matters.
              </p>
            </div>
          </div>

          <!-- Form content -->
          <div class="p-8 lg:p-12">
            <form @submit.prevent="submit" class="space-y-10">
              
              <!-- Star Rating Section -->
              <div class="group">
                <div class="text-center mb-8">
                  <h3 class="text-2xl font-semibold text-gray-800 mb-2">How would you rate our service?</h3>
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

              <!-- Animated divider -->
              <div class="flex items-center justify-center my-8">
                <div class="h-px bg-gradient-to-r from-transparent via-gray-300 to-transparent w-full"></div>
                <div class="px-4">
                  <div class="w-3 h-3 bg-indigo-500 rounded-full animate-pulse"></div>
                </div>
                <div class="h-px bg-gradient-to-r from-transparent via-gray-300 to-transparent w-full"></div>
              </div>

              <!-- Staff Courtesy Section -->
              <div class="group">
                <div class="mb-6">
                  <h3 class="text-xl font-semibold text-gray-800 mb-2 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-indigo-500" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M16 4c0-1.11.89-2 2-2s2 .89 2 2-.89 2-2 2-2-.89-2-2zm4 18v-6h2.5l-2.54-7.63A2.001 2.001 0 0 0 17.5 7h-3c-.8 0-1.5.7-1.5 1.5v6c0 .8.7 1.5 1.5 1.5h2v6h4z"/>
                    </svg>
                    Was the staff courteous and helpful?
                  </h3>
                  <p class="text-gray-600">Tell us about your interaction with our team</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                  <label
                    v-for="option in courteousStaffOptions"
                    :key="option"
                    class="relative group cursor-pointer"
                  >
                    <input
                      type="radio"
                      :value="option"
                      v-model="form.courteous_staff"
                      class="sr-only"
                      required
                    />
                    <div 
                      class="p-6 border-2 rounded-2xl transition-all duration-300 hover:scale-105 hover:shadow-lg"
                      :class="getOptionClass('courteous_staff', option)"
                    >
                      <div class="flex items-center justify-center mb-3">
                        <div class="w-6 h-6 rounded-full border-2 transition-all duration-200"
                             :class="form.courteous_staff === option ? 'border-indigo-500 bg-indigo-500' : 'border-gray-300'">
                          <svg v-if="form.courteous_staff === option" class="w-4 h-4 text-white m-0.5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                          </svg>
                        </div>
                      </div>
                      <span class="text-lg font-medium text-center block">{{ option }}</span>
                    </div>
                  </label>
                </div>
                <InputError class="mt-3" :message="form.errors.courteous_staff" />
              </div>

              <!-- Completion Time Section -->
              <div class="group">
                <div class="mb-6">
                  <h3 class="text-xl font-semibold text-gray-800 mb-2 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-indigo-500" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg>
                    How long did the service take?
                  </h3>
                  <p class="text-gray-600">Help us understand our service efficiency</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                  <label
                    v-for="option in completionTimeOptions"
                    :key="option"
                    class="relative group cursor-pointer"
                  >
                    <input
                      type="radio"
                      :value="option"
                      v-model="form.completion_time"
                      class="sr-only"
                      required
                    />
                    <div 
                      class="p-6 border-2 rounded-2xl transition-all duration-300 hover:scale-105 hover:shadow-lg"
                      :class="getOptionClass('completion_time', option)"
                    >
                      <div class="flex items-center justify-center mb-3">
                        <div class="w-6 h-6 rounded-full border-2 transition-all duration-200"
                             :class="form.completion_time === option ? 'border-indigo-500 bg-indigo-500' : 'border-gray-300'">
                          <svg v-if="form.completion_time === option" class="w-4 h-4 text-white m-0.5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                          </svg>
                        </div>
                      </div>
                      <span class="text-base font-medium text-center block">{{ option }}</span>
                    </div>
                  </label>
                </div>
                <InputError class="mt-3" :message="form.errors.completion_time" />
              </div>

              <!-- Easy to Understand Section -->
              <div class="group">
                <div class="mb-6">
                  <h3 class="text-xl font-semibold text-gray-800 mb-2 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-indigo-500" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                    Was the process easy to understand?
                  </h3>
                  <p class="text-gray-600">Your feedback on process clarity</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                  <label
                    v-for="option in easyToUnderstandOptions"
                    :key="option"
                    class="relative group cursor-pointer"
                  >
                    <input
                      type="radio"
                      :value="option"
                      v-model="form.easy_to_understand"
                      class="sr-only"
                      required
                    />
                    <div 
                      class="p-6 border-2 rounded-2xl transition-all duration-300 hover:scale-105 hover:shadow-lg"
                      :class="getOptionClass('easy_to_understand', option)"
                    >
                      <div class="flex items-center justify-center mb-3">
                        <div class="w-6 h-6 rounded-full border-2 transition-all duration-200"
                             :class="form.easy_to_understand === option ? 'border-indigo-500 bg-indigo-500' : 'border-gray-300'">
                          <svg v-if="form.easy_to_understand === option" class="w-4 h-4 text-white m-0.5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                          </svg>
                        </div>
                      </div>
                      <span class="text-lg font-medium text-center block">{{ option }}</span>
                    </div>
                  </label>
                </div>
                <InputError class="mt-3" :message="form.errors.easy_to_understand" />
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
                        {{ form.processing ? 'Submitting...' : 'Submit Experience' }}
                      </span>
                      <svg v-if="!form.processing" class="ml-2 w-5 h-5 transition-transform group-hover:translate-x-1" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/>
                      </svg>
                    </span>
                  </button>
                </div>
                <div class="text-center mt-4 text-sm text-gray-500">
                  {{ isFormValid ? 'Ready to submit' : 'Please complete all fields' }}
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
import ResidentLayout from '@/Layouts/ResidentLayout.vue';
import InputError from '@/Components/InputError.vue';
import { useForm } from '@inertiajs/vue3';
import { notifyMinimal } from "@/globalFunctions.js";
import { ref, computed } from 'vue';

const courteousStaffOptions = ['Yes', 'No', 'Somewhat'];
const completionTimeOptions = ['Less than 10 minutes', '10–30 minutes', 'More than 30 minutes', 'I did not complete it'];
const easyToUnderstandOptions = ['Yes', 'No', 'Somewhat'];

const hoverRating = ref(0);
const showThankYou = ref(false);

const form = useForm({
  rating: null,
  courteous_staff: '',
  completion_time: '',
  easy_to_understand: '',
});

const isFormValid = computed(() => {
  return form.rating && form.courteous_staff && form.completion_time && form.easy_to_understand;
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

const getOptionClass = (field, option) => {
  if (form[field] === option) {
    return 'border-indigo-500 bg-indigo-50 text-indigo-700 shadow-lg ring-2 ring-indigo-200';
  }
  return 'border-gray-200 bg-white text-gray-700 hover:border-indigo-300 hover:bg-indigo-50';
};

const getStepProgress = (step) => {
  const fields = ['rating', 'courteous_staff', 'completion_time', 'easy_to_understand'];
  return form[fields[step]] !== null && form[fields[step]] !== '';
};

const getProgressText = () => {
  const completed = [form.rating, form.courteous_staff, form.completion_time, form.easy_to_understand]
    .filter(field => field !== null && field !== '').length;
  return `${completed} of 4 questions completed`;
};

const submit = () => {
  form.post(route('resident.experience.store'), {
    onSuccess: () => {
      showThankYou.value = true;
      setTimeout(() => {
        showThankYou.value = false;
        form.reset();
      }, 3000);
      notifyMinimal("Your responce has been submitted successfully!!", "success");
    },
    onError: () => {
      notifyMinimal(
        "Failed to submit experience. Please try again.",
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