<template>
    <ResidentLayout>
       

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-2 border-gray-300"
                >
                    <div class="p-6 text-black">
                        <!-- Welcome Title and Message -->
                        <div class="mb-8 text-center">
                            <h1 class="text-3xl font-bold text-black mb-4">
                                Welcome
                            </h1>
                            <p class="text-lg text-gray-700 leading-relaxed">
                                Your feedback helps us improve the public
                                services in Tubod. Please answer the questions
                                below.
                            </p>
                        </div>

                        <form @submit.prevent="submit">
                            <div class="mt-10 text-center">
                                <p
                                    class="font-bold text-lg text-gray-700 leading-relaxed"
                                >
                                    PERSONAL INFORMATION
                                </p>
                            </div>
                            <!-- First 4 inputs in 2x2 grid -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <InputLabel
                                        for="full_name"
                                        value="Full Name"
                                    />
                                    <TextInput
                                        id="full_name"
                                        type="text"
                                        class="mt-1 block w-full"
                                        v-model="form.full_name"
                                        required
                                        autofocus
                                    />
                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.full_name"
                                    />
                                </div>

                                <div>
                                    <InputLabel for="age" value="Age" />
                                    <TextInput
                                        id="age"
                                        type="number"
                                        class="mt-1 block w-full"
                                        v-model.number="form.age"
                                        required
                                        min="1"
                                    />
                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.age"
                                    />
                                </div>

                                <div>
                                    <InputLabel for="gender" value="Gender" />
                                    <select
                                        id="gender"
                                        v-model="form.gender"
                                        class="mt-1 block w-full border-gray-300 focus:border-black focus:ring-black rounded-md shadow-sm bg-white text-black"
                                        required
                                    >
                                        <option value="">Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.gender"
                                    />
                                </div>

                                <div>
                                    <InputLabel
                                        for="barangay"
                                        value="Barangay"
                                    />
                                    <select
                                        id="barangay"
                                        v-model="form.barangay"
                                        class="mt-1 block w-full border-gray-300 focus:border-black focus:ring-black rounded-md shadow-sm bg-white text-black"
                                        required
                                    >
                                        <option value="">
                                            Select Barangay
                                        </option>
                                        <option value="cawilan">Cawilan</option>
                                        <option value="del_rosario">
                                            Del Rosario
                                        </option>
                                        <option value="capayahan">
                                            Capayahan
                                        </option>
                                        <option value="marga">Marga</option>
                                        <option value="san_isidro">
                                            San Isidro
                                        </option>
                                        <option value="motorpol">
                                            Motorpol
                                        </option>
                                        <option value="san_pablo">
                                            San Pablo
                                        </option>
                                        <option value="timamana">
                                            Timamana
                                        </option>
                                    </select>
                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.barangay"
                                    />
                                </div>
                            </div>
                            <div class="mt-10 text-center">
                                <p
                                    class="font-bold text-lg text-gray-700 leading-relaxed"
                                >
                                    FEEDBACK QUESTIONS
                                </p>
                            </div>
                            <!-- Star Rating -->
                            <div class="mt-6 text-center">
                                <InputLabel
                                    value="How satisfied are you with the service?"
                                />
                                <div
                                    class="mt-2 flex items-center justify-center space-x-1"
                                >
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
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.rating"
                                />
                            </div>

                            <!-- Services Used with bigger checkboxes -->
                            <div class="mt-6">
                                <InputLabel
                                    value="What Services did you used?"
                                />
                                <div
                                    class="mt-3 grid grid-cols-1 sm:grid-cols-2 gap-3"
                                >
                                    <label
                                        v-for="service in services"
                                        :key="service"
                                        class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-100 cursor-pointer bg-white"
                                    >
                                        <input
                                            type="checkbox"
                                            :value="service"
                                            v-model="form.service_used"
                                            class="h-5 w-5 rounded border-gray-300 text-black shadow-sm focus:ring-black"
                                        />
                                        <span
                                            class="ml-3 text-base font-medium text-black"
                                            >{{ service }}</span
                                        >
                                    </label>
                                </div>
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.service_used"
                                />
                            </div>

                            <!-- Suggestions -->
                            <div class="mt-6">
                                <InputLabel
                                    for="suggestions"
                                    value="Suggestions (Optional)"
                                />
                                <textarea
                                    id="suggestions"
                                    v-model="form.suggestions"
                                    class="mt-1 block w-full border-gray-300 focus:border-black focus:ring-black rounded-md shadow-sm bg-white text-black"
                                    rows="4"
                                    placeholder="Share your thoughts and suggestions..."
                                ></textarea>
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.suggestions"
                                />
                            </div>

                            <!-- Submit buttons -->
                            <div class="flex items-center justify-end mt-6">
                                <!-- <Link
                                    :href="route('resident.dashboard')"
                                    class="underline text-sm text-black hover:text-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black"
                                >
                                    Back to Dashboard
                                </Link> -->

                                
                                <ButtonNew
                  types="save"
                  size="md"
                  tooltips="Submit Feedback"
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
import ResidentLayout from "@/Layouts/ResidentLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Link, useForm } from "@inertiajs/vue3";
import { notifyMinimal } from "@/globalFunctions.js";
import ButtonNew from "@/Components/ButtonNew.vue";

const services = [
    "Burial",
    "Food Supply",
    "Medical",
    "Educational Assistance",
    "Senior Citizen",
];

const form = useForm({
    full_name: "",
    age: null,
    gender: "",
    barangay: "",
    rating: null,
    service_used: [],
    suggestions: "",
});

const submit = () => {
    form.post(route("resident.feedback.store"), {
        onSuccess: () => {
            form.reset();
            notifyMinimal("Feedback submitted successfully!", "success");
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
