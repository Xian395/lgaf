<template>
  <ResidentLayout>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-2 border-gray-300">
          <div class="p-6 text-black">
            <!-- Welcome Title and Message -->
            <div class="mb-8 text-center">
              <h1 class="text-3xl font-bold text-black mb-4">
                Submit Service Experience
              </h1>
              <p class="text-lg text-gray-700 leading-relaxed">
                Please share your experience with our services to help us improve and serve you better.
              </p>
            </div>

            <form @submit.prevent="submit">
              <div class="mt-10 text-center">
                <p class="font-bold text-lg text-gray-700 leading-relaxed">
                  SERVICE EXPERIENCE QUESTIONS
                </p>
              </div>

              <!-- Star Rating -->
              <div class="mt-6 text-center">
                <InputLabel value="Rating (1-5 Stars)" />
                <div class="mt-2 flex items-center justify-center space-x-1">
                  <button
                    type="button"
                    v-for="star in 5"
                    :key="star"
                    @click="form.rating = star"
                    class="text-6xl focus:outline-none focus:ring-2 focus:ring-black rounded"
                    :class="
                      star <= (form.rating || 0)
                        ? 'text-black'
                        : 'text-gray-300'
                    "
                  >
                    ★
                  </button>
                </div>
                <div class="mt-2">
                  <span class="text-sm text-black">
                    {{
                      form.rating
                        ? `${form.rating} out of 5 stars`
                        : "Select a rating"
                    }}
                  </span>
                </div>
                <InputError class="mt-2" :message="form.errors.rating" />
              </div>

              <!-- Courteous Staff -->
              <div class="mt-6">
                <InputLabel value="Was the staff courteous?" />
                <div class="mt-3 grid grid-cols-1 sm:grid-cols-3 gap-3">
                  <label
                    v-for="option in courteousStaffOptions"
                    :key="option"
                    class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-100 cursor-pointer bg-white"
                  >
                    <input
                      type="radio"
                      :value="option"
                      v-model="form.courteous_staff"
                      class="h-5 w-5 rounded border-gray-300 text-black shadow-sm focus:ring-black"
                      required
                    />
                    <span class="ml-3 text-base font-medium text-black">{{ option }}</span>
                  </label>
                </div>
                <InputError class="mt-2" :message="form.errors.courteous_staff" />
              </div>

              <!-- Completion Time -->
              <div class="mt-6">
                <InputLabel value="How long did it take to complete the service?" />
                <div class="mt-3 grid grid-cols-1 sm:grid-cols-2 gap-3">
                  <label
                    v-for="option in completionTimeOptions"
                    :key="option"
                    class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-100 cursor-pointer bg-white"
                  >
                    <input
                      type="radio"
                      :value="option"
                      v-model="form.completion_time"
                      class="h-5 w-5 rounded border-gray-300 text-black shadow-sm focus:ring-black"
                      required
                    />
                    <span class="ml-3 text-base font-medium text-black">{{ option }}</span>
                  </label>
                </div>
                <InputError class="mt-2" :message="form.errors.completion_time" />
              </div>

              <!-- Easy to Understand -->
              <div class="mt-6">
                <InputLabel value="Was the process easy to understand?" />
                <div class="mt-3 grid grid-cols-1 sm:grid-cols-3 gap-3">
                  <label
                    v-for="option in easyToUnderstandOptions"
                    :key="option"
                    class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-100 cursor-pointer bg-white"
                  >
                    <input
                      type="radio"
                      :value="option"
                      v-model="form.easy_to_understand"
                      class="h-5 w-5 rounded border-gray-300 text-black shadow-sm focus:ring-black"
                      required
                    />
                    <span class="ml-3 text-base font-medium text-black">{{ option }}</span>
                  </label>
                </div>
                <InputError class="mt-2" :message="form.errors.easy_to_understand" />
              </div>

              <!-- Submit buttons -->
              <div class="flex items-center justify-end mt-6">
                <ButtonNew
                  types="save"
                  size="md"
                  tooltips="Submit Experience"
                  :class="{ 'opacity-25': form.processing }"
                  :disabled="form.processing"
                  @click="submit"
                >
                  Submit
                </ButtonNew>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </ResidentLayout>
</template>

<script setup>
import ResidentLayout from '@/Layouts/ResidentLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import { Link, useForm } from '@inertiajs/vue3';
import { notifyMinimal } from "@/globalFunctions.js";
import ButtonNew from "@/Components/ButtonNew.vue";

const courteousStaffOptions = ['Yes', 'No', 'Somewhat'];
const completionTimeOptions = ['Less than 10 minutes', '10–30 minutes', 'More than 30 minutes', 'I didn\'t complete it'];
const easyToUnderstandOptions = ['Yes', 'No', 'Somewhat'];

const form = useForm({
  rating: null,
  courteous_staff: '',
  completion_time: '',
  easy_to_understand: '',
});

const submit = () => {
  form.post(route('resident.experience.store'), {
    onSuccess: () => {
      form.reset();
      notifyMinimal("Service Experience submitted successfully!", "success");
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