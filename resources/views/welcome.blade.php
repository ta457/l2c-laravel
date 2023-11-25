@props([
'subsection' => $props['subsection']
])

<x-main-page-layout>
    <x-home-header />

    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold leading-none md:text-5xl xl:text-6xl dark:text-white">
                    Learn how to code <br>for free
                </h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                    Tutorials, code exercises and quizzes for over 50 popular programming languages and frameworks.
                </p>
                <a href="#"
                    class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                    Get started
                    <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
                {{-- <a href="#"
                    class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    Speak to Sales
                </a> --}}
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                {{-- <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/hero/phone-mockup.png" alt="mockup"> --}}
                <x-content-code-example 
                    title="Run code directly on your browser"
                    :content="$subsection->code_example"
                    :id="$subsection->id"
                    btnText="Try It Yourself"
                />
            </div>
        </div>
    </section>

    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 lg:py-16 mx-auto max-w-screen-xl px-4">
            <h2
                class="mb-8 lg:mb-16 text-3xl font-extrabold tracking-tight leading-tight text-center text-gray-900 dark:text-white md:text-4xl">
                Our partners
            </h2>
            <div class="grid grid-cols-2 gap-8 text-gray-500 sm:gap-12 md:grid-cols-5 dark:text-gray-400">
                <a href="#" class="flex justify-center items-center group hover:text-gray-900 dark:hover:text-white">
                    <x-application-logo
                        class="block h-10 w-auto fill-current text-gray-600 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" />
                    <p class="text-2xl font-bold ml-2">Laravel</p>
                </a>
                <a href="#" class="flex justify-center items-center group hover:text-gray-900 dark:hover:text-white">
                    <svg class="w-8 h-8 text-gray-600 dark:text-gray-300 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 22">
                        <path
                            d="M15 11 9.186 8.093a.933.933 0 0 1-.166-.039L9 8.047v6.885c0 .018.009.036.011.054l2.49-3.125L15 11Z" />
                        <path
                            d="m10.366 2.655 5.818 3.491a4.2 4.2 0 0 1 1.962 3.969 3.237 3.237 0 0 1-2.393 2.732c-.024.007-.048.005-.073.011-.065.032-.132.06-.2.084l-2.837.7-2.077 2.606a1.99 1.99 0 0 1-.7.56c.05.036.09.081.144.113a2.127 2.127 0 0 0 2.08.037c.618-.348 2.242-1.262 4.836-3.038l.291-.2c1.386-.94 3.772-2.565 4.138-4.428A10.483 10.483 0 0 0 6.869 1.349c1.211.302 2.385.74 3.497 1.306Z" />
                        <path
                            d="M4.023 16.341V9.558A3.911 3.911 0 0 1 5.784 6.3a4.062 4.062 0 0 1 3.58-.257c.184.031.362.088.53.169l6 3c.086.052.168.11.246.174a2.247 2.247 0 0 0-.994-1.529L9.4 4.407c-1.815-.9-4.074-1.6-5.469-1.152a10.46 10.46 0 0 0 .534 15.953 18.151 18.151 0 0 1-.442-2.867Z" />
                        <path
                            d="m18.332 15.376-.283.192c-2.667 1.827-4.348 2.773-4.9 3.083a4.236 4.236 0 0 1-2.085.556 4.092 4.092 0 0 1-2.069-.561 3.965 3.965 0 0 1-1.951-3.373A1.917 1.917 0 0 1 7 15V8c0-.025.009-.049.01-.074A1.499 1.499 0 0 0 6.841 8a1.882 1.882 0 0 0-.82 1.592v6.7c.072 1.56.467 3.087 1.16 4.486A10.474 10.474 0 0 0 21.3 13.047a20.483 20.483 0 0 1-2.968 2.329Z" />
                    </svg>
                    <p class="text-2xl font-bold ml-2">Flowbite</p>
                </a>
                <a href="#" class="flex justify-center items-center group hover:text-gray-900 dark:hover:text-white">
                    <svg class="w-9 h-9 text-gray-600 dark:text-gray-300 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
                        <path
                            d="M9.782.72a4.773 4.773 0 0 0-4.8 4.173 3.43 3.43 0 0 1 2.741-1.687c1.689 0 2.974 1.972 3.758 2.587a5.733 5.733 0 0 0 5.382.935c2-.638 2.934-2.865 3.137-3.921-.969 1.379-2.44 2.207-4.259 1.231C14.488 3.365 13.551.6 9.782.72ZM4.8 6.979A4.772 4.772 0 0 0 0 11.151a3.43 3.43 0 0 1 2.745-1.687c1.689 0 2.974 1.972 3.758 2.587a5.733 5.733 0 0 0 5.382.935c2-.638 2.933-2.865 3.137-3.921-.97 1.379-2.44 2.208-4.259 1.231C9.51 9.623 8.573 6.853 4.8 6.979Z" />
                    </svg>
                    <p class="text-2xl font-bold ml-2">Tailwind CSS</p>
                </a>
                <a href="#" class="flex justify-center items-center group hover:text-gray-900 dark:hover:text-white">
                    <svg class="w-8 h-8 text-gray-600 dark:text-gray-300 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path
                            d="M19.718 9c0-1.429-1.339-2.681-3.467-3.5.029-.18.077-.37.1-.545.217-2.058-.273-3.543-1.379-4.182-1.235-.714-2.983-.186-4.751 1.239C8.45.589 6.7.061 5.468.773c-1.107.639-1.6 2.124-1.379 4.182.018.175.067.365.095.545C2.057 6.319.718 7.571.718 9c0 1.429 1.339 2.681 3.466 3.5-.028.18-.077.37-.095.545-.218 2.058.272 3.543 1.379 4.182.376.213.803.322 1.235.316a5.987 5.987 0 0 0 3.514-1.56 5.992 5.992 0 0 0 3.515 1.56 2.44 2.44 0 0 0 1.236-.316c1.106-.639 1.6-2.124 1.379-4.182-.019-.175-.067-.365-.1-.545 2.132-.819 3.471-2.071 3.471-3.5Zm-6.01-7.548a1.5 1.5 0 0 1 .76.187c.733.424 1.055 1.593.884 3.212-.012.106-.043.222-.058.33-.841-.243-1.7-.418-2.57-.523a16.165 16.165 0 0 0-1.747-1.972 4.9 4.9 0 0 1 2.731-1.234Zm-7.917 8.781c.172.34.335.68.529 1.017.194.337.395.656.6.969a14.09 14.09 0 0 1-1.607-.376 14.38 14.38 0 0 1 .478-1.61Zm-.479-4.076a14.085 14.085 0 0 1 1.607-.376c-.205.313-.405.634-.6.969-.195.335-.357.677-.529 1.017-.19-.527-.35-1.064-.478-1.61ZM6.3 9c.266-.598.563-1.182.888-1.75.33-.568.69-1.118 1.076-1.65.619-.061 1.27-.1 1.954-.1.684 0 1.333.035 1.952.1a19.63 19.63 0 0 1 1.079 1.654A19.3 19.3 0 0 1 14.136 9a18.869 18.869 0 0 1-1.953 3.403 19.218 19.218 0 0 1-3.931 0 20.163 20.163 0 0 1-1.066-1.653A19.33 19.33 0 0 1 6.3 9Zm7.816 2.25c.2-.337.358-.677.53-1.017.191.527.35 1.065.478 1.611a14.48 14.48 0 0 1-1.607.376c.202-.314.404-.635.597-.97h.002Zm.53-3.483c-.172-.34-.335-.68-.53-1.017a20.214 20.214 0 0 0-.6-.97c.542.095 1.078.22 1.606.376a14.113 14.113 0 0 1-.478 1.611h.002ZM10.217 3.34c.4.375.777.773 1.13 1.193-.37-.02-.746-.033-1.129-.033s-.76.013-1.131.033c.353-.42.73-.817 1.13-1.193Zm-4.249-1.7a1.5 1.5 0 0 1 .76-.187 4.9 4.9 0 0 1 2.729 1.233A16.25 16.25 0 0 0 7.71 4.658c-.87.105-1.728.28-2.569.524-.015-.109-.047-.225-.058-.331-.171-1.619.151-2.787.885-3.211ZM1.718 9c0-.9.974-1.83 2.645-2.506.218.857.504 1.695.856 2.506-.352.811-.638 1.65-.856 2.506C2.692 10.83 1.718 9.9 1.718 9Zm4.25 7.361c-.734-.423-1.056-1.593-.885-3.212.011-.106.043-.222.058-.331.84.243 1.697.418 2.564.524a16.37 16.37 0 0 0 1.757 1.982c-1.421 1.109-2.714 1.488-3.494 1.037Zm3.11-2.895c.374.021.753.034 1.14.034.387 0 .765-.013 1.139-.034a14.4 14.4 0 0 1-1.14 1.215 14.232 14.232 0 0 1-1.139-1.215Zm5.39 2.895c-.782.451-2.075.072-3.5-1.038a16.248 16.248 0 0 0 1.757-1.981 16.41 16.41 0 0 0 2.565-.523c.015.108.046.224.058.33.175 1.619-.148 2.789-.88 3.212Zm1.6-4.854A16.562 16.562 0 0 0 15.216 9c.352-.811.638-1.65.856-2.507C17.743 7.17 18.718 8.1 18.718 9c0 .9-.975 1.83-2.646 2.507h-.004Z" />
                        <path d="M10.215 10.773a1.792 1.792 0 1 0-1.786-1.8v.006a1.788 1.788 0 0 0 1.786 1.794Z" />
                    </svg>
                    <p class="text-2xl font-bold ml-2">React</p>
                </a>
                <a href="#" class="flex justify-center items-center group hover:text-gray-900 dark:hover:text-white">
                    <svg class="w-8 h-8 text-gray-600 dark:text-gray-300 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path
                            d="M12.5 0 10 4.156 7.857 0H0l10 18L20 0h-7.5ZM2.486 1.5h2.4L10 10.8l5.107-9.3h2.4L10 15.021 2.486 1.5Z" />
                    </svg>
                    <p class="text-2xl font-bold ml-2">Vue</p>
                </a>
            </div>
        </div>
    </section>

    <section class="bg-gray-50 dark:bg-gray-800">
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
            <div class="max-w-screen-md mb-8 lg:mb-16">
                <h2 class="mb-4 text-4xl font-extrabold text-gray-900 dark:text-white">
                    Designed for both beginners and experts
                </h2>
                <p class="text-gray-500 sm:text-xl dark:text-gray-400">
                    Master the fundamentals and start building your own project with our best courses.
                </p>
            </div>
            <div class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-12 md:space-y-0">
                <div>
                    <div
                        class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-blue-100 lg:h-12 lg:w-12 dark:bg-blue-900">
                        <svg class="w-5 h-5 text-blue-600 lg:w-6 lg:h-6 dark:text-blue-300" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M.906 0 2.5 17.683l7.5 2.159 7.544-2.158L19.092 0H.906ZM15.1 6H7.044l.174 2h7.776l-.632 6.513-4.29 1.371-4.326-1.444-.29-2.909H7.5l.163 1.4 2.424.809 2.37-.757.3-2.982H5.368L4.8 4h10.519L15.1 6Z" />
                        </svg>
                    </div>
                    <h3 class="mb-2 text-xl font-bold dark:text-white">HTML</h3>
                    <p class="text-gray-500 dark:text-gray-400">HTML is the standard markup language for Web pages. With
                        HTML you can create your own Website. It is really easy to learn - You will enjoy it!
                    </p>
                </div>
                <div>
                    <div
                        class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-blue-100 lg:h-12 lg:w-12 dark:bg-blue-900">
                        <svg class="w-5 h-5 text-blue-600 lg:w-6 lg:h-6 dark:text-blue-300" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M.906 0 2.5 17.781l7.5 2.16 7.544-2.159L19.091 0H.906Zm13.437 14.679-4.337 1.2h-.009l-4.341-1.2-.3-3.158h2.13l.151 1.521 2.36.637 2.363-.638.248-3.041H5.264l-.19-2h7.718l.177-2H4.87l-.177-2h10.614l-.964 10.679Z" />
                        </svg>
                    </div>
                    <h3 class="mb-2 text-xl font-bold dark:text-white">CSS</h3>
                    <p class="text-gray-500 dark:text-gray-400">
                        CSS is the language we use to style an HTML document. Size, position, color, etc. - CSS
                        describes how HTML elements should be displayed.
                    </p>
                </div>
                <div>
                    <div
                        class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-blue-100 lg:h-12 lg:w-12 dark:bg-blue-900">
                        <svg class="w-5 h-5 text-blue-600 lg:w-6 lg:h-6 dark:text-blue-300"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="800px" height="800px"
                            viewBox="0 0 32 32" version="1.1">
                            <title>javascript</title>
                            <path
                                d="M17.313 14.789h-2.809c0 2.422-0.011 4.829-0.011 7.254 0.033 0.329 0.051 0.712 0.051 1.099 0 0.81-0.081 1.601-0.236 2.365l0.013-0.076c-0.412 0.861-1.475 0.751-1.957 0.6-0.451-0.242-0.808-0.609-1.031-1.055l-0.006-0.014c-0.044-0.094-0.097-0.174-0.16-0.246l0.001 0.001-2.281 1.406c0.367 0.79 0.934 1.434 1.637 1.885l0.018 0.011c0.763 0.427 1.675 0.678 2.645 0.678 0.484 0 0.954-0.063 1.401-0.18l-0.038 0.009c0.988-0.248 1.793-0.89 2.254-1.744l0.009-0.019c0.359-0.914 0.566-1.973 0.566-3.080 0-0.388-0.026-0.77-0.075-1.145l0.005 0.044c0.015-2.567 0-5.135 0-7.722zM28.539 23.843c-0.219-1.368-1.11-2.518-3.753-3.59-0.92-0.431-1.942-0.731-2.246-1.425-0.063-0.158-0.099-0.341-0.099-0.532 0-0.124 0.015-0.244 0.044-0.359l-0.002 0.010c0.208-0.55 0.731-0.935 1.343-0.935 0.199 0 0.388 0.040 0.559 0.113l-0.009-0.004c0.552 0.19 0.988 0.594 1.215 1.112l0.005 0.013c1.292-0.845 1.292-0.845 2.193-1.406-0.216-0.369-0.459-0.689-0.734-0.977l0.002 0.002c-0.767-0.814-1.852-1.32-3.056-1.32-0.171 0-0.34 0.010-0.505 0.030l0.020-0.002-0.881 0.111c-0.856 0.194-1.587 0.639-2.133 1.252l-0.003 0.004c-0.535 0.665-0.859 1.519-0.859 2.449 0 1.279 0.613 2.415 1.56 3.131l0.010 0.007c1.706 1.275 4.2 1.555 4.519 2.755 0.3 1.462-1.087 1.931-2.457 1.762-0.957-0.218-1.741-0.83-2.184-1.652l-0.009-0.017-2.287 1.313c0.269 0.536 0.607 0.994 1.011 1.385l0.001 0.001c2.174 2.194 7.61 2.082 8.586-1.255 0.113-0.364 0.178-0.782 0.178-1.215 0-0.3-0.031-0.593-0.091-0.875l0.005 0.028zM1.004 1.004h29.991v29.991h-29.991z" />
                        </svg>
                    </div>
                    <h3 class="mb-2 text-xl font-bold dark:text-white">JavaScript</h3>
                    <p class="text-gray-500 dark:text-gray-400">
                        From the front-end to the back-end, JavaScript is the programming language of the Web and the
                        world's most popular programming language.
                    </p>
                </div>
                <div>
                    <div
                        class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-blue-100 lg:h-12 lg:w-12 dark:bg-blue-900">
                        <svg class="w-5 h-5 text-blue-600 lg:w-6 lg:h-6 dark:text-blue-300"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            fill="currentColor" version="1.1" width="800px" height="800px" viewBox="0 0 512 512"
                            enable-background="new 0 0 512 512" xml:space="preserve">
                            <g id="5151e0c8492e5103c096af88a51e39be">
                                <path display="inline"
                                    d="M171.844,204.374c-11.137-12.748-28.856-19.123-53.146-19.123H37.96L0.5,377.99h41.984l9.96-51.241   h35.963c15.869,0,28.923-1.663,39.173-5.003c10.247-3.33,19.562-8.92,27.945-16.767c7.037-6.467,12.725-13.599,17.087-21.4   c4.354-7.797,7.448-16.401,9.278-25.812C186.333,234.919,182.98,217.124,171.844,204.374z M138.493,254.823   c-2.903,14.917-8.492,25.563-16.775,31.941c-8.288,6.38-20.897,9.569-37.822,9.569H58.354l15.678-80.667H102.8   c15.952,0,26.582,2.943,31.896,8.832C140.006,230.39,141.275,240.497,138.493,254.823z M337.828,237.059l-17.429,89.69h-42.317   l16.572-85.278c1.884-9.702,1.193-16.32-2.084-19.847c-3.272-3.529-10.242-5.296-20.9-5.296h-33.289l-21.458,110.421h-41.656   l37.46-192.739h41.656l-9.959,51.241h37.111c23.346,0,39.452,4.077,48.317,12.218C338.718,205.615,341.371,218.813,337.828,237.059   z M499.554,204.374c-11.137-12.748-28.856-19.123-53.142-19.123h-80.738l-37.46,192.739h41.984l9.96-51.241h35.963   c15.869,0,28.918-1.663,39.169-5.003c10.247-3.33,19.562-8.92,27.945-16.767c7.036-6.467,12.729-13.599,17.088-21.4   c4.354-7.797,7.447-16.401,9.277-25.812C514.042,234.919,510.694,217.124,499.554,204.374z M466.206,254.823   c-2.902,14.917-8.491,25.563-16.779,31.941c-8.284,6.38-20.896,9.569-37.822,9.569h-25.537l15.678-80.667h28.765   c15.952,0,26.581,2.943,31.899,8.832C467.72,230.39,468.984,240.497,466.206,254.823z">
                                </path>
                            </g>
                        </svg>
                    </div>
                    <h3 class="mb-2 text-xl font-bold dark:text-white">PHP</h3>
                    <p class="text-gray-500 dark:text-gray-400">
                        PHP is a server scripting language, and a powerful tool for making dynamic and interactive Web
                        pages.
                    </p>
                </div>
                <div>
                    <div
                        class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-blue-100 lg:h-12 lg:w-12 dark:bg-blue-900">
                        <svg class="w-5 h-5 text-blue-600 lg:w-6 lg:h-6 dark:text-blue-300" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                            <path
                                d="M8 5.625c4.418 0 8-1.063 8-2.375S12.418.875 8 .875 0 1.938 0 3.25s3.582 2.375 8 2.375Zm0 13.5c4.963 0 8-1.538 8-2.375v-4.019c-.052.029-.112.054-.165.082a8.08 8.08 0 0 1-.745.353c-.193.081-.394.158-.6.231l-.189.067c-2.04.628-4.165.936-6.3.911a20.601 20.601 0 0 1-6.3-.911l-.189-.067a10.719 10.719 0 0 1-.852-.34 8.08 8.08 0 0 1-.493-.244c-.053-.028-.113-.053-.165-.082v4.019C0 17.587 3.037 19.125 8 19.125Zm7.09-12.709c-.193.081-.394.158-.6.231l-.189.067a20.6 20.6 0 0 1-6.3.911 20.6 20.6 0 0 1-6.3-.911l-.189-.067a10.719 10.719 0 0 1-.852-.34 8.08 8.08 0 0 1-.493-.244C.112 6.035.052 6.01 0 5.981V10c0 .837 3.037 2.375 8 2.375s8-1.538 8-2.375V5.981c-.052.029-.112.054-.165.082a8.08 8.08 0 0 1-.745.353Z" />
                        </svg>
                    </div>
                    <h3 class="mb-2 text-xl font-bold dark:text-white">SQL</h3>
                    <p class="text-gray-500 dark:text-gray-400">SQL is a standard language for storing, manipulating and
                        retrieving data in relational databases.</p>
                </div>
                <div>
                    <div
                        class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-blue-100 lg:h-12 lg:w-12 dark:bg-blue-900">
                        <svg class="w-5 h-5 text-blue-600 lg:w-6 lg:h-6 dark:text-blue-300"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            fill="currentColor" version="1.1" width="800px" height="800px" viewBox="0 0 512 512"
                            enable-background="new 0 0 512 512" xml:space="preserve">
                            <g id="5151e0c8492e5103c096af88a51ec286">
                                <path display="inline"
                                    d="M194.734,246.879h121.768c33.9,0,60.956-27.908,60.956-61.95V68.846c0-33.035-27.87-57.855-60.956-63.371   c-20.943-3.484-42.673-5.069-63.51-4.971c-20.845,0.097-40.74,1.874-58.258,4.971c-51.586,9.117-60.952,28.191-60.952,63.371   v46.463H255.69v15.486H133.782h-45.75c-35.434,0-66.459,21.295-76.158,61.808c-11.192,46.435-11.694,75.409,0,123.898   c8.666,36.088,29.359,61.807,64.79,61.807h41.917v-55.699C118.581,282.37,153.39,246.879,194.734,246.879z M187.063,84.333   c-12.636,0-22.877-10.355-22.877-23.161c0-12.849,10.241-23.3,22.877-23.3c12.594,0,22.873,10.451,22.873,23.3   C209.936,73.979,199.658,84.333,187.063,84.333z M499.37,192.603c-8.761-35.27-25.484-61.808-60.96-61.808h-45.75v54.134   c0,41.972-35.582,77.292-76.158,77.292H194.734c-33.349,0-60.952,28.547-60.952,61.954v116.079   c0,33.037,28.726,52.476,60.952,61.943c38.589,11.353,75.59,13.409,121.768,0c30.688-8.876,60.956-26.764,60.956-61.943v-46.461   H255.69v-15.486h121.768h60.952c35.431,0,48.638-24.715,60.96-61.807C512.092,278.314,511.549,241.589,499.37,192.603z    M324.178,424.766c12.64,0,22.873,10.356,22.873,23.156c0,12.85-10.233,23.305-22.873,23.305   c-12.595,0-22.877-10.455-22.877-23.305C301.301,435.122,311.583,424.766,324.178,424.766z">
                                </path>
                            </g>
                        </svg>
                    </div>
                    <h3 class="mb-2 text-xl font-bold dark:text-white">Python</h3>
                    <p class="text-gray-500 dark:text-gray-400">
                        Python is a popular programming language. Its easy to learn syntax makes Python a great choice
                        for your first language.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white dark:bg-gray-900 dark:bg-gray-800">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="max-w-screen-lg text-gray-500 sm:text-lg dark:text-gray-400 flex flex-col sm:flex-row items-center gap-14">
                <div class="w-fit">
                    <svg class="w-48 h-48"
                        xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 0 1024 1024" fill="currentColor" class="icon" version="1.1">
                        <path d="M1015.848 687.82H8.156a7.992 7.992 0 0 1-7.998-7.996 7.994 7.994 0 0 1 7.998-7.998h1007.692a7.992 7.992 0 0 1 7.996 7.998 7.992 7.992 0 0 1-7.996 7.996zM512 767.766c-17.636 0-31.99-14.34-31.99-31.99s14.354-31.99 31.99-31.99 31.992 14.34 31.992 31.99-14.356 31.99-31.992 31.99z m0-47.984c-8.81 0-15.996 7.184-15.996 15.994s7.186 15.994 15.996 15.994c8.824 0 15.996-7.184 15.996-15.994s-7.172-15.994-15.996-15.994zM376.152 975.732a8.01 8.01 0 0 1-7.826-9.73l31.99-143.956c0.968-4.296 5.294-6.954 9.544-6.078a8.014 8.014 0 0 1 6.078 9.544l-31.99 143.956a8 8 0 0 1-7.796 6.264zM647.864 975.732a8 8 0 0 1-7.808-6.264l-31.988-143.956a8.01 8.01 0 0 1 6.074-9.544 7.99 7.99 0 0 1 9.542 6.078l31.992 143.956a8.008 8.008 0 0 1-7.812 9.73z" fill=""/><path d="M671.954 975.732H352.05a7.992 7.992 0 0 1-7.998-7.998 7.992 7.992 0 0 1 7.998-7.996h319.904a7.992 7.992 0 0 1 7.996 7.996 7.992 7.992 0 0 1-7.996 7.998zM967.86 640.086H56.14a7.994 7.994 0 0 1-7.998-7.998V104.25a7.994 7.994 0 0 1 7.998-7.998h911.72c4.422 0 8 3.578 8 7.998v527.838a7.994 7.994 0 0 1-8 7.998z m-903.722-15.996h895.726V112.248H64.138v511.842z" fill=""/><path d="M967.86 800.038H56.14c-30.866 0-55.982-25.118-55.982-55.982V104.25c0-30.866 25.118-55.982 55.982-55.982h911.72c30.868 0 55.984 25.118 55.984 55.982v639.804c0 30.866-25.118 55.984-55.984 55.984zM56.14 64.262c-22.04 0-39.988 17.94-39.988 39.988v639.804c0 22.054 17.948 39.986 39.988 39.986h911.72c22.058 0 39.988-17.932 39.988-39.986V104.25c0-22.048-17.93-39.988-39.988-39.988H56.14z" fill=""/><path d="M967.86 831.778H56.14c-31.38 0-55.982-24.586-55.982-55.982v-31.99a7.994 7.994 0 0 1 7.998-7.998 7.994 7.994 0 0 1 7.998 7.998v31.99c0 22.43 17.574 39.986 39.988 39.986h911.72c22.434 0 39.988-17.556 39.988-39.986v-31.74a7.994 7.994 0 0 1 8-7.998 7.992 7.992 0 0 1 7.996 7.998v31.74c-0.002 31.396-24.588 55.982-55.986 55.982zM88.13 640.086a7.994 7.994 0 0 1-7.998-7.998V104.25a7.994 7.994 0 0 1 7.998-7.998 7.994 7.994 0 0 1 7.998 7.998v527.838a7.994 7.994 0 0 1-7.998 7.998z" fill=""/><path d="M72.136 160.232H56.14c-4.42 0-7.998-3.576-7.998-7.998s3.578-7.998 7.998-7.998h15.996c4.42 0 7.998 3.576 7.998 7.998s-3.578 7.998-7.998 7.998zM72.136 208.218H56.14c-4.42 0-7.998-3.578-7.998-7.998s3.578-7.998 7.998-7.998h15.996c4.42 0 7.998 3.578 7.998 7.998s-3.578 7.998-7.998 7.998zM72.136 256.204H56.14c-4.42 0-7.998-3.576-7.998-7.998s3.578-7.998 7.998-7.998h15.996c4.42 0 7.998 3.576 7.998 7.998s-3.578 7.998-7.998 7.998zM72.136 304.19H56.14c-4.42 0-7.998-3.578-7.998-7.998s3.578-7.998 7.998-7.998h15.996c4.42 0 7.998 3.578 7.998 7.998s-3.578 7.998-7.998 7.998z" fill=""/><path d="M72.136 352.174H56.14c-4.42 0-7.998-3.576-7.998-7.998s3.578-7.998 7.998-7.998h15.996c4.42 0 7.998 3.576 7.998 7.998s-3.578 7.998-7.998 7.998z" fill=""/><path d="M72.136 400.16H56.14a7.994 7.994 0 0 1-7.998-7.998 7.994 7.994 0 0 1 7.998-7.998h15.996a7.994 7.994 0 0 1 7.998 7.998 7.996 7.996 0 0 1-7.998 7.998z" fill=""/><path d="M72.136 448.144H56.14a7.994 7.994 0 0 1-7.998-7.998 7.994 7.994 0 0 1 7.998-7.998h15.996a7.994 7.994 0 0 1 7.998 7.998 7.994 7.994 0 0 1-7.998 7.998z" fill=""/><path d="M72.136 496.13H56.14a7.994 7.994 0 0 1-7.998-7.998 7.994 7.994 0 0 1 7.998-7.998h15.996a7.994 7.994 0 0 1 7.998 7.998 7.996 7.996 0 0 1-7.998 7.998z" fill=""/><path d="M72.136 544.116H56.14a7.994 7.994 0 0 1-7.998-7.998 7.992 7.992 0 0 1 7.998-7.996h15.996a7.992 7.992 0 0 1 7.998 7.996 7.994 7.994 0 0 1-7.998 7.998z" fill=""/><path d="M72.136 592.102H56.14c-4.42 0-7.998-3.578-7.998-7.998s3.578-7.998 7.998-7.998h15.996c4.42 0 7.998 3.578 7.998 7.998s-3.578 7.998-7.998 7.998z" fill=""/><path d="M200.096 160.232h-63.98c-4.42 0-7.998-3.576-7.998-7.998s3.576-7.998 7.998-7.998h63.98c4.42 0 7.998 3.576 7.998 7.998s-3.578 7.998-7.998 7.998zM488.006 208.218H264.076c-4.42 0-7.998-3.578-7.998-7.998s3.576-7.998 7.998-7.998h223.93c4.422 0 7.998 3.578 7.998 7.998s-3.576 7.998-7.998 7.998zM232.086 208.218H152.11c-4.42 0-7.998-3.578-7.998-7.998s3.578-7.998 7.998-7.998h79.976c4.42 0 7.998 3.578 7.998 7.998s-3.578 7.998-7.998 7.998zM679.95 256.204H472.012c-4.42 0-7.998-3.576-7.998-7.998s3.578-7.998 7.998-7.998h207.936c4.422 0 7.996 3.576 7.996 7.998s-3.572 7.998-7.994 7.998zM775.918 256.204h-63.98c-4.418 0-7.996-3.576-7.996-7.998s3.578-7.998 7.996-7.998h63.98c4.422 0 8 3.576 8 7.998s-3.578 7.998-8 7.998zM440.022 256.204H168.106c-4.42 0-7.998-3.576-7.998-7.998s3.576-7.998 7.998-7.998h271.916c4.42 0 7.998 3.576 7.998 7.998s-3.578 7.998-7.998 7.998zM216.09 352.174H168.106c-4.42 0-7.998-3.576-7.998-7.998s3.576-7.998 7.998-7.998h47.986c4.42 0 7.998 3.576 7.998 7.998s-3.58 7.998-8 7.998zM485.508 352.174H248.082c-4.42 0-7.998-3.576-7.998-7.998s3.578-7.998 7.998-7.998h237.428c4.42 0 7.998 3.576 7.998 7.998s-3.58 7.998-8 7.998zM551.988 304.19H184.1c-4.42 0-7.998-3.578-7.998-7.998s3.578-7.998 7.998-7.998h367.888c4.422 0 7.996 3.578 7.996 7.998s-3.574 7.998-7.996 7.998zM535.992 400.16h-143.956a7.994 7.994 0 0 1-7.998-7.998 7.994 7.994 0 0 1 7.998-7.998h143.956c4.422 0 8 3.578 8 7.998a7.994 7.994 0 0 1-8 7.998zM424.028 448.144H152.11a7.994 7.994 0 0 1-7.998-7.998 7.994 7.994 0 0 1 7.998-7.998h271.916a7.994 7.994 0 0 1 7.998 7.998 7.992 7.992 0 0 1-7.996 7.998zM280.072 544.116h-127.96a7.994 7.994 0 0 1-7.998-7.998 7.992 7.992 0 0 1 7.998-7.996h127.96a7.992 7.992 0 0 1 7.998 7.996 7.994 7.994 0 0 1-7.998 7.998zM599.972 496.13H376.042a7.994 7.994 0 0 1-7.998-7.998 7.994 7.994 0 0 1 7.998-7.998h223.93c4.422 0 8 3.578 8 7.998a7.994 7.994 0 0 1-8 7.998zM647.958 496.13h-15.992c-4.422 0-8-3.578-8-7.998a7.994 7.994 0 0 1 8-7.998h15.992c4.422 0 8 3.578 8 7.998s-3.58 7.998-8 7.998zM344.052 496.13H168.106a7.994 7.994 0 0 1-7.998-7.998 7.994 7.994 0 0 1 7.998-7.998h175.946a7.994 7.994 0 0 1 7.998 7.998 7.994 7.994 0 0 1-7.998 7.998zM200.096 592.102h-63.98c-4.42 0-7.998-3.578-7.998-7.998s3.576-7.998 7.998-7.998h63.98c4.42 0 7.998 3.578 7.998 7.998s-3.578 7.998-7.998 7.998zM551.988 448.144h-95.972a7.994 7.994 0 0 1-7.998-7.998 7.994 7.994 0 0 1 7.998-7.998h95.972a7.992 7.992 0 0 1 7.996 7.998 7.99 7.99 0 0 1-7.996 7.998zM679.95 400.16h-111.964c-4.422 0-8-3.578-8-7.998a7.994 7.994 0 0 1 8-7.998h111.964a7.992 7.992 0 0 1 7.996 7.998 7.992 7.992 0 0 1-7.996 7.998zM360.046 400.16h-191.94a7.994 7.994 0 0 1-7.998-7.998 7.994 7.994 0 0 1 7.998-7.998h191.942a7.994 7.994 0 0 1 7.998 7.998 7.996 7.996 0 0 1-8 7.998z" fill=""/>
                    </svg>
                </div>
                <div class="w-full">
                    <h2 class="mb-4 text-4xl font-extrabold text-gray-900 dark:text-white text-right">
                        Log in to your account, and start learning while tracking your progress
                    </h2>
                    <p class="mb-4 text-right">
                        Our website goes beyond providing top-notch coding courses; it also offers a robust learning
                        progress tracking system.
                        With our intuitive tracking functionality, learners can effortlessly monitor their advancement
                        through each course, keeping tabs on completed modules and assessing quiz scores.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gray-50 dark:bg-gray-800">
        <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
            <div class="font-light text-gray-500 sm:text-lg dark:text-gray-400">
                <h2 class="mb-4 text-4xl font-bold text-gray-900 dark:text-white">
                    Proudly connected with over <span class="font-extrabold">100+</span> education institutes worldwide.
                </h2>
                <p class="mb-4 font-light">
                    Our platform stands at the forefront of collaborative learning. Through these strategic
                    partnerships, we bring a global perspective to coding education, enriching our courses with diverse
                    insights and expertise.
                </p>
                <p class="mb-4 font-medium">
                    This network not only expands our reach but also ensures that learners benefit from a well-rounded
                    and internationally recognized coding education experience, opening doors to a world of
                    opportunities in the ever-evolving field of technology.
                </p>
                <a href="#"
                    class="inline-flex items-center font-medium text-blue-600 hover:text-blue-800 dark:text-blue-500 dark:hover:text-blue-700">
                    Learn more
                    <svg class="ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
            <div class="grid grid-cols-2 gap-4 mt-8">
                <img class="w-full rounded-lg"
                    src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/office-long-2.png"
                    alt="office content 1">
                <img class="mt-4 w-full lg:mt-10 rounded-lg"
                    src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/office-long-1.png"
                    alt="office content 2">
            </div>
        </div>
    </section>

    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm text-center">
                <h2 class="mb-6 text-4xl font-extrabold leading-tight text-gray-900 dark:text-white">
                    Start your coding adventure today
                </h2>
                <a href="#"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    Sign up for Free
                </a>
            </div>
        </div>
    </section>

    <x-home-footer />
</x-main-page-layout>