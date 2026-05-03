<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: lightblue;
            font-family: system-ui, sans-serif;
            margin: 0;
            padding: 0;
        }

        .auth-container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .auth-card {
            width: 90%;
            max-width: 400px;
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,.1);
            box-sizing: border-box;
        }

        h5 {
            font-size: 1.2rem;
            margin-bottom: 15px;
            justify-content: center;
        }

        .auth-card .mb-2,
        .auth-card .mb-3 {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .input-wrapper {
            display: flex;
            align-items: center;
            gap: 10px;
            width: 100%;
        }

        .auth-card i {
            color: #0d6efd;
            min-width: 20px;
        }

        .auth-card input.form-control {
            flex: 1;
        }

        .error-message {
            margin-left: 30px;
            margin-top: -5px;
            margin-bottom: 5px;
        }

        .glass-card {
            width: 90%;
            max-width: 400px;
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,.1);
            box-sizing: border-box;
            margin-bottom: 20px;
        }

        #weather {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 100%;
            padding: 0;
        }

        .weather-city {
            font-size: 1.3rem;
            font-weight: 700;
            text-align: left;
            flex: 1;
        }

        .weather-details {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 4px;
            min-width: 130px;
        }

        .weather-temp {
            font-size: 1.8rem;
            font-weight: 700;
            line-height: 1;
        }

        .weather-description {
            text-transform: capitalize;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="auth-container">

        <div class="glass-card shadow-lg">
            <div class="card-body" id="weather">
                @if(isset($weather))
                    <div class="weather-city">{{ $weather['city'] }}</div>
                    <div class="weather-details">
                        <div class="weather-temp">{{ $weather['temp'] }}°C</div>
                        <div class="weather-description">{{ $weather['description'] }}</div>
                    </div>
                @else
                    <h5 class="text-center w-100">Loading weather...</h5>
                @endif
            </div>
        </div>
        <form action="{{ route('login') }}" method="POST" class="auth-card">
            @csrf
            <h5 class="text-center mb-3">Sign In</h5>
            <div class="mb-2">
                <div class="input-wrapper">
                    <i class="fa-solid fa-envelope"></i><input type="email" name="email" class="form-control" placeholder="Email Address" value="{{ old('email') }}">
                </div>
                @error('email') <small class="text-danger error-message">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <div class="input-wrapper">
                    <i class="fa-solid fa-lock"></i><input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                @error('password') <small class="text-danger error-message">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100">
                Login
            </button>

            <div class="mt-4 text-center">
             Don't have account? <a href="{{ route('register') }}" class="text-sm text-blue-600 hover:underline">Register</a>
            </div>
        </form>
    </div>
    <script>
        async function loadWeather() {
            try {
                const res = await fetch('/weather');
                const data = await res.json();

                document.getElementById('weather').innerHTML = `
                    <h5>${data.city}</h5>
                    <div style="font-size: 1.8 rem; font-weight: bold;">
                        ${data.temp}°C
                    </div>
                    <div style="text-transform: capitalize;">
                        ${data.description}
                    </div>
                `;
            } catch (error) {
                console.error('Weather load failed', error);
            }
        }

        loadWeather();
        setInterval(loadWeather, 60000);
    </script>
</body>
</html>