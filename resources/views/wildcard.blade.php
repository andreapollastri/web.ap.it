<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SERVER UP</title>
    <meta name="robots" content="noindex, nofollow">
    <link rel="icon" type="image/svg+xml"
        href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Ccircle cx='50' cy='50' r='45' fill='%2322c55e'/%3E%3C/svg%3E">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: #ffffff;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #1a1a1a;
        }

        .container {
            text-align: center;
            animation: fadeIn 1s ease-in;
        }

        .server-container {
            position: relative;
            margin-bottom: 0.3rem;
        }

        .server-svg {
            width: 250px;
            height: 100px;
        }

        .tech-icon {
            opacity: 0.8;
        }

        .led {
            fill: #22c55e;
            filter: drop-shadow(0 0 4px rgba(34, 197, 94, 0.9));
            animation: pulseFixed 2s ease-in-out infinite;
        }

        /* Random delays for each LED to create more randomness */
        circle.led:nth-of-type(1) {
            animation-delay: 0s;
            animation-duration: 2s;
        }

        circle.led:nth-of-type(2) {
            animation-delay: 0.6s;
            animation-duration: 2.3s;
        }

        @keyframes pulseFixed {

            0%,
            100% {
                opacity: 0.3;
                filter: drop-shadow(0 0 2px rgba(34, 197, 94, 0.3));
            }

            50% {
                opacity: 1;
                filter: drop-shadow(0 0 6px rgba(34, 197, 94, 1));
            }
        }

        .status-text {
            font-size: 1.5rem;
            font-weight: 300;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: #666;
            margin-top: -0.5rem;
            animation: fadeInUp 1s ease-out 0.3s both;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 600px) {
            .server-svg {
                width: 200px;
                height: 80px;
            }

            .status-text {
                font-size: 1.2rem;
                letter-spacing: 3px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="server-container">
            <svg class="server-svg" viewBox="0 0 250 100" xmlns="http://www.w3.org/2000/svg">
                <!-- Server -->
                <rect x="25" y="27.5" width="200" height="45" rx="4" fill="none" stroke="#1a1a1a" stroke-width="2.5" />
                <rect x="35" y="35.5" width="180" height="29" rx="2" fill="none" stroke="#1a1a1a" stroke-width="1.5" />

                <!-- Power button - left side -->
                <circle cx="50" cy="50" r="6" fill="none" stroke="#999" stroke-width="1.5" />
                <path d="M 50 46 L 50 50" stroke="#999" stroke-width="1.5" stroke-linecap="round" />

                <!-- LED indicators - right side, side by side -->
                <circle class="led" cx="185" cy="50" r="3.5" />
                <circle class="led" cx="200" cy="50" r="3.5" />
            </svg>
        </div>
        <div class="status-text">Server Up</div>
    </div>
</body>

</html>