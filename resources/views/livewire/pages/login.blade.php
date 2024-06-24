<div class="flex items-center min-h-screen bg-gray-50">
    <div class="flex-1 h-full max-w-4xl mx-auto bg-white rounded-lg shadow-xl">
        <div class="flex flex-col md:flex-row">
            <div class="flex items-center justify-center p-5 sm:p-12 md:w-1/2">
                <form wire:submit.prevent="login" class="w-full">
                    <h1 class="mb-4 text-2xl font-bold text-center text-gray-700">
                        Login
                    </h1>
                    <div>
                        <label class="block mt-4 text-sm">
                            Email
                        </label>
                        <input wire:model="email" type="email" class="w-full px-4 py-2 text-sm border rounded-md focus:border-blue-400 focus:outline-none focus:ring-1 focus:ring-blue-600" placeholder="" />
                        @error('email')
                        @php
                        flash()->addError($message);
                        @endphp
                        @enderror
                    </div>
                    <div>
                        <label class="block mt-4 text-sm relative">
                            Password
                            <input wire:model="password" class="w-full px-4 py-2 text-sm border rounded-md focus:border-blue-400 focus:outline-none focus:ring-1 focus:ring-blue-600" placeholder="" type="password" id="password" oninput="updatePasswordStrength()" />
                            @error('password')
                            @php
                            flash()->addError($message);
                            @endphp
                            @enderror
                            <button type="button" class="absolute top-1/2 right-3 transform -translate-y-1/2 text-gray-400 focus:outline-none" onclick="togglePasswordVisibility('password', this)">
                                <i class="mt-5 far fa-eye"></i>
                            </button>
                        </label>
                    </div>
                    <button class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue" type="submit">
                        <span wire:loading.class='hidden' wire:target='login'>
                            Login
                        </span>
                        <span class="loading loading-ring loading-md" wire:loading wire:target='login'></span>
                    </button>
                    <p class="mt-4">
                        <a class="text-sm text-gray-900">
                            Don't have an account? <span><a href="/register" class="text-sm text-blue-500 hover:underline">Sign up</a></span>
                        </a>
                    </p>
                    <hr class="my-8" />
                    <div class="flex items-center justify-center gap-4">
                        <button class="flex items-center h-12 justify-center w-full px-4 py-2 text-sm text-gray-700 border border-gray-300 rounded-lg hover:border-gray-500 focus:border-gray-500">
                            Sign in with
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="w-4 h-4 mr-4 ml-2" viewBox="0 0 48 48">
                                <defs>
                                    <path id="a" d="M44.5 20H24v8.5h11.8C34.7 33.9 30.1 37 24 37c-7.2 0-13-5.8-13-13s5.8-13 13-13c3.1 0 5.9 1.1 8.1 2.9l6.4-6.4C34.6 4.1 29.6 2 24 2 11.8 2 2 11.8 2 24s9.8 22 22 22c11 0 21-8 21-22 0-1.3-.2-2.7-.5-4z" />
                                </defs>
                                <clipPath id="b">
                                    <use xlink:href="#a" overflow="visible" />
                                </clipPath>
                                <path clip-path="url(#b)" fill="#FBBC05" d="M0 37V11l17 13z" />
                                <path clip-path="url(#b)" fill="#EA4335" d="M0 11l17 13 7-6.1L48 14V0H0z" />
                                <path clip-path="url(#b)" fill="#34A853" d="M0 37l30-23 7.9 1L48 0v48H0z" />
                                <path clip-path="url(#b)" fill="#4285F4" d="M48 48L17 24l-4-3 35-10z" />
                            </svg>
                        </button>
                        <button class="flex h-12 items-center justify-center w-full px-4 py-2 text-sm text-gray-700 border border-gray-300 rounded-lg hover:border-gray-500 focus:border-gray-500">
                            Sign in with
                            <i class="fab fa-facebook-square text-blue-500 text-md mx-2 w-4 h-4 mr-2"></i>
                        </button>
                    </div>
                </form>
            </div>
            <div class="flex-1 text-center hidden lg:flex">
                <div class="h-30 md:h-auto md:w-2/2 relative">
                    <img class="object-cover w-full h-full" src="images/side.png" alt="img" />
                    <div class="absolute bottom-0 left-0 mt-7 w-full px-6 pb-6 bg-gray-900 bg-opacity-75 text-white">
                        <span class="text-xl font-bold">This is your </span><span class="text-xl font-bold" id="dynamic-text"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const dynamicTextElement = document.getElementById("dynamic-text");
        const words = ["map", "travel", "voice", "story", "life", "advertise", "social"];
        let currentIndex = 0;

        function typeWord() {
            const currentWord = words[currentIndex];
            let currentWordIndex = 0;
            const typingInterval = setInterval(() => {
                dynamicTextElement.textContent = currentWord.substring(0, currentWordIndex + 1);
                currentWordIndex++;
                if (currentWordIndex === currentWord.length) {
                    clearInterval(typingInterval);
                    setTimeout(eraseWord, 1000);
                }
            }, 200);

            currentIndex = (currentIndex + 1) % words.length;
        }

        function eraseWord() {
            let currentText = dynamicTextElement.textContent;
            const erasingInterval = setInterval(() => {
                dynamicTextElement.textContent = currentText.substring(0, currentText.length - 1);
                currentText = dynamicTextElement.textContent;
                if (currentText === "") {
                    clearInterval(erasingInterval);
                    setTimeout(typeWord, 500);
                }
            }, 100);
        }

        // Start the typing effect
        typeWord();
    });
    function togglePasswordVisibility(inputId, button) {
        const input = document.getElementById(inputId);
        if (input.type === "password") {
            input.type = "text";
            button.innerHTML = '<i class="mt-5 far fa-eye-slash"></i>';
        } else {
            input.type = "password";
            button.innerHTML = '<i class="mt-5 far fa-eye"></i>';
        }
    }
</script>
</div>
