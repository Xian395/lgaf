<template>
  <ResidentLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Submit Feedback</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900 dark:text-gray-100">
            <form @submit.prevent="submit">
              <div>
                <InputLabel for="full_name" value="Full Name" />
                <TextInput
                  id="full_name"
                  type="text"
                  class="mt-1 block w-full"
                  v-model="form.full_name"
                  required
                  autofocus
                />
                <InputError class="mt-2" :message="form.errors.full_name" />
              </div>

              <div class="mt-4">
                <InputLabel for="age" value="Age" />
                <TextInput
                  id="age"
                  type="number"
                  class="mt-1 block w-full"
                  v-model.number="form.age"
                  required
                  min="1"
                />
                <InputError class="mt-2" :message="form.errors.age" />
              </div>

              <div class="mt-4">
                <InputLabel for="gender" value="Gender" />
                <select
                  id="gender"
                  v-model="form.gender"
                  class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                  required
                >
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                  <option value="other">Other</option>
                </select>
                <InputError class="mt-2" :message="form.errors.gender" />
              </div>

              <div class="mt-4">
                <InputLabel for="barangay" value="Barangay" />
                <TextInput
                  id="barangay"
                  type="text"
                  class="mt-1 block w-full"
                  v-model="form.barangay"
                  required
                />
                <InputError class="mt-2" :message="form.errors.barangay" />
              </div>

              <div class="mt-4">
                <InputLabel for="rating" value="Rating (1-5)" />
                <input
                  type="range"
                  id="rating"
                  v-model.number="form.rating"
                  min="1"
                  max="5"
                  step="1"
                  class="mt-1 block w-full"
                  required
                />
                <div class="text-sm text-gray-600 dark:text-gray-400">{{ form.rating || 'Select a rating' }}</div>
                <InputError class="mt-2" :message="form.errors.rating" />
              </div>

              <div class="mt-4">
                <InputLabel value="Services Used" />
                <div class="mt-2 space-y-2">
                  <label v-for="service in services" :key="service" class="flex items-center">
                    <input
                      type="checkbox"
                      :value="service"
                      v-model="form.service_used"
                      class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                    />
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ service }}</span>
                  </label>
                </div>
                <InputError class="mt-2" :message="form.errors.service_used" />
              </div>

              <div class="mt-4">
                <InputLabel for="suggestions" value="Suggestions (Optional)" />
                <textarea
                  id="suggestions"
                  v-model="form.suggestions"
                  class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                  rows="4"
                ></textarea>
                <InputError class="mt-2" :message="form.errors.suggestions" />
              </div>

              <div class="flex items-center justify-end mt-4">
                <Link
                  :href="route('resident.dashboard')"
                  class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                  Back to Dashboard
                </Link>

                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                  Submit
                </PrimaryButton>
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
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm } from '@inertiajs/vue3';

const services = [
  'Burial',
  'Food Supply',
  'Medical',
  'Educational Assistance',
  'Senior Citizen',
];

const form = useForm({
  full_name: '',
  age: null,
  gender: '',
  barangay: '',
  rating: null,
  service_used: [],
  suggestions: '',
});

const submit = () => {
  form.post(route('resident.feedback.store'), {
    onSuccess: () => form.reset(),
  });
};
</script>