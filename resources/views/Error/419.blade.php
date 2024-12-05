<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesión Expirada</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Protest+Revolution&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=Protest+Revolution&family=Signika+Negative:wght@300..700&display=swap');

        .content {
            width: 50%;
            display: flex;
            flex-direction: column;
            /* Cambia 'flex-column' por 'flex-direction: column' */
            justify-content: center;
            /* Centra verticalmente */
            align-items: center;
            /* Centra horizontalmente */
            height: 100vh;
            /* Asegura que ocupe toda la altura de la ventana */
            margin: 0 auto;
        }

        .text-center {
            text-align: center;
        }

        .title {
            font-size: 5rem;
            margin-top: 25px;
            margin-bottom: 0;
            font-family: "Protest Revolution", sans-serif;
            font-weight: 400;
            font-style: normal;
        }

        .text {
            font-size: 1.2rem;
            font-family: "Signika Negative", sans-serif;
            font-optical-sizing: auto;
            font-weight: <weight>;
            font-style: normal;
        }

        .btn-login {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            padding: 10px 30px;
            background: #7c7d7e;
            border-radius: 5px;
            color: #fff;
            text-decoration: none;
            margin-top: 2rem;
            font-weight: 500;
            transition: all 0.3s ease-in-out;
        }

        .btn-login:hover {
            background: #626263;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
        }

        .animate-pulse {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;


        }
        @keyframes pulse {
  0%, 100% {
    opacity: 1;
  }
  50% {
    opacity: .5;
  }
}
    </style>
</head>

<body>
    <div class="content text-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="10rem" height="10rem" viewBox="0 0 24 24" class="animate-pulse">
            <path fill="#8a1f1f" d="M23 15v3c0 .5-.36.88-.83.97l-3.2-3.2c.03-.09.03-.18.03-.27a2.5 2.5 0 0 0-2.5-2.5c-.09 
                    0-.18 0-.27.03L10.2 7h.8V5.73c-.6-.34-1-.99-1-1.73c0-1.1.9-2 2-2s2 .9 2 2c0 .74-.4 1.39-1 
                    1.73V7h1c3.87 0 7 3.13 7 7h1c.55 0 1 .45 1 1m-.89 6.46l-1.27 1.27l-.95-.95c-.27.14-.57.22-.89.22H5a2 
                    2 0 0 1-2-2v-1H2c-.55 0-1-.45-1-1v-3c0-.55.45-1 1-1h1c0-2.47 1.29-4.64 3.22-5.89L1.11 3l1.28-1.27zM10 
                    15.5a2.5 2.5 0 0 0-5 0a2.5 2.5 0 0 0 5 0m6.07 2.46l-2.03-2.03c.19 1.04 1 1.84 2.03 2.03" />
        </svg>

        <div class="">
            <h1 class="title">Tu sesión ha expirado</h1>
            <p class="text">Por motivos de seguridad, te hemos desconectado debido a inactividad.</p>
            <a href="{{ route('login') }}" class="btn-login">
                Iniciar sesión nuevamente
            </a>
        </div>
    </div>
</body>

</html>