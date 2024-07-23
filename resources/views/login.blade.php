<!DOCTYPE html>
<html lang="en">

<head>
  <title>lesgrandesaffaires.com</title>
  <meta property="og:title" content="Stable Rowdy Woodcock" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta charset="utf-8" />
  <meta property="twitter:card" content="summary_large_image" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <style data-tag="reset-style-sheet">
    html {
      line-height: 1.15;
    }

    body {
      margin: 0;
    }

    * {
      box-sizing: border-box;
      border-width: 0;
      border-style: solid;
    }

    p,
    li,
    ul,
    pre,
    div,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    figure,
    blockquote,
    figcaption {
      margin: 0;
      padding: 0;
    }

    button {
      background-color: transparent;
    }

    button,
    input,
    optgroup,
    select,
    textarea {
      font-family: inherit;
      font-size: 100%;
      line-height: 1.15;
      margin: 0;
    }

    button,
    select {
      text-transform: none;
    }

    button,
    [type="button"],
    [type="reset"],
    [type="submit"] {
      -webkit-appearance: button;
    }

    button::-moz-focus-inner,
    [type="button"]::-moz-focus-inner,
    [type="reset"]::-moz-focus-inner,
    [type="submit"]::-moz-focus-inner {
      border-style: none;
      padding: 0;
    }

    button:-moz-focus,
    [type="button"]:-moz-focus,
    [type="reset"]:-moz-focus,
    [type="submit"]:-moz-focus {
      outline: 1px dotted ButtonText;
    }

    a {
      color: inherit;
      text-decoration: inherit;
    }

    input {
      padding: 2px 4px;
    }

    img {
      display: block;
    }

    html {
      scroll-behavior: smooth
    }
  </style>
  <style data-tag="default-style-sheet">
    html {
      font-family: Inter;
      font-size: 16px;
    }

    body {
      font-weight: 400;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      letter-spacing: normal;
      line-height: 1.15;
      color: var(--dl-color-theme-neutral-dark);
      background-color: var(--dl-color-theme-neutral-light);
      fill: var(--dl-color-theme-neutral-dark);
    }
  </style>
  <link rel="stylesheet" href="https://unpkg.com/animate.css@4.1.1/animate.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=STIX+Two+Text:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&amp;display=swap" data-tag="font" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" data-tag="font" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" data-tag="font" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&amp;display=swap" data-tag="font" />
  <link rel="stylesheet" href="https://unpkg.com/@teleporthq/teleport-custom-scripts/dist/style.css" />
</head>

<body>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

  <div>
    <link href="{{ asset('css/index.css') }}" rel="stylesheet" />
    <div class="connexion-container">
      <div class="sign-in8-container">
        <div class="sign-in8-max-width thq-section-max-width">
          <div class="sign-in8-container1">
            <img alt="SignUp Image" src="{{ asset('asset/02.png') }}" class="sign-in8-sign-up-image thq-img-ratio-4-6" />
            <div class="sign-in8-container2">
              <div class="sign-in8-container3 thq-section-padding">
                <img alt="Company Logo" src="{{ asset('asset/03.png') }}" class="sign-in8-image" />
                <h2 class="sign-in8-text thq-heading-2">
                  <span>Start today</span>
                </h2>
                <p class="sign-in8-text01 thq-body-large">
                  <span>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Morbi lobortis maximus. Lorem ipsum dolor sit amet,
                    consectetur adipiscing elit.
                  </span>
                </p>
              </div>
            </div>
          </div>
          <div class="sign-in8-form-root thq-section-padding">
            <img alt="image" src="{{ asset('asset/01.svg') }}" class="sign-in8-image1" />
            <div class="sign-in8-form">
              <h2 class="sign-in8-text02 thq-heading-2">
                <span>Connectez-vous</span>
              </h2>
              <form action="{{ url('/login') }}" method="POST" class="sign-in8-form1">
                @csrf
                <div class="sign-in8-email">
                  <div class="sign-in8-container4">
                    <img alt="image" src="{{ asset('asset/04.png') }}" class="sign-in8-image2" />
                    <span class="sign-in8-text03">
                      <span>+229 </span>
                    </span>
                    <input type="tel" id="phoneNumberr" name="phone_number" value="{{ old('phone_number') }}" required placeholder="Entrer votre numero de téléphone" autocomplete="tel" class="sign-in8-textinput thq-input thq-body-large" />
                    <span id="phoneIccon" class="material-icons"></span>
                  </div>
                </div>
                <div class="sign-in8-password" id="passwordFieldd" style="display: none;">
                  <div class="sign-in8-textfield">
                    <input type="password" id="thq-sign-in-8-password" name="password" required placeholder="" autocomplete="current-password" class="sign-in8-textinput1 thq-input thq-body-large" />
                    <label for="thq-sign-in-8-password" class="sign-in8-label sign-in8-text06 thq-body-large">Mot de passe</label>
                  </div>
                  <span class="sign-in8-text07">
                    <a class="btn btn-link" href="{{ route('forgot.password.from') }}">
                      Mot de passe oublié?
                   </a>
                  </span>
                </div>
                @if($errors->any())
                <div class="error">
                  <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
                @endif
                <button id="nextButtton" type="submit" class="sign-in8-button thq-button-filled" disabled>
                  <span class="sign-in8-text08 thq-body-small">
                    <span>Suivant</span>
                  </span>
                </button>

              </form>

              <div class="sign-in8-divider">
                <div class="sign-in8-divider1"></div>
                <p class="sign-in8-text09 thq-body-large">ou</p>
                <div class="sign-in8-divider2"></div>
              </div>
              <a class="sign-in8-button1 thq-button-outline" href="{{ url('auth/redirect') }}">

                <svg viewBox="0 0 860.0137142857142 1024" class="sign-in8-icon">
                  <path d="M438.857 449.143h414.286c4 22.286 6.857 44 6.857 73.143 0 250.286-168 428.571-421.143 428.571-242.857 0-438.857-196-438.857-438.857s196-438.857 438.857-438.857c118.286 0 217.714 43.429 294.286 114.857l-119.429 114.857c-32.571-31.429-89.714-68-174.857-68-149.714 0-272 124-272 277.143s122.286 277.143 272 277.143c173.714 0 238.857-124.571 249.143-189.143h-249.143v-150.857z"></path>
                </svg>
                <span class="sign-in8-text10 thq-body-small">Continuer avec Google</span>

              </a>
            </div>
            <p class="sign-in8-text11 thq-body-large">Nouveau Client ?</p>
            <a href="{{ url('/register') }}" class="sign-in8-button2 thq-button-filled">
              <button type="button" id="connect">
                <span class="sign-in8-text12 thq-body-small connect">
                  Créer un compte
                </span>
              </button></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://unpkg.com/@teleporthq/teleport-custom-scripts"></script>
  <script src="{{ asset('js/index.js') }}" defer></script>
</body>

</html>