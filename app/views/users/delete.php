<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
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
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
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
                radial-gradient(circle at 20% 80%, rgba(239, 68, 68, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(220, 38, 38, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(248, 113, 113, 0.3) 0%, transparent 50%);
            animation: float 20s ease-in-out infinite;
        }
        
        .container { 
            max-width: 500px; 
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
            color: white;
            margin-bottom: 0.5rem;
            text-shadow: 0 4px 8px rgba(0,0,0,0.3);
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
                0 20px 40px rgba(0,0,0,0.2),
                0 0 0 1px rgba(255,255,255,0.05);
            overflow: hidden; 
            transform: translateY(30px); 
            opacity: 0; 
            animation: cardSlideUp 0.8s ease-out 0.2s forwards;
        }
        
        .card-header { 
            padding: 2rem; 
            background: linear-gradient(135deg, #fef2f2, #fee2e2);
            border-bottom: 1px solid rgba(254, 226, 226, 0.5);
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
            color: #dc2626;
        }
        
        .card-title i {
            color: #ef4444;
            font-size: 1.25rem;
            animation: pulse 2s infinite;
        }
        
        .card-body { 
            padding: 2rem; 
            animation: fadeInUp 0.8s ease-out 0.4s both;
            text-align: center;
        }
        
        .warning-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #fef2f2, #fee2e2);
            border: 3px solid #fca5a5;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            animation: bounce 1s ease-in-out;
        }
        
        .warning-icon i {
            font-size: 2rem;
            color: #ef4444;
        }
        
        .user-details {
            background: linear-gradient(135deg, #fef2f2, #fee2e2);
            border: 1px solid #fecaca;
            border-radius: 12px;
            padding: 1.5rem;
            margin: 1.5rem 0;
            text-align: left;
        }
        
        .user-details h3 {
            color: #dc2626;
            margin-bottom: 1rem;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .user-details p {
            color: #7f1d1d;
            margin: 0.5rem 0;
            font-size: 0.9rem;
        }
        
        .warning-text {
            color: #7f1d1d;
            font-size: 1rem;
            margin: 1.5rem 0;
            line-height: 1.6;
        }
        
        .warning-text strong {
            color: #dc2626;
            font-weight: 700;
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
        
        .btn-confirm { 
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
            box-shadow: 0 4px 15px rgba(239, 68, 68, 0.4);
        }
        
        .btn-confirm:hover { 
            background: linear-gradient(135deg, #dc2626, #b91c1c);
            box-shadow: 0 6px 20px rgba(239, 68, 68, 0.6);
            transform: translateY(-2px);
        }
        
        .btn-cancel { 
            background: linear-gradient(135deg, #64748b, #475569);
            color: white;
            box-shadow: 0 4px 15px rgba(100, 116, 139, 0.4);
        }
        
        .btn-cancel:hover { 
            background: linear-gradient(135deg, #475569, #334155);
            box-shadow: 0 6px 20px rgba(100, 116, 139, 0.6);
            transform: translateY(-2px);
        }
        
        .danger-zone {
            background: linear-gradient(135deg, #fef2f2, #fee2e2);
            border: 2px dashed #fca5a5;
            border-radius: 12px;
            padding: 1rem;
            margin: 1rem 0;
            text-align: center;
        }
        
        .danger-zone h4 {
            color: #dc2626;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        
        .danger-zone p {
            color: #7f1d1d;
            font-size: 0.8rem;
            margin: 0;
        }
        
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
        
        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
        }
        
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-10px);
            }
            60% {
                transform: translateY(-5px);
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
            <h1><i class="fas fa-exclamation-triangle"></i> Delete User</h1>
            <p>This action cannot be undone</p>
        </div>
        
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">
                    <i class="fas fa-trash-alt"></i>
                    Confirm Deletion
                </h2>
            </div>
            
            <div class="card-body">
                <div class="warning-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                
                <div class="user-details">
                    <h3><i class="fas fa-user"></i> User to be deleted</h3>
                    <p><strong>ID:</strong> <?= $user['id'] ?></p>
                    <p><strong>Username:</strong> <?= htmlspecialchars($user['username']) ?></p>
                    <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
                </div>
                
                <div class="warning-text">
                    <strong>Warning:</strong> You are about to permanently delete this user from the system. 
                    This action cannot be undone and all associated data will be lost.
                </div>
                
                <div class="danger-zone">
                    <h4><i class="fas fa-skull-crossbones"></i> Danger Zone</h4>
                    <p>This action is irreversible. Please make sure you want to proceed.</p>
                </div>
                
                <form action="<?= site_url('users/delete/' . $user['id']) ?>" method="POST" id="deleteForm">
                    <div class="actions">
                        <button type="submit" class="btn btn-confirm" id="deleteBtn">
                            <i class="fas fa-trash"></i>
                            Yes, Delete User
                        </button>
                        <a href="<?= site_url('users/view') ?>" class="btn btn-cancel">
                            <i class="fas fa-arrow-left"></i>
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteBtn = document.getElementById('deleteBtn');
            const form = document.getElementById('deleteForm');
            let confirmCount = 0;
            
            // Add confirmation requirement
            deleteBtn.addEventListener('click', function(e) {
                e.preventDefault();
                confirmCount++;
                
                if (confirmCount === 1) {
                    this.innerHTML = '<i class="fas fa-exclamation-triangle"></i> Are you sure?';
                    this.style.background = 'linear-gradient(135deg, #f59e0b, #d97706)';
                    this.style.boxShadow = '0 6px 20px rgba(245, 158, 11, 0.6)';
                } else if (confirmCount === 2) {
                    this.innerHTML = '<i class="fas fa-skull-crossbones"></i> Last chance!';
                    this.style.background = 'linear-gradient(135deg, #dc2626, #b91c1c)';
                    this.style.boxShadow = '0 6px 20px rgba(220, 38, 38, 0.6)';
                } else {
                    // Submit the form
                    this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Deleting...';
                    this.disabled = true;
                    form.submit();
                }
            });
            
            // Reset confirmation if user clicks cancel
            document.querySelector('.btn-cancel').addEventListener('click', function() {
                confirmCount = 0;
                deleteBtn.innerHTML = '<i class="fas fa-trash"></i> Yes, Delete User';
                deleteBtn.style.background = 'linear-gradient(135deg, #ef4444, #dc2626)';
                deleteBtn.style.boxShadow = '0 4px 15px rgba(239, 68, 68, 0.4)';
            });
            
            // Add shake animation on hover for delete button
            deleteBtn.addEventListener('mouseenter', function() {
                this.style.animation = 'shake 0.5s ease-in-out';
            });
            
            deleteBtn.addEventListener('animationend', function() {
                this.style.animation = '';
            });
        });
        
        // Add shake animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes shake {
                0%, 100% { transform: translateX(0); }
                25% { transform: translateX(-5px); }
                75% { transform: translateX(5px); }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>
