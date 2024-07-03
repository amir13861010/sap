<div>
    <div wire:loading wire:target="register">
        <div style="display: flex;justify-content: center;align-items: center;background-color: black;position: fixed; top: 0px;left: 0px;z-index: 9999;width: 100%;height: 100%;opacity: 0.78;">
            <livewire:components.loader />
        </div>
    </div>
    <div class="flex items-center min-h-full bg-gray-50">
        <div class="flex-1 h-[95vh] mt-4 overflow-hidden max-w-4xl mx-auto bg-white rounded-lg shadow-xl">
            <div class="flex flex-col md:flex-row">
                <div class="flex items-center justify-center px-5 sm:px-8 md:w-1/2">
                    <form wire:submit.prevent='register' class="w-full">
                        <h1 class="mb-2 text-2xl font-bold text-center text-gray-700">
                            SignUp
                        </h1>
                        <div>
                            <label class="block mt-2 text-sm">
                                Username
                            </label>
                            <input wire:model='name' type="text" class="w-full px-4 py-2 text-sm border rounded-md focus:border-blue-400 focus:outline-none focus:ring-1 focus:ring-blue-600" placeholder="" />
                            @error('name')
                            @php
                            flash()->addError($message);
                            @endphp
                            @enderror
                        </div>
                        <div>
                            <label class="block mt-2 text-sm">
                                Email
                            </label>
                            <input wire:model='email' type="email" class="w-full px-4 py-2 text-sm border rounded-md focus:border-blue-400 focus:outline-none focus:ring-1 focus:ring-blue-600" placeholder="" />
                            @error('email')
                            @php
                            flash()->addError($message);
                            @endphp
                            @enderror
                        </div>
                        <div>
                            <label class="block mt-2 text-sm relative">
                                Password
                                <input wire:model='password' class="w-full px-4 py-2 text-sm border rounded-md focus:border-blue-400 focus:outline-none focus:ring-1 focus:ring-blue-600" placeholder="" type="password" id="password" oninput="updatePasswordStrength()" />
                                @error('password')
                                @php
                                flash()->addError($message);
                                @endphp
                                @enderror
                                <button type="button" class="absolute top-1/2 right-3 transform -translate-y-1/2 text-gray-400 focus:outline-none" onclick="togglePasswordVisibility('password', this)">
                                    <i class="mt-5 far fa-eye"></i>
                                </button>
                            </label>
                            <div id="passwordStrength" class="strength-bar"></div>
                        </div>
                        <div>
                            <label class="block mt-2 text-sm relative">
                                Confirm Password
                                <input wire:model='confirm_password' class="w-full px-4 py-2 text-sm border rounded-md focus:border-blue-400 focus:outline-none focus:ring-1 focus:ring-blue-600" placeholder="" type="password" id="confirmPassword" />
                                @error('confirm_password')
                                @php
                                flash()->addError($message);
                                @endphp
                                @enderror

                                <button type="button" class="absolute top-1/2 right-3 transform -translate-y-1/2 text-gray-400 focus:outline-none" onclick="togglePasswordVisibility('confirmPassword', this)">
                                    <i class="mt-5 far fa-eye"></i>
                                </button>
                            </label>
                        </div>
                        <div class="flex items-center mt-2 mb-3 text-sm">
                            <label class="block">
                                Verification Code
                            </label>
                            @if(!$show_timer)
                            <span wire:click="sendVerificationCode" class="ml-2 font-bold text-yellow-500 cursor-pointer" id="sendText">
                                <span>
                                    send
                                </span>
                            </span>
                            @endif
                            @if($show_timer)
                            <span id="timerDisplay" class="ml-2">
                                <span wire:poll.1000ms="updateTimer"  class="font-bold text-yellow-500">{{ $timer
                                    }}</span>
                            </span>
                            @endif
                        </div>
                        <div class="flex ml-16">
                            <input wire:model='verification_code' id="verificationCodeInput" type="text" maxlength="4" class="w-48 px-4 py-2 text-sm border rounded-md focus:border-blue-400 focus:outline-none focus:ring-1 focus:ring-blue-600" />
                            @error('verificationCodeInput')
                            @php
                            flash()->addError($message);
                            @endphp
                            @enderror
                        </div>
                        <button class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue" href="#">
                            <span >
                                SignUp
                            </span>
                        </button>
                        <p class="mt-2">
                            <a class="text-sm text-gray-900">
                                already have an account? <span><a href="/login" class="text-sm text-blue-500 hover:underline">login</a></span>
                            </a>
                        </p>
                        <hr class="my-4" />
                        <div class="flex items-center justify-center gap-2">
                            <a href="{{ route('google') }}" class="w-full"><button wire:click='redirectGoogle' type="button" class="flex items-center h-10 justify-center w-full px-4 py-2 text-sm  text-gray-700 border border-gray-300 rounded-lg hover:border-gray-500 focus:border-gray-500">
                                    <span>
                                        SignUp with
                                    </span>
                                    <span class="loading loading-ring loading-md" ></span>
                                    <svg  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="w-4 h-4 mr-4 ml-2" viewBox="0 0 48 48">
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
                                </button></a>
                            <a href="{{ route('facebook') }}" class="w-full"><button wire:click='redirectFaceBook' type="button" class="flex h-10 items-center justify-center w-full px-4 py-2 text-sm  text-gray-700 border border-gray-300 rounded-lg hover:border-gray-500 focus:border-gray-500">
                                    SignUp with
                                    <i class="fab fa-facebook-square text-blue-500 text-md mx-2 w-4 h-4 mr-2"></i>
                                </button></a>
                        </div>
                    </form>
                </div>
                <div class="flex-1 text-center hidden lg:flex">
                    <div class="h-30 md:h-[95vh] md:w-2/2 relative">
                        <img class="object-cover w-full h-full" src="images/side.png" alt="img" />
                        <div class="absolute bottom-0 left-0 mt-7 w-full px-6 pb-6 bg-gray-900 bg-opacity-75 text-white">
                            <span class="text-xl font-bold">This is your </span><span class="text-xl font-bold" id="dynamic-text"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
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

        // Listen for the Livewire event
        Livewire.on('verificationCodeSent', function() {
            sendVerificationCode();
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


        function updatePasswordStrength() {
            const passwordInput = document.getElementById("password");
            const strengthBar = document.getElementById("passwordStrength");
            const password = passwordInput.value;
            let strength = 0;

            if (password.length >= 6) strength++;
            if (/[A-Z]/.test(password)) strength++;
            if (/[0-9]/.test(password)) strength++;
            if (/[^A-Za-z0-9]/.test(password)) strength++;

            strengthBar.className = "strength-bar";
            if (strength === 1) {
                strengthBar.classList.add("strength-weak");
            } else if (strength === 2 || strength === 3) {
                strengthBar.classList.add("strength-medium");
            } else if (strength === 4) {
                strengthBar.classList.add("strength-strong");
            }
        }

    </script>
</div>
