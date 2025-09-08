<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New User</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        * { 
            box-sizing: border-box; 
            margin: 0; 
            padding: 0; 
        }
        
        body { 
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; 
            color: #1e293b; 
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            overflow-x: hidden;
        }
        
        .bg-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background: 
                radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(120, 219, 255, 0.3) 0%, transparent 50%);
            animation: float 20s ease-in-out infinite;
        }
        
        .container { 
            max-width: 600px; 
            margin: 0 auto; 
            padding: 2rem 1rem; 
            position: relative;
            z-index: 1;
        }
        
        .header {
            text-align: center;
            margin-bottom: 3rem;
            animation: slideDown 0.8s ease-out;
        }
        
        .header h1 {
            font-size: 2.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
            text-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .header p {
            color: rgba(255,255,255,0.9);
            font-size: 1.1rem;
            font-weight: 300;
        }
        
        .card { 
            background: rgba(255, 255, 255, 0.95); 
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2); 
            border-radius: 24px; 
            box-shadow: 
                0 20px 40px rgba(0,0,0,0.1),
                0 0 0 1px rgba(255,255,255,0.05);
            overflow: hidden; 
            transform: translateY(30px); 
            opacity: 0; 
            animation: cardSlideUp 0.8s ease-out 0.2s forwards;
        }
        
        .card-header { 
            padding: 2rem; 
            background: linear-gradient(135deg, #f8fafc, #e2e8f0);
            border-bottom: 1px solid rgba(226, 232, 240, 0.5);
            text-align: center;
        }
        
        .card-title {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            margin: 0; 
            font-size: 1.5rem; 
            font-weight: 700;
            color: #1e293b;
        }
        
        .card-title i {
            color: #667eea;
            font-size: 1.25rem;
        }
        
        .card-body { 
            padding: 2rem; 
            animation: fadeInUp 0.8s ease-out 0.4s both;
        }
        
        .form-group { 
            margin-bottom: 1.5rem; 
            position: relative;
        }
        
        .form-group label { 
            display: block; 
            margin-bottom: 0.5rem; 
            font-weight: 600; 
            color: #374151;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        
        .input-wrapper {
            position: relative;
        }
        
        .input-wrapper i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 1rem;
            transition: color 0.3s ease;
        }
        
        input[type="text"], input[type="email"] { 
            width: 100%; 
            padding: 1rem 1rem 1rem 3rem; 
            border: 2px solid #e5e7eb; 
            border-radius: 12px; 
            font-size: 1rem;
            background: #f9fafb;
            transition: all 0.3s ease;
            outline: none;
        }
        
        input[type="text"]:focus, input[type="email"]:focus {
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-1px);
        }
        
        input[type="text"]:focus + i, input[type="email"]:focus + i {
            color: #667eea;
        }
        
        .form-group:hover input[type="text"], .form-group:hover input[type="email"] {
            border-color: #d1d5db;
            background: white;
        }
        
        .form-group:hover .input-wrapper i {
            color: #667eea;
        }
        
        .actions { 
            display: flex; 
            gap: 1rem; 
            margin-top: 2rem;
            justify-content: center;
        }
        
        .btn { 
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 1rem 2rem; 
            text-decoration: none; 
            border-radius: 12px; 
            border: none;
            font-size: 1rem; 
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            min-width: 140px;
            justify-content: center;
        }
        
        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        
        .btn:hover::before {
            left: 100%;
        }
        
        .btn:active { 
            transform: translateY(1px) scale(0.98); 
        }
        
        .btn-primary { 
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.4);
        }
        
        .btn-primary:hover { 
            background: linear-gradient(135deg, #059669, #047857);
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.6);
            transform: translateY(-2px);
        }
        
        .btn-secondary { 
            background: linear-gradient(135deg, #64748b, #475569);
            color: white;
            box-shadow: 0 4px 15px rgba(100, 116, 139, 0.4);
        }
        
        .btn-secondary:hover { 
            background: linear-gradient(135deg, #475569, #334155);
            box-shadow: 0 6px 20px rgba(100, 116, 139, 0.6);
            transform: translateY(-2px);
        }
        
        .form-animation {
            animation: slideInFromLeft 0.6s ease-out;
        }
        
        .form-group:nth-child(1) { animation-delay: 0.1s; }
        .form-group:nth-child(2) { animation-delay: 0.2s; }
        
        @keyframes cardSlideUp { 
            to { 
                transform: translateY(0); 
                opacity: 1; 
            } 
        }
        
        @keyframes slideDown {
            from {
                transform: translateY(-30px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
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
        
        @keyframes slideInFromLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes float {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
            }
            50% {
                transform: translateY(-20px) rotate(2deg);
            }
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }
            
            .header h1 {
                font-size: 2rem;
            }
            
            .actions {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="bg-animation"></div>
    <div class="container">
        <div class="header">
            <h1><i class="fas fa-user-plus"></i> Create New User</h1>
            <p>Add a new user to your system</p>
        </div>
        
    <div class="card">
        <div class="card-header">
                <h2 class="card-title">
                    <i class="fas fa-edit"></i>
                    User Information
                </h2>
        </div>
            
        <div class="card-body">
                <form action="<?= site_url('users/create') ?>" method="POST" id="createForm">
                    <div class="form-group form-animation">
                        <label for="username">
                            <i class="fas fa-user"></i>
                            Username
                        </label>
                        <div class="input-wrapper">
                            <i class="fas fa-user"></i>
                            <input type="text" name="username" id="username" required placeholder="Enter username">
                        </div>
                    </div>
                    
                    <div class="form-group form-animation">
                        <label for="email">
                            <i class="fas fa-envelope"></i>
                            Email Address
                        </label>
                        <div class="input-wrapper">
                            <i class="fas fa-envelope"></i>
                            <input type="email" name="email" id="email" required placeholder="Enter email address">
                </div>
                </div>
                    
                <div class="actions">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-plus"></i>
                            Create User
                        </button>
                        <a href="<?= site_url('users/view') ?>" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i>
                            Back to Users
                        </a>
                </div>
            </form>
        </div>
    </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('createForm');
            const inputs = form.querySelectorAll('input');
            
            // Add focus animations
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'scale(1.02)';
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'scale(1)';
                });
            });
            
            // Form submission animation
            form.addEventListener('submit', function(e) {
                const submitBtn = this.querySelector('button[type="submit"]');
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Creating...';
                submitBtn.disabled = true;
            });
            
            // Add typing animation to inputs
            inputs.forEach(input => {
                input.addEventListener('input', function() {
                    if (this.value.length > 0) {
                        this.style.borderColor = '#10b981';
                        this.parentElement.querySelector('i').style.color = '#10b981';
                    } else {
                        this.style.borderColor = '#e5e7eb';
                        this.parentElement.querySelector('i').style.color = '#9ca3af';
                    }
                });
            });
        });
    </script>
</body>
</html>
