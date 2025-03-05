<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Usuários</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --color-base: #1a3549;          /* Cor principal */
            --color-accent: #11263a;        /* Detalhes e elementos secundários */
            --color-light: rgba(26, 53, 73, 0.7);  /* Versão transparente da base */
            --text-primary: #eef5f9;        /* Texto principal */
            --text-secondary: #c3d4e0;      /* Texto secundário */
            --hover-effect: rgba(17, 38, 58, 0.15); /* Efeito hover */
        }

        body {
            background: linear-gradient(
                rgba(26, 53, 73, 0.95), 
                rgba(17, 38, 58, 0.98)
            ), url('/images/fundo.jpg') center/cover fixed;
            font-family: 'Poppins', sans-serif;
            color: var(--text-primary);
            min-height: 100vh;
            line-height: 1.6;
        }

        /* Container Principal */
        .container {
            max-width: 1400px;
            padding: 2rem 1.5rem;
        }

        /* Sistema de Cards */
        .card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(12px);
            border: 1px solid var(--color-accent);
            border-radius: 10px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-header {
            background: linear-gradient(
                15deg, 
                var(--color-base), 
                var(--color-accent)
            ) !important;
            border-bottom: 2px solid var(--color-accent);
            color: var(--text-primary);
            padding: 1.25rem 1.5rem;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        /* Elementos de Formulário */
        .form-control {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--color-accent);
            color: var(--text-primary);
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.08);
            border-color: var(--color-base);
            box-shadow: 0 0 0 3px rgba(26, 53, 73, 0.3);
        }

        /* Botões */
        .btn-primary {
            background: var(--color-accent);
            border: 2px solid var(--color-base);
            color: var(--text-primary);
            padding: 0.75rem 2rem;
            transition: all 0.3s ease;
            letter-spacing: 0.5px;
        }

        .btn-primary:hover {
            background: var(--color-base);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(17, 38, 58, 0.4);
        }

        /* Tabelas */
.table {
    --bs-table-bg: transparent;
    --bs-table-color: var(--text-primary);
    --bs-table-border-color: rgba(255, 255, 255, 0.1);
}

.table-hover tbody tr {
    transition: all 0.3s ease;
    background: rgba(26, 53, 73, 0.3); /* Fundo base sutil */
}

.table-hover tbody tr:hover {
    background: rgba(255, 255, 255, 0.05) !important;
    transform: translateX(3px);
    box-shadow: 0 2px 8px rgba(17, 38, 58, 0.2);
    border-left: 3px solid var(--color-accent);
}

/* Adicione isto para melhorar a legibilidade */
.table td, .table th {
    padding: 1rem;
    border-color: rgba(255, 255, 255, 0.08);
}

.table thead th {
    border-bottom: 2px solid var(--color-accent);
    font-weight: 500;
    color: var(--text-secondary);
}
        /* Tipografia */
        h1, h2, h3 {
            font-weight: 600;
            color: var(--text-primary);
            text-shadow: 0 2px 4px rgba(17, 38, 58, 0.4);
        }

        label {
            font-weight: 500;
            color: var(--text-secondary);
            margin-bottom: 0.5rem;
        }

        /* Elementos Especiais */
        .select-container {
            position: relative;
        }

        .select-container::after {
            content: "▼";
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-secondary);
            pointer-events: none;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }
            
            .card {
                border-radius: 8px;
                margin-bottom: 1.5rem;
            }
            
            .btn {
                width: 100%;
                margin-bottom: 0.75rem;
            }
        }

        /* Efeitos Especiais */
        .glass-effect {
            background: linear-gradient(
                135deg,
                rgba(255, 255, 255, 0.025),
                rgba(255, 255, 255, 0.05)
            );
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .divider {
            border-top: 1px solid var(--color-accent);
            opacity: 0.3;
            margin: 1.5rem 0;
        }

        /* Modal Customizado */
.modal-content {
    background: rgba(26, 53, 73, 0.95);
    backdrop-filter: blur(15px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 12px;
}

.modal-header {
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    padding: 1.25rem;
}

.modal-title {
    color: var(--text-primary);
    font-weight: 500;
}

.modal-body {
    padding: 1.5rem;
    color: var(--text-secondary);
}

.modal-footer {
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    padding: 1rem 1.5rem;
}

.btn-danger {
    background: #8b1a1a;
    border: none;
    transition: all 0.3s ease;
}

.btn-danger:hover {
    background: #a51f1f;
    transform: translateY(-1px);
}

.btn-close-white {
    filter: invert(1) grayscale(100%) brightness(200%);
}
/* Ajustes de Texto */
.text-light-60 {
    color: rgba(238, 245, 249, 0.8) !important; /* 80% de opacidade */
    font-size: 0.85em;
}

.fa-info-circle {
    color: var(--color-accent);
    margin-right: 0.5rem;
}
    </style>
</head>
<body>
    <div class="container py-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')

    <!-- Modal de Confirmação -->
<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content glass-effect">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="confirmationModalLabel">
                    <i class="fas fa-exclamation-triangle me-2"></i>Confirmação
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
    <p class="lead mb-0">Tem certeza que deseja excluir este usuário?</p>
    <small class="text-light-60"><i class="fas fa-info-circle me-1"></i>Esta ação não pode ser desfeita.</small>
</div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>Cancelar
                </button>
                <button type="button" id="confirmDelete" class="btn btn-danger">
                    <i class="fas fa-trash-alt me-2"></i>Excluir
                </button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'))
    let deleteForm = null

    // Captura todos os botões de exclusão
    document.querySelectorAll('[data-delete]').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault()
            deleteForm = this.closest('form')
            confirmationModal.show()
        })
    })

    // Confirmação da exclusão
    document.getElementById('confirmDelete').addEventListener('click', function() {
        if(deleteForm) {
            deleteForm.submit()
        }
    })
})
</script>
</body>
</html>