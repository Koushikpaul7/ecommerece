@extends('frontend.layouts.app')
@section('title', 'Register')
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

    .register-wrapper {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        position: relative;
        overflow: hidden;
        padding: 20px;
    }

    .register-wrapper::before {
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

    .register-wrapper::after {
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

    .register-container {
        max-width: 500px;
        width: 100%;
        position: relative;
        z-index: 1;
    }

    .register-card {
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

    .register-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 40px 30px;
        text-align: center;
    }

    .register-header h1 {
        font-size: 28px;
        font-weight: 700;
        margin: 0 0 10px 0;
        letter-spacing: -0.5px;
    }

    .register-header p {
        font-size: 14px;
        opacity: 0.9;
        margin: 0;
    }

    .register-body {
        padding: 40px 30px;
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

    .input-error {
        border-color: #FF6B6B !important;
        background: rgba(255, 107, 107, 0.05) !important;
    }

    .error-message {
        font-size: 12px;
        color: #FF6B6B;
        margin-top: 6px;
        display: flex;
        align-items: center;
        gap: 4px;
        animation: slideInError 0.3s ease;
    }

    @keyframes slideInError {
        from {
            opacity: 0;
            transform: translateY(-5px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .form-footer {
        font-size: 13px;
        margin-bottom: 24px;
        display: flex;
        align-items: center;
        gap: 6px;
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

    .btn-register {
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

    .btn-register::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.2);
        transition: left 0.5s ease;
    }

    .btn-register:hover::before {
        left: 100%;
    }

    .btn-register:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
    }

    .btn-register:active {
        transform: translateY(0);
    }

    .btn-register.loading {
        pointer-events: none;
        opacity: 0.8;
    }

    .btn-register.loading::after {
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

    .register-footer {
        text-align: center;
        font-size: 14px;
        color: #666;
    }

    .register-footer a {
        color: #667eea;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        position: relative;
    }

    .register-footer a::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 0;
        height: 2px;
        background: #667eea;
        transition: width 0.3s ease;
    }

    .register-footer a:hover::after {
        width: 100%;
    }

    .password-strength {
        margin-top: 8px;
        height: 4px;
        background: #eee;
        border-radius: 2px;
        overflow: hidden;
    }

    .password-strength-bar {
        height: 100%;
        width: 0%;
        border-radius: 2px;
        transition: all 0.3s ease;
    }

    /* Mobile responsiveness */
    @media (max-width: 480px) {
        .register-wrapper {
            padding: 15px;
        }

        .register-header {
            padding: 30px 20px;
        }

        .register-header h1 {
            font-size: 24px;
        }

        .register-body {
            padding: 30px 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }
    }
</style>

<div class="register-wrapper">
    <div class="register-container">
        <div class="register-card">
            <div class="register-header">
                <h1>Create Account</h1>
                <p>Join us and start your shopping journey</p>
            </div>

            <div class="register-body">
                <form action="{{ route('register.submit') }}" method="POST" id="registerForm">
                    @csrf

                    <!-- Full Name -->
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <div class="input-group">
                            <i class="input-icon fa fa-user"></i>
                            <input 
                                type="text" 
                                id="name"
                                name="name" 
                                class="form-control{{ $errors->has('name') ? ' input-error' : '' }}" 
                                placeholder="Enter your full name"
                                value="{{ old('name') }}"
                                required
                            >
                        </div>
                        @error('name')
                            <div class="error-message">
                                <i class="fa fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <div class="input-group">
                            <i class="input-icon fa fa-envelope"></i>
                            <input 
                                type="email" 
                                id="email"
                                name="email" 
                                class="form-control{{ $errors->has('email') ? ' input-error' : '' }}" 
                                placeholder="Enter your email"
                                value="{{ old('email') }}"
                                required
                            >
                        </div>
                        @error('email')
                            <div class="error-message">
                                <i class="fa fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group">
                            <i class="input-icon fa fa-lock"></i>
                            <input 
                                type="password" 
                                id="password"
                                name="password" 
                                class="form-control{{ $errors->has('password') ? ' input-error' : '' }}" 
                                placeholder="Enter password (min 8 characters)"
                                required
                            >
                        </div>
                        <div class="password-strength">
                            <div class="password-strength-bar" id="strengthBar"></div>
                        </div>
                        <small style="color: #999; display: block; margin-top: 4px;">
                            Min 8 characters, with uppercase & numbers
                        </small>
                        @error('password')
                            <div class="error-message">
                                <i class="fa fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <div class="input-group">
                            <i class="input-icon fa fa-lock"></i>
                            <input 
                                type="password" 
                                id="password_confirmation"
                                name="password_confirmation" 
                                class="form-control" 
                                placeholder="Re-enter your password"
                                required
                            >
                        </div>
                    </div>

                    <!-- Terms & Conditions -->
                    <div class="form-footer">
                        <label>
                            <input type="checkbox" name="terms" id="terms" required>
                            <span>I agree to the <a href="#" style="color: #667eea; text-decoration: underline;">Terms & Conditions</a></span>
                        </label>
                    </div>

                    <button type="submit" class="btn-register" id="registerBtn">
                        <i class="fa fa-user-plus"></i> Create Account
                    </button>
                </form>

                <div class="divider">
                    <span>Already have an account?</span>
                </div>

                <div class="register-footer">
                    <a href="{{ route('user.login') }}">Sign in here</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Password strength indicator
    document.getElementById('password').addEventListener('input', function() {
        const password = this.value;
        const bar = document.getElementById('strengthBar');
        let strength = 0;

        if (password.length >= 8) strength += 25;
        if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength += 25;
        if (/\d/.test(password)) strength += 25;
        if (/[^a-zA-Z\d]/.test(password)) strength += 25;

        bar.style.width = strength + '%';
        
        if (strength < 50) {
            bar.style.background = '#FF6B6B';
        } else if (strength < 75) {
            bar.style.background = '#FFA500';
        } else {
            bar.style.background = '#4CAF50';
        }

        this.classList.remove('input-error');
    });

    // Input error removal
    document.getElementById('name').addEventListener('input', function() {
        this.classList.remove('input-error');
    });

    document.getElementById('email').addEventListener('input', function() {
        this.classList.remove('input-error');
    });

    document.getElementById('password_confirmation').addEventListener('input', function() {
        this.classList.remove('input-error');
    });

    // Form submission
    document.getElementById('registerForm').addEventListener('submit', function() {
        const btn = document.getElementById('registerBtn');
        btn.classList.add('loading');
        btn.disabled = true;
    });
</script>

@endsection