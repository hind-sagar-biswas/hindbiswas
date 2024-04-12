<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hind Sagar Biswas | Portfolio</title>

    <!-- Fontawesome 5 -->
    <script src="https://kit.fontawesome.com/c9fec141b0.js" crossorigin="anonymous"></script>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    @vite(['resources/css/main.css', 'resources/js/main.js'])

    <meta name="description" content="Welcome to my portfolio">
    <meta name="keywords" content="tool, design, design trends, CSS generator, web design" />
    <meta name="author" content="Hind Sagar Biswas">
    <meta name="twitter:title" content="Welcome to my portfolio where I brag my skills and works" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Hind Sagar Biswas - Portfolio" />
    <meta property="og:url" content="https://hind-sagar-biswas.github.io/portfolio/" />
    <meta property="og:title" content="Welcome to my portfolio where I brag my skills and works" />
    <link rel="manifest" href="{{ url('images/hind-biwas.png') }}">
    <meta name="msapplication-TileColor" content="#1f2933" />
    <meta name="theme-color" content="#1f2933" />
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="128x128" href="{{ url('images/favicon_128.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('images/favicon_32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('images/favicon.png') }}">
    <link rel="manifest" href="{{ url('images/site.webmanifest') }}">
    <meta name="msapplication-TileImage" content="assetsimages/favicon.ico">
    <!-- Windows 8 -->
    <!--[if IE]><link rel="shortcut icon" href="assetsimages/favicon.png"><![endif]-->
    <link rel="icon" type="image/png" href="{{ url('images/favicon.ico') }}">
</head>

<body>
    {{-- @if (Route::has('login'))
        <nav class="-mx-3 flex flex-1 justify-end">
            @auth
                <a href="{{ url('/dashboard') }}"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                    Log in
                </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Register
                    </a>
                @endif
            @endauth
        </nav>
    @endif --}}
    <div id="graph"></div>
    <a href="#navbar" id="go-to-top" class="bg-primary fa-bounce pc-hide hide-comp"><i
            class="fa-solid fa-angles-up"></i></a>
    <nav class="navbar navbar-expand-sm sticky-md-top navbar-dark" id="navbar">
        <div class="container-fluid">
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#skills">Skills</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#languages">Languages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#projects">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact Me</a>
                    </li>
                </ul>
                <form class="d-flex my-2 my-lg-0">
                    <!-- <input class="form-control me-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
                </form>
            </div>
        </div>
    </nav>

    <main class="container-fluid">
        <div class="row">
            <div class="col hero-container scrollspy" data-bs-spy="scroll" data-bs-target="#navbar"
                data-bs-offset="0" tabindex="0">
                <div id="home"
                    class="hero d-flex flex-column justify-content-center align-items-center p-md-3 pt-3 pb-3">
                    <section id="first-section" class="hero-content">
                        <h4>Hi, I'm <span class="text-light">Hind Sagar Biswas</span></h4>
                        <h1 class="big-text">I am a <span id="type-writer-target">Programmer</span><span
                                class="fa-fade">_</span></h1>
                        <p class="text-uppercase">I will turn your vision into reality...</p>
                        <!-- <p class="divider"> -->
                        <ul class="social-container">
                            <li><a href="https://github.com/hind-sagar-biswas" class="social-link"><i
                                        class="fa-brands fa-github"></i></a></li>
                            <li><a href="https://web.facebook.com/hindbiswas.krishna/" class="social-link"><i
                                        class="fa-brands fa-facebook"></i></a></li>
                            <li><a href="https://www.instagram.com/hind_sagar_biswas/" class="social-link"><i
                                        class="fa-brands fa-instagram"></i></a></li>
                            <li><a href="mailto:hindsbhk@outlook.com" class="social-link"><i
                                        class="fa-solid fa-envelope"></i></a></li>
                        </ul>
                        <div class="divider"></div>
                        <div class="link-buttons d-flex">
                            <a class="link-btn mobile-hide" href="#skills">Skills</a>
                            <a class="link-btn" href="#languages">Languages</a>
                            <a class="link-btn" href="#projects">Projects</a>
                            <a class="link-btn" href="#contact">Contact <span class="mobile-hide">Me</span></a>
                        </div>
                    </section>
                </div>

                <div id="skills"
                    class="hero d-flex flex-column justify-content-center align-items-center p-md-3 pt-3 pb-3">
                    <section class="hero-content">
                        <h2 class="text-uppercase"><i class="fa-solid fa-terminal"></i> Skills</h2>
                        <pre class="cmd"><span class="text-warning">&gt; </span><span id="skills-cmd"></span><span class="fa-fade">|</span></pre>
                        <div id="skill-list" class="hide"></div>
                        <a class="skill text-decoration-none" href="#languages"><i
                                class="fa-solid fa-angles-down"></i>
                            Multiple Languages &amp; Frameworks</a>
                    </section>
                </div>

                <div id="languages"
                    class="hero d-flex flex-column justify-content-center align-items-center p-md-3 pt-3 pb-3">
                    <section class="hero-content">
                        <h2 class="text-uppercase"><i class="fa-solid fa-terminal"></i> Languages &amp; Frameworks
                        </h2>
                        <pre class="cmd"><span class="text-warning">&gt; </span><span id="languages-cmd"></span><span class="fa-fade">|</span></pre>
                        <div id="language-list" class="hide"></div>
                    </section>
                </div>

                <div id="projects"
                    class="hero d-flex flex-column justify-content-center align-items-center p-md-3 pt-3 pb-3">
                    <section class="hero-content">
                        <h2 class="text-uppercase mb-3"><i class="fa-solid fa-terminal"></i> Some Works</h2>
                        <div id="projectCarouselIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div id="project-indicators" class="carousel-indicators">
                                <button type="button" data-bs-target="#projectCarouselIndicators"
                                    data-bs-slide-to="0" class="active"></button>
                            </div>
                            <div id="projects-container" class="carousel-inner">

                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#projectCarouselIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#projectCarouselIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </section>
                </div>

                <div id="contact"
                    class="hero d-flex flex-column justify-content-center align-items-center p-md-3 pt-3 pb-3">
                    <section class="hero-content">
                        <h2 class="text-uppercase"><i class="fa-solid fa-terminal"></i> Contact Me</h2>
                        <pre class="cmd"><span class="text-warning">&gt;</span> <a href="mailto:hindsbhk@outlook.com" class="text-decoration-none d-inline text-info">hindsbhk@outlook.com</a></pre>
                        <form action="">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="">
                                <label for="email">Your Email Address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="subject" id="subject"
                                    placeholder="">
                                <label for="subject">Subject</label>
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" name="message" id="message" rows="5" placeholder=""></textarea>
                            </div>
                            <div>
                                <button type="submit" class="text-uppercase"><i class="fa-solid fa-paper-plane"></i>
                                    Send</button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
            <div class="col-md-4 d-flex justify-content-center align-items-center profile-col p-3 mobile-hide">
                <div class="profile-container">
                    <div class="round-container">
                        <div class="social-container">
                            <div class="social-list">
                                <a href="https://github.com/hind-sagar-biswas" class="scroll-target"><i
                                        class="fa-brands fa-github"></i></a>
                                <a href="https://web.facebook.com/hindbiswas.krishna/" class="scroll-target"><i
                                        class="fa-brands fa-facebook"></i></a>
                                <a href="https://www.instagram.com/hind_sagar_biswas/" class="scroll-target"><i
                                        class="fa-brands fa-instagram"></i></a>
                                <a href="mailto:hindsbhk@outlook.com" class="scroll-target"><i
                                        class="fa-solid fa-solid fa-envelope"></i></a>
                            </div>
                        </div>

                        <div class="moving-layers layer-1"></div>
                        <div class="moving-layers layer-2"></div>
                        <div class="moving-layers layer-3"></div>
                        <div class="moving-layers layer-4"></div>
                        <img src="{{ url('images/hind-biswas.png') }}" alt="Hind Sagar Biswas">
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>

</html>
