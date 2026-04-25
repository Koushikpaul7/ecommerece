@extends('frontend.layouts.app')

@section('content')
<style>
    * {
        --primary: #FF6B6B;
        --primary-dark: #EE5A52;
        --gray-light: #F7F9FC;
        --gray-dark: #2C3E50;
        --border-color: #E8ECEF;
        --success: #4CAF50;
    }

    .login-wrapper {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        position: relative;
        overflow: hidden;
        padding: 20px;
    }

    .login-wrapper::before {
        content: '';
        position: absolute;
        width: 400px;
        height: 400px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        top: -100px;
        left: -100px;
        animation: float 6s ease-in-out infinite;
    }

    .login-wrapper::after {
        content: '';
        position: absolute;
        width: 300px;
        height: 300px;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 50%;
        bottom: -50px;
        right: -50px;
        animation: float 8s ease-in-out infinite reverse;
    }

    @keyframes float {
        0%, 100% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(30px);
        }
    }

    .login-container {
        max-width: 450px;
        width: 100%;
        position: relative;
        z-index: 1;
    }

    .login-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        overflow: hidden;
        animation: slideUp 0.5s ease-out;
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .login-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 40px 30px;
        text-align: center;
    }

    .login-header h1 {
        font-size: 28px;
        font-weight: 700;
        margin: 0 0 10px 0;
        letter-spacing: -0.5px;
    }

    .login-header p {
        font-size: 14px;
        opacity: 0.9;
        margin: 0;
    }

    .login-body {
        padding: 40px 30px;
    }

    .alert {
        border: none;
        border-radius: 12px;
        padding: 12px 16px;
        font-size: 14px;
        margin-bottom: 24px;
        animation: shake 0.5s ease;
    }

    @keyframes shake {
        0%, 100% { transform: translateX(0) }
        25% { transform: translateX(-5px) }
        75% { transform: translateX(5px) }
    }

    .form-group {
        margin-bottom: 24px;
        position: relative;
    }

    .form-group label {
        display: block;
        font-size: 13px;
        font-weight: 600;
        color: var(--gray-dark);
        margin-bottom: 8px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .input-group {
        position: relative;
        display: flex;
        align-items: center;
    }

    .input-icon {
        position: absolute;
        left: 16px;
        color: #999;
        font-size: 16px;
        pointer-events: none;
        transition: all 0.3s ease;
        z-index: 2;
    }

    .form-control {
        width: 100%;
        padding: 12px 12px 12px 44px;
        border: 2px solid var(--border-color);
        border-radius: 12px;
        font-size: 15px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        background: var(--gray-light);
        font-family: inherit;
    }

    .form-control:focus {
        outline: none;
        background: white;
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        transform: translateY(-2px);
    }

    .form-control:focus ~ .input-icon {
        color: #667eea;
        transform: scale(1.2);
    }

    .form-control::placeholder {
        color: #999;
    }

    .form-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 13px;
        margin-bottom: 24px;
        gap: 10px;
        flex-wrap: wrap;
    }

    .form-footer label {
        display: flex;
        align-items: center;
        gap: 6px;
        margin: 0;
        cursor: pointer;
        color: var(--gray-dark);
    }

    .form-footer input[type="checkbox"] {
        width: 16px;
        height: 16px;
        cursor: pointer;
        accent-color: #667eea;
    }

    .form-footer a {
        color: #667eea;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .form-footer a:hover {
        color: #764ba2;
        text-decoration: underline;
    }

    .btn-login {
        width: 100%;
        padding: 14px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        border-radius: 12px;
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
    }

    .btn-login::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.2);
        transition: left 0.5s ease;
    }

    .btn-login:hover::before {
        left: 100%;
    }

    .btn-login:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
    }

    .btn-login:active {
        transform: translateY(0);
    }

    .btn-login.loading {
        pointer-events: none;
        opacity: 0.8;
    }

    .btn-login.loading::after {
        content: '';
        position: absolute;
        width: 16px;
        height: 16px;
        top: 50%;
        left: 50%;
        margin-left: 8px;
        margin-top: -8px;
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-top-color: white;
        border-radius: 50%;
        animation: spin 0.8s linear infinite;
    }

    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }

    .divider {
        display: flex;
        align-items: center;
        margin: 30px 0;
        color: #999;
        font-size: 13px;
    }

    .divider::before,
    .divider::after {
        content: '';
        flex: 1;
        height: 1px;
        background: var(--border-color);
    }

    .divider span {
        margin: 0 12px;
    }

    .login-footer {
        text-align: center;
        font-size: 14px;
        color: #666;
    }

    .login-footer a {
        color: #667eea;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        position: relative;
    }

    .login-footer a::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 0;
        height: 2px;
        background: #667eea;
        transition: width 0.3s ease;
    }

    .login-footer a:hover::after {
        width: 100%;
    }

    .input-error {
        border-color: #FF6B6B !important;
        background: rgba(255, 107, 107, 0.05) !important;
    }

    /* Mobile responsiveness */
    @media (max-width: 480px) {
        .login-wrapper {
            padding: 15px;
        }

        .login-header {
            padding: 30px 20px;
        }

        .login-header h1 {
            font-size: 24px;
        }

        .login-body {
            padding: 30px 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-footer {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>

<div class="login-wrapper">
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <h1>Welcome Back</h1>
                <p>Sign in to your account to continue shopping</p>
            </div>

            <div class="login-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <i class="fa fa-exclamation-circle"></i>
                        {{ $errors->first() }}
                    </div>
                @endif

                <form action="{{ route('user.login.submit') }}" method="POST" id="loginForm">
                    @csrf

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <div class="input-group">
                            <i class="input-icon fa fa-envelope"></i>
                            <input 
                                type="email" 
                                id="email"
                                name="email" 
                                class="form-control{{ $errors->has('email') ? ' input-error' : '' }}" 
                                required 
                                placeholder="Enter your email"
                                value="{{ old('email') }}"
                            >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group">
                            <i class="input-icon fa fa-lock"></i>
                            <input 
                                type="password" 
                                id="password"
                                name="password" 
                                class="form-control{{ $errors->has('password') ? ' input-error' : '' }}" 
                                required 
                                placeholder="Enter your password"
                            >
                        </div>
                    </div>

                    <div class="form-footer">
                        <label>
                            <input type="checkbox" name="remember" id="remember">
                            <span>Remember me</span>
                        </label>
                        <a href="#">Forgot password?</a>
                    </div>

                    <button type="submit" class="btn-login" id="loginBtn">
                        <i class="fa fa-sign-in"></i> Sign In
                    </button>
                </form>

                <div class="divider">
                    <span>Don't have an account?</span>
                </div>

                <div class="login-footer">
                    <a href="{{ route('register') }}">Create a new account</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('loginForm').addEventListener('submit', function() {
        const btn = document.getElementById('loginBtn');
        btn.classList.add('loading');
        btn.disabled = true;
    });

    // Input validation feedback
    document.getElementById('email').addEventListener('input', function() {
        this.classList.remove('input-error');
    });

    document.getElementById('password').addEventListener('input', function() {
        this.classList.remove('input-error');
    });
</script>

@endsection