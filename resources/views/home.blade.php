<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Learn2Code</title>

  <!-- Google font -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;500&display=swap" rel="stylesheet" />
  <!-- Fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <style>
    .header-banner>ul>li {
      position: relative;
    }

    #logo {
      width: 60px;
      height: 51px;
    }

    .header-banner>ul>li>a {
      text-decoration: none;
      color: black;
    }

    .header-banner>ul>li:hover {
      background-color: var(--green-w3);
    }

    .header-banner>ul>li:hover>a {
      color: white;
    }

    .header-banner>ul>li>ul {
      padding-left: 0;
      margin-left: -19px;
      margin-top: 16px;
      position: absolute;
      display: none;
      background-color: white;
    }

    .header-banner>ul>li>ul>li:hover {
      width: 71%;
      color: white;
      background-color: var(--green-w3);
    }

    .header-banner>ul>li>ul>li>a {
      text-decoration: none;
      color: black;
    }

    .header-banner>ul>li>ul>li:hover>a {
      color: white;
    }

    .header-banner>ul>li:hover>ul {
      display: block;
    }

    body {
      font-family: "Inter", sans-serif;
      top: 0;
      left: 0;
      margin: 0;
    }

    header {
      position: fixed;
      opacity: 1;
      width: 100%;
    }

    .header-banner {
      width: 100%;
      background-color: white;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .header-banner ul {
      text-decoration: none;
      list-style: none;
      margin: 0;
      padding: 0;
    }

    .header-banner ul>li {
      display: inline-block;
      padding: 16px 18px 16px 18px;
    }

    .header-navbar {
      width: 100%;
      background-color: #282a35;
      display: flex;
    }

    .header-navbar ul {
      text-decoration: none;
      list-style: none;
      margin: 0;
      padding: 0;
    }

    .header-navbar ul>li {
      display: inline-block;
      font-size: 1rem;
      color: white;
      padding: 4px 8px 4px 8px;
    }

    .banner-auth {
      margin-right: 20px;
    }

    .auth-login,
    .auth-signup {
      padding: 10px 23px 10px 23px;
      font-size: 16px;
      border-radius: 25px;
      box-shadow: none;
      border: none;
    }

    .auth-login>a,
    .auth-signup>a {
      text-decoration: none;
    }

    .auth-signup>a {
      color: white;
    }

    .auth-login>a {
      color: black;
    }

    .auth-login {
      color: black;
      background-color: var(--light-green-w3);
    }

    .auth-signup {
      color: white;
      background-color: var(--green-w3);
    }

    .search {
      display: flex;
      width: 100%;
      justify-content: center;
      align-items: center;
      background: url("/home-asset/img/lynx_in_space.png"),
        url("/home-asset/img/background_in_space.png");
      background-repeat: no-repeat, repeat;
      background-position: 90% 60%, center center;
      padding-top: 150px;
      padding-bottom: 90px;
    }

    .search-bar {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
    }

    .search-bar h1 {
      font-weight: bold;
      color: white;
      width: 100%;
      font-size: 55px;
    }

    .search-bar h2 {
      font-weight: bold;
      margin-top: 18px;
      margin-bottom: 18px;
      color: var(--yellow-w3);
    }

    .bar-input {
      display: flex;
      align-items: center;
      outline-style: solid;
      height: 100%;
      border-radius: 1.5rem;
      background-color: white;
      margin: 0.5rem;
      margin-top: 10px;
      margin-bottom: 10px;
    }

    .bar-input input {
      background-color: white;
      outline: none;
      margin-left: 0.9rem;
      margin-right: 1rem;
      font-weight: bold;
      border: none;
      width: 24rem;
      height: 2.75rem;
    }

    .input-outline {
      background-color: var(--green-w3);
      padding: 8px 39px 8px 39px;
      height: 100%;
      border-top-right-radius: 40px;
      border-bottom-right-radius: 40px;
    }

    .input-outline i {
      font-size: 1.25rem
        /* 20px */
      ;
      line-height: 1.75rem;
      color: white;
    }

    .input-outline:hover {
      background: #058757;
      transition: 0.1s linear;
    }

    .bar-outline {
      margin-top: 30px;
      margin-bottom: 10px;
      color: white;
      text-decoration: underline;
    }

    .bar-outline:hover {
      color: var(--yellow-w3);
      transition: 0.4s linear;
    }

    .lang {
      margin-top: 0px;
      background-color: var(--light-green-w3);
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .lang-grid {
      padding: 100px 100px 100px 100px;
      width: 100%;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
      gap: 40px;
    }

    .lang-grid>div {
      font-weight: 700;
      text-align: center;
      font-size: 30px;
      padding: 30px 0px 30px 0px;
    }

    footer {
      display: flex;
      align-items: center;
      justify-content: center;
      background: url(/home-asset/img/lynx_landing.png),
        url(/home-asset/img/background_in_space.png);
      background-repeat: no-repeat, repeat;
      box-sizing: inherit;
      background-position: right bottom, center center;
      height: 500px;
    }

    .course {
      text-decoration: none;
      color: white;
    }

    .course:hover {
      color: var(--yellow-w3);
    }

    .footer-box {
      padding: 40px 80px 300px 80px;
    }

    .footer-box ul {
      text-decoration: none;
      list-style: none;
      margin: 0;
    }

    .footer-box ul>li {
      display: inline-block;
      padding: 16px 18px 16px 18px;
      text-transform: uppercase;
      font-weight: bold;
      color: var(--yellow-w3);
    }

    .box-body {
      display: flex;
      flex-direction: row;
      flex-wrap: wrap;
    }

    .exercise {
      background-color: var(--light-black-w3);
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .exercise-flex {
      padding-top: 64px !important;
      padding-bottom: 64px !important;
      padding-left: 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      width: 60%;
    }

    .flex-header {
      text-align: center;
      color: white !important;
    }

    .flex-header h2 {
      font-size: 55px;
      margin: 10px 0;
      font-weight: 700;
      width: 100%;
    }

    .flex-header p {
      font-weight: 700;
      margin: 10px 0;
      font-size: 20px;
    }

    .flex-body {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 40px;
      width: 100%;
    }

    .body-box {
      padding: 70px 50px;
      font-size: 35px;
      font-weight: 700;
      border-radius: 5px;
      text-align: center;
      margin: 20px 20px 20px 20px;
      text-decoration: none;
    }

    .ex-background {
      background-color: var(--green-w3);
      color: white;
    }

    .qui-background {
      background-color: var(--yellow-w3);
      color: var(--light-black-w3);
    }

    .ex-background:hover {
      background-color: #03905c !important;
      transition: 0.3s linear;
    }

    .qui-background:hover {
      background-color: #faed8d;
      transition: 0.3s linear;
    }

    .score {
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: var(--white-green-w3);
    }

    .score-container {
      display: flex;
      align-items: center;
      flex-direction: column;
      justify-content: center;
      padding: 40px 40px 40px 40px;
    }

    .container-header {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
    }

    .container-header>h2 {
      font-size: 65px;
      font-weight: 700;
      margin: 20px 20px 20px 20px;
    }

    .score-container>p {
      margin-top: 8px;
      font-weight: 600;
      font-size: 17px;
    }

    .score-container>button {
      padding: 18px 70px 18px 70px;
      margin: 25px 10px 25px 10px;
      font-size: 20px;
      border-radius: 35px;
      box-shadow: none;
      border: none;
      font-weight: 600;
      background-color: var(--green-w3) !important;
      color: white !important;
    }

    .langtag {}

    .langtag-component {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 30px 30px 30px 30px;
    }

    .component-boxing {
      display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: center;
      flex-wrap: wrap;
      gap: 20px;
    }

    .boxing-lang {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
    }

    .boxing-lang h2 {
      font-weight: 700;
      font-size: 50px;
      margin: 2px 0 20px 0 !important;
    }

    .boxing-lang p {
      font-weight: 500;
      font-size: 17px;
    }

    .boxing-lang button {
      padding: 13px 50px 13px 50px;
      margin: 20px 20px 20px;
      font-size: 18px;
      border-radius: 25px;
      box-shadow: none;
      border: none;
      font-weight: 600;
      text-align: center;
      cursor: pointer;
      white-space: nowrap;
      background-color: var(--green-w3) !important;
      color: white !important;
    }

    .boxing-example {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      background-color: #38444d;
      padding: 35px 35px 35px 35px;
      border-radius: 10px;
    }

    .boxing-example p {
      font-size: 24px;
      color: white;
      font-weight: 400;
      margin: 10px 0;
      box-sizing: inherit;
      margin: 10px 10px 10px 10px;
    }

    .boxing-example img {
      max-width: 400px;
      max-height: 280px;
    }

    .box-margin {
      margin: 30px 30px 30px 30px;
    }

    .boxing-lang,
    .boxing-example {
      width: 400px;
      max-height: 400px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
    }
  </style>
</head>

<body>
  <section class="search">
    <div class="search-bar">
      <h1 class="">Learn2Code</h1>
      <h2 class="">Ctrl+Z Your Way to Coding Greatness.</h2>
      <div class="bar-input">
        <input class="outline-none ml-2 mr-2 hover:not-italic font-bold w-96 h-11" type="search"
          placeholder="Search our tutorials, e.g. HTML" />
        <div class="input-outline">
          <i class="fa-solid fa-magnifying-glass"></i>
        </div>
      </div>
      <a href="#!">
        <h3 class="bar-outline mt-5 mb-5 text-white w-full">
          Not sure where to begin?
        </h3>
      </a>
    </div>
  </section>
  <!--    <svg-->
  <!--      style="background-color: #d9eee1; margin-bottom: -8px"-->
  <!--      width="100%"-->
  <!--      height="80"-->
  <!--      viewBox="0 0 100 100"-->
  <!--      preserveAspectRatio="none"-->
  <!--    >-->
  <!--      <path-->
  <!--        id="wavepath"-->
  <!--        d="M0,0  L110,0C35,150 35,0 0,100z"-->
  <!--        fill="#282A35"-->
  <!--      ></path>-->
  <!--    </svg>-->
  <section class="lang">
    <div class="lang-grid">

    </div>
  </section>
  <section class="langtag"></section>
  <section class="score">
    <div class="score-container">
      <div class="container-header">
        <h2>Track your progress</h2>
        <p>We are always tracking you, even in your sleep.</p>
        <br>
        <p>Log in to your account, and start coding now! Or else...</p>
        <br>
      </div>
      <img src="/home-asset/img/myl-green-off.png" />
      <button>Sign Up for Free</button>
    </div>
  </section>
  <section class="exercise">
    <div class="exercise-flex">
      <div class="flex-header">
        <h2>Exercises and Quizzes</h2>
        <p>Test your skill!</p>
      </div>
      <div class="flex-body">
        <a href="#!" class="body-box ex-background">
          <div>Exercises</div>
        </a>
        <a href="#!" class="body-box qui-background">
          <div>Quizzes</div>
        </a>
      </div>
    </div>
  </section>
  <footer class="footer">
    <div class="footer-box">
      <!--        <ul>-->
      <!--          <li></li>-->
      <!--          <li>Space</li>-->
      <!--          <li>upgrade</li>-->
      <!--          <li>newsletter</li>-->
      <!--          <li>get certificated</li>-->
      <!--          <li>get report</li>-->
      <!--        </ul>-->
    </div>
  </footer>
  <script src="https://kit.fontawesome.com/8a2b31a7f1.js" crossorigin="anonymous"></script>
  <script>
    const renderLang = document.getElementsByClassName("lang-grid")[0];
    const topLang = document.getElementsByClassName("langtag")[0];
    const dataLang = [
      { name: "HTML", backgroundColor: "--green-w3", color: "white" },
      { name: "CSS", backgroundColor: "--light-pink-w3", color: "black" },
      { name: "JavaScript", backgroundColor: "--yellow-w3", color: "black" },
      { name: "SQL", backgroundColor: "--light-pink-w3", color: "black" },
      { name: "C++", backgroundColor: "--light-black-w3", color: "white" },
      { name: "Python", backgroundColor: "--light-blue-w3", color: "white" },
    ];

    const dataTopLang = [
      {
        name: "HTML",
        title: "The language for building web pages",
        backgroundColor: "background-color: var(--light-blue-w3)",
        color: "color: white !important;",
        filePath: "html.jpg",
      },
      {
        name: "CSS",
        title: "The language for styling web pages",
        backgroundColor: "background-color: var(--light-pink-w3)",
        color: "color: black;",
        filePath: "css.jpg",
      },
      {
        name: "JavaScript",
        title: "The language for programming web pages",
        backgroundColor: "background-color: var(--light-black-w3)",
        color: "color: white !important;",
        filePath: "js.jpg",
      },
      {
        name: "Python",
        title: "A popular programming language",
        backgroundColor: "background-color: var(--yellow-w3)",
        color: "color: black;",
        filePath: "python.jpg",
      },
    ];

    const renderDataLang = dataLang
      .map(
        (item) =>
          `<div style="background-color: var(${item.backgroundColor})"><a href="#!" style="text-decoration: none; color:${item.color}">${item.name}</a></div>`
      )
      .join("");

    console.log(renderDataLang);

    const renderDataTopLangHTML = dataTopLang
      .map(
        (item) => `
          <div class="langtag-component" style="${item.backgroundColor};${item.color}">
            <div class="component-boxing">
              <div class="boxing-lang box-margin">
                <h2>${item.name}</h2>
                <p>${item.title}</p>
                <button>Learn ${item.name}</button>
              </div>
              <div class="boxing-example box-margin">
                <p>${item.name} Example</p>
                <img src="/home-asset/img/lang/${item.filePath}"/>
              </div>
            </div>
          </div>
    `
      )
      .join("");

    topLang.innerHTML = renderDataTopLangHTML;

    renderLang.innerHTML = renderDataLang;


  </script>
</body>

</html>